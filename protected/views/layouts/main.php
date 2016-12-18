<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
        
        <script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl ?>/js/script.js" type="text/javascript"></script>
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
            <div id="logo" style="height: 31px;">
                <img style="float: left;" width="32" src="<?php echo Yii::app()->baseUrl ?>/images/event.png" alt="<?php echo CHtml::encode(Yii::app()->name); ?>"/>
                <span style="display: block; float: left; color: #25A766; font-size: 14px; text-transform: uppercase; margin-top: 7px; margin-left: 7px;"><?php echo CHtml::encode(Yii::app()->name); ?></span>
                <span style="display: block; float: right;">
                    <?php if(Yii::app()->user->isGuest) : ?>
                        <input type="button" value="Sign in" onclick="window.location='<?php echo Yii::app()->createUrl('site/login'); ?>'">                        
                    <?php endif; ?>
                </span>
            </div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),				
                                array('label'=>'Find People', 'url'=>array('/user/userList')),
                                array('label'=>'Find Events', 'url'=>array('/event/eventList')),                            		
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->
</div><!-- page -->

<script>
$(document).ready(function() {
$("#add_save_search").dialog({
	autoOpen: false,
	width: 400,
	buttons: [
		{
			text: "Ok",
			click: function() {
				$( this ).dialog( "close" );
			}
		},
		{
			text: "Cancel",
			click: function() {
				$( this ).dialog( "close" );
			}
		}
	]
});
})


// Link to open the dialog
$("#thelink").click(function( event ) {
	$("#add_save_search").dialog( "open" );
	event.preventDefault();
});
</script>
</body>
</html>
