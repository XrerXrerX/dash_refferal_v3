<div class="sec_box hgi-100">
    <form action="" method="POST" enctype="multipart/form-data" id="form">
        @csrf


        @foreach ($data as $index => $item)
            <div class="sec_form">
                <div class="sec_head_form">
                    <h3>{{ $title }}</h3>
                    <span>Edit {{ $title }}</span>
                    <input type="hidden" name="id[]" value="{{ $item->id }}" {{ $disabled }}>
                </div>
                <div class="list_form">
                    <span class="sec_label">Website</span>
                    <select id="website" name="website[]" {{ $disabled }}>
                        <option value="arwanatoto" {{ $item->website == 'arwanatoto' ? 'selected' : '' }}>arwanatoto
                        </option>
                        <option value="duogaming" {{ $item->website == 'duogaming' ? 'selected' : '' }}>duogaming
                        </option>
                        <option value="jeeptoto" {{ $item->website == 'jeeptoto' ? 'selected' : '' }}>jeeptoto
                        </option>
                        <option value="tstoto" {{ $item->website == 'tstoto' ? 'selected' : '' }}>tstoto</option>
                        <option value="doyantoto" {{ $item->website == 'doyantoto' ? 'selected' : '' }}>doyantoto
                        </option>
                        <option value="arta4d" {{ $item->website == 'arta4d' ? 'selected' : '' }}>arta4d</option>
                        <option value="neon4d" {{ $item->website == 'neon4d' ? 'selected' : '' }}>neon4d</option>
                        <option value="zara4d" {{ $item->website == 'zara4d' ? 'selected' : '' }}>zara4d</option>
                        <option value="roma4d" {{ $item->website == 'roma4d' ? 'selected' : '' }}>roma4d</option>
                        <option value="nero4d" {{ $item->website == 'nero4d' ? 'selected' : '' }}>nero4d</option>
                        <option value="toke4d" {{ $item->website == 'toke4d' ? 'selected' : '' }}>toke4d</option>
                    </select>
                </div>
                <div class="list_form">
                    <span class="sec_label">User Id</span>
                    <select id="userid" name="userid[]" {{ $disabled }}>
                        @foreach ($useridreff as $index => $value)
                            <option value="{{ $value }}" {{ $item->userid == $value ? 'selected' : '' }}>
                                {{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="list_form">
                    <span class="sec_label">Nominal</span>
                    <input type="text" id="nominal" name="nominal[]" placeholder="0" oninput="formatNumber(this)"
                        required {{ $disabled }} value="{{ $item->nominal }}">
                </div>
                <div class="list_form">
                    <span class="sec_label">Tanggal</span>
                    <input type="date" id="tanggal" name="tanggal[]" value="{{ $item->tanggal }}"
                        placeholder="{{ date('Y-m-d') }}" {{ $disabled }}>
                </div>

            </div>
        @endforeach
        <div class="sec_button_form">
            <button class="sec_botton btn_submit" type="submit" id="Contactsubmit" {{ $disabled }}>Submit</button>
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

        $('#form').submit(function(event) {
            event.preventDefault();

            var formData = new FormData(this);
            $('input[type="checkbox"]', this).each(function() {
                var isChecked = $(this).is(':checked') ? 1 : 0;
                formData.append($(this).attr('name'), isChecked);
            });

            $.ajax({
                url: "/xx88/datakasbon/update",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(result) {
                    if (result.errors) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: result.errors
                        });
                    } else {
                        $('.alert-danger').hide();

                        Swal.fire({
                            icon: 'success',
                            title: 'Contactikasi berhasil dikirim!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            $('.aplay_code').load('/xx88/datakasbon',
                                function() {
                                    adjustElementSize();
                                    localStorage.setItem('lastPage',
                                        '/xx88/datakasbon');
                                });
                        });
                    }
                },
                error: function(xhr) {
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
            $('.aplay_code').load('/xx88/datakasbon', function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/xx88/datakasbon');
            });
        });

        function populateSelect(dataArray, selectedUserId) {
            var useridSelect = document.getElementById("userid");
            useridSelect.innerHTML = ""; // Hapus opsi sebelumnya

            dataArray.forEach(function(item) {
                var option = document.createElement("option");
                option.value = item.userid_refferal;
                option.textContent = item.userid_refferal;

                if (item.userid_refferal === selectedUserId) {
                    option.selected = true; // Jika cocok, atur selected
                }

                useridSelect.appendChild(option);
            });
        }

        function getNamaMitra() {
            var selectElement = document.getElementById("website");
            var useridSelect = document.getElementById("userid");

            selectElement.addEventListener("change", function() {
                var selectedValue = selectElement.value;
                var selectedUserId = useridSelect.value; // Ambil nilai userid saat ini

                fetchData(selectedValue, selectedUserId);
            });

            fetchData(selectElement.value, useridSelect
                .value); // Panggil fetchData saat halaman dimuat untuk memastikan data awal ditampilkan
        }

        function fetchData(value, selectedUserId) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "/xx88/pencarirefferal/datauserrefferal/" + value, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var responseData = JSON.parse(xhr.responseText);
                    populateSelect(responseData,
                        selectedUserId); // Kirim selectedUserId ke fungsi populateSelect
                }
            };
            xhr.send();
        }


        getNamaMitra();
    });
</script>
