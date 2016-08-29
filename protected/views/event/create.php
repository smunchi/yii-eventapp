<form action="<?php echo Yii::app()->createUrl('/event/create') ?>" method="post" enctype="multipart/form-data">
    <fieldset style="border: 1px solid #c9e0ed; padding: 15px;">
        <legend>Create a new event</legend>
        <p>
            <label style="width: 8%; display: inline-block" for="title">Event title</label>
            <input type="text" name="title" value="<?php echo $event_data['title'];?>" placeholder="Enter event title here"/>
        </p>
        <p>
            <label style="width: 8%; display: inline-block" for="description">Description</label>
            <input type="text" name="description" value="<?php echo $event_data['description'];?>" placeholder="Enter description here"/>
        </p>
        <p>
            Upload event photo
            <input type="file" name="files">
        </p>    
        
        <input type="submit" name="create" value="Create"/>
        <input type="submit" name="preview" value="Preview"/>
        <a style="text-decoration: none;" href="<?php echo Yii::app()->createUrl('/event/cancelevent') ?>"><input type="button" name="Cancel" value="Cancel"/></a>
    </fieldset>
</form>
<script type="text/javascript">
    $(function() {
        var formObj = $('form').eq(0);
        var originalData = formObj.serialize();
        doAutoSave(formObj, originalData);
    });

    function doAutoSave(formObj, originalData) {
        var autoSaveInterval = 2000;

        var formData = formObj.serialize();

        if (formData === originalData) {
            setTimeout(function() {
                doAutoSave(formObj, originalData)
            }, autoSaveInterval);
            return false;
        }

        originalData = formData;
        $.ajax({
            url: 'saveinsession',
            type: 'post',
            data: formData,
            dataType: 'json',
            async: false,
            success: function(response) {},
            complete: function() {
                setTimeout(function() {
                    doAutoSave(formObj, originalData)
                }, autoSaveInterval);
            }
        });
        console.log(formObj);
        console.log(originalData);
    }
</script>