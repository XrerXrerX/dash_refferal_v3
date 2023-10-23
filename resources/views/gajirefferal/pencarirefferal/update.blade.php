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
                    <select id="level_mitra" name="level_mitra[]" {{ $disabled }}>
                        <option value="0" {{ $item->level_mitra == '0' ? 'selected' : '' }}>Fake</option>
                        <option value="1" {{ $item->level_mitra == '1' ? 'selected' : '' }}>Asli</option>
                    </select>
                </div>
                <div class="list_form">
                    <span class="sec_label">Userid</span>
                    <input type="text" id="userid" name="userid[]" placeholder="Masukkan Userid" required
                        {{ $disabled }} value={{ $item->userid }}>
                    <select id="userid2" name="userid2[]" style="display:none" {{ $disabled }}>
                        @foreach ($userrefferal as $index => $value)
                            <option value="{{ $value->userid_refferal }}"
                                {{ $item->userid == $value->userid_refferal ? 'selected' : '' }}>
                                {{ $value->userid_refferal }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="list_form">
                    <span class="sec_label">Refferal</span>
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
                url: "/pencarirefferal/update",
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
