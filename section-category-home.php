<section id="category-home"  >	
	<div class="container"  >
		<div class="row">
			<div class="col-lg-12">
					<center><h1 style="font-size:3em;" class="heading">
						<?php
						//THE ROCKING Performers
						echo $category->name;
						?></h1>
						
						</center>
						
			</div>
		</div>

		<div class="row" >
		<div class="col-lg-12">
			<center>
			<a class="even-control-left" href="#event-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
			<a class="even-control-right" href="#event-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
			</center>
			<br/><br/>
		</div>
		</div>
		
		<div class="row" >
			<div class="col-sm-12 col-lg-12">
					<div id="event-carousel" class="carousel slide" data-interval="false">
						<div class="carousel-inner">
						<?php
						$eventDAO= new EventDAO();
						$events=$eventDAO->getAllByCategoryCode($code);
						$count=sizeof($events);
							?>
							<div class="item active">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-12">
									<?php
									$z=0;
									while($z<$count && $z<4 )
									{
										$event=$events[$z];
										?>
									<a href="ViewEvent.php?code=<?php echo $event->code; ?>&p=<?php echo $category->code; ?>">
									<div class="col-lg-3">
										<div class="single-event2">
											<img class="img img-responsive" style="max-height:240px;max-width:240px;" src="<?php echo $event->imageURL;  ?>" alt="event-image">
											<center><h4><?php echo $event->name; ?></h4></center>
											
										</div>
									</div>
									</a>


										<?php

										$z++;
									}	
									?>

									</div>
								</div>
							</div>
							</div>

							<?php								
							while($z<$count)
							{
								if(($z)%4==0)
								{
									?>
							<div class="item">
							<div class="container-fluid">
							<div class="row">
							<div class="col-lg-12">
									<?php

								}
								

									$x=0;
									while($z<$count && $x<4)
									{
										$event=$events[$z];
									?>
									<a href="ViewEvent.php?code=<?php echo $event->code; ?>&p=<?php echo $category->code; ?>">
									<div class="col-lg-3">
										<div class="single-event2">
											<img class="img-responsive" style="max-height:240px;max-width:240px;" src="<?php echo $event->imageURL;  ?>" alt="event-image">
											<h4><?php echo $event->name; ?></h4>
										</div>
									</div>
									</a>
									<?php
									$z++;
									$x++;
									}

									?>
									</div>
							</div>	
							</div>
							</div>
							<?php
							}						

						?>		
											
							</div>
					</div>
				</div>
			</div>			
		</div>
    
    </section>
