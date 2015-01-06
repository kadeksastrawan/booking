<?php include($this->config->item('header')); ?>
	<div class="content">
        <div class="page-header">
            <div class="icon">
                <span class="ico-arrow-right"></span>
            </div>
            <h1>Progress</h1>
        </div>

      <!-- row title -->
      <div class="row">
        <div class="col-lg-12">
          <h4 class="page-title"><?php echo anchor('ioc/dashboard', 'IOC', 'title="Inter Office Correspondence"');?> <i class="fa fa-angle-double-right"></i> PROGRESS </h4>
        </div>
      </div>
      <!-- row -->
      
      <!-- row -->
      <div class="row-fluid">
        
        <!-- col -->
        <div class="span10 col-lg-10">
          
          <!-- widget -->
          <div class="block">
          
          	<!-- wigget content -->
            <div class="data-fluid">
            	
            	<table class="table table-hover">
                	<thead>
                    <tr>
                      <th>Tanggal</th>
                      <!--<th>No Agenda</th>-->
                      <th>No Dokumen</th>
                      <th>Perihal</th>
					  <th>Details</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($list_progress as $open):{ ?>
                    <tr>
                      <td><?php echo mdate("%d-%m-%Y %H:%i", strtotime($open->dp_update_on)) ;?></td>
                      <!--<td><?php echo $open->docs_reg_no ;?></td>-->
                      <td><?php if ($open->docs_no == '0'){echo '-';}else {echo $open->docs_no ;}?></td>
                      <td><?php echo $open->docs_subject ;?></td>
					  <td><?php echo anchor( 'ioc/details/id/' . $open->docs_id,'<span class = "ico-list-alt" title="detail"></span>') ;?></td>
                    </tr>
                    <?php } endforeach; ?> 
                  </tbody>
                </table>
            	
				
                
                 <hr />
                <?php echo $link_progress; ?>
				<p class="text-warning"><small><i class="fa fa-info-circle"></i> list of inter office correspondence that need your team action.</small></p>
              
                
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