		<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Menu</span> - Manage Menu</h4>
						</div>


					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i>Menu</a></li>
							<li class="active">Manage</li>
						</ul>
</div>
				</div>
				<!-- /page header -->


				
				<!-- Content area -->
				<div class="content">

					<!-- Dashboard content -->
					<div class="row">
						
						
						<!-- Default ordering -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Menu Management</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
						<?= $this->session->flashdata('message'); ?>
							<table class="table datatable-sorting" id="manageuser">
							<thead>
								<tr>
									<th>MenuID</th>
									<th>Menu Name</th>
									<th>Parent Menu</th>
									<th>Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
							
									<?php 
									$xt = 0;
									foreach ($allmenu as $am) {
									
									?>
									<tr>
									<td><?php echo $am['menuid']; ?></td>
									<td><?php echo $am['menuname'] ?></td>
									<td><?php if ($am['parent'] != "") { echo $am['parent']; } else { echo "Parent Menu"; } ?></td>
									<?php if($am['MenuActive'] == 1) { ?>
									<td><span class="label label-success">Active</span></td>
									<?php } else { ?>
									<td><span class="label label-danger">Inactive</span></td>
									<?php } ?>
									<td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="menu/updatemenu/<?php echo $am['menuid']; ?>"><i class="icon-pencil7"></i>Edit Menu Item</a></li>
													<?php if($am['MenuActive'] == 1) { ?>
													<li><a href="#" onclick="doconfirminactivate(<?php echo $am['menuid']; ?>)"><i class="icon-file-locked"></i>Inactivate</a></li>
													<?php } else { ?>
													<li><a href="#" onclick="doconfirmactivate(<?php echo $am['menuid']; ?>)"><i class="icon-file-locked"></i>Activate</a></li>
													<?php } ?>
													
													<li><a  href="#"   onclick="doconfirmdelete(<?php echo $am['menuid']; ?>)"><i class="glyphicon glyphicon-remove"></i><span id="ac">Delete</span></a></li>
												</ul>
											</li>
										</ul>
									</td>
								</tr>
							<?php 
							$xt++;
							} ?>
							</tbody>
						</table>
					
						</div>

						</div>
					<!-- /default ordering -->



				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->
			<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: 1px solid #ccc;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Profile Details</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
					<!-- /primary modal -->

<script type="text/javascript">
function doconfirmactivate(id)
{
    job=confirm("Are you sure to activate?");
    if(job!=true)
    {
        window.location.href = "<?php echo base_url(); ?>admin/menu";
    } else {
		window.location.href = "<?php echo base_url(); ?>admin/menu/activate/"+id;
	}
}
function doconfirminactivate(id)
{
    job=confirm("Are you sure to inactivate?");
    if(job!=true)
    {
        window.location.href = "<?php echo base_url(); ?>admin/menu";
    } else {
		window.location.href = "<?php echo base_url(); ?>admin/menu/inactivate/"+id;
	}
}
function doconfirmdelete(id) {
	job=confirm("Are you sure to Delete this?");
	if(job!=true)
    {
        window.location.href = "<?php echo base_url(); ?>admin/menu";
    } else {
		window.location.href = "<?php echo base_url(); ?>admin/menu/delete/"+id;
	}
}


</script>
