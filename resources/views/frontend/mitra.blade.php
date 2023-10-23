<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../front/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotto21Group | Lowongan Pencari Refferal</title>
    <link rel="stylesheet" href="../front/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    </link>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animateNumber/0.0.14/jquery.animateNumber.min.js"></script>
</head>

<body style="background-image: url('../front/img/background/');" id="prfcto">
    <div class="container" id="profilepagess">
        <div class="profilepage" data-bg="">
            <div class="baratas"></div>
            <div class="groupcntcto">
                <img class="yy_gambarprofile" alt="">
                <div class="dettcto">
                    <h1 id="namaPageHeader"></h1>
                    <p class="textpencreff"></p>
                </div>
                <div class="buttgroupcto">
                    <a href="" target="_blank" id="peclinkbutton">
                        <div class="listbtncto" id="iffoanim">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus"
                                viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M16 19h6" />
                                <path d="M19 16v6" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                            </svg>
                            <button type="button" data-button-bg="" id="daftarcto">DAFTAR</button>
                        </div>
                    </a>
                    <a href="" target="_blank" id="peclinkdaftar">
                        <div class="listbtncto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login"
                                viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                <path d="M20 12h-13l3 -3m0 6l-3 -3" />
                            </svg>
                            <button type="button" data-button-bg="" id="logincto">LOGIN</button>
                        </div>
                    </a>
                    <a href="" target="_blank" id="peclinkwa">
                        <div class="listbtncto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp"
                                viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                                <path
                                    d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                            </svg>
                            <button type="button" id="wacto">WHATSAPP</button>
                        </div>
                    </a>
                    <a href="" target="_blank" id="peclinkfb">
                        <div class="listbtncto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook"
                                viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                            </svg>
                            <button type="button" id="fbcto">FACEBOOK</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="food">
            <p>© Copyright 2023 L21 All Rights Reserved.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script src="{{ URL::to('/') }}/front/mitra/script.js"></script>
</body>

</html>
