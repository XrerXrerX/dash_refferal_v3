<?php

namespace App\Http\Controllers;

use App\Models\SyaratKetentuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SyaratKetentuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $syaratketentuan = SyaratKetentuan::latest() // Menambahkan batasan limit 10
            ->get();
        // $results = SyaratKetentuan::orderBy('created_at', 'desc')->paginate(8);
        return view('syaratketentuan.index', [
            'title' => 'Syarat & Ketentuan',
            'data' => $syaratketentuan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('syaratketentuan.create', [
            'title' => 'Syarat & Ketentuan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type_aturan' => 'required',
            'icon_syarat' => 'required',
            'desk_syarat' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            try {
                SyaratKetentuan::create($request->all());
                return response()->json([
                    'message' => 'Data berhasil disimpan.',
                ]);
            } catch (\Exception $e) {
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
    public function show(SyaratKetentuan $SyaratKetentuan)
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
                $syaratketentuan[$index] = SyaratKetentuan::where('id', $ids)->first();
            }
        } else {
            $syaratketentuan = [SyaratKetentuan::where('id', $id)->first()];
        }

        return view('syaratketentuan.update', [
            'title' => 'Syarat & Ketentuan',
            'data' => $syaratketentuan,
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
                $syaratketentuan[$index] = SyaratKetentuan::where('id', $ids)->first();
            }
        } else {
            $syaratketentuan = [SyaratKetentuan::where('id', $id)->first()];
        }

        return view('syaratketentuan.update', [
            'title' => 'Syarat & Ketentuan',
            'data' => $syaratketentuan,
            'disabled' => 'disabled'
        ]);
    }


    public function data($id)
    {
        $data = SyaratKetentuan::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        foreach ($id as $index => $idx) {
            $validator = Validator::make($request->all(), [
                'type_aturan.*' => 'required',
                'icon_syarat.*' => 'required',
                'desk_syarat.*' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                try {
                    $result = SyaratKetentuan::find($idx);
                    $result->type_aturan = $request->type_aturan[$index];
                    $result->icon_syarat = $request->icon_syarat[$index];
                    $result->desk_syarat = $request->desk_syarat[$index];
                    $result->save();
                } catch (\Exception $e) {
                    return response()->json(['errors' => ['Terjadi kesalahan saat menyimpan data.']]);
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

        foreach ($ids as $id) {
            $SyaratKetentuan = SyaratKetentuan::findOrFail($id);
            $SyaratKetentuan->delete();
        }

        return response()->json(['success' => 'Data berhasil dihapus!']);
    }
}
