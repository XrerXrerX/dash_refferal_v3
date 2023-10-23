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
                    <span class="sec_label">Judul Event</span>
                    <input type="text" id="judul_event" name="judul_event[]" placeholder="Masukkan Judul Event"
                        required {{ $disabled }} value="{{ $item->judul_event }}">
                </div>
                <div class="list_form">
                    <span class="sec_label">Deskripsi Event</span>
                    <textarea name="desk_event[]" id="desk_event" cols="30" rows="3">{{ $item->desk_event }}</textarea>
                </div>
                <div class="list_form">
                    <span class="sec_label">Gambar Event</span>
                    <div class="pilihan_gambar">
                        <input type="file" id="gambar_event" name="gambar_event[]" {{ $disabled }}>
                        <button type="button" class="img_gallery">Pilih Gallery</button>
                    </div>
                </div>
                <div class="list_form">
                    <span class="sec_label">Switch Desk</span>
                    <div class="sec_togle">
                        <input type="checkbox" id="switch_desk" name="switch_desk[]"
                            {{ $item->switch_desk == 1 ? 'checked' : '' }}{{ $disabled }}>
                        <label for="switch_desk" class="sec_switch"></label>
                    </div>
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
                url: "/xx88/datapopup/update",
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
                            $('.aplay_code').load('/xx88/datapopup',
                                function() {
                                    adjustElementSize();
                                    localStorage.setItem('lastPage',
                                        '/xx88/datapopup');
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
            $('.aplay_code').load('/xx88/datapopup', function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/xx88/datapopup');
            });
        });
    });
</script>
