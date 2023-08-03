<?php

namespace App\Http\Controllers;

use App\Models\Adminl21;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Adminl21Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminl21 = Adminl21::latest() // Menambahkan batasan limit 10
            ->get();
        // $results = Adminl21::orderBy('created_at', 'desc')->paginate(8);
        return view('adminl21.index', [
            'title' => 'Admin',
            'data' => $adminl21
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminl21.create', [
            'title' => 'Admin'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_admin' => 'required',
            'kontak' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            try {
                Adminl21::create($request->all());
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
    public function show(Adminl21 $Adminl21)
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
                $adminl21[$index] = Adminl21::where('id', $ids)->first();
            }
        } else {
            $adminl21 = [Adminl21::where('id', $id)->first()];
        }

        return view('adminl21.update', [
            'title' => 'Admin',
            'data' => $adminl21,
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
                $adminl21[$index] = Adminl21::where('id', $ids)->first();
            }
        } else {
            $adminl21 = [Adminl21::where('id', $id)->first()];
        }

        return view('adminl21.update', [
            'title' => 'Admin',
            'data' => $adminl21,
            'disabled' => 'disabled'
        ]);
    }


    public function data($id)
    {
        $data = Adminl21::find($id);
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
                'nama_admin.*' => 'required',
                'kontak.*' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                try {
                    $result = Adminl21::find($idx);
                    $result->nama_admin = $request->nama_admin[$index];
                    $result->kontak = $request->kontak[$index];
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
            $Adminl21 = Adminl21::findOrFail($id);
            $Adminl21->delete();
        }

        return response()->json(['success' => 'Data berhasil dihapus!']);
    }
}
