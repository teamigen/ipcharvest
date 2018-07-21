<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/js/pages/form_select2.js"></script>
			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Create</span> - Menu</h4>
						</div>


					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i>Menu</a></li>
							<li class="active">Create Menu</li>
						</ul>
</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Vertical form options -->
					<div class="row">
						<div class="col-md-12">
							<?= $this->session->flashdata('message'); ?>
							<!-- Basic layout-->
							<form action="savemenuitem" method="post">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Create Menu</h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>

									<div class="panel-body">
									<div class="col-md-12">	
										<div class="form-group">
											<label>Menu Title:</label>
											<input  name="menuname" value="<?php if(isset($formcont['menuname'])) { echo $formcont['menuname']; } ?>" type="text" class="form-control" placeholder="Title of the Menu">
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
										<label>Select Parent Menu</label>
										<select name="parent" class="select-search">
										echo $formcont['parent'];
										die();
												<?php if(isset($formcont['parent'])) {  ?>
													<option value="<?php echo $formcont['parentid']; ?>" selected><?php echo $formcont['parent']; ?><?php if($formcont['parentid'] == 0) { echo "Parent Menu"; } ?></option>
												<?php } else { ?>
													<option value="" selected>Select Parent</option>
												<?php } ?>
													<option value="0" >Parent Menu</option>
												<?php foreach($parents as $mi) { ?>
												<option value="<?php echo $mi['menuid'] ?>"><?php echo $mi['menuname'] ?></option>
												<?php } ?>
										</select>
									</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
										<label>Appear After</label>
										<select name="after" class="select-search">
												<?php if(isset($formcont['after'])) {  ?>
													<option value="<?php echo $formcont['afterid']; ?>" selected><?php echo $formcont['after']; ?></option>
													
												<?php } else { ?>
													<option value="" selected>Select Menu</option>
												<?php } ?>
												<?php foreach($after as $mi) { ?>
												<option value="<?php echo $mi['menuid'] ?>"><?php echo $mi['menuname'] ?></option>
												<?php } ?>
										</select>
									</div>
									</div>
									<div class="col-md-12">	
										<div class="form-group">
											<label>Menu Link:</label>
											<input  name="menulink" value="<?php if(isset($formcont['MenuLink'])) { echo $formcont['MenuLink']; } ?>" type="text" class="form-control" placeholder="Page or Module to be Linked">
										</div>
									</div>
									<div class="col-md-12">
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Save Menu<i class="icon-arrow-right14 position-right"></i></button>
										</div>
										</div>
									</div>
								</div>
							</form>
							<!-- /basic layout -->

						</div>
</div>
					<!-- /vertical form options -->



				</div>
				<!-- /content area -->

