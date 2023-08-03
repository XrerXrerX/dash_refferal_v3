<?php

namespace App\Http\Controllers;

use App\Models\DataKasbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataKasbonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datakasbon = DataKasbon::latest() // Menambahkan batasan limit 10
            ->get();
        // $results = DataKasbon::orderBy('created_at', 'desc')->paginate(8);
        return view('datakasbon.index', [
            'title' => 'Data Kasbon',
            'data' => $datakasbon
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('datakasbon.create', [
            'title' => 'Data Kasbon'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userid' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            try {
                $data = $request->all();
                $data["nominal"] = str_replace(',', '', $data["nominal"]);

                DataKasbon::create($data);
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
    public function show(DataKasbon $DataKasbon)
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
                $datakasbon[$index] = DataKasbon::where('id', $ids)->first();
            }
        } else {
            $datakasbon = [DataKasbon::where('id', $id)->first()];
        }

        return view('datakasbon.update', [
            'title' => 'Data Kasbon',
            'data' => $datakasbon,
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
                $datakasbon[$index] = DataKasbon::where('id', $ids)->first();
            }
        } else {
            $datakasbon = [DataKasbon::where('id', $id)->first()];
        }

        return view('datakasbon.update', [
            'title' => 'Data Kasbon',
            'data' => $datakasbon,
            'disabled' => 'disabled'
        ]);
    }


    public function data($id)
    {
        $data = DataKasbon::find($id);
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
                '
                .*' => 'required',
                'nominal.*' => 'required',
                'tanggal.*' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                try {
                    $data = $request->all();
                    $nominal = $data["nominal"][$index];
                    $nominal = str_replace(',', '', $nominal);

                    $result = DataKasbon::find($idx);
                    $result->userid = $request->userid[$index];

                    $result->nominal = $nominal;

                    $result->tanggal = $request->tanggal[$index];
                    $result->save();
                } catch (\Exception $e) {
                    $errorMessage = $e->getMessage();
                    // dd($errorMessage);
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
            $DataKasbon = DataKasbon::findOrFail($id);
            $DataKasbon->delete();
        }

        return response()->json(['success' => 'Data berhasil dihapus!']);
    }
}
