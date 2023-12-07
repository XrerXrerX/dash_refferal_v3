<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

                <div class="group_laporan">

                    <div class="this_laporan">
                        <h3>LAPORAN BULAN <?php echo strtoupper(date('F')); ?></h3>

                        <div class="tabel_laporan">
                            <div class="lap_judul_data onerow">
                                <div class="head_judul">
                                    <div class="cx_head">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-users-group" viewBox="0 0 24 24"
                                            stroke-width="1.5" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                            <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                            <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                        </svg>
                                        <p class="huft_down">TOTAL DOWNLINE</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lap_isi_data onerow">
                                <div class="list_data_laporan">
                                    <p class="cc_plus dwncc" style="color: rgba(var(--white-color)) !important">
                                        <?php echo $referralValue; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="tabel_laporan">
                            <div class="lap_judul_data">
                                <div class="head_judul">
                                    <div class="cx_head">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-user-check" viewBox="0 0 24 24"
                                            stroke-width="1.5" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                                            <path d="M15 19l2 2l4 -4" />
                                        </svg>
                                        <p class="huft_down">DOWNLINE</p>
                                    </div>
                                    <p class="count_total_down"><?php echo $total_downline; ?></p>
                                </div>
                                <div class="ch_head_judul">
                                    <p class="cc_plus">LEBIH DARI 2000</p>
                                    <P>KURANG DARI 2000</P>
                                </div>
                            </div>
                            <div class="lap_isi_data">
                                <div class="list_data_laporan">
                                    <p class="cc_plus"><?php echo $count_downline_hig2000; ?></p>
                                    <button class="triggermodal" data-target="downaktif">Lihat Data</button>
                                </div>
                                <div class="list_data_laporan">
                                    <p><?php echo $count_downline_low2000; ?></p>
                                    <button class="triggermodal" data-target="downtdkaktif">Lihat Data</button>
                                </div>
                            </div>
                        </div>

                        <div class="tabel_laporan">
                            <div class="lap_judul_data">
                                <div class="head_judul">
                                    <div class="cx_head">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-mood-plus" viewBox="0 0 24 24"
                                            stroke-width="1.5" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M20.985 12.528a9 9 0 1 0 -8.45 8.456" />
                                            <path d="M16 19h6" />
                                            <path d="M19 16v6" />
                                            <path d="M9 10h.01" />
                                            <path d="M15 10h.01" />
                                            <path d="M9.5 15c.658 .64 1.56 1 2.5 1s1.842 -.36 2.5 -1" />
                                        </svg>
                                        <p class="huft_down">NEW
                                            MEMBER</p>
                                    </div>
                                    <p class="count_total_down"><?php echo $total_newmember; ?></p>
                                </div>
                                <div class="ch_head_judul">
                                    <p class="cc_plus">SUDAH DEPOSIT</p>
                                    <P>BELUM DEPOSIT</P>
                                </div>
                            </div>
                            <div class="lap_isi_data">
                                <div class="list_data_laporan">
                                    <p class="cc_plus"><?php echo $count_downline_sudahdepo; ?></p>
                                    <button class="triggermodal" data-target="sdhdeposit">Lihat Data</button>
                                </div>
                                <div class="list_data_laporan">
                                    <p><?php echo $count_downline_belumdepo; ?></p>
                                    <button class="triggermodal" data-target="blmdeposit">Lihat Data</button>
                                </div>
                            </div>
                        </div>

                        <div class="tabel_laporan">
                            <div class="lap_judul_data onerow">
                                <div class="head_judul">
                                    <div class="cx_head">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-coins" viewBox="0 0 24 24"
                                            stroke-width="1.5" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M9 14c0 1.657 2.686 3 6 3s6 -1.343 6 -3s-2.686 -3 -6 -3s-6 1.343 -6 3z" />
                                            <path d="M9 14v4c0 1.656 2.686 3 6 3s6 -1.344 6 -3v-4" />
                                            <path
                                                d="M3 6c0 1.072 1.144 2.062 3 2.598s4.144 .536 6 0c1.856 -.536 3 -1.526 3 -2.598c0 -1.072 -1.144 -2.062 -3 -2.598s-4.144 -.536 -6 0c-1.856 .536 -3 1.526 -3 2.598z" />
                                            <path d="M3 6v10c0 .888 .772 1.45 2 2" />
                                            <path d="M3 11c0 .888 .772 1.45 2 2" />
                                        </svg>
                                        <p class="huft_down">GAJI (<?php strtoupper(date('F')); ?>)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lap_isi_data onerow">
                                <div class="list_data_laporan">
                                    <p class="cc_plus ex" style="color: rgba(var(--white-color)) !important">
                                        <span>Rp.</span> <span class="data_nonminal"
                                            id="dt_gajibulan"><?php echo isset($row_gaji[0]->gaji_bulan) ? $row_gaji[0]->gaji_bulan : 0; ?><span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="tabel_laporan">
                            <div class="lap_judul_data">
                                <div class="head_judul">
                                    <div class="cx_head">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-bandage" viewBox="0 0 24 24"
                                            stroke-width="1.5" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M14 12l0 .01" />
                                            <path d="M10 12l0 .01" />
                                            <path d="M12 10l0 .01" />
                                            <path d="M12 14l0 .01" />
                                            <path d="M4.5 12.5l8 -8a4.94 4.94 0 0 1 7 7l-8 8a4.94 4.94 0 0 1 -7 -7" />
                                        </svg>
                                        <p class="huft_down">TOTAL
                                            POTONGAN</p>
                                    </div>
                                </div>
                                <div class="ch_head_judul">
                                    <p>POTONGAN</p>
                                    <P>KASBON</P>
                                </div>
                            </div>
                            <div class="lap_isi_data onerow">
                                <div class="list_data_laporan">
                                    <p class="cc_plus ex pot"><span>Rp.</span> <span class="data_nonminal"
                                            id="pot_target"><?php echo $nilai_akhir; ?><span></p>
                                </div>
                                <div class="list_data_laporan">
                                    <p class="cc_plus ex pot"><span>Rp.</span> <span class="data_nonminal"
                                            id="pot_kasbon"><?php echo $totalKasbon; ?><span></p>
                                </div>
                            </div>
                        </div>

                        <div class="tabel_laporan">
                            <div class="lap_judul_data onerow total">
                                <div class="head_judul">
                                    <div class="cx_head">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-wallet" viewBox="0 0 24 24"
                                            stroke-width="1.5" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                                            <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
                                        </svg>
                                        <p class="huft_down">TOTAL GAJI (<?php strtoupper(date('F')); ?>)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lap_isi_data onerow total">
                                <div class="list_data_laporan">
                                    <p class="cc_plus ex total gaji"><span>Rp.</span> <span id="total_gaji"
                                            class="data_nonminal"><span></p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="downaktif" class="modaljojo formdaftar lihatdata">
                        <div class="komponenmodal">
                            <span class="closemodal" onclick="closeModal()">X</span>
                            <div class="bodymodal">
                                <h3>LEBIH DARI 2000</h3>
                                <span>
                                    <p class="show_tt_data">Total : <span><?php echo $count_downline_hig2000; ?></span></p>
                                    <div class="grubsearchjadwal">
                                        <i class="fab fa-searchengin"></i>
                                        <input type="text" placeholder="Cari Userid..." class="searchUseriddown">
                                    </div>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>#</th>
                                                <th>Userid</th>
                                                <th>Bonus Refferal</th>
                                            </tr>
                                            <?php $nohg = 0; ?>
                                            <?php foreach ($row_downline_hig2000 as $hig2000) :
                                                $nohg++;
                                            ?>
                                            <tr>
                                                <td><?= $nohg ?></td>
                                                <td class="inn_userid"><?= $hig2000->userid_downline ?></td>
                                                <td><?= $hig2000->bonus ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div id="downtdkaktif" class="modaljojo formdaftar lihatdata">
                        <div class="komponenmodal">
                            <span class="closemodal" onclick="closeModal()">X</span>
                            <div class="bodymodal">
                                <h3>KURANG DARI 2000</h3>
                                <span>
                                    <p class="show_tt_data">Total : <span><?php echo $count_downline_low2000; ?></span></p>
                                    <div class="grubsearchjadwal">
                                        <i class="fab fa-searchengin"></i>
                                        <input type="text" placeholder="Cari Userid..." class="searchUseriddown">
                                    </div>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>#</th>
                                                <th>Userid</th>
                                                <th>Bonus Refferal</th>
                                            </tr>
                                            <?php $nolw = 0; ?>
                                            <?php foreach ($row_downline_low2000 as $low2000) :
                                                $nolw++;
                                            ?>
                                            <tr>
                                                <td><?= $nolw ?></td>
                                                <td class="inn_userid"><?= $low2000->userid_downline ?></td>
                                                <td><?= $low2000->bonus ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div id="sdhdeposit" class="modaljojo formdaftar lihatdata">
                        <div class="komponenmodal">
                            <span class="closemodal" onclick="closeModal()">X</span>
                            <div class="bodymodal">
                                <h3>SUDAH DEPOSIT</h3>
                                <span>
                                    <p class="show_tt_data">Total : <span><?php echo $count_downline_sudahdepo; ?></span></p>
                                    <div class="grubsearchjadwal">
                                        <i class="fab fa-searchengin"></i>
                                        <input type="text" placeholder="Cari Userid..." class="searchUseriddown">
                                    </div>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>#</th>
                                                <th>Userid</th>
                                                <th>Status Deposit</th>
                                            </tr>
                                            <?php $nosd = 0; ?>
                                            <?php foreach ($row_downline_sudahdepo as $sudahdepo) :
                                                $nosd++;
                                            ?>
                                            <tr>
                                                <td><?= $nosd ?></td>
                                                <td class="inn_userid"><?= $sudahdepo->userid_downline ?></td>
                                                <td><?= $sudahdepo->status ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div id="blmdeposit" class="modaljojo formdaftar lihatdata">
                        <div class="komponenmodal">
                            <span class="closemodal" onclick="closeModal()">X</span>
                            <div class="bodymodal">
                                <h3>BELUM DEPOSIT</h3>
                                <span>
                                    <p class="show_tt_data">Total : <span><?php echo $count_downline_belumdepo; ?></span></p>
                                    <div class="grubsearchjadwal">
                                        <i class="fab fa-searchengin"></i>
                                        <input type="text" placeholder="Cari Userid..." class="searchUseriddown">
                                    </div>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>#</th>
                                                <th>Userid</th>
                                                <th>Status Deposit</th>
                                            </tr>
                                            <?php $nobld = 0; ?>
                                            <?php foreach ($row_downline_belumdepo as $belumdepo) :
                                                $nobld++;
                                            ?>
                                            <tr>
                                                <td><?= $nobld ?></td>
                                                <td class="inn_userid"><?= $belumdepo->userid_downline ?></td>
                                                <td><?= $belumdepo->status ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                        </div>
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
