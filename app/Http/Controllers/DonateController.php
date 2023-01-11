<?php

namespace App\Http\Controllers;

use App\Models\Donate;
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
use Yajra\DataTables\Exceptions\Exception;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class DonateController extends Controller
{
    public function report()
    {
        $program = Program::orderBy('title', 'asc')->get();

        return view('Admin.Page.report', ['program' => $program]);

    }

    public function export(Request $request)
    {
//        $category = "Magni Veritatis Facere Eligendi.,Voluptatem Placeat Ut Aut Dicta.";
//        for ($i = 0; $i < count($request->category); $i++) {
//            $category .= $request->category[$i] . ',';
//        }

//        dd($category);


        return Excel::download(new UsersExport($request->awal, $request->akhir, $request->category), 'users.xlsx');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $data = [
            'script' => 'Admin.Components.Admin.donate'
        ];
        return view('Admin.Page.donate', $data);
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
            'title' => 'unique:news',
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
                    $destination = base_path('public/images/berita/');

                    $news = News::create([
                        'title' => $request->title,
                        'slug' => Str::slug($request->title),
                        'body' => $request->body,
                        'image' => $image,
                        'user_id' => 1,
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
            $data = DB::table('donates')
                ->where('id', '=', $id)
                ->first();
            return Response::json($data);
        }
        $data = Donate::orderBy('id', 'desc')->get();

        return datatables()
            ->of($data)
            ->editColumn('updated_at', function ($date) {
                return $date->updated_at ? with(new Carbon($date->updated_at))->diffForHumans() : '';
            })
            ->addIndexColumn()
            ->addColumn('program', function ($row) {
                $program = Program::where('id', '=', $row->program_id)->first();
                return $program->title;
            })
            ->addColumn('action', function ($row) {
                $data = [
                    'id' => $row->id
                ];
                return view('Admin.Components.Buttons.donate', $data);
            })
            ->rawColumns(['action', 'program'])
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
        try {
            DB::transaction(function () use ($request, $id) {
                if ($request->prioritas == 'on') {
                    $prioritas = 'Valid';
                } else {
                    $prioritas = 'Tidak Valid';
                }

                if ($prioritas == 'Valid') {
                    DB::table('donates')->where('id', $id)->update([
                        'status' => $prioritas
                    ]);
                    $donate = Donate::find($id);

                    Program::where('id', '=', $donate->program_id)->increment('collected', $donate->amount);
                    $program = Program::find($donate->program_id);
                    if ($program->collected >= $program->funding) {
                        $program->update([
                            'status' => 'Non Aktif'
                        ]);
                    }
                } else {
                    $event = Donate::where('id', '=', $id)->first();
                    $oldImage = $event->image;
                    if ($oldImage) {
                        $pleaseRemove = base_path('public/images/donate/') . $oldImage;

                        if (file_exists($pleaseRemove)) {
                            unlink($pleaseRemove);
                        }
                    }

                    DB::transaction(function () use ($id) {
                        DB::table('donates')->where('id', $id)->delete();
                    });
                }

            });
            $json = [
                'msg' => 'Pembayaran berhasil divalidasi',
                'status' => true
            ];
        } catch (Exception $e) {
            $json = [
                'msg' => 'Error',
                'status' => false,
                'e' => $e
            ];
        }
        return Response::json($json);
    }
}
