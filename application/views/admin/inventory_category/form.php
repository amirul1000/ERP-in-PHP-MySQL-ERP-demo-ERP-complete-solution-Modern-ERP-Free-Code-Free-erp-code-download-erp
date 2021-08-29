<a href="<?php echo site_url('admin/inventory_category/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Inventory_category'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/inventory_category/save/'.$inventory_category['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Description" class="col-md-4 control-label">Description</label>
			<div class="col-md-8">
				<input type="text" name="description"
					value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $inventory_category['description']); ?>"
					class="form-control" id="description" />
			</div>
		</div>
		<div class="form-group">
			<label for="Slug" class="col-md-4 control-label">Slug</label>
			<div class="col-md-8">
				<input type="text" name="slug"
					value="<?php echo ($this->input->post('slug') ? $this->input->post('slug') : $inventory_category['slug']); ?>"
					class="form-control" id="slug" />
			</div>
		</div>
		<div class="form-group">
			<label for="Name" class="col-md-4 control-label">Name</label>
			<div class="col-md-8">
				<input type="text" name="name"
					value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $inventory_category['name']); ?>"
					class="form-control" id="name" />
			</div>
		</div>
		<div class="form-group">
			<label for="Parent Inventory Category" class="col-md-4 control-label">Parent
				Inventory Category</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Inventory_category_model');
        $dataArr = $this->CI->Inventory_category_model->get_all_inventory_category();
        ?> 
          <select name="parent_inventory_category_id"
					id="parent_inventory_category_id" class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($inventory_category['parent_inventory_category_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['description']?></option> 
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
		<button type="submit" class="btn btn-success"><?php if(empty($inventory_category['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
