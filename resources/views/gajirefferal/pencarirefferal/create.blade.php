<div class="sec_box hgi-100">
    <form action="" method="POST" enctype="multipart/form-data" id="form">
        @csrf

        <div class="sec_form">
            <div class="sec_head_form">
                <h3>{{ $title }}</h3>
                <span>Tambah {{ $title }}</span>
            </div>
            <div class="list_form">
                <span class="sec_label">Website</span>
                <select id="level_mitra" name="level_mitra">
                    <option value="0">Bodong</option>
                    <option value="1">Mitra</option>
                </select>
            </div>
            <div class="list_form">
                <span class="sec_label">Userid</span>
                <select id="userid" name="userid">
                    @foreach ($userid_refferal as $index => $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="list_form">
                <span class="sec_label">Refferal</span>
                <input type="number" id="refferal" name="refferal" placeholder="0" value=0 placeholder="0">
            </div>
            <div class="list_form">
                <span class="sec_label">Downline Aktif</span>
                <input type="number" id="downline_aktif" name="downline_aktif" placeholder="0" value=0 placeholder="0">
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

        var levelMitraSelect = document.querySelector("#level_mitra");
        var inputNamaBerita = document.querySelector("#userid");
        var inputNamaBerita2 = document.querySelector("#userid2");

        levelMitraSelect.addEventListener("change", function() {
            var selectedOption = levelMitraSelect.options[levelMitraSelect.selectedIndex];

            if (selectedOption.value == "0") {
                inputNamaBerita.style.display = "block";
                inputNamaBerita.required = true;

                inputNamaBerita2.style.display = "none";
                inputNamaBerita2.required = false;
            } else {
                inputNamaBerita.style.display = "none";
                inputNamaBerita.required = false;

                inputNamaBerita2.style.display = "block";
                inputNamaBerita2.required = true;
            }
        });

        $('#form').submit(function(event) {
            event.preventDefault();

            // Menggunakan variabel FormData untuk mengumpulkan data formulir
            var formData = new FormData(this);

            // Mengambil token CSRF dari meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Menambahkan token CSRF dalam data formData
            formData.append('_token', csrfToken);

            $.ajax({
                url: "/pencarirefferal/store",
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
                            $('.aplay_code').load('/pencarirefferal',
                                function() {
                                    adjustElementSize();
                                    localStorage.setItem('lastPage',
                                        '/pencarirefferal');
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
            $('.aplay_code').load('/pencarirefferal', function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/pencarirefferal');
            });
        });

    });
</script>
