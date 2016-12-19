<div id="add_save_search"
    <p>Save this search with a name</p>
    <input type="text" style="width:85%;" name="name" id="name"/>   
    <div style="margin-top:9px; float: right; margin-right: 48px;">
        <input type="hidden" id="request_param" name="request_param" value="<?php echo Yii::app()->request->queryString;?>"/>
        <a style="margin-right:6px" href="javascript:void(0)" onclick="$('#add_save_search').dialog('close')">Cancel</a>
        <a href="javascript:void(0)"onclick="addSaveSearch();">Save</a>
    </div>
</div>