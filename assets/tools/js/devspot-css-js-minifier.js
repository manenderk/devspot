//FOR CSS & JS MINIFIER
$('#minify-resource').click(function () {
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
        success: function (response) {
            response = JSON.parse(response);
            $('#output-resource').val(response['minified_resource'])
            $('#minify-description').html('Original Size: ' + response['original_size'] / 1000 + 'KB' + "<br>" + 'Minified Size: ' + response['minified_size'] / 1000 + 'KB');
            $('#minify-description').show();
        }
    })

})

$('#copy-minified-resource').click(function () {
    $('#output-resource').select();
    document.execCommand("copy");
})