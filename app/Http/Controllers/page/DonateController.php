<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Donate;
use App\Models\News;
use App\Models\Program;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Exceptions\Exception;

class DonateController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function donate(Request $request): JsonResponse
    {
        $amount = (int)str_replace(',', '', $request->amount);

        if ($amount < 50000) {
            $json = [
                'msg' => 'Minimal nominal Rp.50.000',
                'status' => false
            ];
            return Response::json($json);
        } elseif ($request->name == NULL) {
            $json = [
                'msg' => 'Mohon berikan nama',
                'status' => false
            ];
        } elseif ($request->name == NULL) {
            $json = [
                'msg' => 'Mohon berikan nama',
                'status' => false
            ];
        } elseif ($request->email == NULL) {
            $json = [
                'msg' => 'Mohon berikan email',
                'status' => false
            ];
        } elseif ($request->phone == NULL) {
            $json = [
                'msg' => 'Mohon berikan nomer telpon',
                'status' => false
            ];
        } elseif ($request->image == NULL) {
            $json = [
                'msg' => 'Mohon Isikan bukti pembayaran',
                'status' => false
            ];
        } elseif ($request->program == NULL) {
            $json = [
                'msg' => 'Mohon pilih porogram yang di pilih',
                'status' => false
            ];
        } else {
            try {
                DB::transaction(function () use ($request, &$donate) {
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $image = strtotime(date('Y-m-d H:i:s')) . '.' . $extension;
                    $destination = base_path('public/images/donate/');
                    $amount = (int)str_replace(',', '', $request->amount);
                    $donate = Donate::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'amount' => $amount,
                        'rekening' => $request->rekening,
                        'image' => $image,
                        'program_id' => $request->program,
                    ]);
                    $request->file('image')->move($destination, $image);
                });

                $json = [
                    'msg' => "Pembayaran denga kode $donate->kode telah dilakakukan",
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
}
