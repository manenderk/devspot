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



    //FOR CSS & JS MINIFIER
    $('#minify-resource').click(function() {
        var url = '';
        if ($("input[name='input-resource-type']:checked").val() == 'css')
            url = siteUrl + '/api/minify/css';
        else
            url = siteUrl + '/api/minify/js';

        var data = {
            unminified_resource: $('#input-resource').val().toString()
        }
        $.ajax({
            url: url,
            type: 'post',
            data: data,
            success: function(response) {
                response = JSON.parse(response);
                $('#output-resource').val(response['minified_resource'])
                $('#minify-description').html('Original Size: ' + response['original_size'] / 1000 + 'KB' + "<br>" + 'Minified Size: ' + response['minified_size'] / 1000 + 'KB');
                $('#minify-description').show();
            }
        })

    })

    $('#copy-minified-resource').click(function() {
        $('#output-resource').select();
        document.execCommand("copy");
    })

    //FOR COLOR CONVERTER
    $('#color-rgb-red, #color-rgb-green, #color-rgb-blue').keyup(function() {
        var red = $('#color-rgb-red').val();
        var green = $('#color-rgb-green').val();
        var blue = $('#color-rgb-blue').val();
        var hex = '';
        if (red != '' && green != '' && blue != '') {
            hex = rgbToHex(parseInt(red), parseInt(green), parseInt(blue));
            $('#color-hex').val(hex);
        }
        changeSampleColor(hex);
        changeSampleColorText(red, green, blue, hex);
    })
    $('#color-hex').keyup(function() {
        var hex = $('#color-hex').val();
        if (hex != '') {
            var rgb = hexToRgb(hex);
            $('#color-rgb-red').val(rgb.r);
            $('#color-rgb-green').val(rgb.g);
            $('#color-rgb-blue').val(rgb.b);
        }
        changeSampleColor(hex);
        changeSampleColorText(rgb.r, rgb.g, rgb.b, hex);
    })

    function changeSampleColorText(r, g, b, h) {
        var rgbText = 'rgb(' + r + ',' + g + ',' + b + ')';
        var hexText = '#' + h;
        var textColor = '#fff';
        var ri = parseInt(r);
        var gi = parseInt(g);
        var bi = parseInt(b);
        var hsp = Math.sqrt(
            0.299 * (ri * ri) +
            0.587 * (gi * gi) +
            0.114 * (bi * bi)
        );
        if (hsp > 127.5) {
            textColor = '#000';
        }
        if (hsp != NaN) {
            $('#rgb-sample').text(rgbText).css('color', textColor);
            $('#hex-sample').text(hexText).css('color', textColor);
        }
    }

    function componentToHex(c) {
        var hex = c.toString(16);
        return hex.length == 1 ? "0" + hex : hex;
    }

    function rgbToHex(r, g, b) {
        return componentToHex(r) + componentToHex(g) + componentToHex(b);
    }

    function changeSampleColor(color) {
        $('.color-sample').css('background-color', '#' + color);
    }

    function hexToRgb(hex) {
        var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
        hex = hex.replace(shorthandRegex, function(m, r, g, b) {
            return r + r + g + g + b + b;
        });
        var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : null;
    }

    //FOR ASPECT RATIO CALCULAR
    $('#dimension-w, #dimension-h').keyup(function() {
        var w = $('#dimension-w').val();
        var h = $('#dimension-h').val();
        if (w != '' && h != '') {
            var aRatio = calculateAspectRatio(parseInt(w), parseInt(h));
            $('#calculated-aspect-ratio').text(parseInt(w) / aRatio + ':' + parseInt(h) / aRatio);
        }
    })

    function calculateAspectRatio(w, h) {
        var factor = HCF(w, h);
        return factor;
    }

    function HCF(a, b) {
        return (b == 0) ? a : HCF(b, a % b);
    }
    $('#dimension-w1').keyup(function() {
        var w = $('#dimension-w1').val();
        var aspectRatio = getAspectRatio();
        if (aspectRatio != '') {
            var x = aspectRatio.split('*')[0];
            var y = aspectRatio.split('*')[1];
            $('#dimension-h1').val(parseInt(w) * parseInt(y) / parseInt(x));
        }
    })
    $('#dimension-h1').keyup(function() {
        var h = $('#dimension-h1').val();
        var aspectRatio = getAspectRatio();
        if (aspectRatio != '') {
            var x = aspectRatio.split('*')[0];
            var y = aspectRatio.split('*')[1];
            $('#dimension-w1').val(parseInt(h) * parseInt(x) / parseInt(y));
        }

    })
    $('#dimension-w2').keyup(function() {
        var w2 = parseInt($('#dimension-w2').val());
        var w1 = parseInt($('#dimension-w1').val());
        var h1 = parseInt($('#dimension-h1').val());
        $('#dimension-h2').val(w2 * h1 / w1);
    })
    $('#dimension-h2').keyup(function() {
        var h2 = parseInt($('#dimension-h2').val());
        var w1 = parseInt($('#dimension-w1').val());
        var h1 = parseInt($('#dimension-h1').val());
        $('#dimension-w2').val(h2 * w1 / h1);
    })

    function getAspectRatio() {
        var selectedAspectRatio = $('#select-aspect-ratio').children("option:selected").val();
        var customAspectRatio = $('#custom-aspect-ratio').val();
        if (selectedAspectRatio != '')
            return selectedAspectRatio;
        else
            return customAspectRatio.replace(':', '*').replace(/ /g, '');
    }

    //FUNCTIONS FOR SHORTLINKS DASHBOARD
    $('#shortlink-list').click(function() {
        if ($('#shortlink-list-view').length) {
            $.ajax({
                url: wpApiSettings.root + "dshortlink/v1/get-shortlinks/?_wpnonce=" + wpApiSettings.nonce,
                type: 'get',
            }).done(function(response) {
                var message = '';
                if (response['status'] == 'success') {
                    var linkBody = '<table class="table">';
                    var links = response['message'];
                    $.each(links, function(key, link) {
                        var displayLink = siteUrl + '/' + link['shortLink'];
                        linkBody += '<tr><td><a href="' + displayLink + '" target="_blank">' + displayLink + '</a> - ' + link['redirectLink'] + '</td><td class="text-right"><button class="btn btn-sm btn-primary shortlink-delete-action" shortlink-id="' + link['id'] + '" ><i class="fa fa-trash"></i></button></td></td></tr>';
                    })
                    linkBody += '</table>';
                    $('#shortlink-list-view').html(linkBody);
                } else {
                    message = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-inner--text"><strong>Error!!</strong> ' + response['message'] + '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                }
                $('#message-container').html(message);
            })
        }
    })

    $(document).on('click', '.shortlink-delete-action', function(){
        var shortlinkId = $(this).attr('shortlink-id');
        var data = {
            shortlinkId : shortlinkId
        };
        $.ajax({
            url: wpApiSettings.root + "dshortlink/v1/delete-shortlink/?_wpnonce=" + wpApiSettings.nonce,
            data: data,
            type: 'post',
        }).done(function (response) {
            var message = '';
            if (response['status'] == 'success') {
                message = '<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="alert-inner--text"><strong>Success!!</strong> Shortlink deleted</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            } else {
                message = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-inner--text"><strong>Error!!</strong> ' + response['message'] + '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            }            
            $('#shortlink-list').trigger('click');
            $('#message-container').html(message);
        })
    })


    $('#add-shortlink-form').submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: wpApiSettings.root + "dshortlink/v1/add-shortlink/?_wpnonce=" + wpApiSettings.nonce,
            data: data,
            type: 'post',
        }).done(function(response) {
            var message = '';
            if (response['status'] == 'success') {
                message = '<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="alert-inner--text"><strong>Success!!</strong> Shortlink created</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            } else {
                message = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-inner--text"><strong>Error!!</strong> ' + response['message'] + '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            }
            $('#message-container').html(message);
        })
    })

    var colors = [
        '#5e72e4',
        '#8965e0',
        '#f5365c',
        '#ffd600',
        '#fb6340',
        '#2dce89',
        '#f3a4b5',
        '#11cdef',
        '#5603ad',
        '#2bffc6'
    ];

    if ($('#shortlink-dashboard').length) {
        $.ajax({
            url: wpApiSettings.root + "dshortlink/v1/get-stats/?_wpnonce=" + wpApiSettings.nonce,
            type: 'get',
        }).done(function(response) {
            var message = '';
            if (response['status'] == 'success') {
                var totalClicks = response['message']['totalClicks'][0]['clicks'];
                var todayClicks = response['message']['todayClicks'][0]['clicks'];
                var byClicks = response['message']['byClicks'];
                var byReferer = response['message']['byReferer'];
                var byCountry = response['message']['byCountry'];

                generateTotalClicksContent(totalClicks);

                generateTodayClicksContent(todayClicks);

                generateByClicksContent(byClicks);

                generateByRefererContent(byReferer);

                generateByCountryContent(byCountry);
            } else {
                message = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-inner--text"><strong>Error!!</strong> ' + response['message'] + '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            }
            $('#message-container').html(message);
        })
    }

    function generateTotalClicksContent(totalClicks) {
        var cTotalClicks = document.getElementById('shortlink-stats-total-clicks-chart').getContext('2d');
        var chart1 = new Chart(cTotalClicks, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        totalClicks
                    ],
                    backgroundColor: [
                        '#5e72e4'
                    ],
                    label: 'Total Clicks'
                }],
                labels: [
                    'Total Clicks'
                ]
            },
            options: {
                responsive: true,
                elements: {
                    center: {
                        text: totalClicks,
                        color: '#5e72e4', // Default is #000000
                        fontStyle: 'Arial', // Default is Arial
                        sidePadding: 40 // Defualt is 20 (as a percentage)
                    }
                }
            }
        });
        $('#shortlink-stats-total-clicks-number').text(totalClicks);
    }

    function generateTodayClicksContent(todayClicks) {
        var cTodayClicks = document.getElementById('shortlink-stats-today-clicks-chart').getContext('2d');
        var chart5 = new Chart(cTodayClicks, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        todayClicks
                    ],
                    backgroundColor: [
                        '#5e72e4'
                    ],
                    label: 'Today Clicks'
                }],
                labels: [
                    'Today Clicks'
                ]
            },
            options: {
                responsive: true,
                elements: {
                    center: {
                        text: todayClicks,
                        color: '#5e72e4', // Default is #000000
                        fontStyle: 'Arial', // Default is Arial
                        sidePadding: 40 // Defualt is 20 (as a percentage)
                    }
                }
            }
        });
        $('#shortlink-stats-today-clicks-number').text(todayClicks);
    }

    function generateByClicksContent(byClicks) {
        var clicks = [];
        var shortlinks = [];
        var chartColors = [];
        var tableBody = '';
        $.each(byClicks, function(key, value) {
            clicks.push(value['clicks']);
            shortlinks.push(value['shortLink']);
            chartColors.push(colors[key % 10]);
            tableBody += '<tr><td>' + (key + 1) + '</td><td>' + value['shortLink'] + '</td><td>' + value['clicks'] + '</td></tr>';
        });
        var cByClicks = document.getElementById('shortlink-stats-by-clicks-chart').getContext('2d');
        var chart2 = new Chart(cByClicks, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: clicks,
                    backgroundColor: chartColors
                }],
                labels: shortlinks
            },
            options: {
                responsive: true
            }
        })
        $('#shortlink-stats-by-clicks-table tbody').html(tableBody);


    }

    function generateByRefererContent(byReferer) {
        var clicks = [];
        var referers = [];
        var chartColors = [];
        var tableBody = '';
        $.each(byReferer, function(key, value) {
            clicks.push(value['clicks']);
            referers.push(value['referer']);
            chartColors.push(colors[key % 10]);
            tableBody += '<tr><td>' + (key + 1) + '</td><td>' + value['referer'] + '</td><td>' + value['clicks'] + '</td></tr>';
        });
        var cByReferer = document.getElementById('shortlink-stats-by-referer-chart').getContext('2d');
        var chart3 = new Chart(cByReferer, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: clicks,
                    backgroundColor: chartColors,
                }],
                labels: referers
            },
            options: {
                responsive: true
            }
        })
        $('#shortlink-stats-by-referer-table tbody').html(tableBody);
    }

    function generateByCountryContent(byCountry) {
        var clicks = [];
        var country = [];
        var chartColors = [];
        var tableBody = '';
        $.each(byCountry, function(key, value) {
            clicks.push(value['clicks']);
            country.push(value['country']);
            chartColors.push(colors[key % 10]);
            tableBody += '<tr><td>' + (key + 1) + '</td><td>' + value['country'] + '</td><td>' + value['clicks'] + '</td></tr>';
        });
        var cByCountry = document.getElementById('shortlink-stats-by-country-chart').getContext('2d');
        var chart4 = new Chart(cByCountry, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: clicks,
                    backgroundColor: chartColors,
                }],
                labels: country
            },
            options: {
                responsive: true
            }
        })
        $('#shortlink-stats-by-country-table tbody').html(tableBody);
    }

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

    //HIGHLIGHT CODE
    if (typeof hljs !== 'undefined') {
        hljs.initHighlightingOnLoad();
    }

    //CODE FORMATTER JS
    $('#error-message').hide();
    $('#format-code').click(function(){
        $('#error-message').hide();
        var source = $('#code-format-input-code').val();
        var codeType = $('.code-format-inputs input[name="input-resource-type"]:checked').val();
        var spacing = $('.code-format-inputs input[name="code-format-spacing"]:checked').val();
        var isUseTabs = $('#code-format-use-tab').prop('checked');
        if(isUseTabs == true){
            spacing = 1;
        }
        else{
            isUseTabs = false;
        }
        var options = {
            parser: codeType, 
            tabWidth: parseInt(spacing),
            useTabs: isUseTabs, 
            singleQuote: true,
            printWidth: 500,
            plugins: prettierPlugins
        }
        $('html, body').animate({
            scrollTop: $('#formatted-code-box').offset().top - 100,            
        }, "slow");
        try{
            var result = prettier.format(source, options);
        }
        catch(e){
            var error=e.message;
            console.log(error.toString());
            $('#error-message').text(error.toString());
            $('#error-message').show();
        }
        $('#formatted-code').val(result);

        $('#copy-formatted-code').click(function () {
            $('#formatted-code').select();
            document.execCommand("copy");
        })
    })
})