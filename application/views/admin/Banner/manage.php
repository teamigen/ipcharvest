			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Manage</span> - Manage Banners</h4>
						</div>


					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i>Banners</a></li>
							<li class="active">Manage Banners</li>
						</ul>
</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Vertical form options -->
					<div class="row">
						<?= $this->session->flashdata('message'); ?>
						
						<?php foreach ($banners as $b) {?>
						<div class="col-lg-6 col-sm-6">
							<div class="thumbnail" style="overflow:hidden;">
								<div class="thumb">
									<?php 
									$filename = base_url().'uploads/banners/'.$b['image'];
									?>
									<img src="<?php echo base_url(); ?>uploads/banners/<?php echo $b['image']; ?>" alt="">
									<div class="caption-overflow">
										<span>
											<a href="<?php echo base_url(); ?>uploads/banners/<?php echo $b['image']; ?>" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
											<a href="#" class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5"><i class="icon-link2"></i></a>
										</span>
									</div>
								</div>

								<div class="caption">
									<h6 class="no-margin"><a href="#" class="text-default"><?php echo substr($b['bannertitle'], 0, 40); ?>...</a><a href="#" onclick="doconfirmdelete(<?php echo $b['id']; ?>)" class="text-muted"><i  style="margin-left:3px; margin-right:3px;" class="glyphicon glyphicon-trash pull-right"></i></a>
									<?php if($b['active'] == 0) { ?>
									<a href="#" onclick="doconfirmactivate(<?php echo $b['id']; ?>)" class="text-muted"><i  style="margin-left:3px; margin-right:3px;" class="glyphicon glyphicon-eye-close pull-right"></i></a></h6>
									<?php } else { ?>
									<a href="#" onclick="doconfirminactivate(<?php echo $b['id']; ?>)" class="text-muted"><i  style="margin-left:3px; margin-right:3px;" class="glyphicon glyphicon-eye-open pull-right"></i></a></h6>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php } ?>

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->
<script type="text/javascript">
function doconfirmactivate(id)
{
    job=confirm("Are you sure to activate?");
    if(job!=true)
    {
        window.location.href = "<?php echo base_url(); ?>admin/banner/manage";
    } else {
		window.location.href = "<?php echo base_url(); ?>admin/banner/activate/"+id;
	}
}
function doconfirminactivate(id)
{
    job=confirm("Are you sure to inactivate?");
    if(job!=true)
    {
        window.location.href = "<?php echo base_url(); ?>admin/banner/manage";
    } else {
		window.location.href = "<?php echo base_url(); ?>admin/banner/inactivate/"+id;
	}
}
function doconfirmdelete(id) {
	job=confirm("Are you sure to Delete this?");
	if(job!=true)
    {
        window.location.href = "<?php echo base_url(); ?>admin/banner/manage";
    } else {
		window.location.href = "<?php echo base_url(); ?>admin/banner/delete/"+id;
	}
}


</script>
