<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ URL::to('/') }}/front/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L21 | Halaman Mitra</title>
    <link rel="stylesheet" href="{{ URL::to('/') }}/front/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    </link>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animateNumber/0.0.14/jquery.animateNumber.min.js"></script>

</head>

<body>
    <div class="container">
        @include('frontend.navigasi', $row)
        <section class="sec_user">
            <div class="kontenfiturreff">

                <div class="group_shortener">
                    <h3>URL Shortener</h3>
                    <p>Anda dapat menyederhanakan tautan dengan mudah, membuka pintu kesempatan sebagai <span
                            style="color: var(--secondary-color);">MITRA PROFESIONAL</span> dari <span
                            style="color: var(--secondary-color);">L21</span> yang cemerlang.</p>
                    <div class="isi_data_short">
                        <input type="text" id="paste_link" name="paste_link"
                            placeholder="Paste link anda di sini...">
                        <button id="proses_shorten" class="sbt_short">Shorten</button>
                    </div>
                    <div class="group_clear">
                        <button id="clear_isi">Clear</button>
                    </div>
                    <div class="hasil_short">
                        <p class="hasil_close">x</p>
                        <input type="text" id="short_linklama" name="short_linklama" value="">
                        <input class="hasil_isian_link" type="text" id="conv_hasil" name="conv_hasil" value="">
                        <button id="copylinkshort" class="sbt_short">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy"
                                viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" />
                                <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2" />
                            </svg>
                            Copy</button>
                    </div>
                    <div class="histori_shorten">
                        <h5>10 Histori terakhir Shorten link anda</h5>
                        <?php foreach( $row_shorten as $shorten ) : ?>
                        <div class="list_histori" data-log-medos="<?= $shorten->link_awal ?>">
                            <a href="<?= $shorten->link_awal ?>" target="_blank">
                                <p id="shorten_data">{{ URL::to('/') }}/s/<?= $shorten->link_hasil ?></p>
                            </a>
                            <div class="group_btn_histori">
                                <button class="hapus_shorten" data-id="<?= $shorten->id ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                        viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 7l16 0" />
                                        <path d="M10 11l0 6" />
                                        <path d="M14 11l0 6" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                    Hapus
                                </button>
                                <button id="copy_shrt_his">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy"
                                        viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" />
                                        <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2" />
                                    </svg>
                                    Copy
                                </button>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </section>

        <section id="footer"></section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <script src="{{ URL::to('/') }}/front/script.js"></script>
    <script src="{{ URL::to('/') }}/front/uiux.js"></script>
</body>

</html>
