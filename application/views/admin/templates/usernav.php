			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">



					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li<?=(($this->uri->segment(2) == 'sample' && $this->uri->segment(1) == 'admin') ? ' class="active"' : '');?>><a href="<?php echo base_url(); ?>admin/sample"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Articles</span></a>
									<ul>
										<li<?=(($this->uri->segment(3) == 'create' && $this->uri->segment(2) == 'articles' && $this->uri->segment(1) == 'admin') ? ' class="active"' : '');?>><a href="<?php echo base_url(); ?>admin/articles/create">New Article</a></li>
										<li<?=(($this->uri->segment(3) == 'manage' && $this->uri->segment(2) == 'articles' && $this->uri->segment(1) == 'admin') ? ' class="active"' : '');?>><a href="<?php echo base_url(); ?>admin/articles/manage">Manage Articles</a></li>
										<li<?=(($this->uri->segment(3) == 'categories' && $this->uri->segment(2) == 'articles' && $this->uri->segment(1) == 'admin') ? ' class="active"' : '');?>><a href="<?php echo base_url(); ?>admin/articles/categories">Article Categories</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="glyphicon glyphicon-facetime-video"></i> <span>Video</span></a>
									<ul>
										<li<?=(($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'video' && $this->uri->segment(3) == 'create') ? ' class="active"' : '');?>><a href="<?php echo base_url(); ?>admin/video/create" id="layout1">New Video</a></li>
										<li<?=(($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'video' && $this->uri->segment(3) == 'manage') ? ' class="active"' : '');?>><a href="<?php echo base_url(); ?>admin/video/manage" id="layout2">Manage Videos</a></li>
										<li<?=(($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'video' && $this->uri->segment(3) == 'categories') ? ' class="active"' : '');?>><a href="<?php echo base_url(); ?>admin/video/categories" id="layout3">Video Categories</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="glyphicon glyphicon-music"></i> <span>Audio</span></a>
									<ul>
										<li<?=(($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'audio' && $this->uri->segment(3) == 'create') ? ' class="active"' : '');?>><a href="<?php echo base_url(); ?>admin/audio/create" id="layout1">New Audio</a></li>
										<li<?=(($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'audio' && $this->uri->segment(3) == 'manage') ? ' class="active"' : '');?>><a href="<?php echo base_url(); ?>admin/audio/manage" id="layout2">Manage Audios</a></li>
										<li<?=(($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'audio' && $this->uri->segment(3) == 'categories') ? ' class="active"' : '');?>><a href="<?php echo base_url(); ?>admin/audio/categories" id="layout3">Audio Categories</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="glyphicon glyphicon-cloud-download"></i> <span>Downloadables</span></a>
									<ul>
										<li><a href="#" id="layout1">New File</a></li>
										<li><a href="#" id="layout2">Manage Downloadables</a></li>
										<li><a href="#" id="layout3">File Categories</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="glyphicon glyphicon-list-alt"></i> <span>News</span></a>
									<ul>
										<li><a href="#" id="layout1">New Item</a></li>
										<li><a href="#" id="layout2">Manage News</a></li>
										<li><a href="#" id="layout3">News Categories</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="glyphicon glyphicon-screenshot"></i> <span>Live TV</span></a>
									<ul>
										<li><a href="#" id="layout1">Add Live TV</a></li>
										<li><a href="#" id="layout2">Manage TV</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="glyphicon glyphicon-tint"></i> <span>Prayer</span></a>
									<ul>
										<li><a href="#" id="layout1">Add Request</a></li>
										<li><a href="#" id="layout2">Manage Requests</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="glyphicon glyphicon-tags"></i> <span>Advertisement</span></a>
									<ul>
										<li><a href="#" id="layout1">New Advertisement</a></li>
										<li><a href="#" id="layout2">Manage Advertisements</a></li>
									</ul>
								</li>
								<li <?php if($this->uri->segment(2) == "banner"){ echo "class=\"active\"";} ?>>
									<a href="#"><i class="icon-presentation"></i> <span>Banner Management</span></a>
									<ul>
										<li><a href="<?php echo base_url() ?>admin/banner/create">Create Banner</a></li>
										<li><a href="<?php echo base_url() ?>admin/banner/manage">Manage Banners</a></li>
										
									</ul>
								</li>
								<li>
									<a href="#"><i class="glyphicon glyphicon-user"></i> <span>User Management</span></a>
									<ul>
										<li><a href="#" id="layout1">New User</a></li>
										<li><a href="#" id="layout2">Manage Users</a></li>
										<li><a href="#" id="layout2">User Type Management</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="glyphicon glyphicon-user"></i> <span>Theme Settings</span></a>
									<ul>
										<li><a href="<?php echo base_url(); ?>admin/theme" id="layout1">Home Page Settings</a></li>
										<li><a href="<?php echo base_url(); ?>admin/menu" id="layout2">Manage Menu</a></li>
										<li><a href="<?php echo base_url(); ?>admin/menu/newmenu" id="layout2">Create New Menu</a></li>
									</ul>
								</li>
								
								
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->
