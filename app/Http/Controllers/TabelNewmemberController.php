<?php

namespace App\Http\Controllers;

use App\Models\TabelNewmember;
use App\Models\UserRefferal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TabelNewmemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tabelnewmember = TabelNewmember::latest()->get();
        // $results = TabelNewmember::orderBy('created_at', 'desc')->paginate(8);
        return view('tabelnewmember.index', [
            'title' => 'New Member',
            'data' => $tabelnewmember
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $useridreff = UserRefferal::orderBy('userid_refferal', 'asc')->pluck('userid_refferal');
        return view('tabelnewmember.create', [
            'title' => 'New Member',
            'useridreff' => $useridreff
        ]);
    }

    public function import()
    {
        $useridreff = UserRefferal::orderBy('userid_refferal', 'asc')->pluck('userid_refferal');
        return view('tabelnewmember.import', [
            'title' => 'New Member',
            'useridreff' => $useridreff
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userid' => 'required',
            'userid_downline' => 'required',
            'status' => 'string',
            'tanggal' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            try {
                $data = $request->all();
                if ($data["jenis_input"] == "2") {
                    $arrayData = explode("\n", $data["userid_downline"]);
                    $datadownline_part1 = [];
                    $datadownline_part2 = [];

                    foreach ($arrayData as $index => $value) {
                        $explodetab = explode("\t", $value);
                        foreach ($explodetab as &$element) {
                            $element = str_replace("\r", "", $element);
                        }
                        $datadownline_part1[] = $explodetab[0];
                        $datadownline_part2[] = $explodetab[1];
                    }

                    foreach ($datadownline_part1 as $index => $downline_pt1) {
                        $newdata = [
                            "_token" => $data["_token"],
                            "userid" => $data["userid"],
                            "userid_downline" => $downline_pt1,
                            "status" => $datadownline_part2[$index],
                            "tanggal" => $data["tanggal"]
                        ];

                        TabelNewmember::create($newdata);
                    }
                    return response()->json([
                        'message' => 'Data berhasil disimpan.',
                    ]);
                } else {
                    $data["status"] = isset($data["status"]) ? "sudah depo" : "belum depo";

                    TabelNewmember::create($data);
                    return response()->json([
                        'message' => 'Data berhasil disimpan.',
                    ]);
                }
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
    public function show(TabelNewmember $TabelNewmember)
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
        $useridreff = UserRefferal::orderBy('userid_refferal', 'asc')->pluck('userid_refferal');

        if (!empty($var4)) {
            $id = $var4;
            foreach ($id as $index => $ids) {
                $tabelnewmember[$index] = TabelNewmember::where('id', $ids)->first();
            }
        } else {
            $tabelnewmember = [TabelNewmember::where('id', $id)->first()];
        }

        return view('tabelnewmember.update', [
            'title' => 'New Member',
            'data' => $tabelnewmember,
            'useridreff' => $useridreff,
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
                $tabelnewmember[$index] = TabelNewmember::where('id', $ids)->first();
            }
        } else {
            $tabelnewmember = [TabelNewmember::where('id', $id)->first()];
        }
        $useridreff = UserRefferal::orderBy('userid_refferal', 'asc')->pluck('userid_refferal');

        return view('tabelnewmember.update', [
            'title' => 'New Member',
            'data' => $tabelnewmember,
            'useridreff' => $useridreff,
            'disabled' => 'disabled'
        ]);
    }


    public function data($id)
    {
        $data = TabelNewmember::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $data['status'] = array_values(array_filter($data['status'], function ($item) {
            return $item !== 'on';
        }));
        foreach ($id as $index => $idx) {
            $validator = Validator::make($data, [
                'userid.*' => 'required',
                'userid_downline.*' => 'required',
                'status.*' => 'string',
                'tanggal.*' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                try {
                    $result = TabelNewmember::find($idx);
                    $result->userid = $request->userid[$index];
                    $result->userid_downline = $request->userid_downline[$index];
                    $result->status = isset($request->userid[$index]) ? "sudah depo" : "belum depo";
                    $result->tanggal = $request->tanggal[$index];
                    $result->save();
                } catch (\Exception $e) {
                    $errorMessage = $e->getMessage();
                    echo "An error occurred: " . $errorMessage;
                    die;
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
            $TabelNewmember = TabelNewmember::findOrFail($id);
            $TabelNewmember->delete();
        }

        return response()->json(['success' => 'Data berhasil dihapus!']);
    }
}
