//FOR COLOR CONVERTER
$('#color-rgb-red, #color-rgb-green, #color-rgb-blue').keyup(function () {
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
$('#color-hex').keyup(function () {
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
    hex = hex.replace(shorthandRegex, function (m, r, g, b) {
        return r + r + g + g + b + b;
    });
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}