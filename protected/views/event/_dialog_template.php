<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/cropper/cropper.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/cropper/docs.css"/>

  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/cropper/cropper.js"></script>
  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/cropper/docs.js"></script>
  <div class="container" id="basic-example">
    <div class="row eg-main">
      <div class="col-xs-12 col-sm-12">
        <div class="eg-wrapper">
          <img class="cropper" src="<?php echo $file ?>" alt="Uploaded Photo">
        </div>
      </div>
    </div> <!-- eg-main end -->
    <div class="clearfix">
      <div class="eg-button">
        <a href="javascript:void(0);" title="Reset" class="glyphicon glyphicon-remove" id="reset" type="button"></a>
        <a href="javascript:void(0);" title="Zoom In" class="glyphicon glyphicon-zoom-in" id="zoomIn" type="button"></a>
        <a href="javascript:void(0);" title="Zoom Out" class="glyphicon glyphicon-zoom-out" id="zoomOut" type="button"></a>
        <a href="javascript:void(0);" title="Rotate Left" class="glyphicon glyphicon-repeat docs-flip-horizontal" id="rotateLeft" type="button"></a>
        <a href="javascript:void(0);" title="Rotate Right" class="glyphicon glyphicon-repeat" id="rotateRight" type="button"></a>
      </div>
      <br/><br/>

      <div class="row eg-output">
        <div class="col-md-12">
          <div class="buttons">
            <button class="button_active" id="getDataURL" type="button">Save</button>
            <a class="white_button button gray_button button_margin_left dialog-cancel-btn" onclick="$('.uploadDialogContainer').dialog('close');" href="javascript:void(0)">Cancel</a>
          </div>
        </div>
        <div class="col-md-6">
          <textarea class="form-control" id="dataURL" rows="10" style="display:none;"></textarea>
        </div>
        <div class="col-md-6">
          <div id="showDataURL" style="display:none;"></div>
        </div>
      </div>
    </div>
  </div>