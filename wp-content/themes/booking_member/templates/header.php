<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />    
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />        
    <![endif]-->                
    <title>ODS - Online Document System Admin Panel</title>
    <link rel="icon" type="<?php echo base_url(); ?>wp-content/themes/booking_member/image/ico" href="favicon.ico"/>
    
    <link href="<?php echo base_url(); ?>wp-content/themes/booking_member/css/stylesheets.css" rel="stylesheet" type="text/css" />
    <!--[if lte IE 7]>
        <link href="css/ie.css" rel="stylesheet" type="text/css" />
        <script type='text/javascript' src='js/plugins/other/lte-ie7.js'></script>
    <![endif]-->    
    <!-- 
	<script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/jquery/jquery-1.9.1.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/jquery/globalize.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/other/excanvas.js'></script>
    
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/other/jquery.mousewheel.min.js'></script>
        
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/bootstrap/bootstrap.min.js'></script>
    
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/cookies/jquery.cookies.2.2.0.min.js'></script>    
    
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/jflot/jquery.flot.js'></script>    
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/jflot/jquery.flot.stack.js'></script>    
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/jflot/jquery.flot.pie.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/jflot/jquery.flot.resize.js'></script>
    
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/sparklines/jquery.sparkline.min.js'></script>        
    
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
    
    <script type='text/javascript' src="<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/uniform/jquery.uniform.min.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/select/select2.min.js"></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/tagsinput/jquery.tagsinput.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/maskedinput/jquery.maskedinput-1.3.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/multiselect/jquery.multi-select.min.js'></script>
	
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/shbrush/XRegExp.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/shbrush/shCore.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/shbrush/shBrushXml.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/shbrush/shBrushJScript.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/shbrush/shBrushCss.js'></script>    
    
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/charts.js'></script>
    
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/actions.js'></script>
	-->
	
	<script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/jquery/jquery-1.9.1.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/jquery/globalize.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/other/excanvas.js'></script>
    
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/other/jquery.mousewheel.min.js'></script>
        
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/bootstrap/bootstrap.min.js'></script>            
    
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/cookies/jquery.cookies.2.2.0.min.js'></script>    
    
    <script type='text/javascript' src="js/plugins/uniform/jquery.uniform.min.js"></script>
    
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/shbrush/XRegExp.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/shbrush/shCore.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/shbrush/shBrushXml.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/shbrush/shBrushJScript.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins/shbrush/shBrushCss.js'></script>    
    
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/plugins.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/charts.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>wp-content/themes/booking_member/js/actions.js'></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
</head>

<?php 

if($this->session->userdata('logged_in')){
	include("navbar.php"); 
}else{
?>
<body>    
    <div id="loader"><img src="<?php echo base_url(); ?>wp-content/themes/booking_member/img/loader.gif"/></div>
<?php
}
?>	