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

							<!-- Basic layout-->
							<form action="<?php echo base_url(); ?>/admin/articles/savecateg" method="post" enctype="multipart/form-data">
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
											<label>Audio Title</label>
											<input type="text" class="form-control" placeholder="Holy Spirit - The Wonderful Counselor">
										</div>
										<div class="form-group">
											<label>Preacher (if Applicable)</label>
											<select name="" class="select">
													<option value="" selected="selected">Select Preacher</option>

													<option value="1">Pr Prasad Abraham</option>
													<option value="2">Pr M A Varughese</option>
												
											</select>
										</div>
										<div class="form-group">
											<label>Church (if Applicable)</label>
											<select class="select">
													<option value="AK" selected="selected">Select Church</option>

													<option value="1">Bethel AG, Bangalore</option>
													<option value="2">Living Gospel Church, Bangalore</option>
												
											</select>
										</div>
										<div class="form-group">
											<label>Audio Category</label>
											<select class="select">
													<option value="AK" selected="selected">Select Category</option>

													<option value="AK">Bible Study</option>
													<option value="HI">Sermon</option>
												
											</select>
										</div>

										

										<div class="form-group">
											<label>Message in Brief (Optional):</label>
											<textarea id="summernote" rows="10" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
										</div>
											<script>
											$(document).ready(function() {
												$('#summernote').summernote();
											});
										  </script>
										<div class="text-right">
											<button type="submit" class="btn btn-primary"><?php echo $pageitems['buttontext1']; ?> <i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
								</div>
							</form>
							<!-- /basic layout -->

						</div>
</div>
					<!-- /vertical form options -->



