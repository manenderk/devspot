//cookie-consent
window.addEventListener("load", function() { window.wpcc.init({ "border": "thin", "corners": "small", "colors": { "popup": { "background": "#f0edff", "text": "#000000", "border": "#5e65c2" }, "button": { "background": "#5e65c2", "text": "#ffffff" } }, "fontsize": "small", "content": { "href": "https://www.deevsi.com/privacy-policy/" } }) });

$(function() {
    //Hide submenu in navigation bar
    var primaryHeaderMenuItem = $('ul.navbar-nav li.menu-item-has-children.nav-item a.nav-link');
    var primaryHeaderSubMenu = $('ul.navbar-nav li.menu-item-has-children.nav-item ul.sub-menu');
    var primaryHeaderSubMenuItem = $('ul.navbar-nav li.menu-item-has-children.nav-item ul.sub-menu li.menu-item a.nav-link');

    primaryHeaderMenuItem.click(function() {
        var subMenu = $(this).siblings('ul.sub-menu');
        if (!subMenu.is(':visible'))
            primaryHeaderSubMenu.hide();
        subMenu.slideToggle('500');
        return false;
    });

    primaryHeaderSubMenuItem.click(function() {
        var url = $(this).attr('href');
        window.location = url;
    })

    $(window).scroll(function() {
        if (primaryHeaderSubMenu.is(":visible"))
            $(primaryHeaderSubMenu).hide();
    });

    //print current year in copyright
    $('#copyright-year').text(
        new Date().getFullYear()
    );

    //JS FOR JUMP TO TOP BUTTON
    $('#jump-to-top').click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
    })
    var windowHeight = $(window).height();
    if (windowHeight > $(window).scrollTop()) {
        $('#jump-to-top').hide();
    } else {
        $('#jump-to-top').show();
    }
    $(window).scroll(function() {
        if (windowHeight > $(window).scrollTop()) {
            $('#jump-to-top').hide();
        } else {
            $('#jump-to-top').show();
        }
    })

    
})