<?php include($this->config->item('header')); ?>
	<div class="content">
        <div class="page-header">
            <div class="icon">
                <span class="ico-arrow-right"></span>
            </div>
            <h1>Details</h1>
        </div>

      <!-- row title -->
      <div class="row">
        <div class="col-lg-12">
          <h4 class="page-title"><?php echo anchor('ioc/dashboard', 'IOC', 'title="Inter Office Correspondence"');?> <i class="fa fa-angle-double-right"></i> DASHBOARD </h4>
        </div>
      </div>
      <!-- row -->
      
      <!-- row -->
      <div class="row-fluid">
        
        <!-- col -->
        <div class="span12 col-lg-6">
          
          <!-- widget -->
          <div class="widgets">
            
            <!-- wigget content -->
            <div class="widget-content">
				<div class="widget yellow chart nmr">
                    <div class="valtop" align="center" valign="center" style="color:#FFFFFF; font-size:20px;">
						<?php echo img("wp-content/themes/ods/img/logo-small.png"); ?>
						<br/><br/><br/> OPEN
					</div>
                    <div class="valbottom" align="center" style="color:#FFFFFF; font-size:77px; margin-top:40px;">
					<?php foreach($query_open as $stat):echo anchor('ioc/open/', $stat->open,"title='List of incoming documents'"); endforeach;?>
                    </div>
                    <div class="bottom">
                    </div>
                </div>
                <div class="widget yellow chart nmr">
                    <div class="valtop" align="center" valign="center" style="color:#FFFFFF; font-size:20px;">
						<?php echo img("wp-content/themes/ods/img/logo-small.png"); ?>
						<br/><br/><br/> PROGRESS
					</div>
                    <div class="valbottom" align="center" style="color:#FFFFFF; font-size:77px; margin-top:40px;">
					<?php foreach($query_progress as $stat):echo anchor('ioc/progress/',$stat->progress,"title='List Of Processed Document'");endforeach;?>
                    </div>
                    <div class="bottom">
                    </div>
                </div>
                <div class="widget yellow chart nmr">
                    <div class="valtop" align="center" valign="center" style="color:#FFFFFF; font-size:20px;">
						<?php echo img("wp-content/themes/ods/img/logo-small.png"); ?>
						<br/><br/><br/>  COMPLETED
					</div>
                    <div class="valbottom" align="center" style="color:#FFFFFF; font-size:77px; margin-top:40px">
					<?php foreach($query_completed as $stat):echo anchor('ioc/completed/',$stat->completed,"title='List Of Completed and Added Document'");endforeach;?>
                    </div>
                    <div class="bottom">
                    </div>
                </div>
				<div class="widget yellow chart nmr">
                    <div class="valtop" align="center" valign="center" style="color:#FFFFFF; font-size:20px;">
						<?php echo img("wp-content/themes/ods/img/logo-small.png"); ?>
						<br/><br/><br/> CLOSED
					</div>
                    <div class="valbottom" align="center" style="color:#FFFFFF; font-size:77px; margin-top:40px">
					<?php foreach($query_closed as $stat):echo anchor('ioc/closed/',$stat->closed,"title='List of ignored documents'");endforeach;?>
                    </div>
                    <div class="bottom">
                    </div>
                </div>
            
			 </div>
            <!-- wigget content -->
            
            </div>
            <!-- widget -->          
          
          </div>
          <!-- col -->
          
        </div>
        <!-- row -->
	</div>
<?php include($this->config->item('footer')); ?>