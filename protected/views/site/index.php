<?php
/* @var $this SiteController */

$this->pageTitle = 'Yes it is event based Web Application';
?>

<h2><i>Create an Event and Connect with People</i></h2>
<p>Search through 5000 people or browse 2000 events.</p>

<p style="font-size: 1.55em; margin-bottom: 12px;">
    <span style="color: #065c7e;">To get started</span> &nbsp; <input type="button" value="Sign up" onclick="window.location='<?php echo Yii::app()->createUrl('site/register'); ?>'">
</p>

<p>You may find the content of more interesting page by the following links:</p>
<ul>
    <li>About</li>
    <li>Find People</li>
</ul>
<p>For more details on how yii-eventapp works and features the application, please read
    the <a href="<?php echo Yii::app()->createUrl('site/page', array('view'=>'about')); ?>">about page</a>.
    Feel free to ask in the <a href="<?php echo Yii::app()->createUrl('site/contact') ?>">contact</a>,
should you have any questions.</p>
