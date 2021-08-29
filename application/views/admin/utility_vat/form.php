<a href="<?php echo site_url('admin/utility_vat/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Utility_vat'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/utility_vat/save/'.$utility_vat['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Vat" class="col-md-4 control-label">Vat</label>
			<div class="col-md-8">
				<input type="text" name="vat"
					value="<?php echo ($this->input->post('vat') ? $this->input->post('vat') : $utility_vat['vat']); ?>"
					class="form-control" id="vat" />
			</div>
		</div>
		<div class="form-group">
			<label for="Utility Businesstype" class="col-md-4 control-label">Utility
				Businesstype</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Utility_businesstype_model');
        $dataArr = $this->CI->Utility_businesstype_model->get_all_utility_businesstype();
        ?> 
          <select name="utility_businesstype_id"
					id="utility_businesstype_id" class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($utility_vat['utility_businesstype_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['name']?></option> 
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
		<button type="submit" class="btn btn-success"><?php if(empty($utility_vat['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
