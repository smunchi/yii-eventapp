<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fileupload.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.fileupload.js"></script>

<form action="<?php echo Yii::app()->createUrl('/event/create') ?>" method="post" enctype="multipart/form-data">
    <fieldset style="border: 1px solid #c9e0ed; padding: 15px;">
        <legend>Create a new event</legend>
    <p>
        <label style="width: 8%; display: inline-block" for="title">Event title</label>
        <input type="text" name="title" placeholder="Enter event title here"/>
    </p>
    <p>
        <label style="width: 8%; display: inline-block" for="description">Description</label>
        <input type="text" name="description" placeholder="Enter description here"/>
    </p>
    <p>
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Upload event photo</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" onclick="doUpload($(this), '<?php echo Yii::app()->createUrl('/event/upload') ?>')" type="file" name="files[]" multiple>
        <div class="photo_preloader"></div>         
    </span>
    </p>    
    <input type="submit" name="create" value="Create"/>
    <input type="submit" name="preview" value="Preview"/>
    </fieldset>
</form>
 <div class="uploadDialogContainer"></div>

