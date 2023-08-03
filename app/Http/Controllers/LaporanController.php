<?php

namespace App\Http\Controllers;

use App\Models\GajiRefferal;
use App\Models\UserRefferal;
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
        $data = DB::select("
        SELECT
            A.userid_refferal,
            'JULI' AS bulan, -- Perhatikan, apakah benar-benar selalu Juli?
            CASE
                WHEN COALESCE(B.downline, 0) >= 10 AND COALESCE(B.downline, 0) < 15 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 10)
                WHEN COALESCE(B.downline, 0) >= 15 AND COALESCE(B.downline, 0) < 25 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 15)
                WHEN COALESCE(B.downline, 0) >= 25 AND COALESCE(B.downline, 0) < 50 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 25) 
                WHEN COALESCE(B.downline, 0) >= 50 AND COALESCE(B.downline, 0) < 75 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 50)
                WHEN COALESCE(B.downline, 0) >= 75 AND COALESCE(B.downline, 0) < 100 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 75)
                WHEN COALESCE(B.downline, 0) >= 100 AND COALESCE(B.downline, 0) < 150 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 100)
                WHEN COALESCE(B.downline, 0) >= 150 AND COALESCE(B.downline, 0) < 200 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 150)
                WHEN COALESCE(B.downline, 0) >= 200 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 200)
                ELSE 0
            END AS gaji_refferal,
            COALESCE(B.downline, 0) AS downline,
            COALESCE(C.totaldownline, 0) AS totaldownline,
            COALESCE(D.total_newdepo, 0) AS total_newdepo,
            COALESCE(E.total_newmember, 0) AS total_newmember,
            COALESCE(F.total_kasbon, 0) AS total_casbon,
            CASE
                WHEN A.website = 'arwana' THEN (CASE WHEN COALESCE(D.total_newdepo, 0) < 20 THEN 500000 ELSE 0 END)
                ELSE (CASE WHEN COALESCE(D.total_newdepo, 0) < 15 THEN 500000 ELSE 0 END)
            END AS total_potongan
        FROM users_refferal A
        LEFT JOIN (
            SELECT
                A.userid,
                SUM(CASE
                    WHEN B.website = 'duogaming' AND A.bonus >= 1000 THEN 1
                    WHEN B.website <> 'duogaming' AND A.bonus >= 2000 THEN 1
                    ELSE 0
                END) AS downline
            FROM tabel_downline A
            INNER JOIN users_refferal B ON A.userid = B.userid_refferal
            WHERE MONTH(A.tanggal) = ?
            GROUP BY A.userid
        ) B ON A.userid_refferal = B.userid
        LEFT JOIN (
            SELECT
                A.userid,
                SUM(refferal) AS totaldownline
            FROM pencari_refferal A
            WHERE MONTH(A.tanggal) = ?
            GROUP BY A.userid
        ) C ON A.userid_refferal = C.userid
        LEFT JOIN (
            SELECT
                A.userid,
                COUNT(A.status) AS total_newdepo
            FROM tabel_newmember A
            WHERE A.status = 'sudah depo' AND MONTH(A.tanggal) = ?
            GROUP BY A.userid
        ) D ON A.userid_refferal = D.userid
        LEFT JOIN (
            SELECT
                A.userid,
                COUNT(A.status) AS total_newmember
            FROM tabel_newmember A
            WHERE MONTH(A.tanggal) = ?
            GROUP BY A.userid
        ) E ON A.userid_refferal = E.userid
        LEFT JOIN (
            SELECT
                userid,
                SUM(A.nominal) AS total_kasbon,
                MONTH(A.tanggal) AS bulan
            FROM data_kasbon A
            WHERE MONTH(A.tanggal) = ?
            GROUP BY A.userid, MONTH(A.tanggal)
        ) F ON A.userid_refferal = F.userid
    ", [$search_bulan, $search_bulan, $search_bulan, $search_bulan, $search_bulan]);

        return view('laporan.index', [
            'title' => 'Laporan Rekapitulasi Gajian Team Promo',
            'datagaji' => GajiRefferal::get(),
            'data' => $data
        ]);
    }


    public function exportlaporan(Request $request)
    {
        $search_bulan = $request->input('search_bulan') ?? date('n');
        $data = DB::select("
        SELECT
            A.userid_refferal,
            'JULI' AS bulan, -- Perhatikan, apakah benar-benar selalu Juli?
            CASE
                WHEN COALESCE(B.downline, 0) >= 10 AND COALESCE(B.downline, 0) < 15 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 10)
                WHEN COALESCE(B.downline, 0) >= 15 AND COALESCE(B.downline, 0) < 25 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 15)
                WHEN COALESCE(B.downline, 0) >= 25 AND COALESCE(B.downline, 0) < 50 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 25) 
                WHEN COALESCE(B.downline, 0) >= 50 AND COALESCE(B.downline, 0) < 75 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 50)
                WHEN COALESCE(B.downline, 0) >= 75 AND COALESCE(B.downline, 0) < 100 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 75)
                WHEN COALESCE(B.downline, 0) >= 100 AND COALESCE(B.downline, 0) < 150 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 100)
                WHEN COALESCE(B.downline, 0) >= 150 AND COALESCE(B.downline, 0) < 200 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 150)
                WHEN COALESCE(B.downline, 0) >= 200 THEN (SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif = 200)
                ELSE 0
            END AS gaji_refferal,
            COALESCE(B.downline, 0) AS downline,
            COALESCE(C.totaldownline, 0) AS totaldownline,
            COALESCE(D.total_newdepo, 0) AS total_newdepo,
            COALESCE(E.total_newmember, 0) AS total_newmember,
            COALESCE(F.total_kasbon, 0) AS total_casbon,
            CASE
                WHEN A.website = 'arwana' THEN (CASE WHEN COALESCE(D.total_newdepo, 0) < 20 THEN 500000 ELSE 0 END)
                ELSE (CASE WHEN COALESCE(D.total_newdepo, 0) < 15 THEN 500000 ELSE 0 END)
            END AS total_potongan
        FROM users_refferal A
        LEFT JOIN (
            SELECT
                A.userid,
                SUM(CASE
                    WHEN B.website = 'duogaming' AND A.bonus >= 1000 THEN 1
                    WHEN B.website <> 'duogaming' AND A.bonus >= 2000 THEN 1
                    ELSE 0
                END) AS downline
            FROM tabel_downline A
            INNER JOIN users_refferal B ON A.userid = B.userid_refferal
            WHERE MONTH(A.tanggal) = ?
            GROUP BY A.userid
        ) B ON A.userid_refferal = B.userid
        LEFT JOIN (
            SELECT
                A.userid,
                SUM(refferal) AS totaldownline
            FROM pencari_refferal A
            WHERE MONTH(A.tanggal) = ?
            GROUP BY A.userid
        ) C ON A.userid_refferal = C.userid
        LEFT JOIN (
            SELECT
                A.userid,
                COUNT(A.status) AS total_newdepo
            FROM tabel_newmember A
            WHERE A.status = 'sudah depo' AND MONTH(A.tanggal) = ?
            GROUP BY A.userid
        ) D ON A.userid_refferal = D.userid
        LEFT JOIN (
            SELECT
                A.userid,
                COUNT(A.status) AS total_newmember
            FROM tabel_newmember A
            WHERE MONTH(A.tanggal) = ?
            GROUP BY A.userid
        ) E ON A.userid_refferal = E.userid
        LEFT JOIN (
            SELECT
                userid,
                SUM(A.nominal) AS total_kasbon,
                MONTH(A.tanggal) AS bulan
            FROM data_kasbon A
            WHERE MONTH(A.tanggal) = ?
            GROUP BY A.userid, MONTH(A.tanggal)
        ) F ON A.userid_refferal = F.userid
    ", [$search_bulan, $search_bulan, $search_bulan, $search_bulan, $search_bulan]);

        return response()->json($data);
    }

    public function generatePDF(Request $request)
    {
        $pegawai = UserRefferal::all();

        $pdf = PDF::loadview('pegawai_pdf', ['pegawai' => $pegawai]);
        return $pdf->download('laporan-pegawai-pdf');
    }
}
