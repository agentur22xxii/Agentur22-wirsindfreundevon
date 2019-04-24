$(document).foundation();

$(document).ready(function () {

    var origin = window.location.origin;

    /* Samsung Browser */
    if (navigator.userAgent.match(/SamsungBrowser/i)) {
        $("div.title-bar-title").css("float", "left");
        $("div.title-bar-title").css("padding-top", "2.3px");
    }

    /* Safari Browser */
    if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
        $("div.title-bar-title").css("float", "left");
        $("div.title-bar-title").css("padding-top", "2.3px");
    }

    /* Large - Dickes Blub on Scroll ausblenden und kleines einblenden */
    if ($(window).width() > 1570){
        $('.toggle-blob').hide();
        $(window).scroll(function() {
            if ($(this).scrollTop()>100) {
                $('.toggle-blob').fadeIn();
                $('.big-blob').fadeOut();
            } else {
                $('.toggle-blob').fadeOut();
                $('.big-blob').fadeIn();
            }
        });
	}

    /* Toggle Title on Scroll */
    $('.toggle-title').hide();
    $(window).scroll(function() {
        if ($(this).scrollTop()>130) {
            $('.toggle-title').fadeIn();
        } else {
            $('.toggle-title').fadeOut();
        }
    });

    $('.menu-icon-mobile').click(function() {
        if ($('#nav-menu').css('display') == 'none') {
            $('#nav-menu').slideDown('slow');
        } else {
            $('#nav-menu').slideUp('slow');
        }
    });

    /* Berechnung der Rows im Verhältnis zur Fensterbreite */
    var width = $(window).width();
    if (width > 1199) {
        $('#waterfall').NewWaterfall({
            width: 390,
            delay: 250,
        });
    } else if ((width < 1200) & (width > 1023)) {
        var waterfallWidth = width / 3 - 10;
        $('#waterfall').NewWaterfall({
            width: waterfallWidth,
            delay: 250,
        });
    } else if (width < 1024) {
        var waterfallWidth = width / 2 - 18;
        $('#waterfall').NewWaterfall({
            width: waterfallWidth,
            delay: 250,
        });
    }

    /* Admin - Upload Function */
    $("#uploadButton").click(function(event) {

        event.preventDefault();

        var packet = {
            url: $('#url').val(),
            alt: $('#alt').val(),
            quelle: $('#quelle').val()
        };

        var response = jQuery.ajax({
            type: "POST",
            url: origin+"/page/upload/",
            data: packet,
            success: function(data) {

                try {
                    data = JSON.parse(data);
                } catch(error) {
                    alert(data);
                }
            }
        });
    });

    /* Admin - Delete Function */
    $("#deleteButton").click(function(event) {

        event.preventDefault();

        var packet = {
            id: $('#id').val(),
        };

        var response = jQuery.ajax({
            type: "POST",
            url: origin+"/page/delete/",
            data: packet,
            success: function(data) {

                try {
                    data = JSON.parse(data);
                } catch(error) {
                    alert(data);
                }
            }
        });
    });

    /* Height fixes in der Card-Section */
    setInterval(function () {
        $('.content').find('.icon-Herz-Icon-01').each(function() {
            if ($(this).hasClass("size")) {
                var deviceprev = 0;
                var deviceparent = 0;
                // Text Column (1.)
                var prevHeight = $(this).parent().parent().prev().height();
                // Herz Column (2.)
                var parentHeight = $(this).parent().height();

                // Mobile Fix
                if ($(window).width() < 680) {
                    deviceprev = prevHeight + 5;
                    deviceparent = parentHeight + 5;
                } else {
                    deviceprev = prevHeight;
                    deviceparent = parentHeight;
                }

                // Check welche größer ist
                if (parentHeight == prevHeight) {
                    // 2 Zeiler
                    $(this).css('line-height', parentHeight+'px');
                    if ($(window).width() > 680) {
                        deviceparent = deviceparent + 6.5;
                        $(this).next('span').css('line-height', deviceparent+'px');
                    } else {
                        $(this).next('span').css('line-height', deviceparent+'px');
                    }
                    //console.log("2-Zeiler-fixed");
                } else {
                    // 3 Zeiler
                    $(this).css('line-height', prevHeight+'px');
                    $(this).next('span').css('line-height', deviceprev+'px');
                    //console.log("3 Zeiler-Fix /// "+"TextCol: "+prevHeight+" /// HerzCol: "+parentHeight);
                }

                $(this).removeClass("size");
            }

        });
    }, 500);

    /* Cookie akzeptieren / speichern */
    $('.accept').click(function(event) {
        event.preventDefault();
        $('.cookie').fadeOut('slow');
        localStorage.setItem('cookieaccepted', 'true');
    });

    /* Cookie auslesen */
    function getCoockieAccept() {
        if(localStorage.getItem('cookieaccepted') != 'true') {
            $('.cookie').removeClass('hide');
        }
    }
    getCoockieAccept();

    /* Opt-Out GA */
    var gaProperty = 'UA-48411034-28';
    var disableStr = 'ga-disable-' + gaProperty;
    if (document.cookie.indexOf(disableStr + '=true') > -1) {
        window[disableStr] = true;
    }
    function gaOptout() {
        document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
        window[disableStr] = true;
    }
    $('.gaOptout').click(function(event) {
        gaOptout();
        console.log("GA deactivated!");
    });

});
