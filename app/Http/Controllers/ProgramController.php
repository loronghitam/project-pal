<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Exceptions\Exception;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $data = [
            'script' => 'Admin.Components.Admin.program'
        ];
        return view('Admin.Page.program', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $rules = [
            'title' => 'unique:programs',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $json = [
                'msg' => 'Judul sudah digunakan!',
                'status' => false
            ];
            return Response::json($json);
        } elseif ($request->title == NULL) {
            $json = [
                'msg' => 'Mohon berikan judul',
                'status' => false
            ];
        } elseif ($request->body == NULL) {
            $json = [
                'msg' => 'Mohon berikan deskripsi',
                'status' => false
            ];
        } elseif ($request->image == NULL) {
            $json = [
                'msg' => 'Mohon berikan gambar',
                'status' => false
            ];
        } elseif ($request->funding == NULL) {
            $json = [
                'msg' => 'Mohon isikan target',
                'status' => false
            ];
        } elseif ($request->funding == NULL) {
            $json = [
                'msg' => 'Mohon isikan target',
                'status' => false
            ];
        } elseif ($request->end_program == NULL) {
            $json = [
                'msg' => 'Mohon isikan tanggal selesai',
                'status' => false
            ];
        } else {
            try {
                DB::transaction(function () use ($request) {
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $image = strtotime(date('Y-m-d H:i:s')) . '.' . $extension;
                    $destination = public_path('images/program/');

                    if ($request->prioritas == "on") {
                        $prioritas = "Iya";
                    } else {
                        $prioritas = "Tidak";
                    }

                    Program::create([
                        'title' => $request->title,
                        'slug' => Str::slug($request->title),
                        'body' => $request->body,
                        'funding' => $request->funding,
                        'image' => $image,
                        'prioritas' => $prioritas,
                        'end_program' => $request->end_program,
                        'status' => 'Aktif',
                        'user_id' => auth()->user()->id,
                    ]);
                    $request->file('image')->move($destination, $image);
                });

                $json = [
                    'msg' => 'Program berhasil dibuat',
                    'status' => true
                ];
            } catch (Exception $e) {
                $json = [
                    'msg' => 'Error',
                    'status' => false,
                    'e' => $e
                ];
            }
        }
        return Response::json($json);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     * @throws Exception
     */
    public function show($id): JsonResponse
    {
        if (is_numeric($id)) {
            $data = DB::table('programs')
                ->where('id', '=', $id)
                ->first();
            return Response::json($data);
        }
        $data = Program::orderBy('id', 'desc')->get();

        return datatables()
            ->of($data)
            ->editColumn('updated_at', function ($date) {
                return $date->created_at->format('d-M-Y');
            })
            ->addIndexColumn()
            ->addColumn('image', function ($row) {
                return '<image class="img-thumbnail" src="' . asset('images/program/' . $row->image) . '">';
            })
            ->addColumn('action', function ($row) {
                $data = [
                    'id' => $row->id
                ];
                return view('Admin.Components.Buttons.program', $data);
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', Rule::unique('programs', 'title')->ignore($id)]
        ]);
        if ($validator->fails()) {
            $json = [
                'msg' => 'Judul sudah digunakan!',
                'status' => false
            ];
            return Response::json($json);
        } elseif ($request->title == NULL) {
            $json = [
                'msg' => 'Mohon berikan judul',
                'status' => false
            ];
        } else {
            try {
                DB::transaction(function () use ($request, $id) {
                    if ($request->prioritas == "on") {
                        $prioritas = "Iya";
                    } else {
                        $prioritas = "Tidak";
                    }
                    DB::table('programs')->where('id', $id)->update([
                        'title' => $request->title,
                        'slug' => Str::slug($request->title),
                        'body' => $request->body,
                        'funding' => $request->funding,
                        'end_program' => $request->end_program,
                        'status' => $request->status,
                        'prioritas' => $prioritas,
                        'user_id' => auth()->user()->id,
                    ]);
                    if ($request->has('image')) {
                        $education = News::find($id);
                        $oldImage = $education->image;
                        if ($oldImage) {
                            $pleaseRemove = public_path('images/program/') . $oldImage;
                            if (file_exists($pleaseRemove)) {
                                unlink($pleaseRemove);
                            }
                        }
                        $extension = $request->file('image')->getClientOriginalExtension();
                        $image = strtotime(date('Y-m-d H:i:s')) . '.' . $extension;
                        $destination = public_path('images/program/');
                        Program::where('id', '=', $id)->update([
                            'image' => $image
                        ]);
                        $request->file('image')->move($destination, $image);
                    }
                });

                $json = [
                    'msg' => 'Program berhasil disunting',
                    'status' => true
                ];
            } catch (Exception $e) {
                $json = [
                    'msg' => 'Error',
                    'status' => false,
                    'e' => $e
                ];
            }
        }
        return Response::json($json);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $event = Program::find($id);
            if (!$event) {
                $json = [
                    'msg' => 'Data Tidak Ditemukan',
                    'status' => false,
                ];
            }
            $oldImage = $event->image;
            if ($oldImage) {
                $pleaseRemove = public_path('images/program/') . $oldImage;

                if (file_exists($pleaseRemove)) {
                    unlink($pleaseRemove);
                }
            }

            DB::transaction(function () use ($id) {
                DB::table('programs')->where('id', $id)->delete();
            });

            $json = [
                'msg' => 'Program berhasil dihapus',
                'status' => true
            ];
        } catch (Exception $e) {
            $json = [
                'msg' => 'error',
                'status' => false,
                'e' => $e,
            ];
        }

        return Response::json($json);
    }
}
