<?php
    if($eventKeyword) : ?>
        <?php foreach($eventKeyword as $key =>$eachArray) : ?>
            <h3><?php echo $key; ?></h3>
            <p class="keywordList">
            <?php foreach ($eachArray as $value) : ?>
                <a href=""><?php echo $value; ?></a>
            <?php endforeach; ?>
            </p>
        <?php endforeach; ?>
    <?php endif; ?>

<input type="button" onclick="history.go(-1)" value="Back"/>
<input  style="margin-left: 15px;" type="button" value="Next" onclick="window.location.href=<?php echo Yii::app()->createUrl('/event/preview') ?>"/>
