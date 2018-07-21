    <div class="row">

        <div class="col-md-12">
            <div class="container tophead">
            <div class="navbar navbar-igen navbar-fixed-top" role="navigation">

                    <div class="igen-nav">
                        <div class="navbar-header">

                               <a href="<?php echo base_url(); ?>"> <img src="<?php echo base_url(); ?>assets/images/logo-white.png" class="logo"></a>

                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav pull-right">

                        
						<?php foreach ($topmenuitems as $tm) { 
							$submenuitems = $this->Theme_model->getsubmenu($tm['menuid']);
							$c = count($submenuitems);
							?>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="<?php // echo $tm['MenuLink']; ?>"><?php echo strtoupper($tm['menuname']); ?><?php if($c > 0) { ?><span class="caret"></span><?php } ?> </a>
                            <?php
							
							if($c > 0) {
							?>
							<ul class="dropdown-menu">
								<?php 
								$i = 1;
								foreach($submenuitems as $sm){ ?>
                                <li><a href="<?php echo $sm['menuname']; ?>"><?php echo $sm['menuname']; ?></a></li>
                                 <?php if($i < $c) { ?><li class="divider"></li><?php } ?>
								<?php 
								$i++;
								} ?>
                            </ul>
							<?php } ?>
                        </li>
						<?php } ?>
                    </ul>
                        </div>
                    </div>
                </div>

        </div>
    </div>
    </div>
</div>
