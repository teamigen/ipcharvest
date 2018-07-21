
<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"><?php if(isset($pageitems['pagehead'])) { echo $pageitems['pagehead']; } ?> </span></h4>
						</div>

						<!--<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>-->
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">

							<li><a href="#"><i class="icon-home2 position-left"></i><?php echo ucfirst($this->uri->segment(1)); ?></a></li>
							<li><a href="#"><?php echo ucfirst($this->uri->segment(2)); ?></a></li>
							<li class="active"><?php echo ucfirst($this->uri->segment(3)); ?></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->
					
<!-- Content area -->
				<div class="content">
					<div class="row">
						<div class="col-md-12"><?php echo $this->session->flashdata('msgdisp'); ?></div>
					</div>
					<!-- Vertical form options -->
					<div class="row">
						<div class="col-md-6">
							<!-- Basic layout-->
							<?php if($this->uri->segment(3) == "update"){ $action = "admin/articles/updatecateg/$thiscateg->id"; } else { $action = "admin/articles/savecateg"; } ?>
							<form  action="<?php echo base_url().$action; ?>" method="post" enctype="multipart/form-data">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title"><?php if(isset($pageitems['panelhead1'])) { echo $pageitems['panelhead1']; } ?></h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>

									<div class="panel-body">
										<div class="form-group">
											<label>Category Name</label>
											<input type="text" value="<?php if(isset($thiscateg)) { echo $thiscateg->subcateg; } ?>" name="categoryName" class="form-control" placeholder="Eg: Bible Study">
										</div>
										

										<div class="form-group">
											<label>Parent Category</label>
											<select class="select" name="parentCategId">
													<option value="<?php if(isset($thiscateg)) { echo $thiscateg->parentCategId; } ?>" selected="selected"><?php if(isset($thiscateg)) { echo $thiscateg->parentcateg; } else { echo "Select Category"; } ?></option>
													<option value="1">Parent Category</option>
													<?php foreach($categories as $categ){ ?>
													
													<option value="<?php echo $categ->id ?>"><?php echo $categ->subcateg; ?></option>
													<?php } ?>
											</select>
										</div>


										<div class="text-right">
											<button type="submit" class="btn btn-primary"><?php echo $pageitems['buttontext1'] ?> <i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
								</div>
							</form>
							<!-- /basic layout -->

						</div>
<div class="col-md-6">

							<!-- Multi column ordering -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title"><?php if(isset($pageitems['panelhead2'])) { echo $pageitems['panelhead2']; } ?></h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						

						<table class="table datatable-multi-sorting">
							<thead>
								<tr>
									<th>Sl.No.</th>
									<th>Category</th>
									<th>Parent Category</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								
								<?php 
								$i = 1;
								foreach($categories as $categ){ 
								?>
								<?php if($categ->categActive == 0){ $bgc = "#fac6c6"; } else {  $bgc = "#fff"; } ?>
								<tr style="background-color:<?php echo $bgc; ?>" >
									<td><?php echo $i; ?></td>
									<td><?php echo $categ->subcateg; ?></td>
									<td><?php echo $categ->parentcateg; ?></td>
									
									<td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
												<?php if($categ->categActive == 1){ ?>
													<li><a href="<?php echo base_url(); ?>admin/articles/inactivate/<?php echo $categ->id; ?>"><i class="icon-bell-cross"></i>Inactivate</a></li>
												<?php } else { ?>
													<li><a href="<?php echo base_url(); ?>admin/articles/activate/<?php echo $categ->id; ?>"><i class="icon-bell3"></i>Activate</a></li>
												<?php } ?>
													<li><a href="<?php echo base_url(); ?>admin/articles/update/<?php echo $categ->id; ?>"><i class="icon-database-edit2"></i> Edit</a></li>
													<li><a href="<?php echo base_url(); ?>admin/articles/delete/<?php echo $categ->id; ?>"><i class="icon-database-remove"></i> Delete</a></li>
												</ul>
											</li>
										</ul>
									</td>
								</tr>
								<?php $i++;	} ?>

							</tbody>
						</table>
					</div>
					<!-- /multi column ordering -->

						</div>


</div>
					<!-- /vertical form options -->


