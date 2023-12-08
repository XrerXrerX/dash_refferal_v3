// pencari
$(document).ready(function () {
    function addBorderPulseClass() {
        $('#daftar1').css('display', 'flex');
    }

    function fetchPemenangData() {
        $.ajax({
            url: 'pemenang',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                $('.datapencari').empty();

                function hideDigits(text) {
                    var visibleDigits = 4;
                    if (text.length <= visibleDigits) {
                        return text;
                    }
                    var hiddenDigits = text.length - visibleDigits;
                    var hiddenText = '*'.repeat(hiddenDigits);
                    var visibleText = text.slice(0, visibleDigits);
                    return visibleText + hiddenText;
                }

                for (var i = 0; i < response.length; i++) {
                    var pencari = response[i];

                    var hiddenUserId = hideDigits(pencari.userid);

                    var html = '<div class="listpencari">' +
                        '<div class="norut">' +
                        '<img src="" alt="">' +
                        '<span>' + (i + 1) + '</span>' +
                        '</div>' +
                        '<div class="grouppencari">' +
                        '<div class="isigrouppencari">' +
                        '<div class="profilepencari" style="background-image: url(\'/' + pencari.gambar_profil + '\');"></div>' +
                        '<span class="namauserid" data-userid="' + pencari.userid + '">' + hiddenUserId + '</span>' +
                        '</div>' +
                        '</div>' +
                        '<div class="totalhasilreff">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-medal-2" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">' +
                        '<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>' +
                        '<path d="M9 3h6l3 7l-6 2l-6 -2z"></path>' +
                        '<path d="M12 12l-3 -9"></path>' +
                        '<path d="M15 11l-3 -8"></path>' +
                        '<path d="M12 19.5l-3 1.5l.5 -3.5l-2 -2l3 -.5l1.5 -3l1.5 3l3 .5l-2 2l.5 3.5z"></path>' +
                        '</svg>' +
                        '<span class="datatotalreff">' + pencari.downline_aktif + '</span>' +
                        '</div>' +
                        '</div>';

                    $('.datapencari').append(html);
                }

                $(".listpencari .norut span").each(function () {
                    var nilai = $(this).text();
                    var imgSrc = "";

                    if (nilai === "1") {
                        imgSrc = "front/img/crown-l21.png";
                    } else if (nilai === "2") {
                        imgSrc = "front/img/crown-silver-l21.png";
                    } else if (nilai === "3") {
                        imgSrc = "front/img/crown-bronze-l21.png";
                    } else {
                        imgSrc = "front/img/crown-other-l21.png";
                    }

                    $(this).siblings("img").attr("src", imgSrc);
                });

                // Pencarian
                $('#searchUserid').on('input', function () {
                    var searchText = $(this).val().toLowerCase();
                    var $listPencari = $('.listpencari');

                    $listPencari.hide();
                    $listPencari.each(function () {
                        var userId = $(this).find('.namauserid').data('userid').toLowerCase();

                        if (userId.indexOf(searchText) !== -1) {
                            $(this).show();
                        }
                    });

                    var $noResultElem = $('.no-result');

                    if ($listPencari.filter(':visible').length === 0 && searchText.trim() !== '') {
                        if ($noResultElem.length === 0) {
                            var noResultHtml = '<div class="listpencari no-result">' +
                                '<div class="norut">' +
                                '<button class="buttonprim triggermodal tidakada" data-target="daftar1"><i class="fas fa-user"></i>DAFTAR</button>' +
                                '</div>' +
                                '<div class="grouppencari">' +
                                '<div class="isigrouppencari" style="width: 100%; justify-content: center;">' +
                                '<div class="profilepencari kosong" style="background-image: url(\'front/img/photo-profile/anonymous.png\');"></div>' +
                                '<span class="namauserid" data-userid="">Belum menjadi Mitra</span>' +
                                '</div>' +
                                '</div>' +
                                '<div class="totalhasilreff">' +
                                '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-medal-2" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">' +
                                '<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>' +
                                '<path d="M9 3h6l3 7l-6 2l-6 -2z"></path>' +
                                '<path d="M12 12l-3 -9"></path>' +
                                '<path d="M15 11l-3 -8"></path>' +
                                '<path d="M12 19.5l-3 1.5l.5 -3.5l-2 -2l3 -.5l1.5 -3l1.5 3l3 .5l-2 2l.5 3.5z"></path>' +
                                '</svg>' +
                                '<span class="datatotalreff">No Data</span>' +
                                '</div>' +
                                '</div>';

                            $noResultElem = $(noResultHtml);
                            $('.datapencari').append($noResultElem);
                        } else {
                            $noResultElem.find('.namauserid').attr('data-userid', '');
                        }

                        $noResultElem.show();
                    } else {
                        $noResultElem.hide();
                    }
                });
            },
            error: function (xhr, status, error) {
                console.log('Terjadi kesalahan saat melakukan permintaan AJAX: ' + status + ', ' + error);
            }
        });
    }

    $(document).on('click', 'button[data-target="daftar1"]', function () {
        addBorderPulseClass();
    });

    fetchPemenangData();
});
// pencari

// footer
$(document).ready(function () {
    $.ajax({
        url: 'footer',
        type: 'GET',
        success: function (response) {
            $('#footer').html(response);
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
});

// gaji
$(document).ready(function () {
    $.ajax({
        url: 'gaji',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            var data = response;

            data.forEach(function (item) {
                if (item !== null) {
                    var jumaktif = item.member_aktif;
                    var gajibulan = 'Rp ' + parseFloat(item.gaji_bulan).toLocaleString() + ',-';

                    var cardHTML = `
            <div class="cardmemberaktif">
            <div class="totalaktif">
                <div class="mmbraktif">
                <span class="jumaktif">${jumaktif}</span>
                <span class="downakt">Member aktif</span>
                </div>
            </div>
            <p>${gajibulan}</p>
            <button class="buttonprim triggermodal" data-target="daftar1"><i class="fas fa-user"></i>DAFTAR</button>
            </div>
        `;

                    $('.gajirefferal').append(cardHTML);
                }
            });
        },
        error: function () {
            console.log('Terjadi kesalahan dalam melakukan request');
        }
    });

    $('.gajirefferal').on('click', '.triggermodal[data-target="daftar1"]', function () {
        var target = $(this).data('target');
        $('#' + target).css('display', 'flex');
    });
});

//ketentuan_syarat
$(document).ready(function () {
    $.ajax({
        url: "syarat_ketentuan",
        dataType: "json",
        success: function (data) {
            $.each(data, function (index, item) {
                if (item !== null) {
                    var divElement = $("<div>").addClass("datasyaratketentuan");
                    var iconSyarat = item.icon_syarat;
                    var deskSyarat = item.desk_syarat;

                    var pElement = $("<p>").text(deskSyarat);
                    divElement.append(iconSyarat);
                    divElement.append(pElement);

                    if (item.type_aturan === "syarat") {
                        $(".listsyarat.syarat h3").after(divElement);
                    } else if (item.type_aturan === "ketentuan") {
                        $(".listsyarat.ketentuan h3").after(divElement);
                    }
                }
            });
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
});


//login
$(document).ready(function () {
    $('#formlogin').submit(function (event) {
        event.preventDefault();

        var username = $('#username').val();
        var password = $('#password').val();
        var _token = $('#csrf-token').val();

        $.ajax({
            url: 'loginfront',
            method: 'POST',
            data: {
                _token: _token,
                login: true,
                username: username,
                password: password
            },
            success: function (response) {
                if (response === 'success') {
                    window.location.href = "/halaman_mitra";
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Gagal',
                        text: 'User ID atau password Salah.',
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Terjadi kesalahan saat melakukan login.',
                });
            }
        });
    });

    $('#togglePassword').click(function () {
        var passwordInput = $('#password');
        var passwordFieldType = passwordInput.attr('type');

        if (passwordFieldType === 'password') {
            passwordInput.attr('type', 'text');
        } else {
            passwordInput.attr('type', 'password');
        }
    });
});

// profile
$(document).ready(function () {
    var useridRefferal = $('#userid_refferal').val();

    $.ajax({
        url: 'pemenang',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            var pemenang = response;
            pemenang.sort(function (a, b) {
                return b.downline_aktif - a.downline_aktif;
            });

            var urutanPeringkat = -1;
            var refferal = 0;

            for (var i = 0; i < pemenang.length; i++) {
                if (pemenang[i].userid === useridRefferal) {
                    urutanPeringkat = i + 1;
                    refferal = pemenang[i].refferal;
                    break;
                }
            }

            if (urutanPeringkat !== -1) {
                $('.peringkat').text(urutanPeringkat);
                $('#totalreffreport').text(refferal);
            } else {
                $('.peringkat').text('User ID tidak ditemukan');
                $('#totalreffreport').text('-');
            }
        },
        error: function () {
            $('.peringkat').text('Terjadi kesalahan saat memeriksa peringkat');
            $('#totalreffreport').text('Terjadi kesalahan saat mengambil nilai refferal');
        }
    });
});

//update password
$(document).ready(function () {
    $('#gantipass').click(function (e) {
        e.preventDefault();
        var newPassword = $('#password').val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'POST',
            url: 'update_password',
            data: {
                _token: csrfToken,
                newPassword: newPassword
            },
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Data Diperbarui',
                    text: 'Password Anda telah berhasil diperbarui.',
                }).then(function () {
                    location.reload();
                });
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Terjadi kesalahan saat memperbarui password.',
                });
            }
        });
    });
});

//update page
$(document).ready(function () {
    $('#gantipage').click(function (e) {
        e.preventDefault();
        var newPageName = $('#namapage').val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: 'update_page',
            data: {
                _token: csrfToken,
                newPageName: newPageName
            },
            success: function (response) {
                if (response === "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Data Diperbarui',
                        text: 'Nama Profile Page Anda telah berhasil diperbarui.'
                    }).then(function () {
                        location.reload();
                    });
                } else if (response === "duplicate") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'Nama Profile Page sudah digunakan. Silakan pilih nama lain.'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'Terjadi kesalahan saat memperbarui data.'
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Terjadi kesalahan saat memperbarui data.'
                });
            }
        });
    });
});


//update wa
$(document).ready(function () {
    $('#gantiwa').click(function (e) {
        e.preventDefault();
        var newWa = $('#whatsapp').val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: 'update_wa',
            data: {
                _token: csrfToken,
                newWa: newWa
            },
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Data Diperbarui',
                    text: 'Nomor Whatsapp Anda telah berhasil diperbarui.'
                }).then(function () {
                    location.reload();
                });
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Terjadi kesalahan saat memperbarui data.'
                });
            }
        });
    });
});

//update facebook
$(document).ready(function () {
    $('#gantifb').click(function (e) {
        e.preventDefault();
        var newFb = $('#facebook').val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: 'update_fb',
            data: {
                _token: csrfToken,
                newFb: newFb
            },
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Data Diperbarui',
                    text: 'Link Facebook Anda telah berhasil diperbarui.'
                }).then(function () {
                    location.reload();
                });
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Terjadi kesalahan saat memperbarui data.'
                });
            }
        });
    });
});

//update background
$(document).ready(function () {
    $('.bg-radio').on('click', function () {
        $('#bg_page').val($(this).val());
    });

    $('#bgForm').submit(function (e) {
        e.preventDefault();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var formData = new FormData(this);
        formData.append('_token', csrfToken);

        $.ajax({
            type: 'POST',
            url: 'e',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.trim() === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Data Diperbarui',
                        text: 'Background Anda telah berhasil diperbarui.'
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'Terjadi kesalahan saat memperbarui data.'
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Terjadi kesalahan saat memperbarui data.'
                });
            }
        });
    });
});

//update Color Page
$(document).ready(function () {
    $('.tema-radio').on('click', function () {
        $('#color_page').val($(this).val());
    });

    $('#colorpage').submit(function (e) {
        e.preventDefault();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var formData = new FormData(this);
        formData.append('_token', csrfToken);

        $.ajax({
            type: 'POST',
            url: 'update_colorpage',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.trim() === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Data Diperbarui',
                        text: 'Warna TEMA Anda telah berhasil diperbarui.'
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'Terjadi kesalahan saat memperbarui data.'
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Terjadi kesalahan saat memperbarui data.'
                });
            }
        });
    });
});

//update text page
$(document).ready(function () {
    $('#gantitextpage').click(function (e) {
        e.preventDefault();
        var newPageName = $('#text_page').val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: 'update_textpage',
            data: {
                _token: csrfToken,
                newPageName: newPageName
            },
            success: function (response) {
                if (response === "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Data Diperbarui',
                        text: 'Deskripsi halaman Anda telah berhasil diperbarui.'
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'Terjadi kesalahan saat memperbarui data.'
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Terjadi kesalahan saat memperbarui data.'
                });
            }
        });
    });
});

//update button daftar color
$(document).ready(function () {
    $('.daftar-color-radio').on('click', function () {
        $('#btn_daftar_color').val($(this).val());
    });

    $('#btndaftarcolor').submit(function (e) {
        e.preventDefault();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var formData = new FormData(this);
        formData.append('_token', csrfToken);

        $.ajax({
            type: 'POST',
            url: 'update_daftar_color',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.trim() === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Data Diperbarui',
                        text: 'WARNA BUTTON DAFTAR Anda telah berhasil diperbarui.'
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'Terjadi kesalahan saat memperbarui data.'
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Terjadi kesalahan saat memperbarui data.'
                });
            }
        });
    });
});

//update button login color
$(document).ready(function () {
    $('.login-color-radio').on('click', function () {
        $('#btn_login_color').val($(this).val());
    });

    $('#btnlogincolor').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: 'update_login_color',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.trim() === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Data Diperbarui',
                        text: 'WARNA BUTTON LOGIN Anda telah berhasil diperbarui.'
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'Terjadi kesalahan saat memperbarui data.'
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Terjadi kesalahan saat memperbarui data.'
                });
            }
        });
    });
});

// update gambar profile
$(document).ready(function () {
    $("#gambarprofileForm").submit(function (event) {
        event.preventDefault();

        var fileInput = $("#gambar_profil")[0];
        var selectedImage = fileInput.files[0];
        var timestamp = new Date().getTime();

        if (!selectedImage) {
            showErrorAlert("Please select an image.");
            return;
        }

        var allowedTypes = ["image/png", "image/jpeg", "image/jpg"];
        if (!allowedTypes.includes(selectedImage.type)) {
            showErrorAlert("Format yang mendukung hanya (PNG, JPEG, JPG).");
            return;
        }

        var maxSizeInBytes = 500 * 1024;
        if (selectedImage.size > maxSizeInBytes) {
            showErrorAlert("Mohon Upload gambar dengan ukuran kurang dari 500KB.");
            return;
        }

        var formData = new FormData();
        var dataNama = $("#gambarprofileForm").data("nama");
        var uniqueFilename = dataNama + "_" + timestamp + "_" + selectedImage.name;
        formData.append("gambar_profil", selectedImage, uniqueFilename);

        var img = new Image();
        img.onload = function () {
            var canvas = document.createElement("canvas");
            var ctx = canvas.getContext("2d");

            var canvasWidth = 640;
            var canvasHeight = 640;
            canvas.width = canvasWidth;
            canvas.height = canvasHeight;

            var aspectRatio = img.width / img.height;

            var cropWidth = 0;
            var cropHeight = 0;
            if (aspectRatio > 1) {
                cropWidth = img.height * (canvasWidth / canvasHeight);
                cropHeight = img.height;
            } else {
                cropWidth = img.width;
                cropHeight = img.width * (canvasHeight / canvasWidth);
            }

            var startX = (img.width - cropWidth) / 2;
            var startY = (img.height - cropHeight) / 2;

            ctx.drawImage(img, startX, startY, cropWidth, cropHeight, 0, 0, canvasWidth, canvasHeight);

            canvas.toBlob(function (croppedBlob) {
                formData.set("gambar_profil", croppedBlob, uniqueFilename);
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                formData.append('_token', csrfToken);
                $.ajax({
                    url: "update_profile_image",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log(response);
                        if (response === "success") {
                            console.log("Image updated successfully.");
                            $("img").attr("src", "xx88/images/user_refferal_img/" + uniqueFilename);
                            location.reload();
                        } else {
                            console.log("Error updating image.");
                        }
                    },
                    error: function () {
                        console.log("Error occurred during the update process.");
                    },
                });
            }, "image/jpeg", 0.9);
        };

        img.src = URL.createObjectURL(selectedImage);
    });

    $("#gantigambarprofile").click(function () {
        $("#gambarprofileForm").submit();
    });
});

function showErrorAlert(message) {
    Swal.fire({
        icon: "error",
        title: "Error",
        text: message,
    });
}

// shorten
$(document).ready(function () {
    $(document).ready(function () {
        $("#proses_shorten").on("click", function () {
            var url = $("#paste_link").val();

            if (url.trim() === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Silahkan isi URL terlebih dahulu.',
                });
                $("#paste_link").addClass("borderpulse");
                return;
            }

            if (!url.toLowerCase().startsWith("https://") && !url.toLowerCase().startsWith("http://")) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Mohon masukkan link yang valid atau wajib menggunakan https://',
                });
                $("#paste_link").addClass("borderpulse");
                return;
            }

            $.ajax({
                url: "shorten/",
                type: "GET",
                data: { url: url },
                success: function (data) {
                    $("#short_linklama").val(url);
                    $("#conv_hasil").val(data);
                    $(".hasil_short").addClass("grid").hide().fadeIn(400, function () {
                        showSuccessAlert();
                    });
                    $(".group_clear").fadeToggle(400);
                    $("#paste_link").removeClass("borderpulse");
                }
            });
        });
    });

    $("#clear_isi").on("click", function () {
        $("#paste_link").val('');
        $(".hasil_short").fadeOut(300, function () {
            $(this).removeClass("grid");
        });
        $(".group_clear").fadeOut(300);
    });

    $(".hasil_short").hide();

    $(".list_histori #copy_shrt_his").on("click", function () {
        var shortenData = $(this).closest(".list_histori").find("#shorten_data").text();
        copyToClipboard(shortenData);
        showCopy1Alert();
    });
});

function showSuccessAlert() {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: 'Link berhasil di-shorten',
        timer: 1500
    });
}
function showCopy1Alert() {
    Swal.fire({
        icon: 'success',
        title: 'Copy!',
        text: 'Link copy',
        timer: 1500
    });
}

// shorten
$(document).ready(function () {
    $(".hapus_shorten").on("click", function () {
        var id = $(this).data("id");
        var token = $('meta[name="csrf-token"]').attr('content');

        Swal.fire({
            icon: 'warning',
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin menghapus link ini?',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {

            if (result.isConfirmed) {
                $.ajax({
                    url: "hapus_shorten/" + id,
                    type: "GET",
                    success: function (data) {
                        if (data === "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Link berhasil dihapus.',
                                timer: 1500
                            }).then(() => {
                                location.reload();
                            });

                            $(this).closest(".list_histori").remove();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terjadi kesalahan saat menghapus link.',
                            });
                        }
                    }
                });
            }
        });
    });
});

$(document).ready(function () {
    $(".histori_shorten .list_histori").first().prepend('<span class="his_new">Last Shorten</span>');
});

const listHistoriItems = document.querySelectorAll(".list_histori");
function animateListHistori(index) {
    if (index >= listHistoriItems.length) {
        return;
    }
    const item = listHistoriItems[index];
    item.classList.add("animate-list-histori");
    setTimeout(() => {
        animateListHistori(index + 1);
    }, 300);
}
animateListHistori(0);

// POPUP BANNER
$(document).ready(function () {
    $.ajax({
        url: "popup",
        type: "GET",
        dataType: "html",
        success: function (response) {
            $("#popup_banner").html(response);
        },
        error: function (xhr, status, error) {
            console.log("Terjadi kesalahan saat memuat file popup:", error);
        }
    });
});

