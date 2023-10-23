<div class="bw_popup">
    <div class="bw_utama_popup">
        <p id="close_popup">X</p>
        <h3><?php echo $row[0]->judul_event; ?></h3>
        <img src="/<?php echo $row[0]->gambar_event; ?>" alt="">
        <div class="desk_popup">
            <p><?php echo $row[0]->desk_event; ?></p>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#close_popup").click(function() {
            $(".bw_popup").css("display", "none");
        });

        $(document).on("mousedown", ".bw_popup", function(event) {
            if (!$(event.target).closest(".bw_utama_popup").length) {
                $(".bw_popup").css("display", "none");
            }
        });
    });

    $(document).ready(function() {
        $('.desk_popup').each(function() {
            var $paragraph = $(this).find('p');
            if ($paragraph.text().trim() === '') {
                $(this).hide();
            }
        });
    });
</script>

<style>
    .inner-wrap .panel-blue .bank-status .bank {
        width: 100%;
    }
</style>
