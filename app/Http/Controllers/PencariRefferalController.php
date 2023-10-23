<?php

namespace App\Http\Controllers;

use App\Models\PencariRefferal;
use App\Models\UserRefferal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


class PencariRefferalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pencarireferal = PencariRefferal::get();
        $month = date('n');
        $query = "SELECT A.id, A.userid, A.website, A.refferal, A.downline_aktif, A.level_mitra, COALESCE(B.downline,0) AS downline FROM pencari_refferal A
        LEFT JOIN (
        SELECT
                    A.userid,
                    A.website,
                    SUM(CASE
                        WHEN B.website = 'duogaming' AND A.bonus >= 1000 THEN 1
                        WHEN B.website <> 'duogaming' AND A.bonus >= 2000 THEN 1
                        ELSE 0
                    END) AS downline
                FROM tabel_downline A
                INNER JOIN users_refferal B ON A.userid = B.userid_refferal AND A.website = B.website
                WHERE MONTH(A.tanggal) = 8 AND YEAR(A.tanggal) = '2023'
                
                GROUP BY A.userid, A.website
        ) B ON A.userid = B.userid AND A.website = B.website";
        //     $query = "SELECT
        //     A.userid_refferal,
        //     CASE $month 
        //         WHEN 1 THEN 'Januari' 
        //         WHEN 2 THEN 'Februari'
        //         WHEN 3 THEN 'Maret' 
        //         WHEN 4 THEN 'April'
        //         WHEN 5 THEN 'Mei' 
        //         WHEN 6 THEN 'Juni'
        //         WHEN 7 THEN 'Juli' 
        //         WHEN 8 THEN 'Agustus'
        //         WHEN 9 THEN 'September' 
        //         WHEN 10 THEN 'Oktober'
        //         WHEN 11 THEN 'November' 
        //         WHEN 12 THEN 'Desember'
        //     END AS bulan,
        //    coalesce(B.downline,0) as downline
        // FROM users_refferal A
        // LEFT JOIN (
        //     SELECT
        //         A.userid,
        //         SUM(CASE
        //             WHEN B.website = 'duogaming' AND A.bonus >= 1000 THEN 1
        //             WHEN B.website <> 'duogaming' AND A.bonus >= 2000 THEN 1
        //             ELSE 0
        //         END) AS downline
        //     FROM tabel_downline A
        //     INNER JOIN users_refferal B ON A.userid = B.userid_refferal
        //     WHERE MONTH(A.tanggal) = $month AND YEAR(A.tanggal) = '2023' AND 
        //     (
        //     CASE 
        //         WHEN '' = '' THEN 1
        //         ELSE B.website = ''
        //     END
        // )
        //     GROUP BY A.userid
        // ) B ON A.userid_refferal = B.userid
        // LEFT JOIN (
        //     SELECT
        //         A.userid,
        //         SUM(refferal) AS totaldownline
        //     FROM pencari_refferal A
        //     INNER JOIN users_refferal B ON A.userid = B.userid_refferal
        //     WHERE MONTH(A.tanggal) = $month AND YEAR(A.tanggal) = '2023' AND  (
        //     CASE 
        //         WHEN '' = '' THEN 1
        //         ELSE B.website = ''
        //     END
        // )
        //     GROUP BY A.userid
        // ) C ON A.userid_refferal = C.userid
        // LEFT JOIN (
        //     SELECT
        //         A.userid,
        //         COUNT(A.status) AS total_newdepo
        //     FROM tabel_newmember A
        //     INNER JOIN users_refferal B ON A.userid = B.userid_refferal
        //     WHERE A.status = 'sudah depo' AND MONTH(A.tanggal) = $month AND YEAR(A.tanggal) = '2023' AND  (
        //     CASE 
        //         WHEN '' = '' THEN 1
        //         ELSE B.website = ''
        //     END
        // )
        //     GROUP BY A.userid
        // ) D ON A.userid_refferal = D.userid
        // LEFT JOIN (
        //     SELECT
        //         A.userid,
        //         COUNT(A.status) AS total_newmember
        //     FROM tabel_newmember A
        //     INNER JOIN users_refferal B ON A.userid = B.userid_refferal
        //     WHERE MONTH(A.tanggal) = $month AND YEAR(A.tanggal) = '2023' AND  (
        //     CASE 
        //         WHEN '' = '' THEN 1
        //         ELSE B.website = ''
        //     END
        // )
        //     GROUP BY A.userid
        // ) E ON A.userid_refferal = E.userid
        // LEFT JOIN (
        //     SELECT
        //         userid,
        //         SUM(A.nominal) AS total_kasbon,
        //         MONTH(A.tanggal) AS bulan,
        //         YEAR(A.tanggal) AS tahun
        //     FROM data_kasbon A
        //     INNER JOIN users_refferal B ON A.userid = B.userid_refferal
        //     WHERE MONTH(A.tanggal) = $month AND YEAR(A.tanggal) = '2023' AND  (
        //     CASE 
        //         WHEN '' = '' THEN 1
        //         ELSE B.website = ''
        //     END
        // )
        //     GROUP BY A.userid, MONTH(A.tanggal), YEAR(A.tanggal)
        // ) F ON A.userid_refferal = F.userid
        // WHERE  (
        //     CASE 
        //         WHEN '' = '' THEN 1
        //         ELSE A.website = ''
        //     END
        // )";
        //     $query = "SELECT A.id,
        //     B.userid_refferal as userid,  
        //     CASE $month
        //             WHEN 1 THEN 'Januari' 
        //             WHEN 2 THEN 'Februari'
        //             WHEN 3 THEN 'Maret' 
        //             WHEN 4 THEN 'April'
        //             WHEN 5 THEN 'Mei' 
        //             WHEN 6 THEN 'Juni'
        //             WHEN 7 THEN 'Juli' 
        //             WHEN 8 THEN 'Agustus'
        //             WHEN 9 THEN 'September' 
        //             WHEN 10 THEN 'Oktober'
        //             WHEN 11 THEN 'November' 
        //             WHEN 12 THEN 'Desember'
        //         END AS bulan,
        //     COALESCE(C.downline,0) AS downline
        // FROM pencari_refferal A 
        // INNER JOIN users_refferal B ON A.userid = B.userid_refferal AND A.website = B.website
        //  LEFT JOIN (
        //         SELECT
        //             A.userid,
        //             A.website,
        //             SUM(CASE
        //                 WHEN B.website = 'duogaming' AND A.bonus >= 1000 THEN 1
        //                 WHEN B.website <> 'duogaming' AND A.bonus >= 2000 THEN 1
        //                 ELSE 0
        //             END) AS downline
        //         FROM tabel_downline A
        //         INNER JOIN users_refferal B ON A.userid = B.userid_refferal AND A.website = B.website
        //         WHERE MONTH(A.tanggal) = 8 AND YEAR(A.tanggal) = '2023'

        //         GROUP BY A.userid, A.website
        //     ) C ON B.userid_refferal = C.userid AND C.website = B.website
        //     ";

        $pencarireferal = DB::select($query);
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
        $user_refferal = UserRefferal::orderBy('userid_refferal', 'asc')->pluck('userid_refferal');
        return view('pencarirefferal.create', [
            'title' => 'Form Userid Event',
            'userid_refferal' => $user_refferal
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // if ($request->level_mitra == 1) {
        //     $request->merge(['userid' => $request->userid2 == '' ? $request->userid : '']);
        // };
        $alldata = [
            "_token" => $request->_token,
            "website" => $request->website,
            "level_mitra" => $request->level_mitra,
            "userid" => $request->userid != '' ? $request->userid : $request->userid2,
            "refferal" => $request->refferal,
            "downline_aktif" => $request->downline_aktif
        ];
        $validator = Validator::make($alldata, [
            'level_mitra' => 'required',
            // 'userid' => 'required',
            'refferal' => 'required',
            'downline_aktif' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $data = [
                "_token" => $alldata["_token"],
                "website" => $alldata["website"],
                "level_mitra" => $alldata["level_mitra"],
                "userid" => $alldata["userid"],
                "refferal" => $alldata["refferal"],
                "downline_aktif" => $alldata["downline_aktif"]
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

        $user_refferal = UserRefferal::orderBy('userid_refferal', 'asc')->pluck('userid_refferal');
        return view('pencarirefferal.update', [
            'title' => 'List Userid Event',
            'data' => $pencarirefferal,
            'userid_refferal' => $user_refferal,
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
        // dd($data);
        $alldata = [];
        foreach ($id as $index => $value) {
            $alldata = [
                '_token' => $data["_token"][$index],
                'id' => $data["id"][$index],
                'website' => $data["website"][$index],
                'level_mitra' => $data["level_mitra"][$index],
                'userid' => $data["level_mitra"][$index] == '0' ? $data["userid"][$index] : $data["userid2"][$index],
                'refferal' => $data["refferal"][$index],
                'downline_aktif' => $data["downline_aktif"][$index]
            ];
            $validator = Validator::make($alldata, [
                'level_mitra' => 'required',
                // 'userid' => 'required',
                'refferal' => 'required',
                'downline_aktif' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                try {
                    $result = PencariRefferal::find($value);
                    $result->level_mitra = $alldata["level_mitra"];
                    $result->website = $alldata["website"];
                    $result->userid = $alldata["userid"];
                    $result->refferal = $alldata["refferal"];
                    $result->downline_aktif = $alldata["downline_aktif"];
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

    public function datauserrefferal($website)
    {
        $query = "SELECT * FROM users_refferal WHERE website = '$website'";
        $results = DB::select($query);

        return response()->json($results);
    }
}
