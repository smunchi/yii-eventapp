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
        done: function(e, data) {                        
            if(data.result.success) {
                containerObj.html('');
                openLightbox(data.result.html);
                $('input:submit').attr('disabled', false);
            }
        }
    }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
}

function openLightbox(dataObj) {    
    var elementObj = $('.uploadDialogContainer');
    elementObj.html(dataObj);
    var settings = elementObj.dialog({
        dialogClass: 'upload_dialog',
        autoOpen: false,
        maxWidth: 500,
        height: 'auto',
        fluid: true,
        modal: true,
        width: '50%',
        resizable: false,
        position: ['middle', 200]
    });

    settings.dialog("open");
}

function saveCroppedPhoto(imageSrc){
  var imageData = {"imageSrc" : imageSrc, "filename" : $('.crop_filename').val(),
                   "filetype" : $('.crop_filetype').val()};  

  $.ajax({
    url: '/savephoto',
    type: 'post',
    data: imageData,
    dataType: 'json',
    async: false,
    success: function(response){
      if(response.success) {
        var photoHTML = '<img src="'+imageSrc+'" class="img-responsive"><div class="photo_preloader"></div>';
        containerObj.find('.photo_container').html(photoHTML);
        $('.uploadDialogContainer').dialog('close');
      }
    }
  });
}