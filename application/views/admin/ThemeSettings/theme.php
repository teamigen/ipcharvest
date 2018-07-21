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
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Content Panel - 1 </h5>
										
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>
									<div class="row"><div class="col-md-12"><div class="savemessage" style="margin-left:15px; margin-right:15px;"></div></div></div>
									<div class="panel-body">
										<div class="form-group">
											<label>Welcome Title</label>
											<input type="text" class="form-control" name="onewelcomeline" id="onewelcomeline" value="<?php echo $themesettings['one-welcomeline'] ?>" placeholder="Welcome to">
										</div>
										
										<div class="form-group">
											<label>Welcome Big Text</label>
											<input type="text" class="form-control" name="onebigline" id="onebigline" value="<?php echo $themesettings['one-bigline'] ?>" placeholder="The House of the Lord">
										</div>
										<div class="form-group">
											<label>Small Paragraph</label>
											<textarea class="form-control" name="onesmallparagraph" id="onesmallparagraph" placeholder=""><?php echo $themesettings['one-smallparagraph'] ?></textarea> 
										</div>
										<div class="text-right">
											<button onClick="savethemedata()" class="btn btn-primary"><span class="savingbut">Save Theme Data</span> <i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
								</div>
							<!-- /basic layout -->
							</div>
							<div class="col-md-6">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Pastor's Message</h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>

									<div class="panel-body">
									<form class="pasform" action="<?php echo base_url(); ?>admin/theme/updatepastordata" id="pasform" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label>Pastor's Message Title</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['pmtitle']; } ?>" name="pastorsmessagetitle" id="pastorsmessagetitle" class="form-control" placeholder="From Pastor's Desk">
										</div>
										<div class="form-group">
											<label>Pastor Name</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['pastorname']; } ?>"  name="pastorsname" id="pastorsname" class="form-control" placeholder="Prasad Abraham">
										</div>
										<div class="form-group">
											<label>Designation</label>
											<input type="text" name="desig" id="desig" class="form-control" value="<?php if(isset($themesettings)){ echo $themesettings['pastordesig']; } ?>"  placeholder="Senior Pastor">
										</div>

										<div class="form-group">
											<label class="col-lg-12 control-label">Pastors Image:</label>
											<div class="col-lg-12">
												<div class="media no-margin-top">
													<div class="media-left">
														<a href="#"><img src="<?php if(isset($themesettings)){ echo base_url()."uploads/theme/timage/".$themesettings['pastorimage']; } else { echo base_url()."assets/admin/assets/images/placeholder.jpg"; } ?>" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
													</div>

													<div class="media-body">
														<input type="file" name="myuploadfiles" id="myuploadfiles"  class="file-styled">
														<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label>Pastors Message:</label>
											<textarea id="summernote" name="pastorsmessage" rows="10" cols="5" class="form-control" placeholder="Enter your message here"><?php if(isset($themesettings)){ echo $themesettings['pastormessage']; } ?></textarea>
										</div>

										<div class="text-right">
											<button type="submit" class="btn btn-primary"><span class="savingpasbut">Save Pastor Data</span><i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</form>
									</div>
								</div>
							
						</div>

<div class="col-md-6">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Founder's Message</h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>

									<div class="panel-body">
									<form class="founderform" action="<?php echo base_url(); ?>admin/theme/updatefounderdata" id="founderform" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label>Founder's Message Title</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['fmtitle']; } ?>" name="foundersmessagetitle" id="foundersmessagetitle" class="form-control" placeholder="From Founder's Desk">
										</div>
										<div class="form-group">
											<label>Founder Name</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['foundername']; } ?>"  name="foundersname" id="foundersname" class="form-control" placeholder="Prasad Abraham">
										</div>
										<div class="form-group">
											<label>Designation</label>
											<input type="text" name="founddesig" id="founddesig" class="form-control" value="<?php if(isset($themesettings)){ echo $themesettings['founddesig']; } ?>"  placeholder="Senior Pastor">
										</div>

										<div class="form-group">
											<label class="col-lg-12 control-label">Founders Image:</label>
											<div class="col-lg-12">
												<div class="media no-margin-top">
													<div class="media-left">
														<a href="#"><img src="<?php if(isset($themesettings)){ echo base_url()."uploads/theme/timage/".$themesettings['founderimage']; } else { echo base_url()."assets/admin/assets/images/placeholder.jpg"; } ?>" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
													</div>

													<div class="media-body">
														<input type="file" name="myuploadfiles" id="myuploadfiles"  class="file-styled">
														<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label>Founders Message:</label>
											<textarea id="summernote" name="foundermessage" rows="10" cols="5" class="form-control" placeholder="Enter your message here"><?php if(isset($themesettings)){ echo $themesettings['foundermessage']; } ?></textarea>
										</div>
											
										<div class="text-right">
											<button type="submit" class="btn btn-primary"><span class="savingpasbut">Save Founder Data</span><i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</form>
									</div>
								</div>
							
						</div>
<div class="col-md-12">

							<!-- Basic layout-->
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Content Panel - 4 </h5>
										
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>
									<div class="row"><div class="col-md-12"><div class="savemessage" style="margin-left:15px; margin-right:15px;"></div></div></div>
									<div class="panel-body">
										<form class="seponeform" action="<?php echo base_url(); ?>admin/theme/updatesepone" id="seponeform" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label class="col-lg-12 control-label">Seperator Image:</label>
											<div class="col-lg-12">
												<div class="media no-margin-top">
													<div class="media-left">
														<a href="#"><img src="<?php if(isset($themesettings)){ echo base_url()."uploads/theme/timage/".$themesettings['sepone_t']; } else { echo base_url()."assets/admin/assets/images/placeholder.jpg"; } ?>" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
													</div>

													<div class="media-body">
														<input type="file" name="seponefiles" id="seponefiles"  class="file-styled">
														<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
													</div>
												</div>
											</div>
										</div>
										
										<div class="text-right">
											<button type="submit" class="btn btn-primary"><span class="savingbut">Save Sep One</span> <i class="icon-arrow-right14 position-right"></i></button>
										</div>
										</form>
									</div>
								</div>
							<!-- /basic layout -->
							</div>

<div class="col-md-12">

							<!-- Basic layout-->
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Content Panel - 5 </h5>
										
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>
									<div class="row"><div class="col-md-12"><div class="savemessage" style="margin-left:15px; margin-right:15px;"></div></div></div>
									<form method="post" action ="theme/saveblogsection"  enctype="multipart/form-data">
									
									<div class="panel-body">
										<div class="form-group">
											<label>Blog Section Title</label>
											<input type="text" class="form-control" name="fivewelcomeline" id="fivewelcomeline" value="<?php echo $themesettings['fivewelcomeline'] ?>" placeholder="Welcome to">
										</div>
										
										<div class="form-group">
											<label>Blog Section Big Text</label>
											<input type="text" class="form-control" name="fivebigline" id="fivebigline" value="<?php echo $themesettings['fivebigline'] ?>" placeholder="The House of the Lord">
										</div>
										<div class="form-group">
											<label>Small Paragraph</label>
											<textarea class="form-control" name="fivesmallparagraph" id="fivesmallparagraph" placeholder=""><?php echo $themesettings['fivesmallparagraph'] ?></textarea> 
										</div>
										<div class="text-right">
											<button type="submit"  class="btn btn-primary"><span class="savingsbut">Save Blog Section</span> <i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
									</form>
								</div>
							<!-- /basic layout -->
							</div>
							<div class="col-md-12">

							<!-- Basic layout-->
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Content Panel - 6 </h5>
										
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>
									<div class="row"><div class="col-md-12"><div class="savemessage" style="margin-left:15px; margin-right:15px;"></div></div></div>
									<div class="panel-body">
										<form class="septwoform" action="<?php echo base_url(); ?>admin/theme/updateseptwo" id="septwoform" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label class="col-lg-12 control-label">Seperator Image:</label>
											<div class="col-lg-12">
												<div class="media no-margin-top">
													<div class="media-left">
														<a href="#"><img src="<?php if(isset($themesettings)){ echo base_url()."uploads/theme/timage/".$themesettings['septwo_t']; } else { echo base_url()."assets/admin/assets/images/placeholder.jpg"; } ?>" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
													</div>

													<div class="media-body">
														<input type="file" name="septwofiles" id="septwofiles"  class="file-styled">
														<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
													</div>
												</div>
											</div>
										</div>
										
										<div class="text-right">
											<button type="submit" class="btn btn-primary"><span class="savingbut">Save Sep Two</span> <i class="icon-arrow-right14 position-right"></i></button>
										</div>
										</form>
									</div>
								</div>
							<!-- /basic layout -->
							</div>
							<div class="col-md-12">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Contact Box</h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>

									<div class="panel-body">
									<form class="founderform" action="<?php echo base_url(); ?>admin/theme/updatecontactdata" id="founderform" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label>Church Name</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['churchname']; } ?>" name="churchname" id="churchname" class="form-control">
										</div>
										<div class="form-group">
											<label>Address Line 1</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['add1']; } ?>" name="add1" id="add1" class="form-control" >
										</div>
										<div class="form-group">
											<label>Address Line 2</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['add2']; } ?>" name="add2" id="add2" class="form-control" >
										</div>
										<div class="form-group">
											<label>Address Line 3</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['add3']; } ?>" name="add3" id="add3" class="form-control" >
										</div>
										<div class="form-group">
											<label>Address Line 4</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['add4']; } ?>" name="add4" id="add4" class="form-control">
										</div>
										<div class="form-group">
											<label>Address Line 5</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['add5']; } ?>" name="add5" id="add5" class="form-control">
										</div>
										<div class="form-group">
											<label>Phone 1</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['phone1']; } ?>" name="phone1" id="phone1" class="form-control">
										</div>
										<div class="form-group">
											<label>Phone 2</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['phone2']; } ?>" name="phone2" id="phone2" class="form-control">
										</div>
										<div class="form-group">
											<label>Email</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['email']; } ?>" name="email" id="email" class="form-control">
										</div>
										<div class="form-group">
											<label>Map URL</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['map']; } ?>" name="map" id="map" class="form-control">
										</div>
										<div class="text-right">
											<button type="submit" class="btn btn-primary"><span class="savingpasbut">Save Contact Data</span><i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</form>
									</div>
								</div>
							
						</div>
						
						
						
						<div class="col-md-12">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Social Media</h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>

									<div class="panel-body">
									<form class="socialmediaform" action="<?php echo base_url(); ?>admin/theme/socialmedia" id="socialmediaform" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label>Facebook</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['fb']; } ?>" name="fb" id="fb" class="form-control">
										</div>
										<div class="form-group">
											<label>Twitter</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['tw']; } ?>" name="tw" id="tw" class="form-control" >
										</div>
										<div class="form-group">
											<label>Instagram</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['insta']; } ?>" name="insta" id="insta" class="form-control" >
										</div>
										<div class="form-group">
											<label>Google+</label>
											<input type="text" value="<?php if(isset($themesettings)){ echo $themesettings['gp']; } ?>" name="gp" id="gp" class="form-control" >
										</div>
										<div class="text-right">
											<button type="submit" class="btn btn-primary"><span class="savingpasbut">Save Social Media</span><i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</form>
									</div>
								</div>
							
						</div>



</div>
					<!-- /vertical form options -->

<script>
function savethemedata(){
				//var one-welcomeline = document.getElementsById('one-welcomeline').value;
	var ow = document.getElementById('onewelcomeline').value;
	var ob = document.getElementById('onebigline').value;
	var op = document.getElementById('onesmallparagraph').value;
	var fvw = document.getElementById('fivewelcomeline').value;
	var fvb = document.getElementById('fivebigline').value;
	var fvp = document.getElementById('fivesmallparagraph').value;
	//alert(onesmallparagraph);
	$.ajax({    
				type: 'POST',
				url: "<?php echo site_url('admin/theme/updatetheme'); ?>",
				
				data : {onewelcomeline:ow, onebigline:ob, onesmallparagraph:op,
				fivewelcomeline:fvw, fivebigline:fvb, fivesmallparagraph:fvp},
				 beforeSend: function()
				{   
					$(".savingbut").html('<span class="savingbut">Saving Theme Data... </span>');
                },
				success :  function(response)
				  {
					 $(".savemessage").html(response);
					 $(".savingbut").html('<span class="savingbut">Save Theme Data</span>');
					 //alert("Hurray!!! I am Here");
				  }
					
				});			
}
</script>
