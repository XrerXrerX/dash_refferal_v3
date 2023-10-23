<?php

namespace App\Http\Controllers;

use App\Models\DataKasbon;
use App\Models\TabelDownline;
use App\Models\TabelNewmember;
use App\Models\UserRefferal;
use App\Models\PencariRefferal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserRefferalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userrefferal = UserRefferal::latest() // Menambahkan batasan limit 10
            ->get();
        // $results = UserRefferal::orderBy('created_at', 'desc')->paginate(8);
        return view('userrefferal.index', [
            'title' => 'Data Mitra',
            'data' => $userrefferal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('userrefferal.create', [
            'title' => 'Data Mitra'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data["mitra_baru"] = isset($request->mitra_baru) ? "1" : "0";

        $validator = Validator::make($data, [
            'username' => 'required|unique:users_refferal',
            'password' => 'required',
            'userid_refferal' => 'required',
            // 'login_token' => 'required',
            'mitra_baru' => 'required',
            'gambar_profil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'website' => 'required',
            'namapage' => 'required|unique:users_refferal',
            'whatsapp' => 'required',
            'facebook' => 'required',
            'bg_page' => 'required',
            'color_page' => 'required',
            'text_page' => 'required',
            'btn_daftar_color' => 'required',
            'btn_login_color' => 'required'
        ], [
            // Pesan error kustom untuk setiap aturan
            'username.required' => 'Username harus diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'password.required' => 'Password harus diisi.',
            'userid_refferal.required' => 'User ID Refferal harus diisi.',
            // 'login_token.required' => 'Login Token harus diisi.',
            'mitra_baru.required' => 'Mitra Baru harus diisi.',
            'gambar_profil.required' => 'Gambar Profil harus diunggah.',
            'gambar_profil.image' => 'Gambar Profil harus berupa gambar.',
            'gambar_profil.mimes' => 'Gambar Profil harus berupa file dengan format jpeg, png, jpg, atau gif.',
            'gambar_profil.max' => 'Gambar Profil tidak boleh lebih dari 2 MB.',
            'website.required' => 'Website harus diisi.',
            'namapage.required' => 'Namapage harus diisi.',
            'namapage.unique' => 'Namapage sudah digunakan.',
            'whatsapp.required' => 'Nomor WhatsApp harus diisi.',
            'facebook.required' => 'Akun Facebook harus diisi.',
            'bg_page.required' => 'Background Page harus dipilih.',
            'color_page.required' => 'Warna Page harus diisi.',
            'text_page.required' => 'Text Page harus diisi.',
            'btn_daftar_color.required' => 'Warna Tombol Daftar harus diisi.',
            'btn_login_color.required' => 'Warna Tombol Login harus diisi.'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            try {
                if ($request->hasFile('gambar_profil')) {
                    $gambar_profil = $request->file('gambar_profil');
                    $filename = time() . '_' . Str::random(10) . '.' . $gambar_profil->getClientOriginalExtension();
                    $gambar_profil->move('images/user_refferal_img', $filename);
                    $data["gambar_profil"] = 'images/user_refferal_img/' . $filename;
                }
                $data["password"] = md5($data["password"]);
                $data["login_token"] = "123456";
                $saveData = UserRefferal::create($data);
                if (!$saveData) {
                    return 'error';
                }

                $datapencarirefferal = [
                    "userid" => $data["userid_refferal"],
                    "website" => $data["website"],
                    "refferal" => 0,
                    "downline_aktif" => 0,
                    "level_mitra" => '1',
                    "tanggal" =>  date('Y-m-d')
                ];

                PencariRefferal::updateOrCreate(
                    ['userid' => $data["userid_refferal"], 'website' => $data["website"]],
                    $datapencarirefferal
                );

                return response()->json([
                    'message' => 'Data berhasil disimpan.',
                ]);
            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
                dd($errorMessage);
                Log::error($errorMessage);
                return response()->json(['success' => false, 'error' => 'Terjadi kesalahan saat menyimpan data.', 'message' => $errorMessage]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserRefferal $UserRefferal)
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
                $userrefferal[$index] = UserRefferal::where('id', $ids)->first();
            }
        } else {
            $userrefferal = [UserRefferal::where('id', $id)->first()];
        }

        return view('userrefferal.update', [
            'title' => 'Data Mitra',
            'data' => $userrefferal,
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
                $userrefferal[$index] = UserRefferal::where('id', $ids)->first();
            }
        } else {
            $userrefferal = [UserRefferal::where('id', $id)->first()];
        }

        return view('userrefferal.update', [
            'title' => 'Data Mitra',
            'data' => $userrefferal,
            'disabled' => 'disabled'
        ]);
    }


    public function data($id)
    {
        $data = UserRefferal::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $data['mitra_baru'] = array_values(array_filter($data['mitra_baru'], function ($item) {
            return $item !== 'on';
        }));
        $alldata = [];
        foreach ($id as $index => $idx) {
            $alldata[] = [
                "_token" => $data["_token"],
                "username" => $data["username"][$index],
                "password" => $data["password"][$index],
                "userid_refferal" => $data["userid_refferal"][$index],
                "mitra_baru" => $data["mitra_baru"][$index],
                "website" => $data["website"][$index],
                "namapage" => $data["namapage"][$index],
                "whatsapp" => $data["whatsapp"][$index],
                "facebook" => $data["facebook"][$index],
                "bg_page" => $data["bg_page"][$index],
                "color_page" => $data["color_page"][$index],
                "text_page"  => $data["text_page"][$index],
                "btn_daftar_color"  => $data["btn_daftar_color"][$index],
                "btn_login_color" => $data["btn_login_color"][$index]
            ];
        }
        // dd($alldata);
        foreach ($id as $index => $idx) {
            $items = $alldata[$index];
            $validator = Validator::make($items, [
                'username' => 'required|unique:users_refferal,username,' . $idx,
                'userid_refferal' => 'required',
                'mitra_baru' => 'required',
                'gambar_profil' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'website' => 'required',
                'namapage' => 'required|unique:users_refferal,namapage,' . $idx,
                'whatsapp' => 'required',
                'facebook' => 'required',
                'bg_page' => 'required',
                'color_page' => 'required',
                'text_page' => 'required',
                'btn_daftar_color' => 'required',
                'btn_login_color' => 'required'
            ], [
                // Pesan error kustom untuk setiap aturan
                'username.required' => 'Username harus diisi.',
                'username.unique' => 'Username sudah digunakan.',
                'userid_refferal.required' => 'User ID Refferal harus diisi.',
                'mitra_baru.required' => 'Mitra Baru harus diisi.',
                'gambar_profil.required' => 'Gambar Profil harus diunggah.',
                'gambar_profil.image' => 'Gambar Profil harus berupa gambar.',
                'gambar_profil.mimes' => 'Gambar Profil harus berupa file dengan format jpeg, png, jpg, atau gif.',
                'gambar_profil.max' => 'Gambar Profil tidak boleh lebih dari 2 MB.',
                'website.required' => 'Website harus diisi.',
                'namapage.required' => 'Namapage harus diisi.',
                'namapage.unique' => 'Namapage sudah digunakan.',
                'whatsapp.required' => 'Nomor WhatsApp harus diisi.',
                'facebook.required' => 'Akun Facebook harus diisi.',
                'bg_page.required' => 'Background Page harus dipilih.',
                'color_page.required' => 'Warna Page harus diisi.',
                'text_page.required' => 'Text Page harus diisi.',
                'btn_daftar_color.required' => 'Warna Tombol Daftar harus diisi.',
                'btn_login_color.required' => 'Warna Tombol Login harus diisi.'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                try {
                    $item = UserRefferal::find($idx);
                    $item_old = UserRefferal::where('id', $idx)->first();
                    if (!$item) {
                        return response()->json(['errors' => ['Data tidak ditemukan.']]);
                    }

                    $item->username = $items["username"];
                    $item->password = isset($items["password"]) ? md5($items["password"]) : $item->password;
                    $item->userid_refferal = $items["userid_refferal"];
                    $item->login_token = '';
                    $item->mitra_baru = $items["mitra_baru"];

                    if ($request->hasFile('gambar_profil') && $request->file('gambar_profil')[$index]->isValid()) {
                        if ($item->gambar_profil) {
                            $pathToFile = $item->gambar_profil;
                            if (file_exists($pathToFile)) {
                                unlink($pathToFile);
                            }
                        }

                        $gambar_profil = $request->file('gambar_profil')[0];
                        $filename = time() . '_' . Str::random(10) . '.' . $gambar_profil->getClientOriginalExtension();
                        $gambar_profil->move('images/user_refferal_img', $filename);
                        $item->gambar_profil = 'images/user_refferal_img/' . $filename;
                    }
                    $item->website = $items["website"];
                    $item->namapage = $items["namapage"];
                    $item->whatsapp = $items["whatsapp"];
                    $item->facebook = $items["facebook"];
                    $item->bg_page = $items["bg_page"];
                    $item->color_page = $items["color_page"];
                    $item->text_page = $items["text_page"];
                    $item->btn_daftar_color = $items["btn_daftar_color"];
                    $item->btn_login_color = $items["btn_login_color"];
                    $item->save();

                    if ($item_old->userid_refferal != $item->userid_refferal || $item_old->website != $item->website) {
                        $datapencarirefferal = [
                            "userid" => $item->userid_refferal,
                            "website" => $item->website,
                            "refferal" => 0,
                            "downline_aktif" => 0,
                            "level_mitra" => '1',
                            "tanggal" =>  date('Y-m-d')
                        ];

                        PencariRefferal::updateOrCreate(
                            ['userid' => $item_old->userid_refferal, 'website' => $item_old->website],
                            $datapencarirefferal
                        );
                    }

                    return response()->json([
                        'message' => 'Data berhasil diupdate.',
                    ]);
                } catch (\Exception $e) {
                    $errorMessage = $e->getMessage();
                    dd($$errorMessage);
                    Log::error($errorMessage);
                    return response()->json(['success' => false, 'error' => 'Terjadi kesalahan saat menyimpan data.', 'message' => $errorMessage]);
                }
            }
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

        UserRefferal::whereIn('id', $ids)->each(function ($userReferral) {
            $gambar_profil = $userReferral->gambar_profil;
            $bg_page = $userReferral->bg_page;

            if ($gambar_profil) {
                Storage::disk('public')->delete($gambar_profil);
            }

            if ($bg_page) {
                Storage::disk('public')->delete($bg_page);
            }

            $userReferral->delete();

            $userid = $userReferral->userid_refferal;
            $website = $userReferral->website;
            DataKasbon::where('userid', $userid)->delete();
            TabelDownline::where('userid', $userid)->where('website', $website)->delete();
            TabelNewmember::where('userid', $userid)->where('website', $website)->delete();
            PencariRefferal::where('userid', $userid)->where('website', $website)->delete();
        });

        return response()->json(['success' => 'Data berhasil dihapus!']);
    }
}
