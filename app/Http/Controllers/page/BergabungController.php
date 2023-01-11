<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\JoinUs;
use App\Models\News;
use App\Models\UserJoin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Exceptions\Exception;

class BergabungController extends Controller
{
    public function bergabung()
    {
        $data = JoinUs::orderBy('id','desc')->get();

        return view('Page.page.bergabung',['bergabung' => $data]);
    }

    public function show($id)
    {
        $data = JoinUs::where('id','=',$id)->first();

        return Response::json($data);
    }

    public function store(Request $request): JsonResponse
    {
        if ($request->name == NULL) {
            $json = [
                'msg'       => 'Nama harus diisi !',
                'status'    => false
            ];
            return Response::json($json);
        } elseif ($request->email == NULL) {
            $json = [
                'msg'       => 'Email Harus diisi !',
                'status'    => false
            ];
        } elseif ($request->phone == NULL) {
            $json = [
                'msg'       => 'Phone harus diisi',
                'status'    => false
            ];
        } elseif ($request->motivation == NULL) {
            $json = [
                'msg'       => 'motivasi gambar',
                'status'    => false
            ];
        } elseif ($request->file == NULL) {
            $json = [
                'msg'       => 'Berkas harus diisi',
                'status'    => false
            ];
        }  else {
            try {
                DB::transaction(function () use ($request) {
                    $extension = $request->file('file')->getClientOriginalExtension();
                    $image = strtotime(date('Y-m-d H:i:s')) . '.' . $extension;
                    $destination = base_path('public/file/');

                    UserJoin::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'motivation' => $request->motivation,
                        'file' => $image,
                        'status' => false,
                        'joinus_id' => 1,
                    ]);
                    $request->file('file')->move($destination, $image);
                });

                $json = [
                    'msg' => 'Berhasil Daftar silahkan tunggun kabar lebih lanjut di email',
                    'status' => true
                ];
            } catch (Exception $e) {
                $json = [
                    'msg'       => 'Error',
                    'status'    => false,
                    'e'         => $e
                ];
            }
        }
        return Response::json($json);
    }

}
