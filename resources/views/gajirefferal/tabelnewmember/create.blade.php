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
                <span class="sec_label">Jenis Input</span>
                <select id="jenis_input" name="jenis_input" onchange="toggleInputFields()">
                    <option value="1">Satu Downline</option>
                    <option value="2">Banyak Downline</option>
                </select>
            </div>
            <div class="list_form">
                <span class="sec_label">User Id Downline</span>
                <input type="text" id="userid_downline_input" name="userid_downline" class="sedikit_downline"
                    placeholder="Masukkan User Id Downline" required>
                <textarea class="banyak_downline" name="userid_downline" id="userid_downline_textarea" style="display: none"
                    cols="30" rows="20" required></textarea>
            </div>
            <div class="list_form">
                <span class="sec_label" id="status-span">Status Deposit</span>
                <div class="sec_togle">
                    <input type="checkbox" class="sedikit_downline" id="status" name="status">
                    <label for="status" class="sec_switch" id="status-label"></label>
                </div>
            </div>
            <div class="list_form">
                <span class="sec_label">Tanggal</span>
                <input type="date" id="tanggal" name="tanggal" value={{ date('Y-m-d') }}>
            </div>


        </div>
        <div class="sec_button_form">
            <button class="sec_botton btn_submit" type="submit" id="Contactsubmit">Submit</button>
            <a href="#" id="cancel"><button type="button" class="sec_botton btn_cancel">Cancel</button></a>
        </div>
    </form>
</div>

<script>
    function toggleInputFields() {
        var jenisInput = document.getElementById('jenis_input').value;
        var inputFieldInput = document.getElementById('userid_downline_input');
        var inputFieldTextarea = document.getElementById('userid_downline_textarea');
        var status = document.getElementById('status');
        var statuslabel = document.getElementById('status-label');
        var statusspan = document.getElementById('status-span');

        if (jenisInput === '1') {
            inputFieldInput.setAttribute('required', 'required');
            inputFieldInput.style.display = 'block';
            status.setAttribute('required', 'required');
            status.style.display = 'block';
            statuslabel.style.display = 'block';
            statusspan.style.display = 'block';
            inputFieldTextarea.removeAttribute('required');
            inputFieldTextarea.style.display = 'none';
        } else if (jenisInput === '2') {
            inputFieldInput.removeAttribute('required');
            inputFieldInput.style.display = 'none';
            status.removeAttribute('required');
            status.style.display = 'none';
            statuslabel.style.display = 'none';
            statusspan.style.display = 'none';
            inputFieldTextarea.setAttribute('required', 'required');
            inputFieldTextarea.style.display = 'block';
        }
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
                url: "/tabelnewmember/store",
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
                            $('.aplay_code').load('/tabelnewmember',
                                function() {
                                    adjustElementSize();
                                    localStorage.setItem('lastPage',
                                        '/tabelnewmember');
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
            $('.aplay_code').load('/tabelnewmember', function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/tabelnewmember');
            });
        });

    });
</script>
