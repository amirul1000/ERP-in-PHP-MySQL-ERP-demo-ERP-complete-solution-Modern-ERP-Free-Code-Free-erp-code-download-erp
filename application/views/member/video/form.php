<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script type="text/javascript"
	src="<?php echo base_url(); ?>public/selectize/selectize.js"></script>
<link rel='stylesheet'
	href='<?php echo base_url(); ?>public/selectize/selectize.css'>
<link rel='stylesheet'
	href='<?php echo base_url(); ?>public/selectize/selectize.default.css'>
<style type="text/css">
.selectize-input {
	width: 100% !important;
	height: 62px !important;
}
</style>
<style>
/*progressbar*/
#progressbar {
	margin-bottom: 30px;
	overflow: hidden;
	/*CSS counters to number the steps*/
	counter-reset: step;
}

#progressbar li {
	list-style-type: none;
	color: #333;
	text-transform: uppercase;
	text-align: center;
	font-size: 12px;
	width: 13%;
	float: left;
	position: relative;
}

#progressbar li:before {
	content: counter(step);
	counter-increment: step;
	width: 20px;
	line-height: 20px;
	display: block;
	font-size: 10px;
	color: #333;
	background: white;
	border-radius: 3px;
	margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
	content: '';
	width: 100%;
	height: 2px;
	background: white;
	position: absolute;
	left: -50%;
	top: 9px;
	z-index: -1; /*put it behind the numbers*/
}

#progressbar li:first-child:after {
	/*connector not needed before the first step*/
	content: none;
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before, #progressbar li.active:after {
	background: #27AE60;
	color: white;
}
</style>
<a href="<?php echo site_url('member/video/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Video'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('member/video/save/'.$video['id'],array("id"=>"frm_videos","class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Users" class="col-md-4 control-label">Channel</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Channel_model');
        $dataArr = $this->CI->Channel_model->get_all_users_channel();
        ?> 
          <select name="channel_id" id="channel_id" class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($video['channel_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['channel_name']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>

		<div class="form-group">
			<label for="Video Title" class="col-md-4 control-label">Video Title</label>
			<div class="col-md-8">
				<input type="text" name="video_title"
					value="<?php echo ($this->input->post('video_title') ? $this->input->post('video_title') : $video['video_title']); ?>"
					class="form-control" id="video_title" />
			</div>
		</div>
		<div class="form-group">
			<label for="Video Description" class="col-md-4 control-label">Video
				Description</label>
			<div class="col-md-8">
				<textarea name="video_description" id="video_description"
					class="form-control" rows="4" /><?php echo ($this->input->post('video_description') ? $this->input->post('video_description') : $video['video_description']); ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="category" class="col-md-4 control-label">Category</label>
			<div class="col-md-8">
				<input type="text" name="category"
					value="<?php echo ($this->input->post('category') ? $this->input->post('category') : $video['category']); ?>"
					id="category" />
				<script>
				//$(document).ready(function() {
					$('#category')
								.selectize({
										plugins: ['remove_button'],
										persist: false,
										create: true,
										maxItems: null,
										valueField: 'id',
										placeholder: 'Category ...',
										labelField: 'title',
										searchField: 'title',
										options: [
												  <?php
            foreach ($category as $value) {
                ?>
													 {id: '<?php echo $value['cat_name'];?>', title: '<?php echo $value['cat_name'];?>', url: ''},
												  <?php
            }
            ?>	 
												],
												create: true
											});
				
				//});
			 </script>
			</div>
		</div>
		<div class="form-group">
			<label for="File Banner" class="col-md-4 control-label">File Banner</label>
			<div class="col-md-8">
				<input type="file" name="file_poster" id="file_poster"
					value="<?php echo ($this->input->post('file_poster') ? $this->input->post('file_poster') : $video['file_poster']); ?>"
					class="form-control-file" />
			</div>
		</div>
		<div class="form-group">
			<label for="File Thumbnail" class="col-md-4 control-label">File
				Thumbnail</label>
			<div class="col-md-8">
				<input type="file" name="file_thumbnail" id="file_thumbnail"
					value="<?php echo ($this->input->post('file_thumbnail') ? $this->input->post('file_thumbnail') : $video['file_thumbnail']); ?>"
					class="form-control-file" />
			</div>
		</div>
		<div class="form-group">
			<label for="category" class="col-md-4 control-label">Content type</label>
			<div class="col-md-8">
				<input type="text" name="content_type"
					value="<?php echo ($this->input->post('content_type') ? $this->input->post('content_type') : $video['content_type']); ?>"
					id="content_type" />
				<script>
				//$(document).ready(function() {
					$('#content_type')
								.selectize({
										plugins: ['remove_button'],
										persist: false,
										create: true,
										maxItems: null,
										valueField: 'id',
										placeholder: 'Content type ...',
										labelField: 'title',
										searchField: 'title',
										maxItems:1,
										onChange: function(value) {
											 if(value=='Video' || value=='Audio'){
											   $('.url').hide();
											   $('.video').show();
											 }
											 else{
												 $('.video').hide();
											     $('.url').show();
												}
											},
										options: [												 
													{id: 'Video', title: 'Video', url: ''},
													{id: 'Audio', title: 'Audio', url: ''},
													{id: 'YouTube', title: 'YouTube', url: ''},
													{id: 'Vimeo', title: 'Vimeo', url: ''},	
													{id: 'Google Drive Video', title: 'Google Drive Video', url: ''},
												 
												],
												create: true
											});
				
				//});
			 </script>
			</div>
		</div>
		<div class="form-group video">
			<label for="File Video" class="col-md-4 control-label">File
				Video/Audio(.mp3/.mp4)</label>
			<div class="col-md-8">
				<input type="file" name="file_video" id="file_video"
					value="<?php echo ($this->input->post('file_video') ? $this->input->post('file_video') : $video['file_video']); ?>"
					class="form-control-file" />
			</div>
		</div>
		<div class="form-group url">
			<label for="Video Url" class="col-md-4 control-label">Video
				Url/Embded HTML</label>
			<div class="col-md-8">
				<textarea name="video_url" class="form-control" id="video_url" /><?php echo ($this->input->post('video_url') ? $this->input->post('video_url') : $video['video_url']); ?>
                    </textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="category" class="col-md-4 control-label">Display at</label>
			<div class="col-md-8">
				<input type="text" name="display_at"
					value="<?php echo ($this->input->post('display_at') ? $this->input->post('display_at') : $video['display_at']); ?>"
					id="display_at" />
				<script>
				//$(document).ready(function() {
					$('#display_at')
								.selectize({
										plugins: ['remove_button'],
										persist: false,
										create: true,
										maxItems: null,
										valueField: 'id',
										placeholder: 'Display at ...',
										labelField: 'title',
										searchField: 'title',										
										options: [												 
													{id: 'Featured', title: 'Featured', url: ''},
													{id: 'Top', title: 'Top', url: ''},
													{id: 'List', title: 'List', url: ''},
												],
												create: true
											});
				
				//});
			 </script>
			</div>
		</div>
		<div class="form-group">
			<label for="Display Order No" class="col-md-4 control-label">Display
				Order No</label>
			<div class="col-md-8">
				<input type="text" name="display_order_no"
					value="<?php echo ($this->input->post('display_order_no') ? $this->input->post('display_order_no') : $video['display_order_no']); ?>"
					class="form-control" id="display_order_no" />
			</div>
		</div>
		<div class="form-group">
			<label for="Status" class="col-md-4 control-label">Pub Status</label>
			<div class="col-md-8"> 
           <?php
        $enumArr = $this->customlib->getEnumFieldValues('video', 'pub_status');
        ?> 
           <select name="pub_status" id="pub_status"
					class="form-control" />
				<option value="">--Select--</option> 
             <?php
            for ($i = 0; $i < count($enumArr); $i ++) {
                ?> 
             <option value="<?=$enumArr[$i]?>"
					<?php if($video['pub_status']==$enumArr[$i]){ echo "selected";} ?>><?=ucwords($enumArr[$i])?></option> 
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
		<button type="submit" class="btn btn-success"><?php if(empty($video['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
<script language="javascript">
function fillUpChannel(users_id)
{
    objselect = document.getElementById("channel_id");
    objselect.options.length = 0;
	$("#spinner").html('<img src="<?php echo base_url(); ?>public/uploads/indicator.gif" alt="Wait" />');
    $.ajax({  
      url: '<?php echo site_url('member/video/get_users_channel/')?>'+users_id,
      success: function(data) {
              var obj = eval(data);    
              
              objselect.add(new Option('--select--',''), null);
              for(var i=0;i<obj.length;i++)
              {
                 text = obj[i].channel_name;
                 objselect.add(new Option(text,obj[i].id), null);
              }
            $("#spinner").html('');
          }
        });
}
</script>