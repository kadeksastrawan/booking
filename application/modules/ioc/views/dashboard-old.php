<?php include($this->config->item('header')); ?>

      <!-- row title -->
      <div class="row">
        <div class="col-lg-12">
          <h4 class="page-title"><?php echo anchor('ioc/dashboard', 'IOC', 'title="Inter Office Correspondence"');?> <i class="fa fa-angle-double-right"></i> DASHBOARD </h4>
        </div>
      </div>
      <!-- row -->
      
      <!-- row -->
      <div class="row">
        
        <!-- col -->
        <div class="col-lg-6">
          
          <!-- widget -->
          <div class="widget">
            
            <!-- wigget content -->
            <div class="widget-content">
            
            
            	<div class="row">
            		<div class="col-md-3 col-xs-12 col-sm-6"> 
              			<div class="stats-heading">OPEN</div>
              			<div class="stats-body-alt"> 
                			<div class="text-center" title='Number of incoming documents'><?php foreach($query_open as $stat):echo $stat->open;endforeach;?></div>
                        </div>
              			<div class="stats-footer"><?php echo anchor('ioc/open/', 'details',"title='List of incoming documents'"); ?></div>
                   	</div>
                    
                    <div class="col-md-3 col-xs-12 col-sm-6">
              			<div class="stats-heading">PROGRESS</div>
              			<div class="stats-body-alt"> 
                			<!--i class="fa fa-bar-chart-o"></i-->
                			<div class="text-center" title='Number of processed documents'><?php foreach($query_progress as $stat):echo $stat->progress;endforeach;?></div>
                        </div>
              			<div class="stats-footer"><?php echo anchor('ioc/progress/', 'details',"title='List of processed documents'"); ?></div>
                   	</div>
                    
                    <div class="col-md-3 col-xs-12 col-sm-6">
              			<div class="stats-heading">Completed</div>
              			<div class="stats-body-alt"> 
                			<!--i class="fa fa-bar-chart-o"></i-->
                			<div class="text-center" title='Number of completed and added documents'><?php foreach($query_completed as $stat):echo $stat->completed;endforeach;?></div>
                        </div>
              			<div class="stats-footer"><?php echo anchor('ioc/completed/', 'details',"title='List of completed and added documents'"); ?></div>
                   	</div>
                    
                    <div class="col-md-3 col-xs-12 col-sm-6">
              			<div class="stats-heading">Closed</div>
              			<div class="stats-body-alt"> 
                			<!--i class="fa fa-bar-chart-o"></i-->
                			<div class="text-center" title='Number of ignored documents'><?php foreach($query_closed as $stat):echo $stat->closed;endforeach;?></div>
                        </div>
              			<div class="stats-footer"><?php echo anchor('ioc/closed/', 'details',"title='List of ignored documents'"); ?></div>
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

<?php include($this->config->item('footer')); ?>