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

					<!-- Vertical form options -->
					<div class="row">
						<div class="col-md-12">
							<?php echo $this->session->flashdata('message'); ?>
							<!-- Basic layout-->
							<form action="<?php echo base_url(); ?>admin/articles/savearticle" method="post" enctype="multipart/form-data">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title"><?php if(isset($pageitems['panelhead1'])) { echo $pageitems['panelhead1']; } ?> </h5>
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
											<label>Article Title</label>
											<input type="text" name="atitle" class="form-control" placeholder="Why Should we Worship the Lord?">
										</div>
										<div class="form-group">
											<label>Author Name</label>
											<input type="text" name="aauthor" class="form-control" placeholder="Tim Chacko Thomas">
										</div>

										<div class="form-group">
											<label>Category</label>
											<select class="select" name="acateg">
													<?php if(isset($formdata)) {  ?>
														<option value="<?php echo $formdata['id']; ?>" selected="selected"><?php echo $formdata['categoryName']; ?></option>
													<?php
													} else {
														?>
														<option value="" selected="selected">Select Category</option>
													<?php
													}
														$i++;
														foreach ($artcategs as $ac){
													?>
													<option value="<?php echo $ac['id']; ?>"><?php echo $ac['categoryName']; ?></option>
													<?php 
														$i++;
														}
													?>
												
											</select>
										</div>

										<div class="form-group">
											<label class="col-lg-12 control-label">Article Image:</label>
											<div class="col-lg-12">
												<div class="media no-margin-top">
													<div class="media-left">
														<a href="#"><img src="<?php echo base_url(); ?>assets/admin/assets/images/placeholder.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
													</div>

													<div class="media-body">
														<input type="file" name="articlefile" class="file-styled">
														<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label>Article Content:</label>
											<textarea id="summernote" name="acontent" rows="10" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
										</div>
											<script>
											$(document).ready(function() {
												$('#summernote').summernote();
											});
										  </script>
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Save Article<i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
								</div>
							</form>
							<!-- /basic layout -->

						</div>
</div>
					<!-- /vertical form options -->


