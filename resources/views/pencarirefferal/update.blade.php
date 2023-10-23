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
                    <span class="sec_label">Status</span>
                    <select id="level_mitra" name="level_mitra[]" {{ $disabled }}>
                        <option value="0" {{ $item->level_mitra == '0' ? 'selected' : '' }}>Bodong</option>
                        <option value="1" {{ $item->level_mitra == '1' ? 'selected' : '' }}>Asli</option>
                    </select>
                </div>
                <div class="list_form">
                    <span class="sec_label">Userid</span>
                    <input type="text" id="userid" name="userid[]" placeholder="Masukkan Userid" required
                        {{ $disabled }} value={{ $item->userid }}>
                    <select id="userid2" name="userid2[]" style="display:none" {{ $disabled }}>
                        @foreach ($userid_refferal as $index => $value)
                            <option value="{{ $value }}" {{ $item->userid == $value ? 'selected' : '' }}>
                                {{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="list_form">
                    <span class="sec_label">Total Downline</span>
                    <input type="number" id="refferal" name="refferal[]" placeholder="0" {{ $disabled }}
                        value={{ $item->refferal }} placeholder="0">
                </div>
                <div class="list_form">
                    <span class="sec_label">Downline Aktif</span>
                    <input type="number" id="downline_aktif" name="downline_aktif[]" placeholder="0"
                        {{ $disabled }} value={{ $item->downline_aktif }} placeholder="0">
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
    $(document).ready(function() {

        function updateInputsVisibility() {
            var levelMitraSelects = document.querySelectorAll("#level_mitra");
            var inputNamaBeritas = document.querySelectorAll("#userid");
            var inputNamaBeritas2 = document.querySelectorAll("#userid2");

            levelMitraSelects.forEach(function(levelMitraSelect, index) {
                var selectedOption = levelMitraSelect.options[levelMitraSelect.selectedIndex];

                if (selectedOption.value == "0") {
                    inputNamaBeritas[index].style.display = "block";
                    inputNamaBeritas[index].required = true;

                    inputNamaBeritas2[index].style.display = "none";
                    inputNamaBeritas2[index].required = false;
                } else {
                    inputNamaBeritas[index].style.display = "none";
                    inputNamaBeritas[index].required = false;

                    inputNamaBeritas2[index].style.display = "block";
                    inputNamaBeritas2[index].required = true;
                }
            });
        }

        var levelMitraSelect = document.querySelector("#level_mitra");
        levelMitraSelect.addEventListener("change", updateInputsVisibility);

        window.addEventListener("load", updateInputsVisibility);

        updateInputsVisibility();

        $('#form').submit(function(event) {
            event.preventDefault();

            var formData = new FormData(this);
            $('input[type="checkbox"]', this).each(function() {
                var isChecked = $(this).is(':checked') ? 1 : 0;
                formData.append($(this).attr('name'), isChecked);
            });

            $.ajax({
                url: "/xx88/pencarirefferal/update",
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
                            $('.aplay_code').load('/xx88/pencarirefferal',
                                function() {
                                    adjustElementSize();
                                    localStorage.setItem('lastPage',
                                        '/xx88/pencarirefferal');
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
            $('.aplay_code').load('/xx88/pencarirefferal', function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/xx88/pencarirefferal');
            });
        });

        function populateSelect(dataArray, selectedUserId) {
            var useridSelect = document.getElementById("userid2");
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
