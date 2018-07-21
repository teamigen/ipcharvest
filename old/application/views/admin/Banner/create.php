			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Create</span> - New Banner</h4>
						</div>


					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i>Banners</a></li>
							<li class="active">Create New Banner</li>
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
							<form method="post" action="savebanner" enctype="multipart/form-data">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Create New Banner</h5>
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
											<label>Banner Title:</label>
											<input type="text" class="form-control" name="bannertitle" placeholder="Banner Title">
										</div>
									</div>
									<div class="col-md-12">	
										<div class="form-group">
											<label>Banner Link:</label>
											<input type="text" class="form-control" name="readmorelink" placeholder="Banner Hyper Link">
										</div>
									</div>
									<div class="col-md-12">
									<div class="form-group">
										<label>Banner Image <span style="font-size:9px;">(Optimum Size - 1366px X 500px)</span></label>
											<input name="userFiles" type="file" class="form-control">
									</div>
									</div>
									<div class="col-md-12">
										<div class="text-right">
											<button type="submit" id="saveuser" class="btn btn-primary">Save Banner<i class="icon-arrow-right14 position-right"></i></button>
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

			</div>
			<!-- /main content -->
