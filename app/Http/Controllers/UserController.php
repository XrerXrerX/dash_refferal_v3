<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::latest() // Menambahkan batasan limit 10
            ->get();
        // $results = User::orderBy('created_at', 'desc')->paginate(8);
        return view('user.index', [
            'title' => 'User Management',
            'data' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create', [
            'title' => 'User Management'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' => 'required'
        ], [
            'name.required' => 'Nama tidak boleh kosong.',
            'username.required' => 'Username tidak boleh kosong.',
            'username.min' => 'Username harus memiliki panjang minimal 3 karakter.',
            'username.max' => 'Username tidak boleh lebih dari 255 karakter.',
            'username.unique' => 'Username sudah digunakan. Silakan pilih username lain.',
            'password.required' => 'Password tidak boleh kosong.'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            try {
                $data = $request->all();
                $data['password'] = Hash::make($data['password']);
                $data['divisi'] = 'superadmin';
                User::create($data);
                return response()->json([
                    'message' => 'Data berhasil disimpan.',
                ]);
            } catch (\Exception $e) {
                dd($e->getMessage());
                return response()->json(['errors' => ['Terjadi kesalahan saat menyimpan data.']]);
            }
        }

        return response()->json([
            'message' => 'Data berhasil disimpan.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $var1 = str_replace("&", " ", $id);
        $var2 = explode("values[]=", $var1);
        $var3 = array_slice($var2, 1);
        $var4 = str_replace(" ", "", $var3);

        if (!empty($var4)) {
            $id = $var4;
            foreach ($id as $index => $ids) {
                $user[$index] = User::where('id', $ids)->first();
            }
        } else {
            $user = [User::where('id', $id)->first()];
        }

        return view('user.update', [
            'title' => 'User Management',
            'data' => $user,
            'disabled' => ''
        ]);
    }

    public function views($id)
    {
        $var1 = str_replace("&", " ", $id);
        $var2 = explode("values[]=", $var1);
        $var3 = array_slice($var2, 1);
        $var4 = str_replace(" ", "", $var3);

        if (!empty($var4)) {
            $id = $var4;
            foreach ($id as $index => $ids) {
                $user[$index] = User::where('id', $ids)->first();
            }
        } else {
            $user = [User::where('id', $id)->first()];
        }

        return view('user.update', [
            'title' => 'User Management',
            'data' => $user,
            'disabled' => 'disabled'
        ]);
    }


    public function data($id)
    {
        $data = User::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $ids = $request->id;
        $data = $request->all();
        $errors = [];

        foreach ($ids as $index => $id) {
            $alldata = [
                '_token' => $data['_token'],
                'name' => $data['name'][$index],
                'username' => $data['username'][$index],
                'password' => ($data['password'][$index] == null || isset($data['password'][$index])) ? User::find($id)->password : Hash::make($data['password'][$index]),
            ];

            $validator = Validator::make($alldata, [
                'name' => 'required',
                'username' => [
                    'required',
                    'min:3',
                    'max:255',
                    Rule::unique('users')->ignore($id)
                ]
            ], [
                'name.required' => 'Nama tidak boleh kosong.',
                'username.required' => 'Username tidak boleh kosong.',
                'username.min' => 'Username harus memiliki panjang minimal 3 karakter.',
                'username.max' => 'Username tidak boleh lebih dari 255 karakter.',
                'username.unique' => 'Username sudah digunakan. Silakan pilih username lain.',
                'password.required' => 'Password tidak boleh kosong.'
            ]);

            if ($validator->fails()) {
                $errors[] = $validator->errors()->all();
            } else {
                try {
                    $user = User::find($id);
                    $user->name = $alldata['name'];
                    $user->username = $alldata['username'];
                    $user->password = $alldata['password'];
                    $user->save();
                } catch (\Exception $e) {
                    $errors[] = ['Terjadi kesalahan saat menyimpan data.'];
                }
            }
        }

        if (!empty($errors)) {
            return response()->json(['errors' => $errors], 422);
        }

        return response()->json(['success' => 'Item berhasil diupdate!']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $ids = $request->input('values');

        if (!is_array($ids)) {
            $ids = [$ids];
        }

        foreach ($ids as $id) {
            $User = User::findOrFail($id);
            $User->delete();
        }

        return response()->json(['success' => 'Data berhasil dihapus!']);
    }
}
