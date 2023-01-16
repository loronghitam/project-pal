<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use App\Models\News;
use App\Models\Program;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Exceptions\Exception;

class AuthController extends Controller
{
    public function dashboard()
    {
        $donate = Donate::join('programs', 'donates.program_id', 'programs.id')
            ->orderBy('id', 'desc')->select('donates.*', 'programs.title')
            ->take(5)
            ->get();
        $news = News::all()->count();
        $programsON = Program::where('status', '=', 'Aktif')->get()->count();
        $programsOFF = Program::where('status', '=', 'NonAktfi')->get()->count();

        return view('Admin.Page.dashboard', [
            'donate' => $donate,
            'news' => $news,
            'programsON' => $programsON,
            'programsOFF' => $programsOFF,
        ]);
    }

    public function login(Request $request)
    {
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $data = [
            $fieldType => $request->username,
            'password' => $request->password,
        ];

        Auth::attempt($data);
        if (Auth::check()) {
            Auth::user();
            return redirect()->to('/dashboard');
        }

        return back()->with('loginError', 'Email atau Password Salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->to('/login');
    }

    public function index(): View|Factory|Application
    {
        $data = [
            'script' => 'Admin.Components.Admin.account'
        ];
        return view('Admin.Page.account', $data);
    }

    public function show($id)
    {
        if (is_numeric($id)) {
            $data = DB::table('users')
                ->where('id', '=', $id)
                ->first();
            return Response::json($data);
        }
        $data = User::orderBy('name', 'asc')->get();

        return datatables()
            ->of($data)
            ->editColumn('updated_at', function ($date) {
                return $date->updated_at ? with(new Carbon($date->updated_at))->diffForHumans() : '';
            })
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $data = [
                    'id' => $row->id
                ];
                return view('Admin.Components.Buttons.account', $data);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request): JsonResponse
    {
        $rules = [
            'username' => 'unique:users',
            'email' => 'unique:users',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $json = [
                'msg' => 'username atau password sudah digunakan!',
                'status' => false
            ];
            return Response::json($json);
        } elseif ($request->name == NULL) {
            $json = [
                'msg' => 'Nama tidak boleh kosong!',
                'status' => false
            ];
        } elseif ($request->username == NULL) {
            $json = [
                'msg' => 'Username tidak boleh kosong!',
                'status' => false
            ];
        } elseif ($request->password == NULL) {
            $json = [
                'msg' => 'Password tidak boleh kosong!',
                'status' => false
            ];
        } elseif ($request->role == NULL) {
            $json = [
                'msg' => 'Role tidak boleh kosong!',
                'status' => false
            ];
        } elseif ($request->email == NULL) {
            $json = [
                'msg' => 'Email tidak boleh kosong!',
                'status' => false
            ];
        } else {
            try {
                DB::transaction(function () use ($request) {
                    User::create([
                        'username' => $request->username,
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->passowrd),
                    ])->assignRole($request->role);
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

    public function update(Request $request, $id)
    {
        $rules = [
            'username' => Rule::unique('users', 'username')->ignore($id),
            'email' => Rule::unique('users', 'email')->ignore($id),
            'password' => 'sometimes'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $json = [
                'msg' => 'username atau email sudah digunakan!',
                'status' => false
            ];
            return Response::json($json);
        } elseif ($request->name == NULL) {
            $json = [
                'msg' => 'Nama tidak boleh kosong!',
                'status' => false
            ];
        } elseif ($request->username == NULL) {
            $json = [
                'msg' => 'Username tidak boleh kosong!',
                'status' => false
            ];
        } elseif ($request->role == NULL) {
            $json = [
                'msg' => 'Role tidak boleh kosong!',
                'status' => false
            ];
        } elseif ($request->email == NULL) {
            $json = [
                'msg' => 'Email tidak boleh kosong!',
                'status' => false
            ];
        } else {
            try {
                if ($request->restart) {

                }
                DB::transaction(function () use ($request, $id) {
                    $user = User::find($id);
                    $user->where('id', $id)->update([
                        'username' => $request->username,
                        'name' => $request->name,
                        'email' => $request->email,
                    ]);
                    $user->assignRole($request->role);
                });
                $json = [
                    'msg' => 'User berhasil ubah',
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

    public function restart(Request $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $user = User::find($id);
                $user->where('id', $id)->update([
                    'password' => Hash::make('password')
                ]);
            });
            $json = [
                'msg' => 'Password berhasil diubah',
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

    public function destroy(int $id): JsonResponse
    {
        try {
            DB::transaction(function () use ($id) {
                DB::table('users')->where('id', $id)->delete();
            });

            $json = [
                'msg' => 'User berhasil dihapus',
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

    public function user()
    {
        $user = User::where('id', '=', auth()->user()->id)->first();

        return view('Admin.Page.editAccount', ['user' => $user]);
    }

    public function editUser(Request $request)
    {

        if ($request->password != null) {
            $this->$request->validate([
                'password' => 'confirmed|min:6',
            ]);
            User::where('id', auth()->user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
        }
        $validate = $request->validate([
            'username' => Rule::unique('users', 'username')->ignore(auth()->user()->id),
            'email' => Rule::unique('users', 'email')->ignore(auth()->user()->id),
            'passwordNow' => 'required'
        ]);

        User::where('id', auth()->user()->id)->update([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->to('/user')->with('succes', 'Account Berhasil di update');
    }
}
