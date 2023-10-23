<div class="navbarmitra">
    <div class="wors">
        <a class="pencari_logo" href="halaman_mitra"><img src="front/img/l21-logo.png" alt=""></a>
        <div class="menukanan">
            <p class="showmenu"><?php echo $row[0]->username; ?> ▼</p>
            <img src="<?php echo $row[0]->gambar_profil; ?>" alt="">
            <div class="menuprofile">
                <div class="listmenuprofile">
                    <a class="kontakadm" href="" target="_blank">Admin</a>
                    <a href="logoutfront">Logout</a>
                </div>
                <div class="skumen"></div>
            </div>
        </div>
    </div>
    <div class="menukiri">
        <a href="halaman_mitra">
            <div class="navprofile" id="halprofile">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle"
                    viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                    <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                </svg>
                <span>Profile</span>
            </div>
        </a>
        <a href="halaman_laporan">
            <div class="navprofile" id="hallaporan">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report" viewBox="0 0 24 24"
                    stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
                    <path d="M18 14v4h4" />
                    <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" />
                    <path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                    <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                    <path d="M8 11h4" />
                    <path d="M8 15h3" />
                </svg>
                <span>Laporan</span>
            </div>
        </a>
        <a href="halaman_shortener">
            <div class="navprofile" id="halshorten">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-link" viewBox="0 0 24 24"
                    stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 15l6 -6" />
                    <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
                    <path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" />
                </svg>
                <span>Shortener</span>
            </div>
        </a>
    </div>
</div>
