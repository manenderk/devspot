//HIGHLIGHT CODE
if (typeof hljs !== 'undefined') {
    hljs.initHighlightingOnLoad();
}

//CODE FORMATTER JS
$('#error-message').hide();
$('#format-code').click(function () {
    $('#error-message').hide();
    var source = $('#code-format-input-code').val();
    var codeType = $('.code-format-inputs input[name="input-resource-type"]:checked').val();
    var spacing = $('.code-format-inputs input[name="code-format-spacing"]:checked').val();
    var isUseTabs = $('#code-format-use-tab').prop('checked');
    if (isUseTabs == true) {
        spacing = 1;
    } else {
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
    try {
        var result = prettier.format(source, options);
    } catch (e) {
        var error = e.message;
        console.log(error.toString());
        $('#error-message').text(error.toString());
        $('#error-message').show();
    }
    $('#formatted-code').val(result);

    $('#copy-formatted-code').click(function () {
        $('#formatted-code').select();
        document.execCommand("copy");
    })
});