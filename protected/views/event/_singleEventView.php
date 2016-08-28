<div style="clear:both; margin-bottom: 15px; overflow: hidden;">
    <img style="float: left" src="<?php echo Yii::app()->baseUrl ?>/images/event_listing_icon.png" width="32" alt="event"/>
    <div style="float: left">        
        <p style="margin-left:13px;">
            <span style="color: green; font-weight: bold;"><a href="<?php echo Yii::app()->createUrl('/event/view', array('id'=>$data->id)) ?>"><?php echo $data->title ?></a></span><br/>
            <span style="color: yellowgreen"><?php echo $data->description; ?></span>
        </p>
    </div>
</div>