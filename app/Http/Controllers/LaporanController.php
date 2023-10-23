<?php

namespace App\Http\Controllers;

use App\Models\GajiRefferal;
use App\Models\PencariRefferal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use PDF;
use Dompdf\Dompdf;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search_bulan = $request->input('search_bulan') ?? date('n');
        $search_tahun = $request->input('search_tahun') ?? date('Y');
        $search_website = $request->input('search_website') ?? '';

        $query = $this->Querysql($search_bulan, $search_tahun, $search_website);
        $data = DB::select($query);

        $datenow = date('Y-m-d');
        $queryCekTanggal = "SELECT * FROM pencari_refferal WHERE tanggal IS NULL OR MONTH(tanggal) <> MONTH(NOW())";
        $results = DB::select($queryCekTanggal);

        foreach ($results as $index => $result) {
            $pencarirefferal = PencariRefferal::find($result->id);
            $pencarirefferal->tanggal = $datenow;
            $pencarirefferal->save();
        }


        return view('laporan.index', [
            'title' => 'Laporan Rekapitulasi Gaji Team Promo',
            'datagaji' => GajiRefferal::get(),
            'data' => $data
        ]);
    }

    public function generatePDF(Request $request)
    {
        $search_bulan = $request->input('search_bulan') ?? date('n');
        $search_tahun = $request->input('search_tahun') ?? date('Y');
        $search_website = $request->input('search_website') ?? '';

        $query = $this->Querysql($search_bulan, $search_tahun, $search_website);

        $datas = DB::select($query);

        if ($search_bulan == '1') {
            $search_bulan = 'January';
        } else if ($search_bulan == '2') {
            $search_bulan = 'February';
        } else if ($search_bulan == '3') {
            $search_bulan = 'Maret';
        } else if ($search_bulan == '4') {
            $search_bulan = 'April';
        } else if ($search_bulan == '5') {
            $search_bulan = 'Mei';
        } else if ($search_bulan == '6') {
            $search_bulan = 'Juni';
        } else if ($search_bulan == '7') {
            $search_bulan = 'July';
        } else if ($search_bulan == '8') {
            $search_bulan = 'Agustus';
        } else if ($search_bulan == '9') {
            $search_bulan = 'September';
        } else if ($search_bulan == '10') {
            $search_bulan = 'Oktober';
        } else if ($search_bulan == '11') {
            $search_bulan = 'November';
        } else if ($search_bulan == '12') {
            $search_bulan = 'Desember';
        }

        $data = [
            'title' => 'Laporan Rekapitulasi Gaji Team Promo',
            'title2' => $search_bulan . ' ' . $search_tahun,
            'title3' => $search_website == '' ? 'All Website' : $search_website,
            'content' => '',
            'datagaji' => GajiRefferal::get(),
            'data' => $datas
            // 'content' => 'Ini adalah contoh PDF yang di-generate menggunakan dompdf dan Laravel.'
        ];

        // Membuat instance dari Dompdf
        $dompdf = new Dompdf();

        // Render view menjadi HTML
        $html = view('pdf.laporan', $data)->render();

        // Memasukkan HTML ke dalam Dompdf
        $dompdf->loadHtml($html);

        // (Opsional) Atur ukuran dan orientasi halaman
        $dompdf->setPaper('A4', 'landscape');

        // Render PDF
        $dompdf->render();

        $judul = 'Gaji ' . $datas[0]->bulan . ' ' . $datas[0]->bulan;

        // Mengirimkan PDF sebagai response ke browser
        return $dompdf->stream($judul);
    }

    function Querysql($search_bulan, $search_tahun, $search_website)
    {
        $query = "SELECT
        A.userid_refferal,
        CASE '$search_bulan' 
            WHEN 1 THEN 'Januari' 
            WHEN 2 THEN 'Februari'
            WHEN 3 THEN 'Maret' 
            WHEN 4 THEN 'April'
            WHEN 5 THEN 'Mei' 
            WHEN 6 THEN 'Juni'
            WHEN 7 THEN 'Juli' 
            WHEN 8 THEN 'Agustus'
            WHEN 9 THEN 'September' 
            WHEN 10 THEN 'Oktober'
            WHEN 11 THEN 'November' 
            WHEN 12 THEN 'Desember'
        END AS bulan,
        CASE
            WHEN COALESCE(B.downline, 0) >= 10 AND COALESCE(B.downline, 0) < 15 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 10)
            WHEN COALESCE(B.downline, 0) >= 15 AND COALESCE(B.downline, 0) < 25 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 15)
            WHEN COALESCE(B.downline, 0) >= 25 AND COALESCE(B.downline, 0) < 50 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 25) 
            WHEN COALESCE(B.downline, 0) >= 50 AND COALESCE(B.downline, 0) < 75 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 50)
            WHEN COALESCE(B.downline, 0) >= 75 AND COALESCE(B.downline, 0) < 100 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 75)
            WHEN COALESCE(B.downline, 0) >= 100 AND COALESCE(B.downline, 0) < 150 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 100)
            WHEN COALESCE(B.downline, 0) >= 150 AND COALESCE(B.downline, 0) < 200 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 150)
            WHEN COALESCE(B.downline, 0) >= 200 AND COALESCE(B.downline, 0) < 250 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 200)
            WHEN COALESCE(B.downline, 0) >= 250 AND COALESCE(B.downline, 0) < 300 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 250)
            WHEN COALESCE(B.downline, 0) >= 300 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 300)
            -- WHEN COALESCE(B.downline, 0) >= 300 AND COALESCE(B.downline, 0) < 350 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 300)
            -- WHEN COALESCE(B.downline, 0) >= 350 AND COALESCE(B.downline, 0) < 400 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 350)
            -- WHEN COALESCE(B.downline, 0) >= 400 AND COALESCE(B.downline, 0) < 450 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 400)
            -- WHEN COALESCE(B.downline, 0) >= 450 AND COALESCE(B.downline, 0) < 500 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 450)
            -- WHEN COALESCE(B.downline, 0) >= 550 AND COALESCE(B.downline, 0) < 600 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 550)
            -- WHEN COALESCE(B.downline, 0) >= 600 AND COALESCE(B.downline, 0) < 650 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 600)
            -- WHEN COALESCE(B.downline, 0) >= 650 AND COALESCE(B.downline, 0) < 700 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 650)
            -- WHEN COALESCE(B.downline, 0) >= 750 AND COALESCE(B.downline, 0) < 800 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 750)

            ELSE 0
        END AS gaji_refferal,
        COALESCE(B.downline, 0) AS downline,
        COALESCE(C.totaldownline, 0) AS totaldownline,
        COALESCE(D.total_newdepo, 0) AS total_newdepo,
        COALESCE(E.total_newmember, 0) AS total_newmember,
        COALESCE(F.total_kasbon, 0) AS total_casbon,
        CASE
            WHEN A.website = 'arwanatoto' THEN (CASE WHEN COALESCE(D.total_newdepo, 0) < 20 AND COALESCE(A.mitra_baru,0) = 0 THEN 500000 ELSE 0 END)
            ELSE (CASE WHEN COALESCE(D.total_newdepo, 0) < 15 AND COALESCE(A.mitra_baru,0) = 0 THEN 500000 ELSE 0 END)
        END AS total_potongan, A.website
    FROM users_refferal A
    LEFT JOIN (
        SELECT
            A.userid, A.website, 
            SUM(CASE
                WHEN B.website = 'duogaming' AND A.bonus >= 1000 THEN 1
                WHEN B.website <> 'duogaming' AND A.bonus >= 2000 THEN 1
                ELSE 0
            END) AS downline
        FROM tabel_downline A
        INNER JOIN users_refferal B ON A.userid = B.userid_refferal AND B.website = A.website
        WHERE MONTH(A.tanggal) = '$search_bulan' AND YEAR(A.tanggal) = '$search_tahun' AND 
        (
       CASE 
            WHEN '$search_website' = '' THEN 1
            ELSE B.website = '$search_website'
        END
    )
        GROUP BY A.userid, A.website
    ) B ON A.userid_refferal = B.userid AND A.website = B.website
    LEFT JOIN (
        SELECT
            A.userid, A.website,
            SUM(refferal) AS totaldownline
        FROM pencari_refferal A
        INNER JOIN users_refferal B ON A.userid = B.userid_refferal AND B.website = A.website
        WHERE MONTH(A.tanggal) = '$search_bulan' AND YEAR(A.tanggal) = '$search_tahun' AND  (
       CASE 
            WHEN '$search_website' = '' THEN 1
            ELSE B.website = '$search_website'
        END
    ) 
    
        GROUP BY A.userid, A.website
    ) C ON A.userid_refferal = C.userid AND C.website = A.website
    LEFT JOIN (
        SELECT
            A.userid, A.website,
            COUNT(A.status) AS total_newdepo
        FROM tabel_newmember A
        INNER JOIN users_refferal B ON A.userid = B.userid_refferal AND B.website = A.website
        WHERE A.status = 'sudah depo' AND MONTH(A.tanggal) = '$search_bulan' AND YEAR(A.tanggal) = '$search_tahun' AND  (
	CASE 
            WHEN '$search_website' = '' THEN 1
            ELSE B.website = '$search_website'
        END
    )
        GROUP BY A.userid, A.website
    ) D ON A.userid_refferal = D.userid AND D.website = A.website
    LEFT JOIN (
        SELECT
            A.userid, A.website,
            COUNT(A.status) AS total_newmember
        FROM tabel_newmember A
        INNER JOIN users_refferal B ON A.userid = B.userid_refferal AND B.website = A.website
        WHERE MONTH(A.tanggal) = '$search_bulan' AND YEAR(A.tanggal) = '$search_tahun' AND  (
        CASE 
            WHEN '$search_website' = '' THEN 1
            ELSE B.website = '$search_website'
        END
    )
        GROUP BY A.userid, A.website
    ) E ON A.userid_refferal = E.userid AND E.website = A.website
    LEFT JOIN (
        SELECT
            userid,
            SUM(A.nominal) AS total_kasbon,
            MONTH(A.tanggal) AS bulan,
            YEAR(A.tanggal) AS tahun
        FROM data_kasbon A
        INNER JOIN users_refferal B ON A.userid = B.userid_refferal AND A.website = B.website
        WHERE MONTH(A.tanggal) = '$search_bulan' AND YEAR(A.tanggal) = '$search_tahun' AND  (
        CASE 
            WHEN '$search_website' = '' THEN 1
            ELSE B.website = '$search_website'
        END
    )
        GROUP BY A.userid, MONTH(A.tanggal), YEAR(A.tanggal)
    ) F ON A.userid_refferal = F.userid
    WHERE  (
        CASE 
            WHEN '$search_website' = '' THEN 1
            ELSE A.website = '$search_website'
        END
    )";
        // echo $query;
        // die;
        return $query;
    }
}
