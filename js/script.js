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

function openDialog(data) {
    var elementObj = $('.dialog_content');
    elementObj.html(data);
    var settings = elementObj.dialog({
        autoOpen    : false,
        maxWidth    : 300,
        height      : 'auto',
        modal       : true,
        resizable   : false,
        buttons     : {},
        position    : {
            my: "center",   
            at: "center",   
            of: window
        }
    });

    settings.dialog("open");
}

function openCommonDialog(url, dataSrc) {    
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data : dataSrc,
        success: function(response) {
            openDialog(response.html);
        }
    });
}

function addSaveSearch() {
    var nameObj = $('#name');
    var requestParamObj = $('#request_param');
    if(!nameObj.val()) return;
    
    $.ajax({
        url:'addsavesearch',
        type:'post',
        dataType:'json',
        async:false,
        data: {
            'name':nameObj.val(), 
            'request_param':requestParamObj.val()
        },
        success:function(response) {
            if(response.success) 
                $('.dialog_content').dialog('close');   
        }
    });
}