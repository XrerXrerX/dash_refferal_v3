<?php

namespace App\Http\Controllers;

use App\Models\TabelDownline;
use App\Models\UserRefferal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class TabelDownlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tabeldownline = TabelDownline::latest()->get();
        // $results = TabelDownline::orderBy('created_at', 'desc')->paginate(8);
        return view('tabeldownline.index', [
            'title' => 'Downline',
            'data' => $tabeldownline
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $useridreff = UserRefferal::orderBy('userid_refferal', 'asc')->pluck('userid_refferal');
        return view('tabeldownline.create', [
            'title' => 'Downline',
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
            'bonus' => 'nullable',
            'tanggal' => 'required',
            'website' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            try {
                $data = $request->all();

                $tanggal = $data['tanggal'];
                $userid = $data['userid'];
                $website = $data['website'];

                $query = "DELETE FROM tabel_downline WHERE userid = '$userid' AND website = '$website'";
                DB::delete($query);

                if ($data["jenis_input"] == "2") {
                    $datadownline = explode("\n", $data["userid_downline"]);

                    $datadownline_part1 = [];
                    $datadownline_part2 = [];
                    foreach ($datadownline as $index => $value) {

                        if (strpos($value, "\t") === false) {
                            return response()->json(['errors' => ['Terjadi kesalahan saat menyimpan data. (' . $value . ')']]);
                        }

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
                            "bonus" => $datadownline_part2[$index],
                            "tanggal" => $data["tanggal"],
                            "website" => $data["website"]
                        ];

                        TabelDownline::create($newdata);
                    }
                    return response()->json([
                        'message' => 'Data berhasil disimpan.',
                    ]);
                } else {
                    $data["bonus"] = str_replace(',', '', $data["bonus"]);
                    unset($data['jenis_input']);
                    TabelDownline::create($data);
                    return response()->json([
                        'message' => 'Data berhasil disimpan.',
                    ]);
                }
            } catch (\Exception $e) {
                echo "Terjadi kesalahan: " . $e->getMessage();
                die;
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
    public function show(TabelDownline $TabelDownline)
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
                $tabeldownline[$index] = TabelDownline::where('id', $ids)->first();
            }
        } else {
            $tabeldownline = [TabelDownline::where('id', $id)->first()];
        }

        return view('tabeldownline.update', [
            'title' => 'Downline',
            'data' => $tabeldownline,
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
                $tabeldownline[$index] = TabelDownline::where('id', $ids)->first();
            }
        } else {
            $tabeldownline = [TabelDownline::where('id', $id)->first()];
        }
        $useridreff = UserRefferal::orderBy('userid_refferal', 'asc')->pluck('userid_refferal');

        return view('tabeldownline.update', [
            'title' => 'Downline',
            'data' => $tabeldownline,
            'useridreff' => $useridreff,
            'disabled' => 'disabled'
        ]);
    }


    public function data($id)
    {
        $data = TabelDownline::find($id);
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
                'userid.*' => 'required',
                'userid_downline.*' => 'required',
                'bonus.*' => 'required',
                'tanggal.*' => 'required',
                'website.*' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                try {
                    $result = TabelDownline::find($idx);
                    $result->userid = $request->userid[$index];
                    $result->userid_downline = $request->userid_downline[$index];
                    $result->bonus = str_replace(',', '', $request->bonus[$index]);
                    $result->tanggal = $request->tanggal[$index];
                    $result->website = $request->website[$index];
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
            $TabelDownline = TabelDownline::findOrFail($id);
            $TabelDownline->delete();
        }

        return response()->json(['success' => 'Data berhasil dihapus!']);
    }

    public function destroyall(Request $request)
    {
        TabelDownline::truncate();
        return response()->json(['success' => 'Data berhasil dihapus!']);
    }
}
