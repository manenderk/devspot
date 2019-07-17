//JSON VIEWER 
var jsonObject;
$('#json-url').keyup(function () {
    var jsonUrl = $(this).val();
    addMessage('We are fetching data from url', 'info');
    $.ajax({
        url: jsonUrl,
        type: 'GET',
        success: function (response) {
            addMessage('Data fetched successfully', 'success');
            try {
                if (typeof response == 'string') {
                    response = JSON.parse(response);
                }
                jsonObject = response;
                $('#json-code').val(JSON.stringify(jsonObject));
                buildTreeMap();
            } catch (e) {
                addMessage('It seems your json is not valid:  <strong>' + e + '</strong>', 'info');
            }
        },
        error: function (error) {
            addMessage('error', error);
        }
    })
})

$('#json-code').keyup(function () {
    try {
        jsonObject = JSON.parse($(this).val());
        buildTreeMap();
    } catch (e) {
        addMessage('It seems your json is not valid:  <strong>' + e + '</strong>', 'error');
    }

})

$('#clear-fields').click(function () {
    $('#json-url').val('');
    $('#json-code').val('');
})

function addMessage(text, type) {
    var htmlBody = '';
    if (type == 'success') {
        htmlBody = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>' + text + '</div>';
    } else if (type == 'error') {
        htmlBody = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>' + text + '</div>';
    } else if (type == 'info') {
        htmlBody = '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>' + text + '</div>';
    }
    $('#messages').html(htmlBody);
}

function clearMessages() {
    $('#messages').html('');
}

function buildTreeMap() {
    addMessage('Valid JSON received. Please navigate to <strong>Graphic</strong> Viewer screen to explore json', 'info');
    var root = true;
    var htmlBody = buildTree(jsonObject, root, 'JSON');
    $('#tree-chart').html(htmlBody);
    jsonObject = {};
}

function buildTree(json, root, keyPath) {
    var html;
    if (root == true) {
        root = false;
        html = '<ul class="json-tree-root">';
    } else {
        html = '<ul class="branch">';
    }
    $.each(json, function (key, value) {
        var type = typeof value;
        var nodeKeyPath = keyPath + "." + key;
        if (type == 'object' && value != null) {
            html += '<li class="node"><span class="nodeElement tree-node-element-key" data-key-path="' + nodeKeyPath + '">+ ' + key + ' {' + type + '}</span>' + buildTree(value, root, nodeKeyPath) + '</li>';
        } else if (value == null) {
            html += '<li class="node"><span class="tree-node-element-key" data-key-path="' + nodeKeyPath + '">' + key + '</span> : null' + ' {' + type + '</li>';
        } else {
            html += '<li class="node"><span class="tree-node-element-key" data-key-path="' + nodeKeyPath + '">' + key + '</span> : ' + htmlEntities(value) + ' {' + type + '}</li>';
        }
    })
    html += '</ul>';
    return html;
}

$(document).on('click', '.nodeElement', function () {
    var branch = $(this).siblings('.branch');
    branch.toggleClass('active');
});

$(document).on('click', '.tree-node-element-key', function () {
    $('#json-tree-node-path').text($(this).attr('data-key-path'));
})

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}