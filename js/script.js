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

function openSaveSearchDialog() {
  var elementObj = $('#add_save_search');
  var settings = elementObj.dialog({
    autoOpen    : false,
    maxWidth    : 300,
    height      : 'auto',
    modal       : true,
    resizable   : false,
    buttons     : {},
    position    : {my: "center",   at: "center",   of: window}
  });

  settings.dialog("open");
}