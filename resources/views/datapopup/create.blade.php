<div class="sec_box hgi-100">
    <form action="" method="POST" enctype="multipart/form-data" id="form">
        @csrf

        <div class="sec_form">
            <div class="sec_head_form">
                <h3>{{ $title }}</h3>
                <span>Tambah {{ $title }}</span>
            </div>
            <div class="list_form">
                <span class="sec_label">Judul Event</span>
                <input type="text" id="judul_event" name="judul_event" placeholder="Masukkan Judul Event" required>
            </div>
            <div class="list_form">
                <span class="sec_label">Deskripsi Event</span>
                <input type="text" id="desk_event" name="desk_event" placeholder="Masukkan Deskripsi Event" required>
            </div>
            <div class="list_form">
                <span class="sec_label">Gambar Event</span>
                <div class="pilihan_gambar">
                    <input type="file" id="gambar_event" name="gambar_event">
                    <button type="button" class="img_gallery">Pilih Gallery</button>
                </div>
            </div>
            <div class="list_form">
                <span class="sec_label">Switch Desk</span>
                <div class="sec_togle">
                    <input type="checkbox" id="switch_desk" name="switch_desk" checked>
                    <label for="switch_desk" class="sec_switch"></label>
                </div>
            </div>
        </div>
        <div class="sec_button_form">
            <button class="sec_botton btn_submit" type="submit" id="Contactsubmit">Submit</button>
            <a href="#" id="cancel"><button type="button" class="sec_botton btn_cancel">Cancel</button></a>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();

        $('#form').submit(function(event) {
            event.preventDefault();

            // Menggunakan variabel FormData untuk mengumpulkan data formulir
            var formData = new FormData(this);

            // Mengambil token CSRF dari meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Menambahkan token CSRF dalam data formData
            formData.append('_token', csrfToken);

            $.ajax({
                url: "/xx88/datapopup/store",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(result) {

                    if (result.errors) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: result.errors
                        });
                    } else {
                        $('.alert-danger').hide();

                        // Tampilkan SweetAlert untuk sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Contactikasi berhasil dikirim!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {

                            // Lakukan perubahan halaman atau tindakan lainnya setelah contact berhasil dikirim
                            $('.aplay_code').load('/xx88/datapopup',
                                function() {
                                    adjustElementSize();
                                    localStorage.setItem('lastPage',
                                        '/xx88/datapopup');
                                });
                        });
                    }
                },
                error: function(xhr) {
                    // Tampilkan SweetAlert untuk kesalahan
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan saat mengirim contact.'
                    });

                    console.log(xhr.responseText);
                }
            });
        });

        $(document).off('click', '#cancel').on('click', '#cancel', function(event) {
            event.preventDefault();
            var namabo = $(this).data('namabo');
            $('.aplay_code').load('/xx88/datapopup', function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/xx88/datapopup');
            });
        });

    });
</script>
