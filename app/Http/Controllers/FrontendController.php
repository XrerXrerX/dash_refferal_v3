<?php

namespace App\Http\Controllers;

use App\Models\UserRefferal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class FrontendController extends Controller
{

    public function index()
    {
        $data = getUrlApi();
        return view('frontend.index', [
            'title' => 'Refferal L21'
        ]);
    }

    public function kontak()
    {
        return DB::SELECT("SELECT * FROM admin_l21");
    }

    public function pemenang()
    {
        return DB::SELECT("
        SELECT pr.*, ur.gambar_profil FROM pencari_refferal pr 
        INNER JOIN users_refferal ur ON pr.userid = ur.userid_refferal
        ORDER BY pr.downline_aktif DESC
        ");
    }

    public function footer()
    {
        $api_url = getUrlApi() . '/api/kontakl21';
        $ch = curl_init($api_url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer youk1llmyfvcking3x'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $data_kontak = json_decode($response, true);
        if ($data_kontak === null) {
            die("Gagal mendapatkan data kontak dari API.");
        }

        $api_website = getUrlApi() . '/api/datawebsite';
        $ch_website = curl_init($api_website);
        curl_setopt($ch_website, CURLOPT_HTTPHEADER, array('Authorization: Bearer youk1llmyfvcking3x'));
        curl_setopt($ch_website, CURLOPT_RETURNTRANSFER, true);
        $response_website = curl_exec($ch_website);
        curl_close($ch_website);
        $data_website = json_decode($response_website, true);
        if ($data_website === null) {
            die("Gagal mendapatkan data website dari API.");
        }

        return view('frontend.footer', [
            'title' => 'Refferal L21',
            'data_kontak' => $data_kontak,
            'data_website' => $data_website
        ]);
    }

    public function gaji()
    {
        return DB::SELECT("SELECT * FROM gaji_refferal ORDER BY id DESC");
    }

    public function syarat_ketentuan()
    {
        return DB::SELECT("SELECT * FROM syarat_ketentuan");
    }

    public function popup()
    {
        $row = DB::SELECT("SELECT * FROM data_popup");

        return view('frontend.popup', [
            'title' => 'Refferal L21',
            'row' => $row
        ]);
    }

    public function loginfront(Request $request)
    {
        $username = $request->input('username');
        $password = md5($request->input('password'));

        $user = UserRefferal::where('username', $username)
            ->where('password', $password)
            ->first();

        if ($user) {
            session(['usernamelogin' => $username]);
            return 'success';
        } else {
            return "Login gagal. User ID atau password tidak valid.";
        }
    }

    public function halaman_mitra()
    {
        if (!session()->has('usernamelogin')) {
            return redirect('/');
        }
        $username = session('usernamelogin');

        $row = DB::SELECT("SELECT * FROM users_refferal WHERE username = '$username'");
        $website = strtolower($row[0]->website);
        $website_arwana = $row[0]->website;

        $query = "SELECT pr.refferal FROM pencari_refferal AS pr
        JOIN users_refferal AS ur ON pr.userid = ur.userid_refferal
        WHERE ur.username = '$username'";
        $row_reff = DB::SELECT($query);
        $referralValue = $row_reff[0]->refferal;

        if ($website_arwana === 'duogaming') {
            $query_downline_hig2000 = "SELECT pr.*, ur.* 
            FROM tabel_downline AS pr
            JOIN users_refferal AS ur ON pr.userid = ur.userid_refferal
            WHERE ur.username = '$username' AND pr.bonus > 1000";
        } else {
            $query_downline_hig2000 = "SELECT pr.*, ur.* 
            FROM tabel_downline AS pr
            JOIN users_refferal AS ur ON pr.userid = ur.userid_refferal
            WHERE ur.username = '$username' AND pr.bonus > 2000";
        }

        $row_downline_hig2000 = DB::SELECT($query_downline_hig2000);
        $count_downline_hig2000 = count($row_downline_hig2000);

        $query_downline_sudahdepo = "SELECT pr.*, ur.* 
                FROM tabel_newmember AS pr
                JOIN users_refferal AS ur ON pr.userid = ur.userid_refferal
                WHERE ur.username = '$username' AND pr.status = 'sudah depo'";
        $row_downline_sudahdepo = DB::SELECT($query_downline_sudahdepo);
        $count_downline_sudahdepo = count($row_downline_sudahdepo);


        $api_url = getUrlApi() . '/api/datawebsite';

        $ch = curl_init($api_url);
        $headers = ['Authorization: Bearer youk1llmyfvcking3x'];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $data_website = json_decode($response, true);

        if (isset($data_website['data'])) {
            foreach ($data_website['data'] as $websiteData) {
                if (strtolower($websiteData['website']) === $website) {
                    if ($websiteData['website'] == 'ARWANATOTO') {
                        $linkalternatif1 = $websiteData['linkalternatif3'];
                    } else {
                        $linkalternatif1 = $websiteData['linkalternatif1'];
                    }
                    break;
                }
            }
        }

        if (!isset($linkalternatif1)) {
            $linkalternatif1 = 'Default Link';
        }

        return view('frontend.halaman_mitra', [
            'title' => 'Refferal L21',
            'username' => $username,
            'website' => $website,
            'website_arwana' => $website_arwana,
            'referralValue' => $referralValue,
            'count_downline_sudahdepo' => $count_downline_sudahdepo,
            'count_downline_hig2000' => $count_downline_hig2000,
            'linkalternatif1' => $linkalternatif1,
            'row' => $row
        ]);
    }

    function mitra(Request $request)
    {
        $namapage = $request->query('namapage');

        return view('frontend.mitra', [
            'title' => 'Refferal L21',
            'namapage' => $namapage
        ]);
    }

    function getData(Request $request)
    {
        if (isset($namapage)) {
            $sql = "SELECT  userid_refferal, gambar_profil, website, namapage, whatsapp, facebook, bg_page, color_page, text_page, btn_daftar_color, btn_login_color FROM users_refferal WHERE namapage = '$namapage'";
        } else {
            $sql = "SELECT  userid_refferal, gambar_profil, website, namapage, whatsapp, facebook, bg_page, color_page, text_page, btn_daftar_color, btn_login_color FROM users_refferal";
        }
        $data = DB::SELECT($sql);
        return $data;
    }

    function halaman_laporan()
    {
        if (!session()->has('usernamelogin')) {
            return redirect('/');
        }
        $username = session('usernamelogin');

        $row = DB::SELECT("SELECT * FROM users_refferal WHERE username = '$username'");
        $mitra_baru = strtolower($row[0]->mitra_baru);
        $website_arwana = $row[0]->website;

        $query = "SELECT pr.refferal FROM pencari_refferal AS pr
        JOIN users_refferal AS ur ON pr.userid = ur.userid_refferal
        WHERE ur.username = '$username'";
        $row_reff = DB::SELECT($query);
        $referralValue = $row_reff[0]->refferal;

        $query_kasbon = "SELECT pr.nominal FROM data_kasbon AS pr
        JOIN users_refferal AS ur ON pr.userid = ur.userid_refferal
        WHERE ur.username = '$username'";
        $row_kasbon = DB::SELECT($query_kasbon);
        $totalKasbon = 0;
        foreach ($row_kasbon as $item) {
            $totalKasbon += intval($item->nominal);
        }

        if ($website_arwana === 'duogaming') {
            $query_downline_hig2000 = "SELECT pr.*, ur.* 
            FROM tabel_downline AS pr
            JOIN users_refferal AS ur ON pr.userid = ur.userid_refferal
            WHERE ur.username = '$username' AND pr.bonus > 1000";
        } else {
            $query_downline_hig2000 = "SELECT pr.*, ur.* 
            FROM tabel_downline AS pr
            JOIN users_refferal AS ur ON pr.userid = ur.userid_refferal
            WHERE ur.username = '$username' AND pr.bonus > 2000";
        }


        $row_downline_hig2000 = DB::SELECT($query_downline_hig2000);
        $count_downline_hig2000 = count($row_downline_hig2000);

        if ($website_arwana === 'duogaming') {
            $query_downline_low2000 = "SELECT pr.*, ur.* 
            FROM tabel_downline AS pr
            JOIN users_refferal AS ur ON pr.userid = ur.userid_refferal
            WHERE ur.username = '$username' AND pr.bonus < 1000";
        } else {
            $query_downline_low2000 = "SELECT pr.*, ur.* 
            FROM tabel_downline AS pr
            JOIN users_refferal AS ur ON pr.userid = ur.userid_refferal
            WHERE ur.username = '$username' AND pr.bonus < 2000";
        }

        $row_downline_low2000 = DB::SELECT($query_downline_low2000);
        $count_downline_low2000 = count($row_downline_low2000);

        $total_downline = $count_downline_hig2000 + $count_downline_low2000;

        $query_downline_sudahdepo = "SELECT pr.*, ur.* 
                FROM tabel_newmember AS pr
                JOIN users_refferal AS ur ON pr.userid = ur.userid_refferal
                WHERE ur.username = '$username' AND pr.status = 'sudah depo'";

        $row_downline_sudahdepo = DB::SELECT($query_downline_sudahdepo);
        $count_downline_sudahdepo = count($row_downline_sudahdepo);

        $query_downline_belumdepo = "SELECT pr.*, ur.* 
                FROM tabel_newmember AS pr
                JOIN users_refferal AS ur ON pr.userid = ur.userid_refferal
                WHERE ur.username = '$username' AND pr.status = 'belum depo'";

        $row_downline_belumdepo = DB::SELECT($query_downline_belumdepo);
        $count_downline_belumdepo = count($row_downline_belumdepo);
        $total_newmember = $count_downline_sudahdepo + $count_downline_belumdepo;

        $sql_gaji = "SELECT gaji_bulan FROM gaji_refferal WHERE member_aktif <= $count_downline_hig2000 ORDER BY member_aktif DESC LIMIT 1";
        $row_gaji = DB::SELECT($sql_gaji);

        if (count($row_gaji) > 0) {
            $gaji_bulan = $row_gaji[0]->gaji_bulan;
        } else {
            $sql_lowest = 'SELECT MIN(CAST(gaji_bulan AS DECIMAL)) AS min_gaji FROM gaji_refferal;';
            $row_lowest = DB::SELECT($sql_lowest);
            $gaji_bulan = $row_lowest[0]->min_gaji;
        }

        if ($mitra_baru == 0 && (($count_downline_sudahdepo < 15 && $website_arwana !== 'arwanatoto') || ($count_downline_sudahdepo < 20 && $website_arwana === 'arwanatoto'))) {
            $nilai_akhir = 500000;
        } else {
            $nilai_akhir = 0;
        }
        return view('frontend.halaman_laporan', [
            'title' => 'Refferal L21',
            'row' => $row,
            'referralValue' => $referralValue,
            'total_downline' => $total_downline,
            'count_downline_hig2000' => $count_downline_hig2000,
            'count_downline_low2000' => $count_downline_low2000,
            'total_newmember' => $total_newmember,
            'count_downline_sudahdepo' => $count_downline_sudahdepo,
            'count_downline_belumdepo' => $count_downline_belumdepo,
            'row_gaji' => $row_gaji,
            'gaji_bulan' => $gaji_bulan,
            'nilai_akhir' => $nilai_akhir,
            'totalKasbon' => $totalKasbon,
            'row_downline_hig2000' => $row_downline_hig2000,
            'row_downline_low2000' => $row_downline_low2000,
            'row_downline_sudahdepo' => $row_downline_sudahdepo,
            'row_downline_belumdepo' => $row_downline_belumdepo
        ]);
    }

    public function halaman_shortener()
    {
        if (!session()->has('usernamelogin')) {
            return redirect('/');
        }

        $username = session('usernamelogin');

        $sql = "SELECT * FROM users_refferal WHERE username = '$username'";
        $row = DB::SELECT($sql);
        $website = strtolower($row[0]->website);

        $sql_shorten = "SELECT * FROM links_shorten WHERE username_shorten = '$username' ORDER BY id DESC LIMIT 10";
        $row_shorten = DB::SELECT($sql_shorten);

        return view('frontend.halaman_shortener', [
            'title' => 'Refferal L21',
            'row' => $row,
            'row_shorten' => $row_shorten

        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('usernamelogin');
        return redirect('/')->with('success', 'Sesi berhasil dihapus.');
    }

    public function hapus_shorten($id)
    {
        try {
            DB::delete('DELETE FROM links_shorten WHERE id = ?', [$id]);
            return "success";
        } catch (\Exception $e) {
            return response()->json(['errors' => ['Terjadi kesalahan harap hubungi admin.']]);
        }
    }

    function generateRandomString($length = 15)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function shorten(Request $request)
    {
        $url = $request->url;
        $username = session('usernamelogin');

        if (isset($url)) {
            $query = "SELECT * FROM links_shorten WHERE link_awal = '$url'";
            $result = DB::SELECT($query);

            if (count($result) > 0) {
                $row = $result;
                $shortenedUrl = $row[0]->link_hasil;
            } else {
                $shortenedUrl = $this->generateRandomString(8);
                $query = "INSERT INTO links_shorten (link_awal, link_hasil, username_shorten) VALUES (?, ?, ?)";
                DB::insert($query, [$url, $shortenedUrl, $username]);
            }

            return "promol21.com/s/" . $shortenedUrl;
        }
    }

    public function shortenGet($url)
    {
        if (isset($url)) {
            $shortenedUrl = $url;

            $query = "SELECT link_awal FROM links_shorten WHERE link_hasil = '$shortenedUrl'";
            $result = DB::SELECT($query);

            if (count($result) > 0) {
                $row = $result;
                $originalUrl = $row[0]->link_awal;

                return redirect($originalUrl);
            } else {
                return "Error: Shortened URL not found!";
            }
        }
    }

    public function update_password(Request $request)
    {
        try {
            $newPassword = $request->newPassword;
            $username = session('usernamelogin');

            $result = DB::update("UPDATE users_refferal SET password = MD5(?) WHERE username = ?", [$newPassword, $username]);

            if ($result > 0) {
                return response()->json(['success' => ['Password berhasil diupdate.']]);
            } else {
                return response()->json(['errors' => ['User referral tidak ditemukan.']]);
            }
        } catch (\Exception $e) {
            return response()->json(['errors' => ['Terjadi kesalahan saat menyimpan data.']]);
        }
    }

    public function update_page(Request $request)
    {
        try {
            $newPageName = $request->newPageName;
            $username = session('usernamelogin');

            $checkResult = DB::table('users_refferal')
                ->where('namapage', $newPageName)
                ->where('username', '!=', $username)
                ->get();

            if ($checkResult->count() > 0) {
                return "duplicate";
            } else {
                $result = DB::table('users_refferal')
                    ->where('username', $username)
                    ->update(['namapage' => $newPageName]);

                if ($result) {
                    return "success";
                } else {
                    return "error";
                }
            }
        } catch (\Exception $e) {
            return "error";
        }
    }

    public function update_wa(Request $request)
    {
        $newWa = $request->newWa;
        $username = session('usernamelogin');

        $result = DB::update("UPDATE users_refferal SET whatsapp = ? WHERE username = ?", [$newWa, $username]);

        if ($result) {
            return "success";
        } else {
            return "error";
        }
    }

    public function update_fb(Request $request)
    {
        $newFb = $request->newFb;
        $username = session('usernamelogin');

        $result = DB::update("UPDATE users_refferal SET facebook = ? WHERE username = ?", [$newFb, $username]);

        if ($result) {
            echo "success";
        } else {
            echo "error";
        }
    }

    public function update_background(Request $request)
    {
        $username = session('usernamelogin');

        if (isset($request->bg_page)) {
            // $data = trim($request->bg_page);
            // $data = stripslashes($data);
            // $data = htmlspecialchars($data);
            $selectedImage = $request->bg_page;
            $result = DB::update("UPDATE users_refferal SET bg_page = ? WHERE username = ?", [$selectedImage, $username]);

            if ($result) {
                return "success";
            } else {
                return "error";
            }
        } else {
            return "error";
        }
    }

    public function update_colorpage(Request $request)
    {
        $username = session('usernamelogin');

        if (request()->has('color_page')) {
            $selectedImage = $request->color_page;

            $result = DB::update("UPDATE users_refferal SET color_page = ? WHERE username = ?", [$selectedImage, $username]);

            if ($result) {
                return "success";
            } else {
                return "error";
            }
        } else {
            return "error";
        }
    }
    public function update_textpage(Request $request)
    {
        $username = session('usernamelogin');
        $newPageName = $request->newPageName;

        $result = DB::update("UPDATE users_refferal SET text_page = ? WHERE username = ?", [$newPageName, $username]);

        if ($result) {
            return "success";
        } else {
            return "error";
        }
    }

    public function update_daftar_color(Request $request)
    {
        $username = session('usernamelogin');

        if (isset($request->btn_daftar_color)) {
            $selectedImage = $request->btn_daftar_color;
            $result = DB::update("UPDATE users_refferal SET btn_daftar_color = ? WHERE username = ?", [$selectedImage, $username]);

            if ($result) {
                return "success";
            } else {
                return "error";
            }
        } else {
            return "error";
        }
    }

    public function update_login_color(Request $request)
    {
        $username = session('usernamelogin');

        if (isset($request->btn_login_color)) {
            $selectedImage = $request->btn_login_color;

            $result = DB::update("UPDATE users_refferal SET btn_login_color = ? WHERE username = ?", [$selectedImage, $username]);

            if ($result) {
                return "success";
            } else {
                return "error";
            }
        } else {
            return "error";
        }
    }

    public function update_profile_image(Request $request)
    {
        $username = $request->session()->get('usernamelogin'); // gunakan objek request untuk mendapatkan data sesi

        if ($request->hasFile('gambar_profil') && $request->file('gambar_profil')->isValid()) {
            $image = $request->file('gambar_profil');
            $imageName = $image->getClientOriginalName();

            $userReferral = DB::table('users_refferal')->where('username', $username)->first();

            if ($userReferral) {
                $oldImage = "xx88/images/user_refferal_img/" . $userReferral->gambar_profil;

                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }

                $timestamp = time();
                $uniqueFilename = "profile_" . $timestamp . "_" . $imageName;
                // $targetPath = 'xx88/images/user_refferal_img/' . $uniqueFilename;

                try {
                    $image->move(('xx88/images/user_refferal_img'), $uniqueFilename);

                    DB::table('users_refferal')
                        ->where('username', $username)
                        ->update(['gambar_profil' => 'images/user_refferal_img/' . $uniqueFilename]);

                    return "success";
                } catch (\Exception $e) {
                    Log::error('Gagal menyimpan file: ' . $uniqueFilename);
                    return $e->getMessage();
                }
            } else {
                return "error2";
            }
        } else {
            return "error3";
        }
    }
}
