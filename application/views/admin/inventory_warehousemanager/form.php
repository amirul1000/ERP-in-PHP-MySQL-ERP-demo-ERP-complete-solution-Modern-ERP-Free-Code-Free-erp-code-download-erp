<a
	href="<?php echo site_url('admin/inventory_warehousemanager/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Inventory_warehousemanager'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/inventory_warehousemanager/save/'.$inventory_warehousemanager['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Appointed Date" class="col-md-4 control-label">Appointed
				Date</label>
			<div class="col-md-8">
				<input type="text" name="appointed_date" id="appointed_date"
					value="<?php echo ($this->input->post('appointed_date') ? $this->input->post('appointed_date') : $inventory_warehousemanager['appointed_date']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Date End" class="col-md-4 control-label">Date End</label>
			<div class="col-md-8">
				<input type="text" name="date_end" id="date_end"
					value="<?php echo ($this->input->post('date_end') ? $this->input->post('date_end') : $inventory_warehousemanager['date_end']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Status" class="col-md-4 control-label">Status</label>
			<div class="col-md-8">
				<input type="text" name="status"
					value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $inventory_warehousemanager['status']); ?>"
					class="form-control" id="status" />
			</div>
		</div>
		<div class="form-group">
			<label for="Manager Hr Employee" class="col-md-4 control-label">Manager
				Hr Employee</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Hr_employee_model');
        $dataArr = $this->CI->Hr_employee_model->get_all_hr_employee();
        ?> 
          <select name="manager_hr_employee_id"
					id="manager_hr_employee_id" class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($inventory_warehousemanager['manager_hr_employee_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['first_name']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Inventory Warehouse" class="col-md-4 control-label">Inventory
				Warehouse</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Inventory_warehouse_model');
        $dataArr = $this->CI->Inventory_warehouse_model->get_all_inventory_warehouse();
        ?> 
          <select name="inventory_warehouse_id"
					id="inventory_warehouse_id" class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($inventory_warehousemanager['inventory_warehouse_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['created_on']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($inventory_warehousemanager['id'])){?>Save<?php }else{?>Update<?php } ?></button>
	</div>
</div>
<?php echo form_close(); ?>
<!--End of Form to save data//-->
<!--JQuery-->
<script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '<?php echo base_url(); ?>public/datepicker/images/calendar.gif',
	});
</script>
