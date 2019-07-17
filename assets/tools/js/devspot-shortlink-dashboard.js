//FUNCTIONS FOR SHORTLINKS DASHBOARD
$('#shortlink-list').click(function () {
    if ($('#shortlink-list-view').length) {
        $.ajax({
            url: wpApiSettings.root + "dshortlink/v1/get-shortlinks/?_wpnonce=" + wpApiSettings.nonce,
            type: 'get',
        }).done(function (response) {
            var message = '';
            if (response['status'] == 'success') {
                var linkBody = '<table class="table">';
                var links = response['message'];
                $.each(links, function (key, link) {
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

$(document).on('click', '.shortlink-delete-action', function () {
    var shortlinkId = $(this).attr('shortlink-id');
    var data = {
        shortlinkId: shortlinkId
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


$('#add-shortlink-form').submit(function (e) {
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
        url: wpApiSettings.root + "dshortlink/v1/add-shortlink/?_wpnonce=" + wpApiSettings.nonce,
        data: data,
        type: 'post',
    }).done(function (response) {
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
    }).done(function (response) {
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
    $.each(byClicks, function (key, value) {
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
    $.each(byReferer, function (key, value) {
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
    $.each(byCountry, function (key, value) {
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