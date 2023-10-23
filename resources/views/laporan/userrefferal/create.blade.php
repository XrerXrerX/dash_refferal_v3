 <div class="sec_box hgi-100">
     <form action="" method="POST" enctype="multipart/form-data" id="form">
         @csrf

         <div class="sec_form">
             <div class="sec_head_form">
                 <h3>{{ $title }}</h3>
                 <span>Tambah {{ $title }}</span>
             </div>
             <div class="list_form">
                 <span class="sec_label">Username Login</span>
                 <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
             </div>
             <div class="list_form">
                 <span class="sec_label">Password</span>
                 <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
             </div>
             <div class="list_form">
                 <span class="sec_label">Userid Refferal</span>
                 <input type="text" id="userid_refferal" name="userid_refferal"
                     placeholder="Masukkan Userid Refferal" required>
             </div>
             {{-- <div class="list_form">
                 <span class="sec_label">Login Token</span>
                 <input type="text" id="login_token" name="login_token" placeholder="Masukkan Login Token" required>
             </div> --}}
             <div class="list_form">
                 <span class="sec_label">Mitra Baru</span>
                 <div class="sec_togle">
                     <input type="checkbox" id="mitra_baru" name="mitra_baru">
                     <label for="mitra_baru" class="sec_switch"></label>
                 </div>
             </div>
             <div class="list_form">
                 <span class="sec_label">Gambar Profil</span>
                 <div class="pilihan_gambar">
                     <input type="file" id="gambar_profil" name="gambar_profil" required>
                     <button type="button" class="img_gallery">Pilih Gallery</button>
                 </div>
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
                 <span class="sec_label">Nama Page</span>
                 <input type="text" id="namapage" name="namapage"
                     placeholder="Masukkan Nama Page {tidak boleh menggunakan spasi}" required>
             </div>
             <div class="list_form">
                 <span class="sec_label">Whatsapp</span>
                 <input type="text" id="whatsapp" name="whatsapp" placeholder="Masukkan Whatsapp" required>
             </div>
             <div class="list_form">
                 <span class="sec_label">Facebook</span>
                 <input type="text" id="facebook" name="facebook" placeholder="Masukkan Facebook" required>
             </div>
             <div class="list_form">
                 <span class="sec_label">Background</span>
                 <div class="pilihan_gambar">
                     <input type="text" id="bg_page" name="bg_page" readonly required>
                     <button type="button" class="img_gallery triggermodal" data-target="nilai-2">Pilih
                         Gallery</button>
                 </div>
             </div>
             <div class="list_form">
                 <span class="sec_label">Warna Tema</span>
                 <select id="color_page" name="color_page">
                     <option value="prfcto1">Hitam</option>
                     <option value="prfcto2">Ungu</option>
                     <option value="prfcto3">Oange</option>
                     <option value="prfcto4">Silver</option>
                 </select>
             </div>
             <div class="list_form">
                 <span class="sec_label">Deskripsi</span>
                 <input type="text" id="text_page" name="text_page" placeholder="Masukkan Text Page" required
                     maxlength="105">
             </div>
             <div class="list_form">
                 <span class="sec_label">Warna Tombol Daftar</span>
                 <select id="btn_daftar_color" name="btn_daftar_color">
                     <option value="btncto1">Oren</option>
                     <option value="btncto2">Hijau</option>
                     <option value="btncto3">OrenUngu</option>
                     <option value="btncto4">Pink</option>
                     <option value="btncto5">Biru</option>
                 </select>
             </div>
             <div class="list_form">
                 <span class="sec_label">Warna Tombol Login</span>
                 <select id="btn_login_color" name="btn_login_color">
                     <option value="btncto1">Oren</option>
                     <option value="btncto2">Hijau</option>
                     <option value="btncto3">OrenUngu</option>
                     <option value="btncto4">Pink</option>
                     <option value="btncto5">Biru</option>
                 </select>
             </div>
         </div>
         <div class="sec_button_form">
             <button class="sec_botton btn_submit" type="submit" id="Contactsubmit">Submit</button>
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

     // Fungsi untuk menampilkan gambar pilihan saat opsi dipilih
     // document.getElementById('background_image').addEventListener('change', function() {
     //     var selectedImage = this.options[this.selectedIndex].getAttribute('data-image');
     //     var backgroundPreview = document.getElementById('background_image_preview');
     //     backgroundPreview.innerHTML = '<img src="' + selectedImage + '" alt="Gambar Pilihan">';
     // });

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
                 url: "/userrefferal/store",
                 method: "POST",
                 data: formData,
                 processData: false,
                 contentType: false,
                 cache: false,
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

                         // Tampilkan SweetAlert untuk sukses
                         Swal.fire({
                             icon: 'success',
                             title: 'Contactikasi berhasil dikirim!',
                             showConfirmButton: false,
                             timer: 1500
                         }).then(function() {

                             // Lakukan perubahan halaman atau tindakan lainnya setelah contact berhasil dikirim
                             $('.aplay_code').load('/userrefferal',
                                 function() {
                                     adjustElementSize();
                                     localStorage.setItem('lastPage',
                                         '/userrefferal');
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
             $('.aplay_code').load('/userrefferal', function() {
                 adjustElementSize();
                 localStorage.setItem('lastPage', '/userrefferal');
             });
         });

         // Mendapatkan referensi ke elemen input
         const inputNamaPage = document.getElementById('namapage');

         // Menambahkan event listener ke elemen input saat pengguna mengetikkan karakter
         inputNamaPage.addEventListener('input', function() {
             // Mendapatkan nilai yang dimasukkan oleh pengguna
             const nilaiInput = inputNamaPage.value;

             // Menghapus spasi dari nilai input menggunakan regex
             const nilaiInputTanpaSpasi = nilaiInput.replace(/\s/g, '');

             // Jika nilai input memiliki spasi, munculkan pesan kesalahan
             if (nilaiInput !== nilaiInputTanpaSpasi) {
                 // Anda dapat menyesuaikan tindakan di sini, misalnya menampilkan pesan kesalahan atau menghapus spasi secara otomatis

                 // Atau, menghapus spasi secara otomatis dengan mengganti nilai input dengan nilai tanpa spasi
                 inputNamaPage.value = nilaiInputTanpaSpasi;
             }
         });

     });
 </script>
