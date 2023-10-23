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
                    <span class="sec_label">Type Aturan</span>
                    <select id="type_aturan" name="type_aturan[]" {{ $disabled }}>
                        <option value="ketentuan" {{ $item->type_aturan == 'ketentuan' ? 'selected' : '' }}>Ketentuan
                        </option>
                        <option value="syarat" {{ $item->type_aturan == 'syarat' ? 'selected' : '' }}>Syarat</option>
                    </select>
                </div>
                <div class="list_form">
                    <span class="sec_label">Icon Syarat</span>
                    <input type="text" id="icon_syarat" name="icon_syarat[]" placeholder="Masukkan Icon Syarat"
                        required {{ $disabled }} value="{{ $item->icon_syarat }}">
                </div>
                <div class="list_form">
                    <span class="sec_label">Deskripsi Syarat</span>
                    <textarea name="desk_syarat[]" id="desk_syarat" cols="30" rows="3" placeholder="Masukkan Deskrpsi Syarat"
                        required {{ $disabled }}> {{ $item->icon_syarat }}</textarea>
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
                url: "/syaratketentuan/update",
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
                            $('.aplay_code').load('/syaratketentuan',
                                function() {
                                    adjustElementSize();
                                    localStorage.setItem('lastPage',
                                        '/syaratketentuan');
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
            $('.aplay_code').load('/syaratketentuan', function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/syaratketentuan');
            });
        });
    });
</script>
