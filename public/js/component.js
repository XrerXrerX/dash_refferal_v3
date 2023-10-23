$(document).ready(function() {
    $('.sec_top_navbar').load('/topnav');
    $(document).on('click', '.profile_nav', function() {
        $('.list_menu_profile').slideToggle('fast');
    });
    $(document).on('click', function(event) {
        if (!$(event.target).closest('.list_menu_profile, .profile_nav').length) {
            $('.list_menu_profile').slideUp('fast');
        }
    });
});

$(document).ready(function() {
    $('#sec_sidebar').load('/sidenav', function() {
        $('#sec_sidebar').on('click', '.data_sidejsx', function(event) {
            event.preventDefault();
            $(this).toggleClass('active');
            $(this).next('.sub_data_sidejsx').slideToggle('fast');
            $('.data_sidejsx').not(this).removeClass('active');
            $('.data_sidejsx').not(this).next('.sub_data_sidejsx').slideUp('fast');
        });

        $('#sec_sidebar').on('click', '.list_subdata', function(event) {
            event.preventDefault();
            $('.list_subdata').not(this).removeClass('active');
            $(this).toggleClass('active');
        });

        $('#sec_sidebar').on('input', '#searchTabel', function() {
            var searchText = $(this).val().toLowerCase();
            $('.nav_title1, .sub_title1').each(function() {
                var titleText = $(this).text().toLowerCase();
                var $parentData = $(this).closest('.data_sidejsx');
                var $parentSubData = $(this).closest('.sub_data_sidejsx');

                if (searchText === '') {
                    $(this).show();
                    $parentData.show();
                    $parentSubData.hide();
                    $parentData.removeClass('active');
                    $parentSubData.removeClass('active');
                } else if (titleText.includes(searchText) || $parentSubData.find('.sub_title1').text().toLowerCase().includes(searchText)) {
                    $(this).show();
                    $parentData.show();
                    $parentSubData.show();
                    $parentData.addClass('active');
                    $parentSubData.addClass('active');
                } else {
                    $(this).hide();
                    $parentData.hide();
                    $parentSubData.hide();
                    $parentData.removeClass('active');
                    $parentSubData.removeClass('active');
                }
            });
        });
    });
});

$(document).on('click', '#codeDashboardLink', function(event) {
    event.preventDefault();
    $('.aplay_code').load('dashboard', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', 'dashboard');
    });
});

$(document).on('click', '#codeBoxLink', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/codebox', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/codebox');
    });
});

$(document).on('click', '#codeTableLink', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/codetable', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/codetable');
    });
});

$(document).on('click', '#codeFormLink', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/codeform', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/codeform');
    });
});

$(document).on('click', '#codeModalLink', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/codemodal', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/komponen/codemodal.html');
    });
});

$(document).on('click', '#codeButtonLink', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/codebutton', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/codebutton');
    });
});

$(document).on('click', '#codeCardLink', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/codecard', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/codecard');
    });
});

$(document).on('click', '#codeOtherLink', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/codeother', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/codeother');
    });
});


/* ========================= WEB ======================== */
$(document).on('click', '#Medianews', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/web/medianews', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/web/medianews');
    });
});


/* ========================= Data ======================== */
$(document).on('click', '#Pencarirefferal', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/xx88/pencarirefferal', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/xx88/pencarireffral');
    });
});
$(document).on('click', '#Linksshorten', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/xx88/linksshorten', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/xx88/linksshorten');
    });
});
$(document).on('click', '#Syaratketentuan', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/xx88/syaratketentuan', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/xx88/syaratketentuan');
    });
});
$(document).on('click', '#Adminl21', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/xx88/adminl21', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/xx88/adminl21');
    });
});

$(document).on('click', '#Inputdata', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/xx88/gajirefferal', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/xx88/gajirefferal');
    });
});

$(document).on('click', '#Tabelgaji', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/xx88/gajirefferal', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/xx88/gajirefferal');
    });
});

$(document).on('click', '#Datakasbon', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/xx88/datakasbon', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/xx88/datakasbon');
    });
});

$(document).on('click', '#Datamitra', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/xx88/userrefferal', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/xx88/userrefferal');
    });
});

$(document).on('click', '#Datapopup', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/xx88/datapopup', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/xx88/datapopup');
    });
});

$(document).on('click', '#Downline', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/xx88/tabeldownline', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/xx88/tabeldownline');
    });
});

$(document).on('click', '#Newmember', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/xx88/tabelnewmember', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/xx88/tabelnewmember');
    });
});

$(document).on('click', '#Laporan', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/xx88/laporan', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/xx88/laporan');
    });
});

$(document).on('click', '#Allowedip', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/xx88/allowedip', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/xx88/allowedip');
    });
});

$(document).on('click', '#Usermanagement', function(event) {
    event.preventDefault();
    $('.aplay_code').load('/xx88/user', function() {
        adjustElementSize();
        localStorage.setItem('lastPage', '/xx88/user');
    });
});


