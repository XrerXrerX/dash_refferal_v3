<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ URL::to('/') }}/front/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L21 | Lowongan Pencari Refferal</title>
    <link rel="stylesheet" href="{{ URL::to('/') }}/front/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    </link>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animateNumber/0.0.14/jquery.animateNumber.min.js"></script>

</head>

<body>
    <div id="popup_banner"></div>
    <div class="container">
        <div class="loginacct">
            <button class="buttonprim triggermodal" data-target="loginacces">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login" width="44"
                    height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00bfd8" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                    <path d="M20 12h-13l3 -3m0 6l-3 -3" />
                </svg>
                <span>LOGIN</span></button>
        </div>

        <div id="loginacces" class="modaljojo formdaftar">
            <div class="komponenmodal">
                <div class="bersamal21">
                    <div class="intibersama">
                        <img class="icon-2-l21" src="{{ URL::to('/') }}/front/img/icon-2-l21.png" alt="">
                        <span class="speechinti" style="opacity: 0;">Login</span>
                    </div>
                </div>
                <span class="closemodal" onclick="closeModal()">X</span>
                <div class="bodymodal">
                    <img src="{{ URL::to('/') }}/front/img/l21-logo.png" alt="">
                    <h3>LOGIN</h3>
                    <span>
                        <form action="" class="pendaftaranreff" id="formlogin" method="POST">
                            <div class="listinput">
                                <div class="labelinput">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-user-star" viewBox="0 0 24 24"
                                        stroke-width="1.5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h.5" />
                                        <path
                                            d="M17.8 20.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" />
                                    </svg>
                                </div>
                                <input type="text" id="username" name="username" placeholder="username"
                                    value="">
                                <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}">
                            </div>

                            <div class="listinput">
                                <div class="labelinput">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-brand-samsungpass" viewBox="0 0 24 24"
                                        stroke-width="1.5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M4 10m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v7a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                        <path d="M7 10v-1.862c0 -2.838 2.239 -5.138 5 -5.138s5 2.3 5 5.138v1.862" />
                                        <path
                                            d="M10.485 17.577c.337 .29 .7 .423 1.515 .423h.413c.323 0 .633 -.133 .862 -.368a1.27 1.27 0 0 0 .356 -.886c0 -.332 -.128 -.65 -.356 -.886a1.203 1.203 0 0 0 -.862 -.368h-.826a1.2 1.2 0 0 1 -.861 -.367a1.27 1.27 0 0 1 -.356 -.886c0 -.332 .128 -.651 .356 -.886a1.2 1.2 0 0 1 .861 -.368h.413c.816 0 1.178 .133 1.515 .423" />
                                    </svg>
                                </div>
                                <input type="password" id="password" name="password" placeholder="password"
                                    value="">
                                <svg id="togglePassword" xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-eye" viewBox="0 0 24 24" stroke-width="1.5"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path
                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                </svg>
                            </div>

                            <button class="buttonprim" type="submit" id="login" name="login">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-star"
                                    viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h.5" />
                                    <path
                                        d="M17.8 20.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" />
                                </svg>
                                LOGIN
                            </button>
                            <p>Pastikan anda memiliki akun sebagai mitra pencari refferal kami. Untuk informasi akun
                                silahkan hubungi ADMIN</p>
                        </form>
                    </span>
                </div>
            </div>
        </div>

        <header id="nav_utama_co">
            <div class="heed">
                <a class="menuleft" href="#gajireff">
                    <p>GAJI</p>
                </a>
                <a class="menuleft" href="#bonusrefferal">
                    <p>BONUS</p>
                </a>
                <a class="imglogo" href="index.html"><img src="{{ URL::to('/') }}/front/img/l21-logo.png"
                        alt=""></a>
                <a class="menuright" href="#syaratdanketentuan">
                    <p>SYARAT</p>
                </a>
                <a class="menuright" href="#mitraterbaik">
                    <p>MITRA</p>
                </a>
            </div>
        </header>

        <header class="header_mobile">
            <div class="culs_top">
                <div class="gr_hamb">
                    <svg id="jokmenu" xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-menu-2" viewBox="0 0 24 24" stroke-width="1.5"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 6l16 0" />
                        <path d="M4 12l16 0" />
                        <path d="M4 18l16 0" />
                    </svg>
                    <a class="imglogo" href="index.html"><img src="{{ URL::to('/') }}/front/img/l21-logo.png"
                            alt=""></a>
                </div>
                <div class="hum_group">
                    <div class="list_hum_group">
                        <a class="menu_ham" href="#gajireff">
                            <p>GAJI</p>
                        </a>
                        <a class="menu_ham" href="#bonusrefferal">
                            <p>BONUS</p>
                        </a>
                        <a class="menu_ham" href="#syaratdanketentuan">
                            <p>SYARAT</p>
                        </a>
                        <a class="menu_ham" href="#mitraterbaik">
                            <p>MITRA</p>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <section class="marrqq">
            <div class="spotss left"></div>
            <marquee behavior="scroll" direction="left">Jangan Ragu untuk menjadi Pencari Refferal di L21. Jadilah
                salah satu dari kami dan Nantikan kejutan menarik sebagai MITRA terbaik kami.</marquee>
            <div class="spotss right"></div>
        </section>

        <section>
            <div class="bannerutama" id="bnrutamatam">
                <img class="bghadiah" src="{{ URL::to('/') }}/front/img/hadiah_l21.webp" alt="">
                <img class="imgbannerutama" src="{{ URL::to('/') }}/front/img/banner.png" alt="">
                <div class="carddetailreff">
                    <h1>Lowongan <span>PENCARI REFFERAL L21</span>. Mari bergabung dan jadilah
                        <span>MITRA</span> terbaik kami <span>SEKARANG !</span>
                    </h1>
                    <div class="daftarlogin">
                        <button class="buttonprim triggermodal" data-target="daftar1"><i
                                class='fas fa-user'></i>DAFTAR</button>
                        <a class="kontakadm" href="" target="_blank"><button class="buttonsecond"><i
                                    class='fab fa-whatsapp'></i>ADMIN</button></a>
                    </div>
                </div>
                <div class="rewardcount">
                    <div class="tengahcount">
                        <span class="headreward">REFFERAL REWARD</span>
                        <div class="reffcount">
                            <span class="totalreff"></span>
                            <span class="randomValue" style="display: none;"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="daftar1" class="modaljojo formdaftar">
            <div class="komponenmodal">
                <div class="bersamal21">
                    <div class="intibersama">
                        <img class="icon-2-l21" src="{{ URL::to('/') }}/front/img/icon-2-l21.png" alt="">
                        <div class="spech">
                            <img class="bgspeech" src="{{ URL::to('/') }}/front/img/bubble-speech.png"
                                alt="">
                            <span class="speechinti">Silahkan isi Form berikut secara lengkap untuk menjadi PENCARI
                                REFFERAL PROFESIONAL L21.</span>
                        </div>
                    </div>
                </div>
                <span class="closemodal" onclick="closeModal()">X</span>
                <div class="bodymodal">
                    <h3>FORM PENDAFTARAN</h3>
                    <span>
                        <form action="" class="pendaftaranreff" id="formPendaftaran"
                            enctype="multipart/form-data">
                            <div class="listinput">
                                <div class="labelinput">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-world-www" viewBox="0 0 24 24"
                                        stroke-width="1.5" fill="none" stroke-linecap="round"
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
                                    <span class="labelnama">WEBSITE</span>
                                </div>
                                <select id="website" name="website">
                                    <option value="pilih website" selected place
                                        style="color: #838383; font-style: italic;">Pilih Website</option>
                                    <option value="ARWANATOTO">ARWANATOTO</option>
                                    <option value="DUOGAMING">DUOGAMING</option>
                                    <option value="JEEPTOTO">JEEPTOTO</option>
                                    <option value="TSTOTO">TSTOTO</option>
                                    <option value="DOYANTOTO">DOYANTOTO</option>
                                    <option value="ARTA4D">ARTA4D</option>
                                    <option value="NEON4D">NEON4D</option>
                                    <option value="ZARA4D">ZARA4D</option>
                                    <option value="ROMA4D">ROMA4D</option>
                                    <option value="NERO4D">NERO4D</option>
                                </select>
                            </div>

                            <div class="listinput">
                                <div class="labelinput">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-user-share" viewBox="0 0 24 24"
                                        stroke-width="1.5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h3" />
                                        <path d="M16 22l5 -5" />
                                        <path d="M21 21.5v-4.5h-4.5" />
                                    </svg>
                                    <span class="labelnama">USERID</span>
                                </div>
                                <input type="text" id="userid" name="userid"
                                    placeholder="ketik userid valid anda" value="">
                            </div>

                            <div class="listinput">
                                <div class="labelinput">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-history-toggle" viewBox="0 0 24 24"
                                        stroke-width="1.5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 20.777a8.942 8.942 0 0 1 -2.48 -.969" />
                                        <path d="M14 3.223a9.003 9.003 0 0 1 0 17.554" />
                                        <path d="M4.579 17.093a8.961 8.961 0 0 1 -1.227 -2.592" />
                                        <path d="M3.124 10.5c.16 -.95 .468 -1.85 .9 -2.675l.169 -.305" />
                                        <path d="M6.907 4.579a8.954 8.954 0 0 1 3.093 -1.356" />
                                        <path d="M12 8v4l3 3" />
                                    </svg>
                                    <span class="labelnama">PENGALAMAN</span>
                                </div>
                                <div class="checkboxlist">
                                    <div class="chklist">
                                        <input type="radio" id="belum" name="pengalaman"
                                            value="belum berpengalaman">
                                        <label for="belum">Belum Berpengalaman</label>
                                    </div>

                                    <div class="chklist">
                                        <input type="radio" id="sudah" name="pengalaman"
                                            value="sudah berpengalaman">
                                        <label for="sudah">Sudah Berpengalaman</label>
                                    </div>
                                </div>
                            </div>

                            <div class="listinput datatambah" style="display: none;">
                                <div class="labelinput dttambah">

                                </div>
                                <div class="filedandesk">
                                    <textarea name="deskpengalaman" id="deskpengalaman" cols="30" rows="5"
                                        placeholder="Jelaskan Di Website mana sebelumnya anda menjadi pencari refferal..."></textarea>
                                </div>
                            </div>

                            <div class="listinput">
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
                                    <span class="labelnama">NO HP/WA</span>
                                </div>
                                <input type="text" id="nohp" name="nohp"
                                    placeholder="contoh: 628xxxx atau 08xxxxx"
                                    onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                            <div class="menyetujui">
                                <input type="checkbox" id="setuju" name="setuju">
                                <label for="setuju">Dengan ini saya menyetujui dan paham dengan ketentuan yang telah
                                    dibuat oleh pihak L21 sebagai syarat untuk mendaftar sebagai PENCARI
                                    REFFERAL di L21.</label>
                            </div>
                            <button class="buttonprim" id="kirim" name="kirim">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-star"
                                    viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h.5" />
                                    <path
                                        d="M17.8 20.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" />
                                </svg>
                                DAFTAR
                            </button>
                        </form>
                    </span>
                </div>
            </div>
        </div>

        <section class="sistemreff">
            <h2>APA ITU REFFERAL SISTEM?
                <span>L21</span>
            </h2>
            <P>Referral sistem adalah program peluang usaha tanpa modal untuk anda dan teman-teman anda. Bagikan link
                referral yang terdapat pada menu REFFERAL akun anda lalu dapatkan keuntungan sebesar <b>1% dari
                    permainan TOGEL, 0.2% dari permainan SLOT, dan 3% dari permainan TOTO MACAU</b> saat downline anda
                melakukan pemasangan pada permainan tersebut. Nantikan kejutan-kejutan terbesar dari <b>L21</b> bagi
                MITRA terbaik kami setiap bulannya.

                <b class="intimitra">" Bersama L21 bangun karir anda sebagai PENCARI REFFERAL PROFESIONAL mulai
                    SEKARANG! "</b>
            </P>
        </section>

        <section id="gajireff">
            <h2>GAJI PENCARI REFFERAL
                <span>L21</span>
            </h2>
            <div class="gajirefferal">

            </div>
        </section>

        <section id="bonusrefferal">
            <h2>BONUS REFFERAL PERMAINAN
                <span>L21</span>
            </h2>
            <div class="bnsreff">
                <div class="part1bnsreff">
                    <div class="listbnsreff">
                        <div class="bgovv"></div>
                        <div class="detailbnsreff">
                            <img src="{{ URL::to('/') }}/front/img/togel-l21.png" alt="">
                            <div class="deskbnsreff">
                                <span>TOGEL</span>
                                <span class="bnsreffpersen">1%</span>
                            </div>
                        </div>
                    </div>
                    <span class="pjlsbnsreff">Nikmati bonus refferal togel sebesar 1% dari nilai pemasangan downline
                        anda setiap hari nya. Bonus akan masuk secara otomatis ke dalam akun refferal anda. <span
                            class="linkmd triggermodal" data-target="1">Lihat Selengkapnya..</span></span>
                </div>

                <div id="1" class="modaljojo">
                    <div class="komponenmodal">
                        <div class="bersamal21">
                            <div class="intibersama">
                                <img class="icon-2-l21" src="{{ URL::to('/') }}/front/img/icon-2-l21.png"
                                    alt="">
                                <div class="spech">
                                    <img class="bgspeech" src="{{ URL::to('/') }}/front/img/bubble-speech.png"
                                        alt="">
                                    <span class="speechinti">Bersama L21 bangun karir anda sebagai PENCARI REFFERAL
                                        PROFESIONAL mulai SEKARANG !</span>
                                </div>
                            </div>
                        </div>
                        <span class="closemodal" onclick="closeModal()">X</span>
                        <div class="bodymodal">
                            <h3>Bonus Refferal TOGEL</h3>
                            <span>
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Jenis Pemasangan</th>
                                            <th>Bonus Refferal</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>4D 3D 2D</td>
                                            <td>1%</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Colok Bebas</td>
                                            <td>1%</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Colok Naga</td>
                                            <td>1%</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Colok Jitu</td>
                                            <td>1%</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Shio</td>
                                            <td>1%</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Kombinasi</td>
                                            <td>1%</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Dasar</td>
                                            <td>1%</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>Contoh Simulasi Perhitungan bonus refferal togel jika downline/refferal anda
                                    melakukan pemasangan :

                                    ⦿ Salah satu downline/refferal anda melakukan pemasangan pada pasaran Hongkong untuk
                                    jenis bet 4D3D2D sebagai berikut :
                                    * 1238 bet Rp 100.000
                                    * 238 bet Rp 2.000.000
                                    * 38 bet Rp 5.000.000

                                    ⦿ Kemudian Result Hongkong pada periode tersebut adalah 6338, Maka bonus refferal
                                    yang masuk adalah sebagai berikut :
                                    * 1238 (pemasangan 4D) : 1% x Rp 100.000 = Rp 1.000
                                    * 238 (pemasangan 3D) : 1% x 2.000.000 = Rp 20.000
                                    * 38 (Pemasangan 2D) : Bonus tidak dapat karena downline anda menang.

                                    ⦿ Total Bonus Refferal yang masuk = Rp 1.000 + Rp 20.000 = Rp 21.000 untuk setiap
                                    pasaran yang di bet oleh downline anda. Bayangkan jika Downline anda melakukan bet
                                    di 50 pasaran yang Kami sediakan :
                                    * 50 x Rp 21.000 = Rp 1.050.000 dari setiap Downline/hari.

                                    ⦿ Jika kita hitung dalam durasi Bonus dalam 1 bulan :
                                    * Rp 1.050.000 x 30 = Rp 31.500.000 dari setiap Downline/Bulan.

                                    Seperti itulah simulasi contoh perhitungan bonus refferal pada pemasangan togel,
                                    semoga informasi ini dapat membantu anda kedepannya.
                                </p>
                            </span>
                            <p>Silahkan klik menu "BANTUAN" untuk mendapatkan informasi lanjut seputar BONUS REFFERAL
                                atau anda bisa hubungi ADMIN L21 yang bertugas.</p>
                        </div>
                        <div class="listbuttonjoin">
                            <a href=""><button class="buttonprim"><i
                                        class='fas fa-user'></i>DAFTAR</button></a>
                            <a href="" class="kontakadm" target="_blank"><button class="buttonsecond"><i
                                        class='fab fa-whatsapp'></i>ADMIN</button></a>
                        </div>
                    </div>
                </div>

                <div class="part1bnsreff">
                    <div class="listbnsreff">
                        <div class="bgovv"></div>
                        <div class="detailbnsreff">
                            <img src="{{ URL::to('/') }}/front/img/totomacau-l21.png" alt="">
                            <div class="deskbnsreff">
                                <span>TOTO MACAU</span>
                                <span class="bnsreffpersen">3%</span>
                            </div>
                        </div>
                    </div>
                    <span class="pjlsbnsreff">Salah satu pasaran togel yang result hingga 6 kali dalam 1 hari adalah
                        kesempatan besar anda untuk mendapatkan bonus refferal togel Toto Macau Hingga 3% setiap hari
                        nya. <span class="linkmd triggermodal" data-target="3">Lihat Selengkapnya..</span></span>
                </div>

                <div id="3" class="modaljojo">
                    <div class="komponenmodal">
                        <div class="bersamal21">
                            <div class="intibersama">
                                <img class="icon-2-l21" src="{{ URL::to('/') }}/front/img/icon-2-l21.png"
                                    alt="">
                                <div class="spech">
                                    <img class="bgspeech" src="{{ URL::to('/') }}/front/img/bubble-speech.png"
                                        alt="">
                                    <span class="speechinti">Bersama L21 bangun karir anda sebagai PENCARI REFFERAL
                                        PROFESIONAL mulai SEKARANG !</span>
                                </div>
                            </div>
                        </div>
                        <span class="closemodal" onclick="closeModal()">X</span>
                        <div class="bodymodal">
                            <h3>Bonus Refferal TOTO MACAU</h3>
                            <span>
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Jenis Betingan</th>
                                            <th>Bonus Refferal</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Betingan Diskon</td>
                                            <td>3%</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Betingan Full</td>
                                            <td>2.5%</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Betingan Bolak Balik</td>
                                            <td>2.5%</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Betingan Super Diskon</td>
                                            <td>0%</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>Contoh Simulasi Perhitungan bonus refferal Toto Macau jika downline/refferal anda
                                    melakukan pemasangan :

                                    ⦿ Salah satu downline/refferal anda melakukan pemasangan pada pasaran Toto Macau
                                    untuk keluaran jam 13:00 WIB. Pemasangannya sebagai berikut :
                                    * Betingan Diskon 4D : 2312 x Rp 100.000
                                    * Betingan Diskon 3D : 012 x Rp 2.000.000
                                    * Betingan Diskon 2D : 02 x Rp 1.000.000
                                    * Betingan Full 4D : 4312 x Rp 100.000
                                    * Betingan Full 3D : 212 x Rp 1.000.000
                                    * Betingan Full 2D : 12 x Rp 2.000.000

                                    ⦿ Kemudian Result Toto Macau pukul 13:00 WIB adalah 5312. Maka perhitungan Bonus
                                    refferal toto macau yang anda dapat adalah sebagai berikut :
                                    * Betingan Diskon 4D angka 2312 : Rp 100.000 x 3% = Rp 3.000
                                    * Betingan Diskon 3D angka 012 : Rp 2.000.000 x 3% = Rp 60.000
                                    * Betingan Diskon 2D angka 02 : Rp 1.000.000 x 3% = Rp 30.000
                                    * Betingan Full 4D angka 4312 : Rp 100.000 x 2.5% = Rp 2.500
                                    * Betingan Full 3D angka 212 : Rp 1.000.000 x 2.5% = Rp 25.000
                                    * Betingan Full 2D angka 12 : pada pemasangan ini downline anda menang maka bonus
                                    refferal tidak di dapatkan.

                                    ⦿ Total Bonus refferal yang anda dapatkan dari 1 downline/refferal :
                                    * Rp 3.000 + Rp 60.000 + Rp 30.000 + Rp 2.500 + Rp 25.000 = Rp 120.500

                                    ⦿ jika downline anda tersebut melakukan pemasangan 5 kali dalam 1 hari hanya untuk
                                    pasaran Toto Macau, maka seperti ini hitungannya :
                                    * 5 x Rp 120.500 = Rp 602.500/downline/hari

                                    ⦿ Jika jika hitung Bonus refferal Toto Macau tersebut dalam hitungan 1 bulan, maka
                                    hitungannya seperti ini :
                                    * 30 x Rp 602.500 = Rp 18.075.000/downline/bulan
                                    * Jika anda memiliki downline aktif Toto Macau yang lebih banyak, maka silahkan
                                    hitung kembali keuntungan yang anda dapatkan setiap bulannya.

                                    Seperti itulah simulasi contoh perhitungan bonus refferal togel Toto Macau, semoga
                                    informasi ini dapat membantu anda kedepannya.
                                </p>
                            </span>
                            <p>Silahkan klik menu "BANTUAN" untuk mendapatkan informasi lanjut seputar BONUS REFFERAL
                                atau anda bisa hubungi ADMIN L21 yang bertugas.</p>
                        </div>
                        <div class="listbuttonjoin">
                            <a href=""><button class="buttonprim"><i
                                        class='fas fa-user'></i>DAFTAR</button></a>
                            <a href="" class="kontakadm" target="_blank"><button class="buttonsecond"><i
                                        class='fab fa-whatsapp'></i>ADMIN</button></a>
                        </div>
                    </div>
                </div>

                <div class="part1bnsreff">
                    <div class="listbnsreff">
                        <div class="bgovv"></div>
                        <div class="detailbnsreff">
                            <img src="{{ URL::to('/') }}/front/img/togel-v2.png" alt="">
                            <div class="deskbnsreff">
                                <span>TOGEL V.2</span>
                                <span class="bnsreffpersen">3%</span>
                            </div>
                        </div>
                    </div>
                    <span class="pjlsbnsreff">2 pasaran dengan hadiah lebih besar dari biasanya yaitu Singapore V.2 dan
                        Hongkong V.2 hadir di L21 serta bonus refferal terbesar hingga 3%. <span
                            class="linkmd triggermodal" data-target="4">Lihat Selengkapnya..</span></span>
                </div>

                <div id="4" class="modaljojo">
                    <div class="komponenmodal">
                        <div class="bersamal21">
                            <div class="intibersama">
                                <img class="icon-2-l21" src="{{ URL::to('/') }}/front/img/icon-2-l21.png"
                                    alt="">
                                <div class="spech">
                                    <img class="bgspeech" src="{{ URL::to('/') }}/front/img/bubble-speech.png"
                                        alt="">
                                    <span class="speechinti">Bersama L21 bangun karir anda sebagai PENCARI REFFERAL
                                        PROFESIONAL mulai SEKARANG !</span>
                                </div>
                            </div>
                        </div>
                        <span class="closemodal" onclick="closeModal()">X</span>
                        <div class="bodymodal">
                            <h3>Bonus Refferal TOGEL V.2
                                <span class="v2_text">Khusus pasaran SINGAPORE V.2 dan HONGKONG V.2</span>
                            </h3>
                            <span>
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Jenis Betingan</th>
                                            <th>Bonus Refferal</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Betingan 4D</td>
                                            <td>3%</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Betingan 2D</td>
                                            <td>2%</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Betingan 3D</td>
                                            <td>1%</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>Contoh Simulasi Perhitungan bonus refferal TOGEL V.2 jika downline/refferal anda
                                    melakukan pemasangan :

                                    ⦿ Salah satu downline/refferal anda melakukan pemasangan pada pasaran Hongkong v.2.
                                    Pemasangannya sebagai berikut :
                                    * Betingan V.2 4D : 2012 x Rp 100.000
                                    * Betingan V.2 3D : 002 x Rp 2.000.000
                                    * Betingan V.2 2D : 02 x Rp 1.000.000
                                    * Betingan V.2 2D : 12 x Rp 2.000.000

                                    ⦿ Kemudian Result Hongkong 1012. Maka perhitungan Bonus
                                    refferal Togel v.2 yang anda dapat adalah sebagai berikut :
                                    * Betingan V.2 4D angka 2012 : Rp 100.000 x 3% = Rp 3.000
                                    * Betingan V.2 3D angka 002 : Rp 2.000.000 x 2% = Rp 40.000
                                    * Betingan V.2 2D angka 02 : Rp 1.000.000 x 1% = Rp 10.000
                                    * Betingan V.2 2D angka 12 : pada pemasangan ini downline anda menang maka bonus
                                    refferal tidak di dapatkan.

                                    ⦿ Total Bonus refferal yang anda dapatkan dari 1 downline/refferal :
                                    * Rp 3.000 + Rp 40.000 + Rp 10.000 = Rp 53.000

                                    ⦿ Jika jika hitung Bonus refferal Togel V.2 untuk tiap member dalam hitungan 1
                                    bulan, maka
                                    hitungannya seperti ini :
                                    * 30 x Rp 53.500 = Rp 1.590.000/downline/bulan
                                    * Jika anda memiliki downline aktif pasaran TOGEL V.2 yang lebih banyak, maka
                                    silahkan
                                    hitung kembali keuntungan yang anda dapatkan setiap bulannya.

                                    Seperti itulah simulasi contoh perhitungan bonus refferal TOGEL V.2, semoga
                                    informasi ini dapat membantu anda kedepannya.
                                </p>
                            </span>
                            <p>Silahkan klik menu "BANTUAN" untuk mendapatkan informasi lanjut seputar BONUS REFFERAL
                                atau anda bisa hubungi ADMIN L21 yang bertugas.</p>
                        </div>
                        <div class="listbuttonjoin">
                            <a href=""><button class="buttonprim"><i
                                        class='fas fa-user'></i>DAFTAR</button></a>
                            <a href="" class="kontakadm" target="_blank"><button class="buttonsecond"><i
                                        class='fab fa-whatsapp'></i>ADMIN</button></a>
                        </div>
                    </div>
                </div>

                <div class="part1bnsreff">
                    <div class="listbnsreff">
                        <div class="bgovv"></div>
                        <div class="detailbnsreff">
                            <img src="{{ URL::to('/') }}/front/img/slot-l21.png" alt="">
                            <div class="deskbnsreff">
                                <span>SLOT</span>
                                <span class="bnsreffpersen">0.2%</span>
                            </div>
                        </div>
                    </div>
                    <span class="pjlsbnsreff">Game Provider slot terlengkap sebagai layanan dalam permainan SLOT di
                        L21. Nikmati bonus refferal slot sebesar 0.2% dari pemasangan downline/refferal anda.
                        <span class="linkmd triggermodal" data-target="2">Lihat Selengkapnya..</span></span>
                </div>

                <div id="2" class="modaljojo">
                    <div class="komponenmodal">
                        <div class="bersamal21">
                            <div class="intibersama">
                                <img class="icon-2-l21" src="{{ URL::to('/') }}/front/img/icon-2-l21.png"
                                    alt="">
                                <div class="spech">
                                    <img class="bgspeech" src="{{ URL::to('/') }}/front/img/bubble-speech.png"
                                        alt="">
                                    <span class="speechinti">Bersama L21 bangun karir anda sebagai PENCARI REFFERAL
                                        PROFESIONAL mulai SEKARANG !</span>
                                </div>
                            </div>
                        </div>
                        <span class="closemodal" onclick="closeModal()">X</span>
                        <div class="bodymodal">
                            <h3>Bonus Refferal SLOT</h3>
                            <span>
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Provider</th>
                                            <th>Bonus Refferal</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>PRAGMATIC</td>
                                            <td>0.2%</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>PGSOFT</td>
                                            <td>0.2%</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>HABANERO</td>
                                            <td>0.2%</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>MICROGAMING</td>
                                            <td>0.2%</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>GMW</td>
                                            <td>0.2%</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>IDNSLOT</td>
                                            <td>0.2%</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>Contoh Simulasi Perhitungan bonus refferal slot jika downline/refferal anda melakukan
                                    pemasangan :

                                    ⦿ Salah satu downline/refferal anda melakukan pemasangan pada pukul 16:00 - 18:00
                                    WIB pada provider PRAGMATIC PLAY yaitu game Gates of Olympus (Zeus) :
                                    * Total turn over / nilai valid bet nya adalah sebesar Rp 3.500.000 (bukan nominal
                                    deposit, tetapi total pemasangan selama bermain 2 jam yaitu pukul 16:00 - 18-00 WIB)

                                    ⦿ kemudian downline anda tersebut memainkan permainan slot kembali pada pukul 20:00
                                    - 22:00 WIB pada provider PGSOFT yaitu game Mahjong Ways :
                                    * Total turn over / nilai valid bet nya adalah sebesar Rp 7.000.000 (bukan nominal
                                    deposit, tetapi total pemasangan selama bermain 2 jam yaitu pukul 20:00 - 22-00 WIB)

                                    ⦿ Total bonus refferal yang anda terima adalah sebagai berikut :
                                    * (RP 3.500.000 + 7.000.000) x 0.2% = Rp 21.000/downline/perhari
                                    * Bonus refferal slot sebesar Rp 21.000 akan masuk setelah jam 00:00 WIB atau
                                    setelah jam 12 malam.

                                    ⦿ Jika kita hitung dalam waktu 1 bulan untuk 1 orang downline/refferal yang anda
                                    miliki, maka perhitungannya sebagai berikut :
                                    * 30 x Rp 21.000 = Rp 630.000/downline/bulan

                                    ⦿ Jika anda memiliki member aktif 10 orang saja dalam permainan slot, maka
                                    perhitungannya sebagai berikut :
                                    * 10 x Rp 630.000 = 6.300.000 perbulan hanya dari 10 orang member aktif, bagaimana
                                    jika anda memiliki 100 orang member aktif dalam permainan slot? Luar biasa bukan.

                                    Seperti itulah simulasi contoh perhitungan bonus refferal pada permainan slot,
                                    semoga informasi ini dapat membantu anda kedepannya.
                                </p>
                            </span>
                            <p>Silahkan klik menu "BANTUAN" untuk mendapatkan informasi lanjut seputar BONUS REFFERAL
                                atau anda bisa hubungi ADMIN L21 yang bertugas.</p>
                        </div>
                        <div class="listbuttonjoin">
                            <a href=""><button class="buttonprim"><i
                                        class='fas fa-user'></i>DAFTAR</button></a>
                            <a href="" class="kontakadm" target="_blank"><button class="buttonsecond"><i
                                        class='fab fa-whatsapp'></i>ADMIN</button></a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section id="syaratdanketentuan">
            <h2>SYARAT & KETENTUAN
                MENJADI PENCARI REFFERAL
                <span>L21</span>
            </h2>
            <div class="syaratketentuan">

                <div class="listsyarat syarat">
                    <h3>SYARAT</h3>

                </div>

                <div class="listsyarat ketentuan">
                    <h3>KETENTUAN</h3>

                </div>
        </section>

        <section id="mitraterbaik">
            <img class="wallmitra" src="{{ URL::to('/') }}/front/img/wall.png" alt="">
            <h2>PERINGKAT TERKINI
                PENCARI REFFERAL TERBAIK
                <span>L21</span>
            </h2>

            <div class="rankedmit">
                <div class="pencarianini">
                    <div class="bagsearch">
                        <div class="grubsearchjadwal">
                            <i class='fab fa-searchengin'></i>
                            <input type="text" placeholder="Cari Userid anda..." id="searchUserid">
                        </div>
                    </div>
                </div>
                <div class="headrangked">
                    <span class="headperingkat">Peringkat</span>
                    <span class="headuserid">Userid</span>
                    <span class="headtotal">Total Refferal</span>
                </div>
                <div class="datapencari">

                </div>
            </div>
        </section>

        <section id="footer">

        </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script src="{{ URL::to('/') }}/front/script.js"></script>
    <script src="{{ URL::to('/') }}/front/uiux.js"></script>

    {{-- <script>
        (document).ready(function() {
            $('#formlogin').submit(function(event) {
                event.preventDefault();

                var username = $('#username').val();
                var password = $('#password').val();
                var _token = "{{ csrf_token() }}";
                var url = "{{ URL::to('/') }}" + "/loginfront";

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        _token: _token,
                        login: true,
                        username: username,
                        password: password
                    },
                    success: function(response) {
                        if (response === 'success') {
                            window.location.href = 'halaman_mitra.php';
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Login Gagal',
                                text: 'User ID atau password Salah.',
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: 'Terjadi kesalahan saat melakukan login.',
                        });
                    }
                });
            });
        });
    </script> --}}
</body>

</html>
