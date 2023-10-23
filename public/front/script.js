document.addEventListener("DOMContentLoaded", function() {
    var audioBackground = document.createElement("audio");
    audioBackground.loop = true;
    // audioBackground.src = "front/sound/backsound-2-l21.mp3";
    audioBackground.volume = 0.3;
    document.addEventListener("click", function() {
    audioBackground.play();
    document.removeEventListener("click", arguments.callee);
});
document.body.appendChild(audioBackground);

$(document).on('mouseenter', 'a', function() {
    playSound("front/sound/mousehouver.mp3");
});

$(document).on('mouseleave', 'a', function() {
    pauseSound("front/sound/mousehouver.mp3");
});

$(document).on('mouseenter', '.providerlistredd img', function() {
    playSound("front/sound/mousehouver.mp3");
});

$(document).on('mouseleave', '.providerlistredd img', function() {
    pauseSound("front/sound/mousehouver.mp3");
});

$(document).on('mouseenter', 'button', function() {
    playSound("front/sound/mousehouver.mp3");
});

$(document).on('mouseleave', 'button', function() {
    pauseSound("front/sound/mousehouver.mp3");
});

$(document).on('mouseenter', '.triggermodal', function() {
    playSound("front/sound/mousehouver.mp3");
});

$(document).on('mouseleave', '.triggermodal', function() {
    pauseSound("front/sound/mousehouver.mp3");
});

$(document).on('mouseenter', '.cardmemberaktif', function() {
    playSound("front/sound/tik-sound.mp3");
});

$(document).on('mouseleave', '.cardmemberaktif', function() {
    pauseSound("front/sound/tik-sound.mp3");
});

$(document).on('mouseenter', '.part1bnsreff', function() {
    playSound("front/sound/tik-sound.mp3");
});

$(document).on('mouseleave', '.part1bnsreff', function() {
    pauseSound("front/sound/tik-sound.mp3");
});

$(document).on('mouseenter', '.listpencari', function() {
    playSound("front/sound/tik-sound.mp3");
});

$(document).on('mouseleave', '.listpencari', function() {
    pauseSound("front/sound/tik-sound.mp3");
});

$(document).on('mouseenter', '.contentwebredd', function() {
    playSound("front/sound/tik-sound.mp3");
});

$(document).on('mouseleave', '.contentwebredd', function() {
    pauseSound("front/sound/tik-sound.mp3");
});

$(document).on('mouseenter', '.showmenu', function() {
    playSound("front/sound/tik-sound.mp3");
});

$(document).on('mouseleave', '.showmenu', function() {
    pauseSound("front/sound/tik-sound.mp3");
});

$(document).on('mouseenter', '.navprofile', function() {
    playSound("front/sound/tik-sound.mp3");
});

$(document).on('mouseleave', '.navprofile', function() {
    pauseSound("front/sound/tik-sound.mp3");
});

$(document).on('click', 'a', function() {
    playSound("front/sound/buttonclikc.mp3");
});

$(document).on('click', 'button', function() {
    playSound("front/sound/buttonclikc.mp3");
});

$(document).on('click', '.triggermodal', function() {
    playSound("front/sound/buttonclikc.mp3");
});

$(document).on('click', '.editdatareff', function() {
    playSound("front/sound/buttonclikc.mp3");
});

$(document).on('click', '.closemodal', function() {
    playSound("front/sound/back-button.mp3");
});


function playSound(soundSrc) {
    var sound = new Audio(soundSrc);
    sound.volume = 1;
    sound.play();
}

function pauseSound(soundSrc) {
    var sound = new Audio(soundSrc);
    sound.pause();
    sound.currentTime = 0;
}
});


$(document).ready(function() {
var soundUrl = 'front/sound/warning.mp3';
var audioElement = $('<audio>').attr('src', soundUrl);
audioElement[0].volume = 1;

    $(document).one('DOMNodeInserted', '.swal2-shown.swal2-height-auto', function(e) {
    audioElement[0].play();
    });
});

document.addEventListener('DOMContentLoaded', function() {
var menuLinks = document.querySelectorAll('.heed a');
menuLinks.forEach(function(link) {
    link.addEventListener('click', function(e) {
    e.preventDefault();
    var target = this.getAttribute('href');
    var targetElement = document.querySelector(target);
    if (targetElement) {
        smoothScroll(targetElement, 1000, -100);
    }
    });
});

function smoothScroll(target, duration, offset) {
    var targetPosition = target.offsetTop + offset;
    var startPosition = window.pageYOffset;
    var distance = targetPosition - startPosition;
    var startTime = null;

    function scrollAnimation(currentTime) {
    if (startTime === null) {
        startTime = currentTime;
    }
    var timeElapsed = currentTime - startTime;
    var scrollProgress = ease(timeElapsed, startPosition, distance, duration);
    window.scrollTo(0, scrollProgress);
    if (timeElapsed < duration) {
        requestAnimationFrame(scrollAnimation);
    }
    }

    function ease(t, b, c, d) {
    t /= d;
    return c * t * t * t * t + b;
    }

    requestAnimationFrame(scrollAnimation);
}
});

// refferal reward
function getRandomInitialTotal() {
    var minInitialTotal = 3756325157;
    var maxInitialTotal = 10012325357;
    return Math.floor(Math.random() * (maxInitialTotal - minInitialTotal + 1)) + minInitialTotal;
}

function saveInitialData() {
    var initialTotal = getRandomInitialTotal();
    localStorage.setItem("initialTotal", initialTotal);
}

function resetDataToInitial() {
    var initialTotal = localStorage.getItem("initialTotal");
    localStorage.setItem("currentTotal", initialTotal);
    localStorage.setItem("lastUpdated", new Date().getTime());
}

function resetDataToInitial() {
    var initialTotal = localStorage.getItem("initialTotal");
    localStorage.setItem("currentTotal", initialTotal);
    localStorage.setItem("lastUpdated", new Date().getTime());
}

function updateTotalReff() {
    var currentTotal = localStorage.getItem("currentTotal") || 3756325157;
    var lastUpdatedTime = localStorage.getItem("lastUpdated");
    var currentTime = new Date().getTime();

    if (!lastUpdatedTime || currentTime - lastUpdatedTime >= 86400000) {
        resetDataToInitial();
        currentTotal = localStorage.getItem("currentTotal");
    }

    var totalreffElement = $(".totalreff");
    var randomValueElement = $(".randomValue");

    totalreffElement.text("IDR " + currentTotal.toLocaleString("id-ID", {minimumFractionDigits: 0}) + ",-");

    function updateRandomValue() {
        var randomValue = Math.floor(Math.random() * (5000000 - 1000 + 1)) + 1000;
        currentTotal = parseInt(currentTotal) + randomValue;
        localStorage.setItem("currentTotal", currentTotal);

        randomValueElement.text("+" + randomValue.toLocaleString("id-ID", {minimumFractionDigits: 0}) + ",-")
            .fadeIn(500)
            .delay(1500)
            .fadeOut(500);

        totalreffElement
            .prop("number", currentTotal - randomValue)
            .animateNumber({
                number: currentTotal,
                numberStep: function(now, tween) {
                    var formattedValue = "IDR " + Math.round(now).toLocaleString("id-ID", {minimumFractionDigits: 0}) + ",-";
                    $(tween.elem).text(formattedValue);
                }
            }, 1000);

        var randomInterval = Math.floor(Math.random() * (5000 - 1000 + 1)) + 1000;
        setTimeout(updateRandomValue, randomInterval);
    }

    updateRandomValue();
}

$(document).ready(function() {
    saveInitialData();
    updateTotalReff();
});

// modal
$(document).ready(function() {
    var audio = new Audio('front/sound/popup-l21.mp3');
    var audioType = new Audio('front/sound/type-sound.mp3');
    var typeTimers = {};

    function startTyper(target) {
        var text = $(target).find('.speechinti').data('text');
        var currentChar = 0;
        typeTimers[target] = setInterval(function() {
            var currentText = text.substr(0, currentChar);
            $(target).find('.speechinti').text(currentText);
            currentChar++;
            if (currentChar > text.length) {
                clearInterval(typeTimers[target]);
                audioType.pause();
                audioType.currentTime = 0;
            } else {
                audioType.play();
            }
        }, 50);
    }

    function resetTyper(target) {
        clearInterval(typeTimers[target]);
        $(target).find('.speechinti').empty();
    }

    function resetTyper(target) {
        clearInterval(typeTimers[target]);
        $(target).find('.speechinti').empty();
    }

    $('.triggermodal').click(function() {
        var target = $(this).data('target');
        $('#' + target).css('display', 'flex');
        resetTyper('#' + target);
        setTimeout(function() {
            resetTyper('#' + target);
            startTyper('#' + target);
            if ($('#' + target).css('display') === 'flex') {
                audio.play();
            }
        }, 1000);
    });

    $('.closemodal').click(function() {
        var target = $(this).closest('.modaljojo');
        target.css('display', 'none');
        resetTyper('#' + target.attr('id'));
        audioType.pause();
        audioType.currentTime = 0;
    });

    // $(document).mouseup(function(e) {
    //     var modal = $('.komponenmodal');
    //     if (!modal.is(e.target) && modal.has(e.target).length === 0) {
    //         $('.modaljojo').css('display', 'none');
    //         resetTyper('.modaljojo');
    //         audioType.pause();
    //         audioType.currentTime = 0;
    //     }
    // });

    var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.attributeName === 'style') {
                var modaljojo = mutation.target;
                var modaljojoDisplay = $(modaljojo).css('display');
                if (modaljojoDisplay === 'none') {
                    $(modaljojo).find('.speechinti').css('display', 'none');
                    resetTyper('#' + modaljojo.id);
                    audioType.pause();
                    audioType.currentTime = 0;
                } else {
                    $(modaljojo).find('.speechinti').css('display', 'flex');
                    resetTyper('#' + modaljojo.id);
                    setTimeout(function() {
                        resetTyper('#' + modaljojo.id);
                        startTyper('#' + modaljojo.id);
                        if (modaljojoDisplay === 'flex') {
                            audio.play();
                        }
                    }, 1000);
                }
            }
        });
    });

    $('.modaljojo').each(function() {
        var modaljojo = this;
        var speechinti = $(modaljojo).find('.speechinti');
        speechinti.data('text', speechinti.text());
        observer.observe(modaljojo, { attributes: true });
    });
});

// kirim data
$(document).ready(function() {
    $('.modaljojo #kirim').click(function(e) {
        e.preventDefault();

        var modalId = $(this).closest('.modaljojo').attr('id');
        var website = $('#' + modalId + ' #website').val();
        var userid = $('#' + modalId + ' #userid').val();
        var pengalaman = $('#' + modalId + ' input[name="pengalaman"]:checked').val();
        var nohp = $('#' + modalId + ' #nohp').val();
        var setuju = $('#' + modalId + ' #setuju').prop('checked');
        var deskpengalaman = $('#' + modalId + ' #deskpengalaman').val();

        var isDataComplete = true;
        var incompleteFields = [];

        if (website === '' || website === 'pilih website') {
            isDataComplete = false;
            incompleteFields.push('Website');
            $('#' + modalId + ' #website').addClass('borderpulse');
        }

        if (userid === '') {
            isDataComplete = false;
            incompleteFields.push('User ID');
            $('#' + modalId + ' #userid').addClass('borderpulse');
        }

        if (pengalaman === undefined) {
            isDataComplete = false;
            incompleteFields.push('pengalaman');
            $('#' + modalId + ' input[name="pengalaman"]').addClass('borderpulse');
        }

        if (nohp === '') {
            isDataComplete = false;
            incompleteFields.push('No HP/WA');
            $('#' + modalId + ' #nohp').addClass('borderpulse');
        }

        if (pengalaman === 'sudah berpengalaman') {
            if (deskpengalaman === '') {
                isDataComplete = false;
                incompleteFields.push('Deskripsi Pengalaman');
                $('#' + modalId + ' #deskpengalaman').addClass('borderpulse');
            }
        }

        if (!setuju) {
            isDataComplete = false;
            incompleteFields.push('telah menyetujui ketentuan');
            $('#' + modalId + ' #setuju').addClass('borderpulse');
        }

        if (!isDataComplete) {
            var message = 'Silahkan Lengkapi Form pendaftaran anda pada bagian berikut:\n' + incompleteFields.join(', ');

            Swal.fire({
                title: 'Lengkapi Form',
                text: message,
                icon: 'warning',
                confirmButtonText: 'OK',
            });

            return;
        }

        getContactNumber(function(contactNumber) {
            var message = 'WEBSITE: ' + website + '\n' +
                'USERID: ' + userid + '\n' +
                'PENGALAMAN: ' + pengalaman + '\n' +
                'No HP/WA: ' + nohp;

            if (pengalaman === 'sudah berpengalaman') {
                message += '\nDESKRIPSI PENGALAMAN: ' + deskpengalaman;
            }

            var waLink = 'https://wa.me/' + contactNumber + '?text=' + encodeURIComponent(message);
            console.log('Nomor HP: ' + contactNumber);
            window.open(waLink, '_blank');
        });
    });

    // Fungsi untuk mendapatkan nomor telepon dari kontak
    function getContactNumber(callback) {
        $.ajax({
            url: 'kontak',
            async: false,
            dataType: 'json',
            success: function(data) {
                var contactNumber = data[0].kontak;
                callback(contactNumber);
            }
        });
    }

    $('.modaljojo #setuju').change(function() {
        if ($(this).prop('checked')) {
            $(this).removeClass('borderpulse');
        }
    });

    $('.modaljojo #userid, .modaljojo #nohp, .modaljojo #deskpengalaman').keyup(function() {
        if ($(this).val() !== '') {
            $(this).removeClass('borderpulse');
        }
    });

    $('.modaljojo #website').change(function() {
        if ($(this).val() !== 'Pilih Website') {
            $(this).removeClass('borderpulse');
        }
    });

    $('.modaljojo input[name="pengalaman"]').change(function() {
        $('.modaljojo input[name="pengalaman"]').removeClass('borderpulse');

        var pengalaman = $(this).val();
        if (pengalaman === 'sudah berpengalaman') {
            $('.modaljojo .datatambah').slideDown('slow', function() {
                $(this).css('display', 'flex');
            });
        } else {
            $('.modaljojo .datatambah').slideUp('slow');
        }
    });
});

$(document).ready(function() {
    printContactNumber();

    function printContactNumber() {
        getContactNumber(function(contactNumber) {
            var waLink = 'https://wa.me/' + contactNumber;
            $('.kontakadm').attr('href', waLink);
        });
    }

    function getContactNumber(callback) {
        $.ajax({
            url: 'kontak',
            dataType: 'json',
            success: function(data) {
                var contactNumber = data[0].kontak;
                callback(contactNumber);
            }
        });
    }
});

$(document).ready(function() {
    $('.showmenu').click(function() {
        var menuProfile = $(this).closest('.menukanan').find('.menuprofile');

        if (menuProfile.css('display') === 'none') {
            menuProfile.css('display', 'flex');
        } else {
            menuProfile.css('display', 'none');
        }
    });

    $('.menukanan').on('mouseleave', function() {
        var menuProfile = $(this).find('.menuprofile');

        if (menuProfile.css('display') === 'flex') {
            menuProfile.css('display', 'flex');
        }
    });

    $(document).on('click', function(event) {
        if (!$(event.target).closest('.menuprofile').length && !$(event.target).hasClass('showmenu')) {
            $('.menuprofile').css('display', '');
        }
    });
});

function copyValue(elementId) {
    var inputElement = document.getElementById(elementId);
    var value = inputElement.getAttribute("data-value");
    if (value) {
        navigator.clipboard.writeText(value)
            .then(function() {
                Swal.fire({
                    title: "Copy",
                    text: "Link berhasil di Copy",
                    timer: 2000,
                    icon: "success",
                    confirmButtonText: "OK"
                });
            })
            .catch(function(error) {
                Swal.fire({
                    title: "Error",
                    text: "Failed to copy value: " + error,
                    icon: "error",
                    confirmButtonText: "OK"
                });
            });
    } else {
        Swal.fire({
            title: "Error",
            text: "Failed to retrieve value.",
            icon: "error",
            confirmButtonText: "OK"
        });
    }
}

$(document).ready(function() {
    var websiteValue = $('#website').val();
    
    if (websiteValue === 'duogaming') {
        var currentValue = $('.datacopy').val();
        var replacedValue = currentValue.replace('/m/link.php?member=', '/referral/');
        $('.datacopy').val(replacedValue);
        $('.datacopy').attr('data-value', replacedValue);
    }
});

function displayElement(targetId) {
    $('#' + targetId).css('display', 'flex');
}
function clearDisplay(targetId) {
$('#' + targetId).removeAttr('style');
}

$(document).ready(function() {
    $(".data-ganti").click(function() {
        var targetId = $(this).data("target");
        $("#" + targetId).css("display", "flex");
        $(".yu_tampil_data .listbuttonsub").css("display", "flex");
    });
    $(".btnbatal").click(function() {
        $(".yu_tampil_data").css("display", "");
    });
});

$(document).ready(function() {
    $(".hasil_close").click(function() {
        $(this).closest(".hasil_short").fadeOut("slow");
    });
});

$(document).ready(function() {
    $("#copylinkshort").click(function() {
        var hasilValue = $("#conv_hasil").val();
        copyToClipboard(hasilValue);
        Swal.fire({
            icon: 'success',
            title: 'Link Terbaru Disalin!',
            text: 'Link baru ' + hasilValue + ' berhasil disalin ke clipboard.',
            timer: 2000,
            timerProgressBar: true,
            showConfirmButton: false
        });
    });
});
function copyToClipboard(text) {
    var dummyInput = $("<input>");
    $("body").append(dummyInput);
    dummyInput.val(text).select();
    document.execCommand("copy");
    dummyInput.remove();
}

// element svg pada shorten
$(document).ready(function () {
    var socialMediaData = [
        {
            target: $(".list_histori[data-log-medos*='wa.me']:first"),
            svgCode: `
                <div class="svg_medsos">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                        <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                    </svg>
                </div>
            `
        },
        {
            target: $(".list_histori[data-log-medos*='facebook']"),
            svgCode: `
                <div class="svg_medsos">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                    </svg>
                </div>
            `
        },
        {
            target: $(".list_histori[data-log-medos*='telegram']:first, .list_histori[data-log-medos*='t.me']:first"),
            svgCode: `
                <div class="svg_medsos">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-telegram" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
                    </svg>
                </div>
            `
        },
        {
            target: $(".list_histori[data-log-medos*='line.me']:first"),
            svgCode: `
                <div class="svg_medsos">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-line" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M21 10.663c0 -4.224 -4.041 -7.663 -9 -7.663s-9 3.439 -9 7.663c0 3.783 3.201 6.958 7.527 7.560c1.053 .239 .932 .644 .696 2.133c-.039 .238 -.184 .932 .777 .512c.96 -.420 5.180 -3.201 7.073 -5.480c1.304 -1.504 1.927 -3.029 1.927 -4.715v-.010z" />
                    </svg>
                </div>
            `
        },
        {
            target: $(".list_histori[data-log-medos*='instagram']:first"),
            svgCode: `
                <div class="svg_medsos">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M16.5 7.5l0 .010" />
                    </svg>
                </div>
            `
        },
        {
            target: $(".list_histori[data-log-medos*='twitter']:first"),
            svgCode: `
                <div class="svg_medsos">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-twitter" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M22 4.010c-1 .490 -1.980 .689 -3 .990c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.060 -2.620 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.040 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" />
                    </svg>
                </div>
            `
        },
        {
            target: $(".list_histori[data-log-medos*='youtube']:first"),
            svgCode: `
                <div class="svg_medsos">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-youtube" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M3 5m0 4a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v6a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z" />
                        <path d="M10 9l5 3l-5 3z" />
                    </svg>
                </div>
            `
        }
    ];

    socialMediaData.forEach(function (data) {
        if (data.target.length > 0) {
            data.target.find("a:first").prepend(data.svgCode);
        }
    });

    // For other targets not matched by the above selectors
    var otherTargets = socialMediaData.map(function (data) {
        return data.target.get();
    }).reduce(function (acc, val) {
        return acc.concat(val);
    }, []);
    
    var targetOther = $(".list_histori").not(otherTargets);
    if (targetOther.length > 0) {
        targetOther.find("a:first").prepend(createSVGCode('icon-tabler-link'));
    }

    function createSVGCode(iconClass) {
        return `
            <div class="svg_medsos">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon ${iconClass}" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M9 15l6 -6" />
                    <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
                    <path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" />
                </svg>
            </div>
        `;
    }
});

// format angka data laporan
$(document).ready(function() {
    $(".data_nonminal").each(function() {
        var angka = $(this).text();
        var angkaNumber = parseInt(angka, 10);
        var angkaFormatted = angkaNumber.toLocaleString("id-ID");
        var hasil = angkaFormatted + ",-";
        $(this).text(hasil);
    });
});

// NaN pada gaji
$(document).ready(function () {
    $('#dt_gajibulan').each(function () {
        var text = $(this).text().trim();
        if (text === 'NaN,-') {
            $(this).text('0,-');
        }
    });
});

// total gaji
$(document).ready(function () {
    var dt_gajibulan = parseInt($('#dt_gajibulan').text().replace(/\D/g, ''));
    var pot_target = parseInt($('#pot_target').text().replace(/\D/g, ''));
    var pot_kasbon = parseInt($('#pot_kasbon').text().replace(/\D/g, ''));
    var total_gaji = dt_gajibulan - pot_target - pot_kasbon;

    $('#total_gaji').text(formatRupiah(total_gaji, '.'));

    if (total_gaji < 0) {
        $('#total_gaji').text('-' + formatRupiah(Math.abs(total_gaji), '.'));
        $('.cc_plus.ex.total.gaji').addClass('mm_merah');
    }
});

function formatRupiah(angka, separator) {
    angka = angka.toString().replace(/\D/g, '');
    var split = angka.length - 3;
    while (split > 0) {
        angka = angka.substr(0, split) + separator + angka.substr(split);
        split -= 3;
    }
    return angka + ',-';
}

// navbar mobile swicth
$(document).ready(function() {
    checkScreenSize();
$(window).resize(function() {
    checkScreenSize();
});
});
function checkScreenSize() {
    var screenWidth = $(window).width();
    if (screenWidth < 768) {
        $("#nav_utama_co").css("display", "none");
        $(".header_mobile").css("display", "block");
    } else {
        $("#nav_utama_co").css("display", "");
        $(".header_mobile").css("display", "none");
    }
}
$(document).ready(function() {
    $("#jokmenu").click(function() {
    $(".hum_group").slideToggle("slow");
});
});

// filter laporan data
$(document).ready(function() {
    $(".searchUseriddown").on("input", function() {
        var searchText = $(this).val().trim().toLowerCase();
        var allInnUserIds = $(".inn_userid");
        allInnUserIds.closest("tr").show();

        if (searchText !== "") {
            allInnUserIds.each(function() {
                var useridValue = $(this).text().trim().toLowerCase();
                if (!useridValue.includes(searchText)) {
                    $(this).closest("tr").hide();
                }
            });
        }
    });
});

// sembunyi nope
$(document).ready(function() {
    var mataNope = $('#mata_nope');
    var whatsappInput = $('#whatsapp');
    mataNope.click(function() {
    var inputType = whatsappInput.attr('type');
    if (inputType === 'password') {
    whatsappInput.attr('type', 'text');
    mataNope.html('<path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.585 10.587a2 2 0 0 0 2.829 2.828"/><path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87"/><path d="M3 3l18 18"/>');
    } else {
    whatsappInput.attr('type', 'password');
    mataNope.html('<path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/>');
    }
});
});