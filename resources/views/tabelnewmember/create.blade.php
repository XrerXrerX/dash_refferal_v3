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
                <select id="website" name="website">
                    <option value="arwanatoto">arwanatoto</option>
                    <option value="duogaming">duogaming</option>
                    <option value="jeeptoto">jeeptoto</option>
                    <option value="tstoto">tstoto</option>
                    <option value="doyantoto">doyantoto</option>
                    <option value="arta4d">arta4d</option>
                    <option value="neon4d">neon4d</option>
                    <option value="zara4d">zara4d</option>
                    <option value="roma4d">roma4d</option>
                    <option value="nero4d">nero4d</option>
                    <option value="toke4d">toke4d</option>
                </select>
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
                <textarea class="banyak_downline" id="userid_downline_textarea" style="display: none" cols="30" rows="20"></textarea>
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
            // status.style.display = 'block';
            statuslabel.style.display = 'block';
            statusspan.style.display = 'block';
            inputFieldTextarea.removeAttribute('required');
            inputFieldTextarea.style.display = 'none';
            inputFieldTextarea.removeAttribute('name'); // Hapus atribut name dari <textarea>
            inputFieldInput.setAttribute('name', 'userid_downline'); // Atur atribut name untuk <input>
        } else if (jenisInput === '2') {
            inputFieldInput.removeAttribute('required');
            inputFieldInput.style.display = 'none';
            status.removeAttribute('required');
            status.style.display = 'none';
            statuslabel.style.display = 'none';
            statusspan.style.display = 'none';
            inputFieldTextarea.setAttribute('required', 'required');
            inputFieldTextarea.style.display = 'block';
            inputFieldInput.removeAttribute('name'); // Hapus atribut name dari <input>
            inputFieldTextarea.setAttribute('name', 'userid_downline'); // Atur atribut name untuk <textarea>
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
                url: "/xx88/tabelnewmember/store",
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
                            $('.aplay_code').load('/xx88/tabelnewmember',
                                function() {
                                    adjustElementSize();
                                    localStorage.setItem('lastPage',
                                        '/xx88/tabelnewmember');
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
            $('.aplay_code').load('/xx88/tabelnewmember', function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/xx88/tabelnewmember');
            });
        });

        function getNamaMitra() {
            var selectElement = document.getElementById("website");
            var useridSelect = document.getElementById("userid");

            // Buat fungsi yang akan dipanggil ketika terjadi perubahan pada elemen select
            function handleSelectChange() {
                var selectedValue = selectElement.value;
                if (selectedValue == '') {
                    selectedValue = 'arwanatoto';
                }
                fetchData(selectedValue, useridSelect);
            }

            // Tambahkan event listener untuk memanggil fungsi handleSelectChange() saat terjadi perubahan pada elemen select
            selectElement.addEventListener("change", handleSelectChange);

            var initialValue = selectElement.value;

            // Pastikan untuk memanggil fetchData() dengan parameter yang sesuai
            if (initialValue == '') {
                initialValue = 'arwanatoto';
            }
            fetchData(initialValue, useridSelect);
        }

        function fetchData(value, useridSelect) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "/xx88/pencarirefferal/datauserrefferal/" + value, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var responseData = JSON.parse(xhr.responseText);
                    populateSelect(responseData, useridSelect);
                }
            };
            xhr.send();
        }

        function populateSelect(dataArray, selectElement) {
            selectElement.innerHTML = ""; // Hapus opsi sebelumnya

            dataArray.forEach(function(item) {
                var option = document.createElement("option");
                option.value = item.userid_refferal;
                option.textContent = item.userid_refferal;
                selectElement.appendChild(option);
            });
        }

        getNamaMitra();

    });
</script>
