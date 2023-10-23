<footer>
    <div class="foot1">
        <a href="https://www.lotto21top.com/" target="_blank">
            <h2><span>L21</span></h2>
        </a>
        <h5>Bergabung Bersama Kami sekarang !</h5>
        <p>Rasakan pengalaman menarik saat bermain bersama kami dan raih kemenangan besar anda di sini.</p>
        <div class="groupwebsiteredd">
            <?php if (isset($data_website['data']) && is_array($data_website['data'])) : ?>

            <?php foreach ($data_website['data'] as $website) : ?>
            <?php if (isset($website["img"]) && isset($website["website"]) && isset($website["linkbutton"])) : ?>
            <div class="contentwebredd">
                <img src="{{ URL::to('/') }}/front/img/logo/<?= $website['img'] ?>" alt="<?= $website['website'] ?>">
                <div class="gridbuttredd">
                    <a href="<?= $website['linkbutton'] ?>" target="_blank"><button
                            class="butdaftarredd">Daftar</button></a>
                    <a href="<?= $website['linkbutton'] ?>" target="_blank"><button
                            class="buttloginredd">Login</button></a>
                </div>
            </div>
            <?php else : ?>
            <div class="contentwebredd">
                <p>Website tidak lengkap atau data tidak tersedia.</p>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php else : ?>
            <div class="contentwebredd">
                <p>Website tidak lengkap atau data tidak tersedia.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="foot2">
        <div class="listfoot2">
            <h5>Certified By</h5>
            <div class="gmbrfoot">
                <img src="{{ URL::to('/') }}/front/img/certified/logo-g21-2023.png" alt="">
            </div>
            <div class="gmbrfoot">
                <img src="{{ URL::to('/') }}/front/img/certified/certification-200124020052-l21group.png"
                    alt="">
            </div>
        </div>
        <div class="listfoot2">
            <h5>Quick Menu</h5>
            <a href="https://www.lotto21group.com/" target="_blank">Lott21Group</a>
            <a href="https://www.lotto21group.com/rtp" target="_blank">RTP</a>
            <a href="https://www.lotto21group.com/gallery" target="_blank">Gallery</a>
            <a href="https://www.lotto21group.com/paito/paito" target="_blank">Paito</a>
            <a href="https://www.lotto21group.com/promo" target="_blank">Promosi</a>
            <a href="https://www.lotto21group.com/about" target="_blank">About Us</a>
        </div>
        <div class="listfoot2">
            <h5>Games</h5>
            <a href="https://www.lotto21group.com/" target="_blank">Togel</a>
            <a href="https://www.lotto21group.com/" target="_blank">Slot</a>
            <a href="https://www.lotto21group.com/" target="_blank">Live Games</a>
            <a href="https://www.lotto21group.com/" target="_blank">Table Games</a>
            <a href="https://www.lotto21group.com/" target="_blank">Sportbooks</a>
            <a href="https://www.lotto21group.com/" target="_blank">Fishing</a>
        </div>
        <div class="listfoot2">
            <h5>Mitra Ekslusif</h5>
            <div class="providerlistredd">
                <img src="{{ URL::to('/') }}/front/img/provider/pragmaticplay-ll21.png" alt="pragmaticplay">
                <img src="{{ URL::to('/') }}/front/img/provider/netent-ll21.png" alt="netent">
                <img src="{{ URL::to('/') }}/front/img/provider/pgsoft-ll21.png" alt="pgsoft">
                <img src="{{ URL::to('/') }}/front/img/provider/playtech-ll21.png" alt="playtech">
                <img src="{{ URL::to('/') }}/front/img/provider/microgaming-ll21.png" alt="microgaming">
                <img src="{{ URL::to('/') }}/front/img/provider/habanero-ll21.png" alt="habanero">
                <img src="{{ URL::to('/') }}/front/img/provider/playngo-ll21.png" alt="playngo">
                <img src="{{ URL::to('/') }}/front/img/provider/evolution-ll21.png" alt="evolution">
                <img src="{{ URL::to('/') }}/front/img/provider/bigtimegaming-ll21.png" alt="bigtimegaming">
                <img src="{{ URL::to('/') }}/front/img/provider/redtiger-ll21.png" alt="redtiger">
                <img src="{{ URL::to('/') }}/front/img/provider/relaxgaming-ll21.png" alt="relaxgaming">
                <img src="{{ URL::to('/') }}/front/img/provider/playson-ll21.png" alt="playson">
            </div>
        </div>
        <div class="listfoot2">
            <h5>Contact Us</h5>
            <?php foreach ($data_kontak['data'] as $kontak) : ?>
            <div class="listmedsosredd">
                <a href="<?= $kontak['livechat'] ?>" target="_blank"><img
                        src="{{ URL::to('/') }}/front/img/medsos/livechat-ll21.png" alt="livechat"></a>
                <a href="https://wa.me/<?= $kontak['whatsapp'] ?>" target="_blank"><img
                        src="{{ URL::to('/') }}/front/img/medsos/whatsapp-ll21.png" alt="whatsapp"></a>
                <a href="<?= $kontak['facebook'] ?>" target="_blank"><img
                        src="{{ URL::to('/') }}/front/img/medsos/facebook-ll21.png" alt="facebook"></a>
                <a href="<?= $kontak['telegram'] ?>" target="_blank"><img
                        src="{{ URL::to('/') }}/front/img/medsos/telegram-ll21.png" alt="telegram"></a>
                <a href="<?= $kontak['line'] ?>" target="_blank"><img
                        src="{{ URL::to('/') }}/front/img/medsos/line-ll21.png" alt="line"></a>
                <a href="<?= $kontak['twitter'] ?>" target="_blank"><img
                        src="{{ URL::to('/') }}/front/img/medsos/twitter-ll21.png" alt="twitter"></a>
                <a href="<?= $kontak['instagram'] ?>" target="_blank"><img
                        src="{{ URL::to('/') }}/front/img/medsos/instagram-ll21.png" alt="instagram"></a>
                <a href="<?= $kontak['youtube'] ?>" target="_blank"><img
                        src="{{ URL::to('/') }}/front/img/medsos/youtube-ll21.png" alt="youtube"></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="foot3">
        <p>© Copyright 2023 L21 All Rights Reserved.</p>
    </div>
</footer>
