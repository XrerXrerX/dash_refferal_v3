<?php

namespace App\Http\Controllers;

use App\Models\PencariRefferal;
use App\Models\UserRefferal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class PencariRefferalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pencarireferal = PencariRefferal::get();

        return view('pencarirefferal.index', [
            'title' => 'List Userid Event',
            'data' => $pencarireferal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_refferal = UserRefferal::get();
        return view('pencarirefferal.create', [
            'title' => 'Form Userid Event',
            'userrefferal' => $user_refferal
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->level_mitra == 1) {
            $request->merge(['userid' => $request->userid2]);
        };
        $validator = Validator::make($request->all(), [
            'level_mitra' => 'required',
            'userid' => 'required|unique:pencari_refferal',
            'refferal' => 'required',
            'downline_aktif' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $data = [
                "_token" => "hjSvkIt2s6ladCLlfcEAzQuBu1WJ5I3LgzbnPqZj",
                "level_mitra" => $request->level_mitra,
                "userid" => $request->userid,
                "refferal" => $request->refferal,
                "downline_aktif" => $request->downline_aktif
            ];
            PencariRefferal::create($data);
        }

        return response()->json([
            'message' => 'Data berhasil disimpan.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PencariRefferal $PencariRefferal)
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
                $pencarirefferal[$index] = PencariRefferal::where('id', $ids)->first();
            }
        } else {
            $pencarirefferal = [PencariRefferal::where('id', $id)->first()];
        }
        $user_refferal = UserRefferal::get();
        return view('pencarirefferal.update', [
            'title' => 'List Userid Event',
            'data' => $pencarirefferal,
            'userrefferal' => $user_refferal,
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
                $pencarirefferal[$index] = PencariRefferal::where('id', $ids)->first();
            }
        } else {
            $pencarirefferal = [PencariRefferal::where('id', $id)->first()];
        }

        $user_refferal = UserRefferal::get();
        return view('pencarirefferal.update', [
            'title' => 'List Userid Event',
            'data' => $pencarirefferal,
            'userrefferal' => $user_refferal,
            'disabled' => 'disabled'
        ]);
    }


    public function data($id)
    {
        $data = PencariRefferal::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        foreach ($id as $index => $value) {
            if ($request->level_mitra[$index] == 1) {
                $data["userid"][$index] = $data["userid2"][$index];
            }

            $validator = Validator::make($data, [
                'level_mitra.' . $index => 'required',
                'userid.' . $index => 'required|unique:pencari_refferal,userid,' . $value,
                'refferal.' . $index => 'required',
                'downline_aktif.' . $index => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                try {
                    $result = PencariRefferal::find($value);
                    $result->level_mitra = $data["level_mitra"][$index];
                    $result->userid = $data["userid"][$index];
                    $result->refferal = $data["refferal"][$index];
                    $result->downline_aktif = $data["downline_aktif"][$index];
                    $result->save();
                } catch (\Exception $e) {

                    echo $e->getMessage();
                    die;
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
            $PencariRefferal = PencariRefferal::findOrFail($id);
            $PencariRefferal->delete();
        }

        return response()->json(['success' => 'Data berhasil dihapus!']);
    }
}
