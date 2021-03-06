<?php include($this->config->item('header')); ?>

      <!-- row title -->
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8">
          <h3 class="page-title">Registration</h3>
        </div>
      </div>
      <!-- row -->
      
      
      <!-- row -->
      <div class="row">
        
        <!-- col -->
        <div class="col-xs-12 col-sm-6 col-md-8">
          
          <!-- widget -->
          <div class="widget">
            
            <!-- wigget content -->
            <div class="widget-content">
            <?php if (isset($message)){echo '<p>error message : ' . $message . '</p>';} ?>
            <?php if (validation_errors()){echo '<p>error message : ' . validation_errors() . '</p>';} ?>
            
            <?php echo form_open('user/registration/save', 'class="form-horizontal"'); ?>    
           
            
                 
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="nama" required="required">
    </div>
  </div>  
  
  <div class="form-group">
    <label for="inputNipp" class="col-sm-2 control-label">NIPP</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="inputEmail3" placeholder="NIPP" name="nipp" required="required">
    </div>
  </div>        
  
  <div class="form-group">
    <label for="inputHandphone" class="col-sm-2 control-label">Handphone</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Handphone" name="hp" required="required">
    </div>
  </div>        
  
  <div class="form-group">
    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-6">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" required="required">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" required="required">
    </div>
  </div>
 
  
  <div class="form-group">
    <label for="inputStation" class="col-sm-2 control-label">Company</label>
    <div class="col-sm-6">
    	<select name="company" id="company" class="form-control">
            <option value="00">select company</option>
            <?php foreach ( $company as $item ) : ?>
                <option value="<?php echo $item->vc_id ?>"><?php echo strtoupper( $item->vc_name ) ?></option>
            <?php endforeach ?>
        </select>
      
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputUnit" class="col-sm-2 control-label">Directorate</label>
    <div class="col-sm-6">
      <select  name="directorate" id="directorate" class="form-control">
            <option value="00">select directorate</option>
        </select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputStation" class="col-sm-2 control-label">Station</label>
    <div class="col-sm-6">
    	<select  name="station" id="station" class="form-control">
            <option value="00">select station</option>
        </select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputUnit" class="col-sm-2 control-label">Unit</label>
    <div class="col-sm-6">
      <select  name="unit" id="unit" class="form-control">
            <option value="00">select unit</option>
        </select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputSubUnit" class="col-sm-2 control-label">Sub Unit</label>
    <div class="col-sm-6">
      <select name="sub_unit" id="subunit"  class="form-control">
            <option value="00">select sub unit</option>
        </select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputTeam" class="col-sm-2 control-label">Team</label>
    <div class="col-sm-6">
      <select name="team" id="team" class="form-control">
        <option value="00">select team</option>
    </select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputTeam" class="col-sm-2 control-label">Function</label>
    <div class="col-sm-6">
      <select name="pangkat" id="pangkat" class="form-control">
	  <option value="00">select pangkat</option>
            <?php foreach ($pangkat as $item) : ?>
                <option value="<?php echo $item->vf_level ?>"><?php echo strtoupper( $item->vf_name ) ?></option>
            <?php endforeach ?>
			
	</select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputJabatan" class="col-sm-2 control-label">Jabatan</label>
    <div class="col-sm-6">
      <input type="jabatan" class="form-control" id="inputEmail3" placeholder="Jabatan" name="jabatan">
    </div>
  </div>
 
	<div class="form-group">
    	<div class="col-sm-offset-2 col-sm-6">			
			<button class="btn btn-primary pull-right" type="submit">Register</button> 
     	</div>
	</div>                    
		
            
            <? echo form_close(); ?>
           <!-- </form>-->
            
            </div>
            <!-- wigget content -->
            
            </div>
            <!-- widget -->          
          
          </div>
          <!-- col -->
          
        </div>
        <!-- row -->
        
        
       

<?php include($this->config->item('footer')); ?>


<script type="text/javascript">
	
	$(document).ready(function(){
	
		/* pengaturan id select dropdown */
		$_company	= $('select#company');
		$_directorate	= $('select#directorate');
		$_station	= $('select#station');
		$_unit 		= $('select#unit');
		$_subunit	= $('select#subunit');
		$_team		= $('select#team');
		
		
		/* select dengan id station on change */
		$_company.change(function(){
		
			$this = $(this);
			
			$.get( '<?php echo base_url() ?>user/ajax_station/select_directorate/' + $this.val(), function(data){
			$_directorate.html( data ? data : '<option value="01">NON</option>' );
				
				$.get( '<?php echo base_url() ?>user/ajax_station/select_station/' + $_directorate.val(), function(data){
				$_station.html( data ? data : '<option value="01">NON</option>' );
					
					$.get( '<?php echo base_url() ?>user/ajax_station/select_unit/' + $_station.val(), function(data){
					$_unit.html( data ? data : '<option value="01">NON</option>' );
					
						$.get( '<?php echo base_url() ?>user/ajax_station/select_subunit/' + $_unit.val(), function(data){
						$_subunit.html( data ? data : '<option value="01">NON</option>' );
					
							$.get( '<?php echo base_url() ?>user/ajax_station/select_team/' + $_subunit.val(), function(data){
							$_team.html( data ? data : '<option value="01">NON</option>' );
				
							});
				
						});
			
					});
			
				});
			
			});
			
		});
		
		
		$_directorate.change(function(){
		$this = $(this);
			
				$.get( '<?php echo base_url() ?>user/ajax_station/select_station/' + $this.val(), function(data){
				$_station.html( data ? data : '<option value="01">NON</option>' );
					
					$.get( '<?php echo base_url() ?>user/ajax_station/select_unit/' + $_station.val(), function(data){
					$_unit.html( data ? data : '<option value="01">NON</option>' );
					
						$.get( '<?php echo base_url() ?>user/ajax_station/select_sub_unit/' + $_unit.val(), function(data){
						$_sub_unit.html( data ? data : '<option value="01">NON</option>' );
					
							$.get( '<?php echo base_url() ?>user/ajax_station/select_team/' + $_sub_unit.val(), function(data){
							$_team.html( data ? data : '<option value="01">NON</option>' );
				
							});
				
						});
			
					});
			
				});
			
			});
		
		
		$_station.change(function(){
		$this = $(this);
			
			$.get( '<?php echo base_url() ?>user/ajax_station/select_unit/' + $this.val(), function(data){
			$_unit.html( data ? data : '<option value="01">NON</option>' );
				
				$.get( '<?php echo base_url() ?>user/ajax_station/select_subunit/' + $_unit.val(), function(data){
				$_subunit.html( data ? data : '<option value="01">NON</option>' );
					
					
					$.get( '<?php echo base_url() ?>user/ajax_station/select_team/' + $_subunit.val(), function(data){
					$_team.html( data ? data : '<option value="01">NON</option>' );
				
					});
				
				});
			
			});
			
		});
		
		
		$_unit.change(function(){
		$this = $(this);

			$.get( '<?php echo base_url() ?>user/ajax_station/select_subunit/' + $this.val(), function(data){
			$_subunit.html( data ? data : '<option value="01">NON</option>' );
				
				
				$.get( '<?php echo base_url() ?>user/ajax_station/select_team/' + $this.val(), function(data){
				$_team.html( data ? data : '<option value="01">NON</option>' );
				
				});
				
				
			});
			
		});
		
		 
		
		$_subunit.change(function(){
		$this = $(this);

			$.get( '<?php echo base_url() ?>user/ajax_station/select_team/' + $this.val(), function(data){
			$_team.html( data ? data : '<option value="01">NON</option>' );
				
			});
			
		});
		
		
		return false;
	
	});
	
</script>