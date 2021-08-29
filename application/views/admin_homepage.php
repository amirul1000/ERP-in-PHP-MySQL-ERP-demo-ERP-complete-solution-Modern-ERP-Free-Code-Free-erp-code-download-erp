<div class="row">

	<div class="col-12 col-sm-6 col-md-6 col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="chartjs-size-monitor">
					<div class="chartjs-size-monitor-expand">
						<div class=""></div>
					</div>
					<div class="chartjs-size-monitor-shrink">
						<div class=""></div>
					</div>
				</div>
				<?php
    // $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Users_model');
    $total = $this->CI->Users_model->get_count_users();
    ?> 
                <h4 class="card-title">Users</h4>
				<div class="d-flex justify-content-between align-items-center">
					<h2 class="text-dark font-18 mb-0"><?=$total?></h2>
					<div
						class="text-success font-weight-bold d-flex justify-content-between align-items-center">
						<i class="fa fa-arrow-right mr-1"></i> <span
							class=" text-extra-small"> <a
							href="<?php echo site_url('admin/users/index'); ?>">View</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 col-md-6 col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="chartjs-size-monitor">
					<div class="chartjs-size-monitor-expand">
						<div class=""></div>
					</div>
					<div class="chartjs-size-monitor-shrink">
						<div class=""></div>
					</div>
				</div>
				<?php
    // $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Country_model');
    $total = $this->CI->Country_model->get_count_country();
    ?> 
                <h4 class="card-title">Country</h4>
				<div class="d-flex justify-content-between align-items-center">
					<h2 class="text-dark font-18 mb-0"><?=$total?></h2>
					<div
						class="text-success font-weight-bold d-flex justify-content-between align-items-center">
						<i class="fa fa-arrow-right mr-1"></i> <span
							class=" text-extra-small"> <a
							href="<?php echo site_url('admin/country/index'); ?>">View</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>







</div>



<div class="row">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

<div id="calendar1"></div>

<!-- Calendar-->
<!--https://fullcalendar.io/docs/initialize-globals-->
      <script language="javascript">
		$(document).ready(function() {
		
		  $('#calendar1').fullCalendar({
				editable:true,
				header:{
				 left:'prev,next today',
				 center:'title',
				 right:'month,agendaWeek,agendaDay'
				},
				events: '<?php echo site_url('admin/homecontroller/load')?>',
				selectable:true,
				selectHelper:true,
				select: function(start, end, allDay)
				{
					var date = new Date(start).toISOString().substring(0, 10);
					field = document.querySelector('#start_date');
					field.value = date;
					
					
					var date = new Date();
					field = document.querySelector('#start_time');
					field.value = date.getHours()+ ":"+ date.getMinutes();
					
					$('#exampleModal').modal('show'); 

				 /*var title = prompt("Enter Event Title");
				 if(title)
				 {
				  var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
				  var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
				  $.ajax({
				   url:"<?php echo site_url('admin/homecontroller/insert')?>",
				   type:"POST",
				   data:{title:title, start:start, end:end},
				   success:function()
				   {
					calendar.fullCalendar('refetchEvents');
					alert("Added Successfully");
				   }
				  })
				 }*/
				},
				editable:true,
				eventResize:function(event)
				{
				 var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
				 var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
				 var title = event.title;
				 var id = event.id;
				 $.ajax({
				  url:"<?php echo site_url('admin/homecontroller/update')?>",
				  type:"POST",
				  data:{title:title, start:start, end:end, id:id},
				  success:function(){
				   calendar.fullCalendar('refetchEvents');
				   alert('Event Update');
				  }
				 })
				},
			
				eventDrop:function(event)
				{
				 var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
				 var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
				 var title = event.title;
				 var id = event.id;
				 $.ajax({
				  url:"<?php echo site_url('admin/homecontroller/update')?>",
				  type:"POST",
				  data:{title:title, start:start, end:end, id:id},
				  success:function()
				  {
				   calendar.fullCalendar('refetchEvents');
				   alert("Event Updated");
				  }
				 });
				},
			
				eventClick:function(event)
				{
				 if(confirm("Are you sure you want to remove it?"))
				 {
				  var id = event.id;
				  $.ajax({
				   url:"<?php echo site_url('admin/homecontroller/delete')?>",
				   type:"POST",
				   data:{id:id},
				   success:function()
				   {
					calendar.fullCalendar('refetchEvents');
					alert("Event Removed");
				   }
				  })
				 }
				},
			
			   });
         });
	</script>
	
</div>

<div class="modal fade" id="exampleModal"
    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Customer service</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--Form to save data-->
				<?php echo form_open_multipart('admin/homecontroller/save/',array("class"=>"form-horizontal")); ?>
                <div class="card">
                    <div class="card-body">
                   
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <!--End of Form to save data//-->
            </div>
        </div>
    </div>
</div>
