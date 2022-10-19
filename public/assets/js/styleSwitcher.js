"use strict"

function addSwitcher() {


    if ($("#dzSwitcher").length == 0) {
        jQuery('body').append(dzSwitcher + demoPanel);


        //const ps = new PerfectScrollbar('.sidebar-right-inner');
        //console.log(ps.reach.x);
        //ps.isRtl = false;

        $('.sidebar-right-trigger').on('click', function () {
            $('.sidebar-right').toggleClass('show');
        });
        $('.sidebar-close-trigger,.bg-overlay').on('click', function () {
            $('.sidebar-right').removeClass('show');
        });
    }
}

(function ($) {
    "use strict"
    addSwitcher();


    const body = $('body');
    const html = $('html');

    //get the DOM elements from right sidebar
    const typographySelect = $('#typography');
    const versionSelect = $('#theme_version');
    const layoutSelect = $('#theme_layout');
    const sidebarStyleSelect = $('#sidebar_style');
    const sidebarPositionSelect = $('#sidebar_position');
    const headerPositionSelect = $('#header_position');
    const containerLayoutSelect = $('#container_layout');
    const themeDirectionSelect = $('#theme_direction');

    //change the theme typography controller
    typographySelect.on('change', function () {
        body.attr('data-typography', this.value);

        setCookie('typography', this.value);
    });

    //change the theme version controller
    versionSelect.on('change', function () {
        body.attr('data-theme-version', this.value);

        if (this.value === 'light') {
            jQuery(".nav-header .logo-abbr").attr("src", "public/assets/images/logo.png");
            jQuery(".nav-header .logo-compact").attr("src", "public/assets/images/logo-text.png");
            jQuery(".nav-header .brand-title").attr("src", "public/assets/images/logo-text.png");

            setCookie('logo_src', 'public/assets/images/logo.png');
            setCookie('logo_src2', 'public/assets/images/logo-text.png');
        } else {
            jQuery(".nav-header .logo-abbr").attr("src", "public/assets/images/logo-white.png");
            jQuery(".nav-header .logo-compact").attr("src", "public/assets/images/logo-text-white.png");
            jQuery(".nav-header .brand-title").attr("src", "public/assets/images/logo-text-white.png");

            setCookie('logo_src', 'public/assets/images/logo-white.png');
            setCookie('logo_src2', 'public/assets/images/logo-text-white.png');
        }

        setCookie('version', this.value);
    });



    //change the sidebar position controller
    sidebarPositionSelect.on('change', function () {
        this.value === "fixed" && body.attr('data-sidebar-style') === "modern" && body.attr('data-layout') === "vertical" ?
            alert("Sorry, Modern sidebar layout dosen't support fixed position!") :
            body.attr('data-sidebar-position', this.value);
        setCookie('sidebarPosition', this.value);
    });

    //change the header position controller
    headerPositionSelect.on('change', function () {
        body.attr('data-header-position', this.value);
        setCookie('headerPosition', this.value);
    });

    //change the theme direction (rtl, ltr) controller
    themeDirectionSelect.on('change', function () {
        html.attr('dir', this.value);
        html.attr('class', '');
        html.addClass(this.value);
        body.attr('direction', this.value);
        setCookie('direction', this.value);
    });

    //change the theme layout controller
    layoutSelect.on('change', function () {
        if (body.attr('data-sidebar-style') === 'overlay') {
            body.attr('data-sidebar-style', 'full');
            body.attr('data-layout', this.value);
            return;
        }


        if (this.value === "horizontal") {
            setEventSidebar();
        }

        body.attr('data-layout', this.value);
        setCookie('layout', this.value);
    });

    //change the container layout controller
    containerLayoutSelect.on('change', function () {
        if (this.value === "boxed") {

            if (body.attr('data-layout') === "vertical" && body.attr('data-sidebar-style') === "full") {
                body.attr('data-sidebar-style', 'overlay');
                body.attr('data-container', this.value);

                setTimeout(function () {
                    $(window).trigger('resize');
                }, 200);

                return;
            }


        }

        body.attr('data-container', this.value);
        setCookie('containerLayout', this.value);
    });

    //change the sidebar style controller
    sidebarStyleSelect.on('change', function () {

        if (body.attr('data-layout') === "horizontal") {
            if (this.value === "overlay") {
                alert("Sorry! Overlay is not possible in Horizontal layout.");
                return;
            }
        }
        if (body.attr('data-layout') === "vertical") {
            if (body.attr('data-container') === "boxed" && this.value === "full") {
                alert("Sorry! Full menu is not available in Vertical Boxed layout.");
                return;
            }

            if (this.value === "modern" && body.attr('data-sidebar-position') === "fixed") {
                alert("Sorry! Modern sidebar layout is not available in the fixed position. Please change the sidebar position into Static.");
                return;
            }
        }

        body.attr('data-sidebar-style', this.value);

        if (body.attr('data-sidebar-style') === 'icon-hover') {
            $('.deznav').on('hover', function () {
                $('#main-wrapper').addClass('iconhover-toggle');
            }, function () {
                $('#main-wrapper').removeClass('iconhover-toggle');
            });
        }

        setCookie('sidebarStyle', this.value);
    });



    jQuery("#nav_header_color_1").on('click', function () {
        jQuery(".nav-header .logo-abbr").attr("src", "public/assets/images/logo.png");
        setCookie('logo_src', 'public/assets/images/logo.png');
        return false;
    });

    jQuery("#nav_header_color_2, #nav_header_color_3, #nav_header_color_4, #nav_header_color_5, #nav_header_color_6, #nav_header_color_7, #nav_header_color_8, #nav_header_color_9, #nav_header_color_10, #nav_header_color_11, #nav_header_color_12, #nav_header_color_13, #nav_header_color_14, #nav_header_color_15").on('click', function () {
        jQuery(".nav-header .logo-abbr").attr("src", "public/assets/images/logo-white.png");
        setCookie('logo_src', 'public/assets/images/logo-white.png');
        return false;
    });

    jQuery("#nav_header_color_3").on('click', function () {
        jQuery(".nav-header .logo-abbr").attr("src", "public/assets/images/logo-white.png");
        setCookie('logo_src', 'public/assets/images/logo-white.png');
        return false;
    });


    /* Move LTR to RTL and RTL to LTR */

    var currentURL = window.location.href;

    jQuery('#theme_direction').on('change', function () {
        if (currentURL.indexOf('xhtml-rtl') > -1) {
            currentURL = currentURL.replace('xhtml-rtl', 'xhtml')
        } else {
            currentURL = currentURL.replace('xhtml', 'xhtml-rtl')
        }

        window.location.href = currentURL;

    });

    if (currentURL.indexOf('xhtml-rtl') > -1) {
        jQuery('#theme_direction').val('rtl');
    } else {
        jQuery('#theme_direction').val('ltr');
    }

    /* Move LTR to RTL and RTL to LTR END */

    //change the nav-header background controller
    $('input[name="navigation_header"]').on('click', function () {
        body.attr('data-nav-headerbg', this.value);
        setCookie('navheaderBg', this.value);
    });

    //change the header background controller
    $('input[name="header_bg"]').on('click', function () {
        body.attr('data-headerbg', this.value);
        setCookie('headerBg', this.value);
    });

    //change the sidebar background controller
    $('input[name="sidebar_bg"]').on('click', function () {
        body.attr('data-sibebarbg', this.value);
        setCookie('sidebarBg', this.value);
    });

    //change the primary color controller
    $('input[name="primary_bg"]').on('click', function () {
        body.attr('data-primary', this.value);
        setCookie('primary', this.value);
    });

})(jQuery);