<form action="<?php echo Yii::app()->createUrl('/event/create') ?>" method="post">
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
    
    <input type="submit" name="create" value="Create"/>
    <input type="submit" name="preview" value="Preview"/>
    </fieldset>
</form>

