var currentURL = window.location.href;
var urlParams = new URLSearchParams(window.location.search);
var namapage = urlParams.get('namapage');


fetch('https://d4shyok.com/api/apil21')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        var apiurldata = data[0].url;
        $.ajax({
            url: "/getData/",
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    var matchedData = data.find(function (item) {
                        return item.namapage === namapage;
                    });
                    if (matchedData) {
                        var website = matchedData.website;
                        var useridRefferal = matchedData.userid_refferal;

                        // Update the rest of the elements
                        var bgPage = matchedData.bg_page;
                        var gambarProfil = matchedData.gambar_profil;
                        var namaPage = matchedData.namapage;
                        var textPage = matchedData.text_page;
                        var colorPage = matchedData.color_page;
                        var linkWhatsapp = matchedData.whatsapp;
                        var linkFacebook = matchedData.facebook;
                        var btnDaftarcolor = matchedData.btn_daftar_color;
                        var btnLogincolor = matchedData.btn_login_color;

                        document.getElementById("prfcto").style.backgroundImage = "url('../front/img/background/" + bgPage + "')";
                        document.querySelector('.baratas').style.backgroundImage = "url('../front/img/background/" + bgPage + "')";
                        document.querySelector('.yy_gambarprofile').src = `xx88/${gambarProfil}`;
                        document.querySelector('.profilepage').setAttribute('data-bg', colorPage);
                        document.getElementById("namaPageHeader").innerHTML = namaPage + '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"/></svg>';
                        document.querySelector('.textpencreff').innerHTML = textPage;
                        document.getElementById("peclinkwa").href = "https://wa.me/62" + linkWhatsapp;
                        document.getElementById("peclinkfb").href = linkFacebook;
                        document.getElementById("daftarcto").setAttribute('data-button-bg', btnDaftarcolor);
                        document.getElementById("logincto").setAttribute('data-button-bg', btnLogincolor);

                        fetch(apiurldata + "/api/datawebsite", {
                            headers: {
                                "Authorization": "Bearer youk1llmyfvcking3x"
                            }
                        })
                            .then(response => response.json())
                            .then(apiResponse => {
                                if (Array.isArray(apiResponse.data)) {
                                    var lowercaseWebsite = website.toLowerCase();

                                    var matchedWebsiteData = apiResponse.data.find(function (item) {
                                        var lowercaseItemWebsite = item.website.toLowerCase();
                                        return lowercaseItemWebsite === lowercaseWebsite;
                                    });
                                    var bo = matchedWebsiteData.website.toLowerCase();
                                    var pga;
                                    //-==========================================

                                    if (bo == 'duogaming') {
                                        if (matchedWebsiteData) {
                                            var linkalternatif1 = matchedWebsiteData.linkalternatif1;
                                            if (website === "duogaming") {
                                                document.getElementById("peclinkbutton").href = "https://" + linkalternatif1 + "/referral/" + useridRefferal;
                                                document.getElementById("peclinkdaftar").href = "https://" + linkalternatif1 + "/referral/" + useridRefferal;
                                            } else if (pga == '0') {
                                                document.getElementById("peclinkbutton").href = "https://" + linkalternatif1 + "/m/link.php?member=" + useridRefferal;
                                                document.getElementById("peclinkdaftar").href = "https://" + linkalternatif1 + "/m/link.php?member=" + useridRefferal;
                                            } else {
                                                document.getElementById("peclinkbutton").href = "https://" + linkalternatif1 + "register?referral_code=" + useridRefferal;
                                                document.getElementById("peclinkdaftar").href = "https://" + linkalternatif1 + "register?referral_code=" + useridRefferal;
                                            }
                                        } else {
                                            console.log("No matching website data found for:", website);
                                        }
                                    } else {
                                        fetch(apiurldata + "/api/linkpga" + bo, {
                                            headers: {
                                                "Authorization": "Bearer youk1llmyfvcking3x"
                                            }
                                        })
                                            .then(response => response.json())
                                            .then(data => {
                                                // Lakukan sesuatu dengan data kedua
                                                var filteredData = data["data"].filter(function (item) {
                                                    return item.link_pga == matchedWebsiteData.website.toLowerCase();
                                                });

                                                if (filteredData.length === 0) {
                                                    pga = '0';
                                                } else {
                                                    pga = '1';
                                                }
                                                if (matchedWebsiteData) {
                                                    var linkalternatif1 = matchedWebsiteData.linkalternatif1;
                                                    if (website === "duogaming") {
                                                        document.getElementById("peclinkbutton").href = "https://" + linkalternatif1 + "/referral/" + useridRefferal;
                                                        document.getElementById("peclinkdaftar").href = "https://" + linkalternatif1 + "/referral/" + useridRefferal;
                                                    } else if (pga == '0') {
                                                        document.getElementById("peclinkbutton").href = "https://" + linkalternatif1 + "/m/link.php?member=" + useridRefferal;
                                                        document.getElementById("peclinkdaftar").href = "https://" + linkalternatif1 + "/m/link.php?member=" + useridRefferal;
                                                    } else {
                                                        document.getElementById("peclinkbutton").href = "https://" + linkalternatif1 + "register?referral_code=" + useridRefferal;
                                                        document.getElementById("peclinkdaftar").href = "https://" + linkalternatif1 + "register?referral_code=" + useridRefferal;
                                                    }
                                                } else {
                                                    console.log("No matching website data found for:", website);
                                                }

                                            })
                                            .catch(error => {
                                                console.error('Terjadi kesalahan kedua', error);
                                            });
                                        //-==========================================
                                    }
                                } else {
                                    console.log("API response data is not an array:", apiResponse);
                                }
                            })
                            .catch(error => {
                                console.error("Error fetching API data:", error);
                            });
                    } else {
                        window.location.href = "http://localhost/pencari_refferal/";
                    }
                } else {
                    window.location.href = "http://localhost/pencari_refferal/";
                }
            }
        });
    })
    .catch(error => {
        // console.error('There has been a problem with your fetch operation:', error);
        return error;
    });


