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
                    <span class="sec_label">User Id</span>
                    <input type="text" id="userid" name="userid[]" placeholder="Masukkan User Id"
                        {{ $disabled }} value="{{ $item->userid }}" required>
                </div>
                <div class="list_form">
                    <span class="sec_label">User Id Downline</span>
                    <select id="userid_downline" name="userid_downline[]" {{ $disabled }}>
                        @foreach ($useridreff as $index => $value)
                            <option value="{{ $value }}"
                                {{ $item->userid_downline == $value ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="list_form">
                    <span class="sec_label">Bonus</span>
                    <input type="text" id="bonus" name="bonus[]" placeholder="0" oninput="formatNumber(this)"
                        {{ $disabled }} value="{{ $item->bonus }}" required>
                </div>
                <div class="list_form">
                    <span class="sec_label">Tanggal</span>
                    <input type="date" id="tanggal" name="tanggal[]" value={{ $item->tanggal }}>
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

        $('#form').submit(function(event) {
            event.preventDefault();

            var formData = new FormData(this);
            $('input[type="checkbox"]', this).each(function() {
                var isChecked = $(this).is(':checked') ? 1 : 0;
                formData.append($(this).attr('name'), isChecked);
            });

            $.ajax({
                url: "/tabeldownline/update",
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
                            $('.aplay_code').load('/tabeldownline',
                                function() {
                                    adjustElementSize();
                                    localStorage.setItem('lastPage',
                                        '/tabeldownline');
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
            $('.aplay_code').load('/tabeldownline', function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/tabeldownline');
            });
        });
    });
</script>
