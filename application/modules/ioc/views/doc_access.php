<?php include($this->config->item('header')); ?>
	<div class="content">
        <div class="page-header">
            <div class="icon">
                <span class="ico-arrow-right"></span>
            </div>
            <h1>Setting Document Access</h1>
        </div>

      <!-- row title -->
      <div class="row">
        <div class="col-lg-12">
          <h4 class="page-title"><?php echo anchor('ioc/dashboard', 'IOC', 'title="Inter Office Correspondence"');?> <i class="fa fa-angle-double-right"> <?php echo anchor('ioc/add', 'Pilih Jenis', 'title="Pilih Jenis Dokumen"');?> <i class="fa fa-angle-double-right"></i></i> Add Document</h4>
        </div>
      </div>
      <!-- row -->
      
      <!-- row -->
      <div class="row-fluid">
        
        <!-- col -->
        <div class="span12 col-lg-12">
          
          <!-- widget -->
          <div class="block">
            
            
            <!-- wigget content -->
            <div class="data-fluid">
        			 
        			<?php echo form_open('ioc/setting/save_doc_access', 'class="form-horizontal"'); ?>
                    <div class="row-form">
                        <label for="inputNomor" class="span2 col-sm-2 control-label">Kode Dokumen</label>
                        <div class="span2 col-sm-2">
                    	<?php
							foreach($list_doc_type as $dt)
							{
								$doctype[$dt->dt_code]= strtoupper($dt->dt_code);
							}
							echo form_dropdown("doctype",$doctype);
						?>
						</div>
					    <label for="inputNomor" class="span2 col-sm-2 control-label">Department</label>
                        <div class="span2 col-sm-2">
                    	<?php
							foreach($list_department as $ld)
							{
								$data[$ld->vs_id]= strtoupper($ld->vs_code);
							}
							echo form_dropdown("department",$data);
						?>
                        </div>
						<div class="span2 col-sm-2">
                    	<?php echo form_checkbox("type","private")." private (department only) "; ?>
                        </div>
					    <div class="span2 col-sm-2">
                    	<?php echo form_submit("submit","add"); ?>
                        </div>
					</div>  
					<?php echo form_close();?>
					<table cellpadding="0" cellspacing="0" width="100%" class="table table-hover">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th width="30%">Doc Type</th>
                    		    <th width="30%">Department</th>
                    		    <th width="20%">Type</th>
								<th width="10%">Action</th>
                    		</tr>
                        </thead>
                        <tbody>
						<?php
							$no = 1;
							foreach($result as $row){
								echo "<tr>";
								echo "<td>".$no++."</td>";
								echo "<td>".$row->da_doc_type."</td>";
								echo "<td>".strtoupper($row->vs_code)."</td>";
								echo "<td>".$row->da_type."</td>";
								echo "<td>".form_open("ioc/setting/delete_doc_access").form_hidden("id_doc_access",$row->da_id).form_submit("submit","delete").form_close()."</td>";
								echo "</tr>";
							}
						?>														
                        </tbody>
                    </table>      
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