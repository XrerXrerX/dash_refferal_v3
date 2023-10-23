<div class="sec_box hgi-100">
    <form action="" method="POST" enctype="multipart/form-data" id="form">
        @csrf

        <div class="sec_form">
            <div class="sec_head_form">
                <h3>{{ $title }}</h3>
                <span>Tambah {{ $title }}</span>
            </div>
            <div class="list_form">
                <span class="sec_label">User Id</span>
                <select id="userid" name="userid">
                    @foreach ($useridreff as $index => $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <div class="list_form">
                <span class="sec_label">Nominal</span>
                <input type="text" id="nominal" name="nominal" placeholder="0" oninput="formatNumber(this)"
                    required>
            </div>
            <div class="list_form">
                <span class="sec_label">Tanggal</span>
                <input type="date" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}"
                    placeholder="{{ date('Y-m-d') }}">
            </div>

        </div>
        <div class="sec_button_form">
            <button class="sec_botton btn_submit" type="submit" id="Contactsubmit">Submit</button>
            <a href="#" id="cancel"><button type="button" class="sec_botton btn_cancel">Cancel</button></a>
        </div>
    </form>
</div>

<script>
    function formatNumber(input) {
        // Hapus semua karakter selain angka dari nilai input
        let value = input.value.replace(/\D/g, '');

        // Format angka dengan menambahkan separator koma setiap 3 digit
        let formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

        // Set nilai input dengan angka yang sudah diformat
        input.value = formattedValue;
    }

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
                url: "/datakasbon/store",
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
                            $('.aplay_code').load('/datakasbon',
                                function() {
                                    adjustElementSize();
                                    localStorage.setItem('lastPage',
                                        '/datakasbon');
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
            $('.aplay_code').load('/datakasbon', function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/datakasbon');
            });
        });

    });
</script>
