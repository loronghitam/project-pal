<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use App\Models\JoinUs;
use App\Models\News;
use App\Models\Program;
use App\Models\UserJoin;
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
use function MongoDB\BSON\toJSON;
use function Sodium\increment;

class UserJoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $data = [
            'script' => 'Admin.Components.Admin.userjoin'
        ];
        return view('Admin.Page.userjoin', $data);
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
            $data = DB::table('user_joins')
                ->where('id', '=', $id)
                ->first();
            return Response::json($data);
        }
        $data = UserJoin::orderBy('id', 'desc')->get();

        return datatables()
            ->of($data)
            ->editColumn('updated_at', function ($date) {
                return $date->updated_at ? with(new Carbon($date->updated_at))->diffForHumans() : '';
            })
            ->addIndexColumn()
            ->addColumn('program', function ($row) {
                $program = JoinUs::where('id', '=', $row->joinus_id)->first();
                return $program->title;
            })
            ->addColumn('action', function ($row) {
                $data = [
                    'id' => $row->id
                ];
                return view('Admin.Components.Buttons.userjoin', $data);
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
                    $prioritas = 'Diterima';
                } else {
                    $prioritas = 'Ditolak';
                }

                if ($prioritas == 'Diterima') {
                    DB::table('user_joins')->where('id', $id)->update([
                        'status' => $prioritas
                    ]);
                } else {
                    $event = UserJoin::where('id', '=', $id)->first();
                    $oldImage = $event->image;
                    if ($oldImage) {
                        $pleaseRemove = base_path('public/images/donate/') . $oldImage;

                        if (file_exists($pleaseRemove)) {
                            unlink($pleaseRemove);
                        }
                    }
                    $event->update([
                        'file' => null,
                        'status' => $prioritas
                    ]);
                }

            });
            $json = [
                'msg' => 'Penerimaan berhasil diupdate',
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
