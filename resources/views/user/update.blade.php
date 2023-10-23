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
                    <span class="sec_label">Nama</span>
                    <input type="text" id="name" name="name[]" placeholder="Masukkan Nama" {{ $disabled }}
                        value={{ $item->name }} required>
                </div>
                <div class="list_form">
                    <span class="sec_label">Username</span>
                    <input type="text" id="username" name="username[]" placeholder="Masukkan Username"
                        {{ $disabled }} value={{ $item->username }} required>
                </div>
                <div class="list_form">
                    <span class="sec_label">Password</span>
                    <input type="password" id="password" name="password[]"
                        placeholder="Masukkan Password Jika Ingin Mengganti Password , Kosongkan jika tidak"
                        {{ $disabled }}>
                </div>
                <div class="list_form">
                    <span class="sec_label">Konfirmasi Password</span>
                    <input type="password" id="cpassword" name="cpassword" placeholder="Masukkan Konfirmasi Password"
                        {{ $disabled }}>
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
                url: "/xx88/user/update",
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
                            $('.aplay_code').load('/xx88/user',
                                function() {
                                    adjustElementSize();
                                    localStorage.setItem('lastPage',
                                        '/xx88/user');
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
            $('.aplay_code').load('/xx88/user', function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/xx88/user');
            });
        });
    });
</script>
