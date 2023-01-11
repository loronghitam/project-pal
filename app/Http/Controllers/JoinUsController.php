<?php

namespace App\Http\Controllers;

use App\Models\JoinUs;
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

class JoinUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $data = [
            'script' => 'Admin.Components.Admin.joinus'
        ];
        return view('Admin.Page.joinus', $data);
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
            'title' => 'unique:join_us',
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
        } else {
            try {
                DB::transaction(function () use ($request) {
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $image = strtotime(date('Y-m-d H:i:s')) . '.' . $extension;
                    $destination = public_path('images/joinus/');

                    JoinUs::create([
                        'title' => $request->title,
                        'slug' => Str::slug($request->title),
                        'body' => $request->body,
                        'image' => $image,
                    ]);
                    $request->file('image')->move($destination, $image);
                });

                $json = [
                    'msg' => 'Berita berhasil ditambahkan',
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
    public function show($id)
    {
        if (is_numeric($id)) {
            $data = DB::table('join_us')
                ->where('id', '=', $id)
                ->first();
            return Response::json($data);
        }
        $data = JoinUs::orderBy('id', 'desc')->get();

        return datatables()
            ->of($data)
            ->editColumn('updated_at', function ($date) {
                return $date->updated_at ? with(new Carbon($date->updated_at))->diffForHumans() : '';
            })
            ->addIndexColumn()
            ->addColumn('image', function ($row) {
                return '<image class="img-thumbnail" src="' . public_path('images/joinus/' . $row->image) . '">';
            })
            ->addColumn('action', function ($row) {
                $data = [
                    'id' => $row->id
                ];
                return view('Admin.Components.Buttons.joinus', $data);
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
            'title' => ['required', Rule::unique('join_us', 'title')->ignore($id)]
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
                    DB::table('join_us')->where('id', $id)->update([
                        'title' => $request->title,
                        'slug' => Str::slug($request->title),
                        'body' => $request->body,
                    ]);
                    if ($request->has('image')) {
                        $education = JoinUs::find($id);
                        $oldImage = $education->image;
                        if ($oldImage) {
                            $pleaseRemove = public_path('images/joinus/') . $oldImage;
                            if (file_exists($pleaseRemove)) {
                                unlink($pleaseRemove);
                            }
                        }
                        $extension = $request->file('image')->getClientOriginalExtension();
                        $image = strtotime(date('Y-m-d H:i:s')) . '.' . $extension;
                        $destination = public_path('images/joinus/');
                        JoinUs::where('id', '=', $id)->update([
                            'image' => $image
                        ]);
                        $request->file('image')->move($destination, $image);
                    }
                });

                $json = [
                    'msg' => 'Edukasi berhasil disunting',
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
            $event = JoinUs::find($id);
            if (!$event) {
                $json = [
                    'msg' => 'Data Tidak Ditemukan',
                    'status' => false,
                ];
            }
            $oldImage = $event->image;
            if ($oldImage) {
                $pleaseRemove = public_path('images/joinus/') . $oldImage;

                if (file_exists($pleaseRemove)) {
                    unlink($pleaseRemove);
                }
            }

            DB::transaction(function () use ($id) {
                DB::table('join_us')->where('id', $id)->delete();
            });

            $json = [
                'msg' => 'Bergabung berhasil dihapus',
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
