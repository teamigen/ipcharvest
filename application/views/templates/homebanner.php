<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  <?php 
		$i = 0;
		foreach ($banners as $b) { ?>
    <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo "active"; } ?>"></li>
		<?php 
		$i++;
		} ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
     <?php 
		$i = 1;
		foreach ($banners as $b) { ?>
	<div class="item <?php if($i == 1){ echo "active"; } ?>">
       <img alt="<?php echo $b['bannertitle'] ?>" style="width:100%; height:100vh;" class="d-block w-100" src="<?php echo base_url(); ?>uploads/banners/<?php echo $b['image'] ?>" alt="First slide">
      <div class="carousel-caption">
      </div>
    </div>
		<?php 
		$i++;
		} ?>
 </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
