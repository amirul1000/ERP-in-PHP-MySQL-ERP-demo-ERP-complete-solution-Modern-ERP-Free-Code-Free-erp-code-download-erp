<a href="<?php echo site_url('admin/hr_promotions/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Hr_promotions'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/hr_promotions/save/'.$hr_promotions['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Hr Employee" class="col-md-4 control-label">Hr Employee</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Hr_employee_model');
        $dataArr = $this->CI->Hr_employee_model->get_all_hr_employee();
        ?> 
          <select name="hr_employee_id" id="hr_employee_id"
					class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($hr_promotions['hr_employee_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['first_name']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Date Promotion" class="col-md-4 control-label">Date
				Promotion</label>
			<div class="col-md-8">
				<input type="text" name="date_promotion" id="date_promotion"
					value="<?php echo ($this->input->post('date_promotion') ? $this->input->post('date_promotion') : $hr_promotions['date_promotion']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Designation" class="col-md-4 control-label">Designation</label>
			<div class="col-md-8">
				<input type="text" name="designation"
					value="<?php echo ($this->input->post('designation') ? $this->input->post('designation') : $hr_promotions['designation']); ?>"
					class="form-control" id="designation" />
			</div>
		</div>
		<div class="form-group">
			<label for="Pay Scale" class="col-md-4 control-label">Pay Scale</label>
			<div class="col-md-8">
				<input type="text" name="pay_scale"
					value="<?php echo ($this->input->post('pay_scale') ? $this->input->post('pay_scale') : $hr_promotions['pay_scale']); ?>"
					class="form-control" id="pay_scale" />
			</div>
		</div>
		<div class="form-group">
			<label for="Nature Promotion" class="col-md-4 control-label">Nature
				Promotion</label>
			<div class="col-md-8">
				<input type="text" name="nature_promotion"
					value="<?php echo ($this->input->post('nature_promotion') ? $this->input->post('nature_promotion') : $hr_promotions['nature_promotion']); ?>"
					class="form-control" id="nature_promotion" />
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($hr_promotions['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
