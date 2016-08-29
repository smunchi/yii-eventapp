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