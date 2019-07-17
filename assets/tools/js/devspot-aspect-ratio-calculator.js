//FOR ASPECT RATIO CALCULAR
$('#dimension-w, #dimension-h').keyup(function () {
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
$('#dimension-w1').keyup(function () {
    var w = $('#dimension-w1').val();
    var aspectRatio = getAspectRatio();
    if (aspectRatio != '') {
        var x = aspectRatio.split('*')[0];
        var y = aspectRatio.split('*')[1];
        $('#dimension-h1').val(parseInt(w) * parseInt(y) / parseInt(x));
    }
})
$('#dimension-h1').keyup(function () {
    var h = $('#dimension-h1').val();
    var aspectRatio = getAspectRatio();
    if (aspectRatio != '') {
        var x = aspectRatio.split('*')[0];
        var y = aspectRatio.split('*')[1];
        $('#dimension-w1').val(parseInt(h) * parseInt(x) / parseInt(y));
    }

})
$('#dimension-w2').keyup(function () {
    var w2 = parseInt($('#dimension-w2').val());
    var w1 = parseInt($('#dimension-w1').val());
    var h1 = parseInt($('#dimension-h1').val());
    $('#dimension-h2').val(w2 * h1 / w1);
})
$('#dimension-h2').keyup(function () {
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