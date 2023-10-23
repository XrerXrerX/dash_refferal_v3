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
                    <select id="userid" name="userid[]" {{ $disabled }}>
                        @foreach ($useridreff as $index => $value)
                            <option value="{{ $value }}" {{ $item->userid == $value ? 'selected' : '' }}>
                                {{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="list_form">
                    <span class="sec_label">Id Downline</span>
                    <input type="text" id="userid_downline" name="userid_downline[]"
                        placeholder="Masukkan Id Downline" {{ $disabled }} value="{{ $item->userid_downline }}"
                        required>
                </div>
                <div class="list_form">
                    <span class="sec_label">Status Deposit</span>
                    <div class="sec_togle">
                        <input type="checkbox" id="status_{{ $index }}" name="status[]" {{ $disabled }}
                            {{ $item->status == '1' ? 'checked' : '' }}>
                        <label for="status_{{ $index }}" class="sec_switch"></label>
                    </div>
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
                url: "/tabelnewmember/update",
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
