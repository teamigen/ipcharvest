<div class="container-fluid" style="padding:0px; margin:0px;">
<div class = "clearfix" style="height:60px;"></div>
<div class="banner-igen">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
		<?php 
		$i = 1;
		foreach ($banners as $b) { ?>
            <div class="item <?php if($i == 1){ echo "active"; } ?>">
                <img src="<?php echo base_url(); ?>uploads/banners/<?php echo $b['image'] ?>" alt="<?php echo $b['bannertitle'] ?>" style="width:100%;">
            </div>
		<?php 
		$i++;
		} ?>
            
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</div>
