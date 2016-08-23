/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function addKeyword(keyword) {
    $('<input>').attr({
        type: 'hidden',
        name: 'keyword[]',
        value: keyword
    }).appendTo('form');
    
    $('#eventForm').submit();
}
    
function removeKeyword(obj) {
    obj.prev().remove();
    obj.remove();
    $('#eventForm').submit();
}

function doUpload(obj, url) {
    var containerObj = $('.photo_preloader');
    obj.fileupload({
        url: url,
        dataType: 'json',
        add: function(e, data) {
            containerObj.html('<img src="../../images/preloader.gif">');
            data.submit();
        },
        done: function (e, data) {
            containerObj.html('');
            $.each(data.result.files, function (index, file) {               
                containerObj.html('<img src="' + file.url + '" width="50"/>');
            });
            $('input:submit').attr('disabled', false);
        }
    }).prop('disabled', !$.support.fileInput)
    .parent().addClass($.support.fileInput ? undefined : 'disabled');
}