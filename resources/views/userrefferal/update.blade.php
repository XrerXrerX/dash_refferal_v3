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
                    <span class="sec_label">Username</span>
                    <input type="text" id="username" name="username[]" placeholder="Masukkan Username" required
                        {{ $disabled }} value="{{ $item->username }}">
                </div>
                <div class="list_form">
                    <span class="sec_label">Password</span>
                    <input type="password" id="password" name="password[]"
                        placeholder="Masukkan Password Jika ingin mengganti nya (Kosongkan saja jika tidak ingin mengganti password)"
                        {{ $disabled }}>
                </div>
                <div class="list_form">
                    <span class="sec_label">Userid Refferal</span>
                    <input type="text" id="userid_refferal" name="userid_refferal[]"
                        placeholder="Masukkan Userid Refferal" required {{ $disabled }}
                        value="{{ $item->userid_refferal }}">
                </div>
                {{-- <div class="list_form">
                    <span class="sec_label">Login Token</span>
                    <input type="text" id="login_token" name="login_token[]" placeholder="Masukkan Login Token"
                        required {{ $disabled }} value="{{ $item->login_token }}">
                </div> --}}
                <div class="list_form">
                    <span class="sec_label">Mitra Baru</span>
                    <div class="sec_togle">
                        <input type="checkbox" id="mitra_baru_{{ $index }}" name="mitra_baru[]"
                            {{ $disabled }} {{ $item->mitra_baru == '1' ? 'checked' : '' }}>
                        <label for="mitra_baru_{{ $index }}" class="sec_switch"></label>
                    </div>
                </div>

                <div class="list_form">
                    <span class="sec_label">Gambar Profil</span>
                    <div class="pilihan_gambar">
                        <input type="file" id="gambar_profil" name="gambar_profil[]" {{ $disabled }}>
                        <button type="button" class="img_gallery">Pilih Gallery</button>
                    </div>
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
                    <span class="sec_label">Nama Page</span>
                    <input type="text" id="namapage" name="namapage[]" placeholder="Masukkan Nama Page" required
                        {{ $disabled }} value="{{ $item->namapage }}">
                </div>
                <div class="list_form">
                    <span class="sec_label">Whatsapp</span>
                    <input type="text" id="whatsapp" name="whatsapp[]" placeholder="Masukkan Whatsapp" required
                        {{ $disabled }} value="{{ $item->whatsapp }}">
                </div>
                <div class="list_form">
                    <span class="sec_label">Facebook</span>
                    <input type="text" id="facebook" name="facebook[]" placeholder="Masukkan Facebook" required
                        {{ $disabled }} value="{{ $item->facebook }}">
                </div>
                <div class="list_form">
                    <span class="sec_label">Background Page</span>
                    <div class="pilihan_gambar">
                        <input type="text" id="bg_page" name="bg_page[]" readonly required {{ $disabled }}
                            value={{ $item->bg_page }}>
                        <button type="button" class="img_gallery triggermodal" data-target="nilai-2">Pilih
                            Gallery</button>
                    </div>
                </div>
                <div class="list_form">
                    <span class="sec_label">Website</span>
                    <select id="color_page" name="color_page[]" {{ $disabled }}>
                        <option value="prfcto1" {{ $item->color_page == 'prfcto1' ? 'selected' : '' }}>Hitam
                        </option>
                        <option value="prfcto2" {{ $item->color_page == 'prfcto2' ? 'selected' : '' }}>Ungu
                        </option>
                        <option value="prfcto3" {{ $item->color_page == 'prfcto3' ? 'selected' : '' }}>Orange
                        </option>
                        <option value="prfcto4" {{ $item->color_page == 'prfcto4' ? 'selected' : '' }}>Silver
                        </option>
                    </select>
                </div>
                <div class="list_form">
                    <span class="sec_label">Text Page</span>
                    <input type="text" id="text_page" name="text_page[]" placeholder="Masukkan Text Page"
                        required {{ $disabled }} value="{{ $item->text_page }}" maxlength="105">
                </div>
                <div class="list_form">
                    <span class="sec_label">Warna Button Daftar</span>
                    <select id="btn_daftar_color" name="btn_daftar_color[]" {{ $disabled }}>
                        <option value="btncto1" {{ $item->btn_daftar_color == 'btncto1' ? 'selected' : '' }}>Orange
                        </option>
                        <option value="btncto2" {{ $item->btn_daftar_color == 'btncto2' ? 'selected' : '' }}>Green
                        </option>
                        <option value="btncto3" {{ $item->btn_daftar_color == 'btncto3' ? 'selected' : '' }}>
                            Orangeungu
                        </option>
                        <option value="btncto4" {{ $item->btn_daftar_color == 'btncto4' ? 'selected' : '' }}>Pink
                        </option>
                        <option value="btncto5" {{ $item->btn_daftar_color == 'btncto5' ? 'selected' : '' }}>Biru
                        </option>
                    </select>
                </div>
                <div class="list_form">
                    <span class="sec_label">Warna Button Daftar</span>
                    <select id="btn_login_color" name="btn_login_color" {{ $disabled }}>
                        <option value="btncto1" {{ $item->btn_login_color == 'btncto1' ? 'selected' : '' }}>Orange
                        </option>
                        <option value="btncto2" {{ $item->btn_login_color == 'btncto2' ? 'selected' : '' }}>Green
                        </option>
                        <option value="btncto3" {{ $item->btn_login_color == 'btncto3' ? 'selected' : '' }}>Orangeungu
                        </option>
                        <option value="btncto4" {{ $item->btn_login_color == 'btncto4' ? 'selected' : '' }}>Pink
                        </option>
                        <option value="btncto5" {{ $item->btn_login_color == 'btncto5' ? 'selected' : '' }}>Biru
                        </option>
                    </select>
                </div>
            </div>
        @endforeach
        <div class="sec_button_form">
            <button class="sec_botton btn_submit" type="submit" id="Contactsubmit"
                {{ $disabled }}>Submit</button>
            <a href="#" id="cancel"><button type="button"
                    class="sec_botton btn_cancel">Cancel</button></a>
        </div>
    </form>
</div>
<div id="nilai-2" class="sec_modal"
    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);">
    <div class="componen_modal">
        <span class="closemodal" onclick="closeModal()">X</span>
        <div class="body_modal">
            <h3>Pilih Background</h3>
            <div class="list_form">
                <div class="list_form">
                    <div class="pilihan_gambar">
                        <img src="{{ asset('img/background/dark1.png') }}" alt="Deskripsi gambar"
                            onclick="selectImage(this)" style="width: 100px; height: 100px;">
                        <img src="{{ asset('img/background/dark2.png') }}" alt="Deskripsi gambar"
                            onclick="selectImage(this)" style="width: 100px; height: 100px;">
                        <img src="{{ asset('img/background/dark3.png') }}" alt="Deskripsi gambar"
                            onclick="selectImage(this)" style="width: 100px; height: 100px;">
                        <img src="{{ asset('img/background/dark4.png') }}" alt="Deskripsi gambar"
                            onclick="selectImage(this)" style="width: 100px; height: 100px;">
                        <img src="{{ asset('img/background/dark5.png') }}" alt="Deskripsi gambar"
                            onclick="selectImage(this)" style="width: 100px; height: 100px;">
                    </div>
                    <button type="button" onclick="showSelectedImageLocation()">Tampilkan Lokasi Gambar</button>
                </div>
            </div>
        </div>
    </div>
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

    function closeModal() {
        document.getElementById('nilai-2').style.display = 'none';
    }

    var selectedImage = null;

    function selectImage(imageElement) {
        if (selectedImage) {
            selectedImage.style.border = 'none'; // Clear border from the previously selected image
        }

        if (selectedImage === imageElement) {
            selectedImage = null; // Deselect the image if it was already selected
        } else {
            selectedImage = imageElement;
            selectedImage.style.border = '5px solid white'; // Apply red border to the selected image
        }
    }

    function showSelectedImageLocation() {
        if (selectedImage) {
            const imageURL = selectedImage.src;
            const endpoint = imageURL.substring(imageURL.lastIndexOf('/') + 1);
            document.getElementById('bg_page').value = endpoint;
            closeModal(); // Optional: Close the modal after setting the endpoint
        } else {
            alert("Pilih sebuah gambar terlebih dahulu.");
        }
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
                url: "/xx88/userrefferal/update",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(result) {
                    if (result.errors) {
                        var errorMessages = result.errors.join('<br>');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: 'Terjadi kesalahan:<br>' + errorMessages,
                            showCloseButton: true // Tambahkan opsi ini untuk mengaktifkan interpretasi kode HTML
                        });
                    } else {
                        $('.alert-danger').hide();

                        Swal.fire({
                            icon: 'success',
                            title: 'Contactikasi berhasil dikirim!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            $('.aplay_code').load('/xx88/userrefferal',
                                function() {
                                    adjustElementSize();
                                    localStorage.setItem('lastPage',
                                        '/xx88/userrefferal');
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
            $('.aplay_code').load('/xx88/userrefferal', function() {
                adjustElementSize();
                localStorage.setItem('lastPage', '/xx88/userrefferal');
            });
        });
    });
</script>
