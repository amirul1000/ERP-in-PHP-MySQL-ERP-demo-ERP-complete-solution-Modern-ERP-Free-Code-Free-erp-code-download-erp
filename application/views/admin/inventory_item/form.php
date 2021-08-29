<a href="<?php echo site_url('admin/inventory_item/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Inventory_item'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/inventory_item/save/'.$inventory_item['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Name" class="col-md-4 control-label">Name</label>
			<div class="col-md-8">
				<input type="text" name="name"
					value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $inventory_item['name']); ?>"
					class="form-control" id="name" />
			</div>
		</div>
		<div class="form-group">
			<label for="Brand" class="col-md-4 control-label">Brand</label>
			<div class="col-md-8">
				<input type="text" name="brand"
					value="<?php echo ($this->input->post('brand') ? $this->input->post('brand') : $inventory_item['brand']); ?>"
					class="form-control" id="brand" />
			</div>
		</div>
		<div class="form-group">
			<label for="Model" class="col-md-4 control-label">Model</label>
			<div class="col-md-8">
				<input type="text" name="model"
					value="<?php echo ($this->input->post('model') ? $this->input->post('model') : $inventory_item['model']); ?>"
					class="form-control" id="model" />
			</div>
		</div>
		<div class="form-group">
			<label for="Item Quantity" class="col-md-4 control-label">Item
				Quantity</label>
			<div class="col-md-8">
				<input type="text" name="item_quantity"
					value="<?php echo ($this->input->post('item_quantity') ? $this->input->post('item_quantity') : $inventory_item['item_quantity']); ?>"
					class="form-control" id="item_quantity" />
			</div>
		</div>
		<div class="form-group">
			<label for="Date Added" class="col-md-4 control-label">Date Added</label>
			<div class="col-md-8">
				<input type="text" name="date_added" id="date_added"
					value="<?php echo ($this->input->post('date_added') ? $this->input->post('date_added') : $inventory_item['date_added']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Slug" class="col-md-4 control-label">Slug</label>
			<div class="col-md-8">
				<input type="text" name="slug"
					value="<?php echo ($this->input->post('slug') ? $this->input->post('slug') : $inventory_item['slug']); ?>"
					class="form-control" id="slug" />
			</div>
		</div>
		<div class="form-group">
			<label for="Inventory Category" class="col-md-4 control-label">Inventory
				Category</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Inventory_category_model');
        $dataArr = $this->CI->Inventory_category_model->get_all_inventory_category();
        ?> 
          <select name="inventory_category_id"
					id="inventory_category_id" class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($inventory_item['inventory_category_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['description']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Item Utility Unit" class="col-md-4 control-label">Item
				Utility Unit</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Utility_unit_model');
        $dataArr = $this->CI->Utility_unit_model->get_all_utility_unit();
        ?> 
          <select name="item_utility_unit_id" id="item_utility_unit_id"
					class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($inventory_item['item_utility_unit_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['name']?></option> 
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
					<?php if($inventory_item['inventory_warehouse_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['created_on']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Orginal Price" class="col-md-4 control-label">Orginal
				Price</label>
			<div class="col-md-8">
				<input type="text" name="orginal_price"
					value="<?php echo ($this->input->post('orginal_price') ? $this->input->post('orginal_price') : $inventory_item['orginal_price']); ?>"
					class="form-control" id="orginal_price" />
			</div>
		</div>
		<div class="form-group">
			<label for="Sale Price" class="col-md-4 control-label">Sale Price</label>
			<div class="col-md-8">
				<input type="text" name="sale_price"
					value="<?php echo ($this->input->post('sale_price') ? $this->input->post('sale_price') : $inventory_item['sale_price']); ?>"
					class="form-control" id="sale_price" />
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($inventory_item['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
