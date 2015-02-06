<!-- start: PAGE CONTENT -->

<script>
$(document).ready(function(){
    $("#basic-chart").hide();
	$("#toggling-series").hide();
	// $("#interactivity1").hide();
	$("#real-time").hide();
	$("#categories").hide();
	$("#annotations").hide();
	$("#default-pie").hide();
	$("#label-formatter").hide();
	$("#label-style").hide();
	$("#rectangular-pie").hide();
	$("#tilted-pie").hide();
	$("#interactivity2").hide();
});
</script>

<div class="row" id="basic-chart">
  <div class="col-md-12"> 
    <!-- start: BASIC CHART PANEL -->
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Basic Chart
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <div class="flot-container">
          <div id="placeholder" class="flot-placeholder"></div>
        </div>
      </div>
    </div>
    <!-- end: BASIC CHART PANEL --> 
  </div>
</div>
<div class="row" id="toggling-series">
  <div class="col-md-12"> 
    <!-- start: TOGGLING SERIES PANEL -->
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Toggling Series
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <div class="flot-container">
          <div id="placeholder2" class="flot-placeholder"></div>
          <p id="choices"></p>
        </div>
      </div>
    </div>
    <!-- end: TOGGLING SERIES PANEL --> 
  </div>
</div>
<div class="row" id="interactivity1">
  <div class="col-md-12"> 
    <!-- start: INTERACTIVITY PANEL -->
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Tahsilat Durumu
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <div class="flot-container">
          <div id="placeholder3" class="flot-placeholder"></div>
        </div>
      </div>
    </div>
    <!-- end: INTERACTIVITY PANEL --> 
  </div>
</div>
<div class="row" id="real-time">
  <div class="col-md-12"> 
    <!-- start: REAL-TIME PANEL -->
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Real-time
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <div class="flot-small-container">
          <div id="placeholder4" class="flot-placeholder"></div>
        </div>
      </div>
    </div>
    <!-- end: REAL-TIME PANEL --> 
  </div>
</div>
<div class="row">
  <div class="col-md-6" id="categories"> 
    <!-- start: CATEGORIES PANEL -->
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Categories
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <div class="flot-small-container">
          <div id="placeholder5" class="flot-placeholder"></div>
        </div>
      </div>
    </div>
    <!-- end: CATEGORIES PANEL --> 
  </div>
  <div class="col-md-6" id="annotations"> 
    <!-- start: ANNOTATIONS PANEL -->
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Annotations
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <div class="flot-small-container">
          <div id="placeholder6" class="flot-placeholder"></div>
        </div>
      </div>
    </div>
    <!-- end: ANNOTATIONS PANEL --> 
  </div>
</div>
<div class="row">
  <div class="col-md-6" id="default-pie"> 
    <!-- start: DEFAULT PIE PANEL -->
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Default Pie
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <div class="flot-small-container">
          <div id="placeholder7" class="flot-placeholder"></div>
        </div>
      </div>
    </div>
    <!-- end: DEFAULT PIE PANEL --> 
  </div>
  <div class="col-md-6" id="label-formatter"> 
    <!-- start: LABEL FORMATTER PANEL -->
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Label Formatter
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <div class="flot-small-container">
          <div id="placeholder8" class="flot-placeholder"></div>
        </div>
      </div>
    </div>
    <!-- end: LABEL FORMATTER PANEL --> 
  </div>
</div>
<div class="row">
  <div class="col-md-6" id="label-style"> 
    <!-- start: LABEL STYLE PANEL -->
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Label Style
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <div class="flot-small-container">
          <div id="placeholder9" class="flot-placeholder"></div>
        </div>
      </div>
    </div>
    <!-- end: LABEL STYLE PANEL --> 
  </div>
  <div class="col-md-6" id="rectangular-pie"> 
    <!-- start: RECTANGULAR PIE PANEL -->
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Rectangular Pie
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <div class="flot-small-container">
          <div id="placeholder10" class="flot-placeholder"></div>
        </div>
      </div>
    </div>
    <!-- end: RECTANGULAR PIE PANEL --> 
  </div>
</div>
<div class="row">
  <div class="col-md-6" id="tilted-pie"> 
    <!-- start: TILTED PIE PANEL -->
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Tilted Pie
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <div class="flot-small-container">
          <div id="placeholder11" class="flot-placeholder"></div>
        </div>
      </div>
    </div>
    <!-- end: TILTED PIE PANEL --> 
  </div>
  <div class="col-md-6" id="interactivity2"> 
    <!-- start: INTERACTIVITY PANEL -->
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Interactivity
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <div class="flot-small-container">
          <div id="placeholder12" class="flot-placeholder"></div>
        </div>
      </div>
    </div>
    <!-- end: INTERACTIVITY PANEL --> 
  </div>
</div>
<!-- end: PAGE CONTENT--> 
