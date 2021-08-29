<a href="<?php echo site_url('admin/inventory_buy/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Inventory_buy'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/inventory_buy/save/'.$inventory_buy['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Status" class="col-md-4 control-label">Status</label>
			<div class="col-md-8">
				<input type="text" name="status"
					value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $inventory_buy['status']); ?>"
					class="form-control" id="status" />
			</div>
		</div>
		<div class="form-group">
			<label for="Crm Billingaddress" class="col-md-4 control-label">Crm
				Billingaddress</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Crm_billingaddress_model');
        $dataArr = $this->CI->Crm_billingaddress_model->get_all_crm_billingaddress();
        ?> 
          <select name="crm_billingaddress_id"
					id="crm_billingaddress_id" class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($inventory_buy['crm_billingaddress_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['address1']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Crm Customer" class="col-md-4 control-label">Crm Customer</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Crm_customer_model');
        $dataArr = $this->CI->Crm_customer_model->get_all_crm_customer();
        ?> 
          <select name="crm_customer_id" id="crm_customer_id"
					class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($inventory_buy['crm_customer_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['first_name']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Seller Users" class="col-md-4 control-label">Seller Users</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Users_model');
        $dataArr = $this->CI->Users_model->get_all_users();
        ?> 
          <select name="seller_users_id" id="seller_users_id"
					class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($inventory_buy['seller_users_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['email']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Crm Shippingaddress" class="col-md-4 control-label">Crm
				Shippingaddress</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Crm_shippingaddress_model');
        $dataArr = $this->CI->Crm_shippingaddress_model->get_all_crm_shippingaddress();
        ?> 
          <select name="crm_shippingaddress_id"
					id="crm_shippingaddress_id" class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($inventory_buy['crm_shippingaddress_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['address1']?></option> 
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
		<button type="submit" class="btn btn-success"><?php if(empty($inventory_buy['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
