<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span> <?php if(isset($pageitems['pagehead'])) { echo $pageitems['pagehead']; } ?> </span></h4>
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
					<!-- Multi column ordering -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title"><?php echo $pageitems['panelhead1']; ?> </h5>
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
									<th>Article Title</th>
									<th>Author</th>
									<th>Submitted on</th>
									<th>Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							$i = 1;
							foreach ($articles as $art) { ?>
								<tr>
									<td><a href="#"><?php echo $i; ?></td>
									<td><a href="#"><?php echo $art->articleTitle; ?></a></td>
									<td><?php echo $art->articleAuthor; ?></td>
									<td><?php echo $art->articleDate; ?> </td>
									<td><span class="label label-success">Active</span></td>
									<td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
													<li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
													<li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
												</ul>
											</li>
										</ul>
									</td>
								</tr>
								<?php
								$i++;
								}
								?>
								</tbody>
						</table>
					</div>
					<!-- /multi column ordering -->
							

						</div>

						</div>
					<!-- /vertical form options -->



