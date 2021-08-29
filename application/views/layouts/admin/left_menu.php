<!--Left Menu-->
<nav>
	<ul class="sidebar-menu" data-widget="tree">
		<li class="sidemenu-user-profile d-flex align-items-center">
			<div class="user-thumbnail">
                <?php
                if (is_file(APPPATH . '../public/' . $this->session->userdata['file_picture']) && file_exists(APPPATH . '../public/' . $this->session->userdata['file_picture'])) {
                    ?>
					  <img
					src="<?php echo base_url().'public/'.$this->session->userdata['file_picture']?>"
					alt="">
				<?php
                } else {
                    ?>
					  <img class="border-radius-50"
					src="<?php echo base_url()?>public/uploads/no_image.jpg">
				<?php
                }
                ?>
            </div>
			<div class="user-content">
				<h6><?php echo $this->session->userdata['first_name']?> <?php echo $this->session->userdata['last_name']?></h6>
				<!--<span>Pro User</span>-->
			</div>
		</li>
		<li <?php if($this->router->fetch_class()=="homecontroller"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('admin/homecontroller'); ?>"><i
				class="icon_lifesaver"></i> <span>Dashboard</span></a></li>
        <?php
        $menu_open = false;
        if ($this->router->fetch_class() == "profile" || $this->router->fetch_class() == "country" || $this->router->fetch_class() == "company" || $this->router->fetch_class() == "users") {
            $menu_open = true;
        }
        ?>
        <li
			class="treeview <?php if($menu_open==true){?>menu-open<?php }?>"><a
			href="javascript:void(0)"><i class="icon_document_alt"></i> <span>Settings</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" <?php if($menu_open==true){?>
				style="display: block;" <?php }?>>
				<li <?php if($this->router->fetch_class()=="profile"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/profile/index'); ?>">- Profile</a></li>
				<li <?php if($this->router->fetch_class()=="country"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/country/index'); ?>">- Country</a></li>
				<li <?php if($this->router->fetch_class()=="company"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/company/index'); ?>">- Company</a></li>
				<li <?php if($this->router->fetch_class()=="users"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/users/index'); ?>">- Users</a></li>
			</ul></li> 
        
        <?php
        $menu_open = false;
        if ($this->router->fetch_class() == "utility_businesstype" || 
		$this->router->fetch_class() == "utility_company" || 
		$this->router->fetch_class() == "utility_companybranch" || 
		$this->router->fetch_class() == "utility_predfinedpointsrule" || 
		$this->router->fetch_class() == "utility_schedulebasemodel" || 
		$this->router->fetch_class() == "utility_taskunitspointsbasemodel" || 
		$this->router->fetch_class() == "utility_tax" || 
		$this->router->fetch_class() == "utility_unit" || 
		$this->router->fetch_class() == "utility_userprofile" || 
		$this->router->fetch_class() == "utility_vat") {
            $menu_open = true;
        }
        ?>
                <li
			class="treeview <?php if($menu_open==true){?>menu-open<?php }?>"><a
			href="javascript:void(0)"><i class="icon_document_alt"></i> <span>Utility</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" <?php if($menu_open==true){?>
				style="display: block;" <?php }?>>

				<li
					<?php if($this->router->fetch_class()=="utility_businesstype"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/utility_businesstype/index'); ?>"><i
						class="icon_table"></i>Business type</a></li>
				<li <?php if($this->router->fetch_class()=="utility_company"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/utility_company/index'); ?>"><i
						class="icon_table"></i>Company</a></li>
				<li
					<?php if($this->router->fetch_class()=="utility_companybranch"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/utility_companybranch/index'); ?>"><i
						class="icon_table"></i>Company branch</a></li>
				<li
					<?php if($this->router->fetch_class()=="utility_predfinedpointsrule"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/utility_predfinedpointsrule/index'); ?>"><i
						class="icon_table"></i>Predfined points rule</a></li>
				<li
					<?php if($this->router->fetch_class()=="utility_schedulebasemodel"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/utility_schedulebasemodel/index'); ?>"><i
						class="icon_table"></i>Schedule base model</a></li>
				<li
					<?php if($this->router->fetch_class()=="utility_taskunitspointsbasemodel"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/utility_taskunitspointsbasemodel/index'); ?>"><i
						class="icon_table"></i>Task units points base model</a></li>
				<li <?php if($this->router->fetch_class()=="utility_tax"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/utility_tax/index'); ?>"><i
						class="icon_table"></i>Tax</a></li>
				<li <?php if($this->router->fetch_class()=="utility_unit"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/utility_unit/index'); ?>"><i
						class="icon_table"></i>Unit</a></li>
				<li <?php if($this->router->fetch_class()=="utility_userprofile"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/utility_userprofile/index'); ?>"><i
						class="icon_table"></i>User profile</a></li>
				<li <?php if($this->router->fetch_class()=="utility_vat"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/utility_vat/index'); ?>"><i
						class="icon_table"></i>Vat</a></li>
			</ul></li>

        <?php
			$menu_open = false;
			if ($this->router->fetch_class() == "account_emailaddress" || 
			$this->router->fetch_class() == "account_emailconfirmation" ||
			$this->router->fetch_class() == "accounting_accounttype" ||
			$this->router->fetch_class() == "accounting_accountyear" ||
			$this->router->fetch_class() == "accounting_journalentry" 
			/*$this->router->fetch_class() == "accounting_ledger" || 
			$this->router->fetch_class() == "accounting_transaction" || 
			$this->router->fetch_class() == "accounting_transactiondetails"*/ ) {
			$menu_open = true;
        }
        ?>
		<li class="treeview <?php if($menu_open==true){?>menu-open<?php }?>">
			<a href="javascript:void(0)"><i class="icon_document_alt"></i> <span>Accounting</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" <?php if($menu_open==true){?>
				style="display: block;" <?php }?>>

				<!--<li
					<?php if($this->router->fetch_class()=="account_emailaddress"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/account_emailaddress/index'); ?>"><i
						class="icon_table"></i>Emailaddress</a></li>
				<li
					<?php if($this->router->fetch_class()=="account_emailconfirmation"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/account_emailconfirmation/index'); ?>"><i
						class="icon_table"></i>Emailconfirmation</a></li>-->
				<li
					<?php if($this->router->fetch_class()=="accounting_accounttype"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/accounting_accounttype/index'); ?>"><i
						class="icon_table"></i>Accounttype</a></li>
				<li
					<?php if($this->router->fetch_class()=="accounting_accountyear"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/accounting_accountyear/index'); ?>"><i
						class="icon_table"></i>Accountyear</a></li>
				<li
					<?php if($this->router->fetch_class()=="accounting_journalentry"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/accounting_journalentry/index'); ?>"><i
						class="icon_table"></i>Journalentry</a></li>
				<li <?php if($this->router->fetch_class()=="accounting_ledger"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/accounting_ledger/index'); ?>"><i
						class="icon_table"></i>Ledger</a></li>
				<li
					<?php if($this->router->fetch_class()=="accounting_transaction"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/accounting_transaction/index'); ?>"><i
						class="icon_table"></i>Transaction</a></li>
				<li
					<?php if($this->router->fetch_class()=="accounting_transactiondetails"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/accounting_transactiondetails/index'); ?>"><i
						class="icon_table"></i>Transactiondetails</a></li>
			</ul>
		</li>

         <?php
			$menu_open = false;
			if ($this->router->fetch_class() == "attendance_attendance" || 
			$this->router->fetch_class() == "attendance_in_out_track" ||
			$this->router->fetch_class() == "attendance_leave" ||
			$this->router->fetch_class() == "attendance_leaveapplication" ||
			$this->router->fetch_class() == "attendance_leaveapplicationdetails" ) {
			$menu_open = true;
        }
        ?>
		<li class="treeview <?php if($menu_open==true){?>menu-open<?php }?>">
			<a href="javascript:void(0)"><i class="icon_document_alt"></i> <span>Attendance</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" <?php if($menu_open==true){?>
				style="display: block;" <?php }?>>

				<li
					<?php if($this->router->fetch_class()=="attendance_attendance"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/attendance_attendance/index'); ?>"><i
						class="icon_table"></i>Attendance Attendance</a></li>
				<li
					<?php if($this->router->fetch_class()=="attendance_in_out_track"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/attendance_in_out_track/index'); ?>"><i
						class="icon_table"></i>Attendance In Out Track</a></li>
				<li <?php if($this->router->fetch_class()=="attendance_leave"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/attendance_leave/index'); ?>"><i
						class="icon_table"></i>Attendance Leave</a></li>
				<li
					<?php if($this->router->fetch_class()=="attendance_leaveapplication"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/attendance_leaveapplication/index'); ?>"><i
						class="icon_table"></i>Attendance Leaveapplication</a></li>
				<li
					<?php if($this->router->fetch_class()=="attendance_leaveapplicationdetails"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/attendance_leaveapplicationdetails/index'); ?>"><i
						class="icon_table"></i>Attendance Leaveapplicationdetails</a></li>
			</ul>
		</li>
          <?php
			$menu_open = false;
			if ($this->router->fetch_class() == "crm_billingaddress" || 
			$this->router->fetch_class() == "crm_customer" ||
			$this->router->fetch_class() == "crm_lead" ||
			$this->router->fetch_class() == "crm_shippingaddress" ||
			$this->router->fetch_class() == "crm_supplier"  ) {
			$menu_open = true;
        }
        ?>
		<li class="treeview <?php if($menu_open==true){?>menu-open<?php }?>">
			<a href="javascript:void(0)"><i class="icon_document_alt"></i> <span>CRM</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" <?php if($menu_open==true){?>
				style="display: block;" <?php }?>>

				<li <?php if($this->router->fetch_class()=="crm_billingaddress"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/crm_billingaddress/index'); ?>"><i
						class="icon_table"></i>Crm Billingaddress</a></li>
				<li <?php if($this->router->fetch_class()=="crm_customer"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/crm_customer/index'); ?>"><i
						class="icon_table"></i>Crm Customer</a></li>
				<li <?php if($this->router->fetch_class()=="crm_lead"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/crm_lead/index'); ?>"><i
						class="icon_table"></i>Crm Lead</a></li>
				<li <?php if($this->router->fetch_class()=="crm_shippingaddress"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/crm_shippingaddress/index'); ?>"><i
						class="icon_table"></i>Crm Shippingaddress</a></li>
				<li <?php if($this->router->fetch_class()=="crm_supplier"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/crm_supplier/index'); ?>"><i
						class="icon_table"></i>Crm Supplier</a></li>
			</ul>
		</li>
       
       <?php
			$menu_open = false;
			if ($this->router->fetch_class() == "hr_address" || 
			$this->router->fetch_class() == "hr_children" ||
			$this->router->fetch_class() == "hr_disciplinaryaction" ||
			$this->router->fetch_class() == "hr_district" ||
			$this->router->fetch_class() == "hr_education" ||
			$this->router->fetch_class() == "hr_employee" || 
			$this->router->fetch_class() == "hr_employee_achievement" || 
			$this->router->fetch_class() == "hr_languages" ||
			$this->router->fetch_class() == "hr_promotions" ||
			$this->router->fetch_class() == "hr_rest_of_recreation" ||
			$this->router->fetch_class() == "hr_retirement_year" ||
			$this->router->fetch_class() == "hr_servicehistory" ||
			$this->router->fetch_class() == "hr_training" ) {
			$menu_open = true;
        }
        ?>
		<li class="treeview <?php if($menu_open==true){?>menu-open<?php }?>">
			<a href="javascript:void(0)"><i class="icon_document_alt"></i> <span>HR</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" <?php if($menu_open==true){?>
				style="display: block;" <?php }?>>

				<li <?php if($this->router->fetch_class()=="hr_address"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/hr_address/index'); ?>"><i
						class="icon_table"></i>Hr Address</a></li>
				<li <?php if($this->router->fetch_class()=="hr_children"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/hr_children/index'); ?>"><i
						class="icon_table"></i>Hr Children</a></li>
				<li
					<?php if($this->router->fetch_class()=="hr_disciplinaryaction"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/hr_disciplinaryaction/index'); ?>"><i
						class="icon_table"></i>Hr Disciplinaryaction</a></li>
				<li <?php if($this->router->fetch_class()=="hr_district"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/hr_district/index'); ?>"><i
						class="icon_table"></i>Hr District</a></li>
				<li <?php if($this->router->fetch_class()=="hr_education"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/hr_education/index'); ?>"><i
						class="icon_table"></i>Hr Education</a></li>
				<li <?php if($this->router->fetch_class()=="hr_employee"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/hr_employee/index'); ?>"><i
						class="icon_table"></i>Hr Employee</a></li>
				<li
					<?php if($this->router->fetch_class()=="hr_employee_achievement"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/hr_employee_achievement/index'); ?>"><i
						class="icon_table"></i>Hr Employee Achievement</a></li>
				<li <?php if($this->router->fetch_class()=="hr_languages"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/hr_languages/index'); ?>"><i
						class="icon_table"></i>Hr Languages</a></li>
				<li <?php if($this->router->fetch_class()=="hr_promotions"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/hr_promotions/index'); ?>"><i
						class="icon_table"></i>Hr Promotions</a></li>
				<li
					<?php if($this->router->fetch_class()=="hr_rest_of_recreation"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/hr_rest_of_recreation/index'); ?>"><i
						class="icon_table"></i>Hr Rest Of Recreation</a></li>
				<li <?php if($this->router->fetch_class()=="hr_retirement_year"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/hr_retirement_year/index'); ?>"><i
						class="icon_table"></i>Hr Retirement Year</a></li>
				<li <?php if($this->router->fetch_class()=="hr_servicehistory"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/hr_servicehistory/index'); ?>"><i
						class="icon_table"></i>Hr Servicehistory</a></li>
				<li <?php if($this->router->fetch_class()=="hr_training"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/hr_training/index'); ?>"><i
						class="icon_table"></i>Hr Training</a></li>
			</ul>
		</li>
        
        <?php
			$menu_open = false;
			if ($this->router->fetch_class() == "inventory_buy" || 
			$this->router->fetch_class() == "inventory_buyproducts" ||
			$this->router->fetch_class() == "inventory_category" ||
			$this->router->fetch_class() == "inventory_item" ||
			$this->router->fetch_class() == "inventory_sale" ||
			$this->router->fetch_class() == "inventory_saleproducts" || 
			$this->router->fetch_class() == "inventory_warehouse" || 
			$this->router->fetch_class() == "inventory_warehousemanager" ) {
			$menu_open = true;
        }
        ?>
		<li class="treeview <?php if($menu_open==true){?>menu-open<?php }?>">
			<a href="javascript:void(0)"><i class="icon_document_alt"></i> <span>Inventory</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" <?php if($menu_open==true){?>
				style="display: block;" <?php }?>>

				<li <?php if($this->router->fetch_class()=="inventory_buy"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/inventory_buy/index'); ?>"><i
						class="icon_table"></i>Inventory Buy</a></li>
				<li
					<?php if($this->router->fetch_class()=="inventory_buyproducts"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/inventory_buyproducts/index'); ?>"><i
						class="icon_table"></i>Inventory Buyproducts</a></li>
				<li <?php if($this->router->fetch_class()=="inventory_category"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/inventory_category/index'); ?>"><i
						class="icon_table"></i>Inventory Category</a></li>
				<li <?php if($this->router->fetch_class()=="inventory_item"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/inventory_item/index'); ?>"><i
						class="icon_table"></i>Inventory Item</a></li>
				<li <?php if($this->router->fetch_class()=="inventory_sale"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/inventory_sale/index'); ?>"><i
						class="icon_table"></i>Inventory Sale</a></li>
				<li
					<?php if($this->router->fetch_class()=="inventory_saleproducts"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/inventory_saleproducts/index'); ?>"><i
						class="icon_table"></i>Inventory Saleproducts</a></li>
				<li <?php if($this->router->fetch_class()=="inventory_warehouse"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/inventory_warehouse/index'); ?>"><i
						class="icon_table"></i>Inventory Warehouse</a></li>
				<li
					<?php if($this->router->fetch_class()=="inventory_warehousemanager"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/inventory_warehousemanager/index'); ?>"><i
						class="icon_table"></i>Inventory Warehousemanager</a></li>
			</ul>
		</li>

          <?php
			$menu_open = false;
			if ($this->router->fetch_class() == "marketing_leads" || 
			$this->router->fetch_class() == "marketing_mail_group" ||
			$this->router->fetch_class() == "marketing_smtp" ||
			$this->router->fetch_class() == "template" ||
			$this->router->fetch_class() == "send_email"  ) {
			$menu_open = true;
        }
        ?>
		<li class="treeview <?php if($menu_open==true){?>menu-open<?php }?>">
			<a href="javascript:void(0)"><i class="icon_document_alt"></i> <span>Marketing</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" <?php if($menu_open==true){?>
				style="display: block;" <?php }?>>

				<li <?php if($this->router->fetch_class()=="marketing_leads"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/marketing_leads/index'); ?>"><i
						class="icon_table"></i> Leads</a></li>
				<li
					<?php if($this->router->fetch_class()=="marketing_mail_group"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/marketing_mail_group/index'); ?>"><i
						class="icon_table"></i> Mail Group</a></li>
				<li <?php if($this->router->fetch_class()=="marketing_smtp"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/marketing_smtp/index'); ?>"><i
						class="icon_table"></i> Smtp</a></li>
				<li <?php if($this->router->fetch_class()=="template"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/template/index'); ?>"><i
						class="icon_table"></i> Template</a></li>
				<li <?php if($this->router->fetch_class()=="send_email"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/send_email/index'); ?>"><i
						class="icon_table"></i>Send email</a></li>

			</ul>
		</li>




	</ul>
</nav>
<!--End of Left Menu//-->