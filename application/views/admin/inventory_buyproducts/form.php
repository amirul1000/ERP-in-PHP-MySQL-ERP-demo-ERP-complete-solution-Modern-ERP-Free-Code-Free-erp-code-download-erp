<a href="<?php echo site_url('admin/inventory_buyproducts/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Inventory_buyproducts'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/inventory_buyproducts/save/'.$inventory_buyproducts['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Quantity" class="col-md-4 control-label">Quantity</label>
			<div class="col-md-8">
				<input type="text" name="quantity"
					value="<?php echo ($this->input->post('quantity') ? $this->input->post('quantity') : $inventory_buyproducts['quantity']); ?>"
					class="form-control" id="quantity" />
			</div>
		</div>
		<div class="form-group">
			<label for="Discount" class="col-md-4 control-label">Discount</label>
			<div class="col-md-8">
				<input type="text" name="discount"
					value="<?php echo ($this->input->post('discount') ? $this->input->post('discount') : $inventory_buyproducts['discount']); ?>"
					class="form-control" id="discount" />
			</div>
		</div>
		<div class="form-group">
			<label for="Tax" class="col-md-4 control-label">Tax</label>
			<div class="col-md-8">
				<input type="text" name="tax"
					value="<?php echo ($this->input->post('tax') ? $this->input->post('tax') : $inventory_buyproducts['tax']); ?>"
					class="form-control" id="tax" />
			</div>
		</div>
		<div class="form-group">
			<label for="Date Added" class="col-md-4 control-label">Date Added</label>
			<div class="col-md-8">
				<input type="text" name="date_added" id="date_added"
					value="<?php echo ($this->input->post('date_added') ? $this->input->post('date_added') : $inventory_buyproducts['date_added']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Slug" class="col-md-4 control-label">Slug</label>
			<div class="col-md-8">
				<input type="text" name="slug"
					value="<?php echo ($this->input->post('slug') ? $this->input->post('slug') : $inventory_buyproducts['slug']); ?>"
					class="form-control" id="slug" />
			</div>
		</div>
		<div class="form-group">
			<label for="Inventory Buy" class="col-md-4 control-label">Inventory
				Buy</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Inventory_buy_model');
        $dataArr = $this->CI->Inventory_buy_model->get_all_inventory_buy();
        ?> 
          <select name="inventory_buy_id" id="inventory_buy_id"
					class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($inventory_buyproducts['inventory_buy_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['status']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Inventory Item" class="col-md-4 control-label">Inventory
				Item</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Inventory_item_model');
        $dataArr = $this->CI->Inventory_item_model->get_all_inventory_item();
        ?> 
          <select name="inventory_item_id" id="inventory_item_id"
					class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($inventory_buyproducts['inventory_item_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['name']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Utility Unit" class="col-md-4 control-label">Utility Unit</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Utility_unit_model');
        $dataArr = $this->CI->Utility_unit_model->get_all_utility_unit();
        ?> 
          <select name="utility_unit_id" id="utility_unit_id"
					class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($inventory_buyproducts['utility_unit_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['name']?></option> 
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
		<button type="submit" class="btn btn-success"><?php if(empty($inventory_buyproducts['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
