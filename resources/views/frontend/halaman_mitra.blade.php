<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="front/img/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L21 | Halaman Mitra</title>
    <link rel="stylesheet" href="front/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    </link>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animateNumber/0.0.14/jquery.animateNumber.min.js"></script>

</head>

<body>
    <div class="container">
        @include ('frontend.navigasi', $row)
        <section class="sec_user">
            <div class="kontenfiturreff">
                <div class="kontenprofile">
                    <div class="listdatareffe">
                        <div class="headlistdata">
                            <div class="pec_edit_photo data-ganti" id="show_gantitema" data-target="cc5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                    viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                </svg>
                            </div>
                            <img class="pp_penc" src="/xx88/<?php echo $row[0]->gambar_profil; ?>" alt="">
                            <div class="txtheadreff">
                                <h3><?php echo $row[0]->userid_refferal; ?></h3>
                                <p>MITRA PROFESIONAL
                                    <span>L21</span>
                                </p>
                                <div class="frontreport">
                                    <div class="listfrontreport">
                                        <p>TOTAL
                                            DOWNLINE</p>
                                        <span id="totalreffreport">
                                    </div>
                                    <div class="listfrontreport">
                                        <p>DOWNLINE
                                            AKTIF</p>
                                        <span id="downaktif"><?php echo $count_downline_hig2000; ?></span>
                                    </div>
                                    <div class="listfrontreport">
                                        <p>NEW
                                            DEPOSIT</p>
                                        <span id="newdepo"><?php echo $count_downline_sudahdepo; ?></span>
                                    </div>
                                </div>
                                <div class="rangkedreff">
                                    <img class="gambarperingkat" src="front/img/shape1.png" alt="">
                                    <span class="peringkat"></span>
                                    <p>Peringkat</p>
                                </div>
                            </div>
                        </div>
                        <div class="yu_tampil_data" id="cc5">
                            <form id="gambarprofileForm" action="update_profile_image.php" method="POST"
                                data-nama="<?php echo $row[0]->userid_refferal; ?>">
                                <div class="body_tampil_data updateimgprofile">
                                    <img src="xx88/<?php echo $row[0]->gambar_profil; ?>" alt="">
                                    <input type="file" id="gambar_profil" name="gambar_profil"
                                        value="<?php echo $row[0]->gambar_profil; ?>">
                                </div>
                                <div class="listbuttonsub" id="changegambarprofile">
                                    <button type="submit" class="btnsimpan" id="gantigambarprofile"
                                        name="gantigambarprofile">Simpan</button>
                                    <button type="button" class="btnbatal" id="batalgantiimg">Batal</button>
                                </div>
                            </form>
                        </div>
                        <div class="inputdatareff">
                            <div class="labelinput">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle"
                                    viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                    <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                                </svg>
                                <span>USERNAME LOGIN</span>
                            </div>
                            <input type="text" id="username" name="username" value="<?php echo $row[0]->username; ?>" readonly>
                        </div>
                        <div class="inputdatareff">
                            <div class="labelinput">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock"
                                    viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                                    <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                    <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                                </svg>
                                <span>PASSWORD</span>
                                <div class="editdatareff" onclick="displayElement('changepass')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                        viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                        <path
                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                        <path d="M16 5l3 3" />
                                    </svg>
                                </div>
                            </div>
                            <form id="passwordForm" action="" method="POST">
                                <div class="databisaedit">
                                    <input type="password" id="password" name="password"
                                        value="<?php echo $row[0]->password; ?>">
                                    <div class="listbuttonsub" id="changepass">
                                        <button type="submit" class="btnsimpan" id="gantipass"
                                            name="gantipass">Simpan</button>
                                        <button type="button" class="btnbatal"
                                            onclick="clearDisplay('changepass')">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="inputdatareff">
                            <div class="labelinput">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-star"
                                    viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h.5" />
                                    <path
                                        d="M17.8 20.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" />
                                </svg>
                                <span>USERID REFFERAL</span>
                            </div>
                            <input type="text" id="userid_refferal" name="userid_refferal"
                                value="<?php echo $row[0]->userid_refferal; ?>" readonly>
                        </div>
                        <div class="inputdatareff">
                            <div class="labelinput">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-link"
                                    viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 15l6 -6" />
                                    <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
                                    <path
                                        d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" />
                                </svg>
                                <span>LINK REFFERAL</span>
                            </div>
                            <div class="copyinput">
                                <input class="datacopy" type="text" id="linkreff" name="linkreff"
                                    value="https://<?php echo $linkalternatif1; ?>/m/link.php?member=<?php echo $row[0]->userid_refferal; ?>"
                                    data-value="https://<?php echo $linkalternatif1; ?>/m/link.php?member=<?php echo $row[0]->userid_refferal; ?>"
                                    readonly>
                                <div class="elementcopy" onclick="copyValue('linkreff')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy"
                                        viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" />
                                        <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2" />
                                    </svg>
                                    <p>copy</p>
                                </div>
                            </div>
                        </div>
                        <div class="inputdatareff">
                            <div class="labelinput">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world-www"
                                    viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M19.5 7a9 9 0 0 0 -7.5 -4a8.991 8.991 0 0 0 -7.484 4" />
                                    <path d="M11.5 3a16.989 16.989 0 0 0 -1.826 4" />
                                    <path d="M12.5 3a16.989 16.989 0 0 1 1.828 4" />
                                    <path d="M19.5 17a9 9 0 0 1 -7.5 4a8.991 8.991 0 0 1 -7.484 -4" />
                                    <path d="M11.5 21a16.989 16.989 0 0 1 -1.826 -4" />
                                    <path d="M12.5 21a16.989 16.989 0 0 0 1.828 -4" />
                                    <path d="M2 10l1 4l1.5 -4l1.5 4l1 -4" />
                                    <path d="M17 10l1 4l1.5 -4l1.5 4l1 -4" />
                                    <path d="M9.5 10l1 4l1.5 -4l1.5 4l1 -4" />
                                </svg>
                                <span>WEBSITE</span>
                            </div>
                            <input type="text" id="website" name="website" value="<?php echo $row[0]->website; ?>"
                                readonly>
                        </div>
                        <div class="inputdatareff">
                            <div class="labelinput">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-pagekit" viewBox="0 0 24 24"
                                    stroke-width="1.5" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12.077 20h-5.077v-16h11v14h-5.077" />
                                </svg>
                                <span>NAMA PAGE</span>
                                <div class="editdatareff" onclick="displayElement('changepage')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                        viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                        <path
                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                        <path d="M16 5l3 3" />
                                    </svg>
                                </div>
                            </div>
                            <form id="pageForm" action="" method="POST">
                                <div class="databisaedit">
                                    <input type="text" id="namapage" name="namapage"
                                        value="<?php echo $row[0]->namapage; ?>">
                                    <div class="listbuttonsub" id="changepage">
                                        <button type="submit" class="btnsimpan" id="gantipage"
                                            name="gantipage">Simpan</button>
                                        <button type="button" class="btnbatal"
                                            onclick="clearDisplay('changepage')">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="inputdatareff">
                            <div class="labelinput">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-whatsapp" viewBox="0 0 24 24"
                                    stroke-width="1.5" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                                    <path
                                        d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                                </svg>
                                <span>WHATSAPP</span>
                                <div class="editdatareff" onclick="displayElement('changewa')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                        viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                        <path
                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                        <path d="M16 5l3 3" />
                                    </svg>
                                </div>
                            </div>
                            <div class="copyinput">
                                <form id="whatsappForm" action="" method="POST">
                                    <div class="databisaedit">
                                        <span class="kodenegara">+62</span>
                                        <input type="password" id="whatsapp" name="whatsapp"
                                            value="<?php echo $row[0]->whatsapp; ?>"
                                            data-value="https://wa.me/62<?php echo $row[0]->whatsapp; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-eye" viewBox="0 0 24 24"
                                            stroke-width="1.5" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" id="mata_nope">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                        <div class="elementcopy" onclick="copyValue('whatsapp')">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-copy" viewBox="0 0 24 24"
                                                stroke-width="1.5" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" />
                                                <path
                                                    d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2" />
                                            </svg>
                                            <p>copy</p>
                                        </div>
                                        <div class="listbuttonsub" id="changewa">
                                            <button type="submit" class="btnsimpan" id="gantiwa"
                                                name="gantiwa">Simpan</button>
                                            <button type="button" class="btnbatal"
                                                onclick="clearDisplay('changewa')">Batal</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="inputdatareff">
                            <div class="labelinput">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-facebook" viewBox="0 0 24 24"
                                    stroke-width="1.5" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                </svg>
                                <span>FACEBOOK</span>
                                <div class="editdatareff" onclick="displayElement('changefb')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                        viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                        <path
                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                        <path d="M16 5l3 3" />
                                    </svg>
                                </div>
                            </div>
                            <div class="copyinput">
                                <form id="facebookForm" action="" method="POST">
                                    <div class="databisaedit">
                                        <input type="text" id="facebook" name="facebook"
                                            value="<?php echo $row[0]->facebook; ?>" data-value="<?php echo $row[0]->facebook; ?>">
                                        <div class="elementcopy" onclick="copyValue('facebook')">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-copy" viewBox="0 0 24 24"
                                                stroke-width="1.5" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" />
                                                <path
                                                    d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2" />
                                            </svg>
                                            <p>copy</p>
                                        </div>
                                        <div class="listbuttonsub" id="changefb">
                                            <button type="submit" class="btnsimpan" id="gantifb"
                                                name="gantifb">Simpan</button>
                                            <button type="button" class="btnbatal"
                                                onclick="clearDisplay('changefb')">Batal</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="editpagewer">
                            <h5>Setting Tema Halaman</h5>
                            <div class="inputdatareff">
                                <div class="labelinput">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-photo-edit" viewBox="0 0 24 24"
                                        stroke-width="1.5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M15 8h.01" />
                                        <path d="M11 20h-4a3 3 0 0 1 -3 -3v-10a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v4" />
                                        <path d="M4 15l4 -4c.928 -.893 2.072 -.893 3 0l3 3" />
                                        <path d="M14 14l1 -1c.31 -.298 .644 -.497 .987 -.596" />
                                        <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" />
                                    </svg>
                                    <span>BACKGROUND</span>
                                </div>
                                <div class="copyinput">
                                    <form id="bgForm" action="" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="databisaedit">
                                            <input type="text" id="bg_page" name="bg_page"
                                                value="<?php echo $row[0]->bg_page; ?>">
                                            <div class="elementcopy data-ganti" id="show_gantitema"
                                                data-target="cc1">
                                                <p>Ganti Background</p>
                                            </div>
                                        </div>
                                        <div class="yu_tampil_data" id="cc1">
                                            <div class="body_tampil_data" data-ubah="show_gantibg">
                                                <?php
                                                $bgDirectory = 'front/img/background/';
                                                $bgImages = glob($bgDirectory . '*.{jpg,jpeg,png}', GLOB_BRACE);
                                                
                                                foreach ($bgImages as $bgImage) {
                                                    $bgImageName = basename($bgImage);
                                                    echo '<label><input type="radio" class="bg-radio" name="selected_bg" value="' . $bgImageName . '"> ' . '<img class="yu_gmbrshow" src="front/img/background/' . $bgImageName . '" alt="' . $bgImageName . '">' . '</label>';
                                                }
                                                ?>
                                            </div>
                                            <div class="listbuttonsub">
                                                <button type="submit" class="btnsimpan" id="gantibg"
                                                    name="gantibg">Simpan</button>
                                                <button type="button" class="btnbatal">Batal</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="inputdatareff">
                                <div class="labelinput">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-palette" viewBox="0 0 24 24"
                                        stroke-width="1.5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12 21a9 9 0 0 1 0 -18c4.97 0 9 3.582 9 8c0 1.06 -.474 2.078 -1.318 2.828c-.844 .75 -1.989 1.172 -3.182 1.172h-2.5a2 2 0 0 0 -1 3.75a1.3 1.3 0 0 1 -1 2.25" />
                                        <path d="M8.5 10.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        <path d="M12.5 7.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        <path d="M16.5 10.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                    </svg>
                                    <span>WARNA TEMA</span>
                                </div>
                                <div class="copyinput">
                                    <form id="colorpage" action="" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="databisaedit">
                                            <div class="ini_color_page" data-bg="<?php echo $row[0]->color_page; ?>"></div>
                                            <input type="text" id="color_page" name="color_page"
                                                value="<?php echo $row[0]->color_page; ?>">
                                            <div class="elementcopy data-ganti" id="show_gantitema"
                                                data-target="cc2">
                                                <p>Ganti Tema</p>
                                            </div>
                                        </div>
                                        <div class="yu_tampil_data" id="cc2">
                                            <div class="body_tampil_data">
                                                <div class="group_warna" data-bg="prfcto1">
                                                    <input type="radio" class="tema-radio"
                                                        name="selected_colorpage" value="prfcto1">
                                                </div>
                                                <div class="group_warna" data-bg="prfcto2">
                                                    <input type="radio" class="tema-radio"
                                                        name="selected_colorpage" value="prfcto2">
                                                </div>
                                                <div class="group_warna" data-bg="prfcto3">
                                                    <input type="radio" class="tema-radio"
                                                        name="selected_colorpage" value="prfcto3">
                                                </div>
                                                <div class="group_warna" data-bg="prfcto4">
                                                    <input type="radio" class="tema-radio"
                                                        name="selected_colorpage" value="prfcto4">
                                                </div>
                                            </div>
                                            <div class="listbuttonsub" id="changecolorpage">
                                                <button type="submit" class="btnsimpan" id="ganticolorpage"
                                                    name="ganticolorpage">Simpan</button>
                                                <button type="button" class="btnbatal">Batal</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="inputdatareff">
                                <div class="labelinput">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-brand-pagekit" viewBox="0 0 24 24"
                                        stroke-width="1.5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12.077 20h-5.077v-16h11v14h-5.077" />
                                    </svg>
                                    <span>DESKRIPSI</span>
                                    <div class="editdatareff" onclick="displayElement('changetextpage')">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-edit" viewBox="0 0 24 24"
                                            stroke-width="1.5" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path
                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />
                                        </svg>
                                    </div>
                                </div>
                                <form id="textpageForm" action="" method="POST">
                                    <div class="databisaedit">
                                        <textarea type="text" id="text_page" name="text_page" cols="30" rows="4"><?php echo $row[0]->text_page; ?></textarea>
                                        <span id="charCount">105/105</span>
                                        <div class="listbuttonsub" id="changetextpage">
                                            <button type="submit" class="btnsimpan" id="gantitextpage"
                                                name="gantitextpage">Simpan</button>
                                            <button type="button" class="btnbatal"
                                                onclick="clearDisplay('changetextpage')">Batal</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="inputdatareff">
                                <div class="labelinput">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-palette" viewBox="0 0 24 24"
                                        stroke-width="1.5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12 21a9 9 0 0 1 0 -18c4.97 0 9 3.582 9 8c0 1.06 -.474 2.078 -1.318 2.828c-.844 .75 -1.989 1.172 -3.182 1.172h-2.5a2 2 0 0 0 -1 3.75a1.3 1.3 0 0 1 -1 2.25" />
                                        <path d="M8.5 10.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        <path d="M12.5 7.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        <path d="M16.5 10.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                    </svg>
                                    <span>TOMBOL DAFTAR</span>
                                </div>
                                <div class="copyinput">
                                    <form id="btndaftarcolor" action="" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="databisaedit">
                                            <div class="ini_color_page" data-button-bg="<?php echo $row[0]->btn_daftar_color; ?>"></div>
                                            <input type="text" id="btn_daftar_color" name="btn_daftar_color"
                                                value="<?php echo $row[0]->btn_daftar_color; ?>">
                                            <div class="elementcopy data-ganti" id="show_gantitema"
                                                data-target="cc3">
                                                <p>Ganti Warna</p>
                                            </div>
                                        </div>
                                        <div class="yu_tampil_data" id="cc3">
                                            <div class="body_tampil_data">
                                                <div class="group_warna" data-button-bg="btncto1">
                                                    <input type="radio" class="daftar-color-radio"
                                                        name="selected_btndaftarcolor" value="btncto1">
                                                </div>
                                                <div class="group_warna" data-button-bg="btncto2">
                                                    <input type="radio" class="daftar-color-radio"
                                                        name="selected_btndaftarcolor" value="btncto2">
                                                </div>
                                                <div class="group_warna" data-button-bg="btncto3">
                                                    <input type="radio" class="daftar-color-radio"
                                                        name="selected_btndaftarcolor" value="btncto3">
                                                </div>
                                                <div class="group_warna" data-button-bg="btncto4">
                                                    <input type="radio" class="daftar-color-radio"
                                                        name="selected_btndaftarcolor" value="btncto4">
                                                </div>
                                                <div class="group_warna" data-button-bg="btncto5">
                                                    <input type="radio" class="daftar-color-radio"
                                                        name="selected_btndaftarcolor" value="btncto5">
                                                </div>
                                            </div>
                                            <div class="listbuttonsub" id="changebtndaftarcolor">
                                                <button type="submit" class="btnsimpan" id="gantibtndaftarcolor"
                                                    name="gantibtndaftarcolor">Simpan</button>
                                                <button type="button" class="btnbatal">Batal</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="inputdatareff">
                                <div class="labelinput">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-palette" viewBox="0 0 24 24"
                                        stroke-width="1.5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12 21a9 9 0 0 1 0 -18c4.97 0 9 3.582 9 8c0 1.06 -.474 2.078 -1.318 2.828c-.844 .75 -1.989 1.172 -3.182 1.172h-2.5a2 2 0 0 0 -1 3.75a1.3 1.3 0 0 1 -1 2.25" />
                                        <path d="M8.5 10.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        <path d="M12.5 7.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        <path d="M16.5 10.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                    </svg>
                                    <span>TOMBOL LOGIN</span>
                                </div>
                                <div class="copyinput">
                                    <form id="btnlogincolor" action="" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="databisaedit">
                                            <div class="ini_color_page" data-button-bg="<?php echo $row[0]->btn_login_color; ?>"></div>
                                            <input type="text" id="btn_login_color" name="btn_login_color"
                                                value="<?php echo $row[0]->btn_login_color; ?>">
                                            <div class="elementcopy data-ganti" id="show_gantitema"
                                                data-target="cc4">
                                                <p>Ganti Warna</p>
                                            </div>
                                        </div>
                                        <div class="yu_tampil_data" id="cc4">
                                            <div class="body_tampil_data">
                                                <div class="group_warna" data-button-bg="btncto1">
                                                    <input type="radio" class="login-color-radio"
                                                        name="selected_btnlogincolor" value="btncto1">
                                                </div>
                                                <div class="group_warna" data-button-bg="btncto2">
                                                    <input type="radio" class="login-color-radio"
                                                        name="selected_btnlogincolor" value="btncto2">
                                                </div>
                                                <div class="group_warna" data-button-bg="btncto3">
                                                    <input type="radio" class="login-color-radio"
                                                        name="selected_btnlogincolor" value="btncto3">
                                                </div>
                                                <div class="group_warna" data-button-bg="btncto4">
                                                    <input type="radio" class="login-color-radio"
                                                        name="selected_btnlogincolor" value="btncto4">
                                                </div>
                                                <div class="group_warna" data-button-bg="btncto5">
                                                    <input type="radio" class="login-color-radio"
                                                        name="selected_btnlogincolor" value="btncto5">
                                                </div>
                                            </div>
                                            <div class="listbuttonsub" id="changebtndaftarcolor">
                                                <button type="submit" class="btnsimpan" id="gantibtnlogincolor"
                                                    name="gantibtnlogincolor">Simpan</button>
                                                <button type="button" class="btnbatal">Batal</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tampilanpage">
                        <div class="copyinput">
                            <div class="ccoinput">
                                <a href="{{ URL::to('/') }}/mitra/?namapage=<?php echo $row[0]->namapage; ?>"
                                    target="_blank"><input class="halamanpencari_reff" type="text"
                                        id="halamanpencarireff" name="halamanpencarireff"
                                        value="{{ URL::to('/') }}/mitra/?namapage=<?php echo $row[0]->namapage; ?>"
                                        data-value="{{ URL::to('/') }}/mitra/?namapage=<?php echo $row[0]->namapage; ?>"
                                        readonly=""></a>
                                <div class="elementcopy" onclick="copyValue('halamanpencarireff')">
                                    <svg xmlns="https://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy"
                                        viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z">
                                        </path>
                                        <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"></path>
                                    </svg>
                                    <p>copy</p>
                                </div>
                            </div>
                        </div>
                        <object data="{{ URL::to('/') }}/mitra/?namapage=<?php echo $row[0]->namapage; ?>"
                            type=""></object>
                    </div>
                </div>
            </div>

        </section>

        <section id="footer">

        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <script src="front/script.js"></script>
    <script src="front/uiux.js"></script>
    <script>
        function limitTextareaCharacters() {
            var maxChar = 105;
            var textArea = document.getElementById("text_page");
            var charCountSpan = document.getElementById("charCount");
            var remainingChars = maxChar - textArea.value.length;

            charCountSpan.textContent = remainingChars + "/" + maxChar;

            if (remainingChars < 0) {
                textArea.value = textArea.value.slice(0, maxChar);
                charCountSpan.textContent = "0/" + maxChar;
            }
        }
        document.getElementById("text_page").addEventListener("input", limitTextareaCharacters);

        //NAME PAGE TIDAK BOLEH MENGGUNAKAN SPASI
        const inputNamaPage = document.getElementById('namapage');
        inputNamaPage.addEventListener('input', function() {
            const nilaiInput = inputNamaPage.value;
            const nilaiInputTanpaSpasi = nilaiInput.replace(/\s/g, '');
            if (nilaiInput !== nilaiInputTanpaSpasi) {
                inputNamaPage.value = nilaiInputTanpaSpasi;
            }
        });
    </script>

</body>

</html>
