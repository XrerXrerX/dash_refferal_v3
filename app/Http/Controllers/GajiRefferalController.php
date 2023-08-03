<?php

namespace App\Http\Controllers;

use App\Models\GajiRefferal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GajiRefferalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gajirefferal = GajiRefferal::latest() // Menambahkan batasan limit 10
            ->get();
        // $results = GajiRefferal::orderBy('created_at', 'desc')->paginate(8);
        return view('gajirefferal.index', [
            'title' => 'Gaji Refferal',
            'data' => $gajirefferal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gajirefferal.create', [
            'title' => 'Gaji Refferal'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'member_aktif' => 'required',
            'gaji_bulan' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            try {
                $data = $request->all();
                $data["gaji_bulan"] = str_replace(',', '', $data["gaji_bulan"]);

                GajiRefferal::create($data);
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
    public function show(GajiRefferal $GajiRefferal)
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
                $gajirefferal[$index] = GajiRefferal::where('id', $ids)->first();
            }
        } else {
            $gajirefferal = [GajiRefferal::where('id', $id)->first()];
        }

        return view('gajirefferal.update', [
            'title' => 'Gaji Refferal',
            'data' => $gajirefferal,
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
                $gajirefferal[$index] = GajiRefferal::where('id', $ids)->first();
            }
        } else {
            $gajirefferal = [GajiRefferal::where('id', $id)->first()];
        }

        return view('gajirefferal.update', [
            'title' => 'Gaji Refferal',
            'data' => $gajirefferal,
            'disabled' => 'disabled'
        ]);
    }


    public function data($id)
    {
        $data = GajiRefferal::find($id);
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
                'member_aktif.*' => 'required',
                'gaji_bulan.*' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                try {

                    $result = GajiRefferal::find($idx);
                    $result->gaji_bulan = $request->gaji_bulan[$index];
                    $result->gaji_bulan = str_replace(',', '', $request->gaji_bulan[$index]);

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
            $GajiRefferal = GajiRefferal::findOrFail($id);
            $GajiRefferal->delete();
        }

        return response()->json(['success' => 'Data berhasil dihapus!']);
    }
}
