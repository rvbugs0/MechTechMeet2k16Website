<section id="category-home" style=""  >	
				<div class="container-fluid">
			<div class="row">
			<div class="col-lg-12">
					<center><h1 style="font-size:3em;" class="heading">
						<?php
						//THE ROCKING Performers
						echo $event->name;
						?></h1>
						
						</center>
						<center>
<b><a style="color:#fafafa;" class="pull-left" href="ViewCategory.php?code=<?php echo $_GET["p"]; ?>"><- Back to Categories </a>
</b>		<br>
							<a class="even-control-left" href="#event-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
						<a class="even-control-right" href="#event-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
						</center>
						<br/>

			</div>
			</div>
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-lg-12">

					<div id="event-carousel" class="carousel slide MyCarouselCustomizations" data-interval="false">
							
						<div class="carousel-inner">
							<div class="item active">
								<div class="container-fluid">	
								<div class="row">

									<div class="col-lg-5">
										<img class="img img-responsive" style="max-width:240px;max-height:240px;" src="<?php echo $event->imageURL;  ?>" alt="event-image">
											
									</div>
									<div class="col-lg-7">
											<div >
											<H1>Introduction</H1>
											
											<p>
											<?php
											echo $event->introduction;
											?>
											</p>
											<br/>
														<form >
											<input style="color:#000;" placeholder="Your MTM-ID" id="mtmId" type="text" name="mtmID" />
											<input  name="eventId" type="hidden" id="eventId" value="<?php echo $event->code ?>">
											<button id="eventRegisterButton" class="btn-primary" type="button">Register</button>
											</form>
											<br/>
											<span id="registerSpan"></span>
										</div>

									</div>
									
								</div>
							</div>

							</div>
							<div class="item" >
							
							<center><H1 >Description</H1></center>
							
							Download Full Description & Specifications 
							<b><a target="_blank" href="<?php echo $event->instructionsDocument; ?>">here</a>	
							</b><br/><br/>
							<?php
							echo $event->description;
							?>
							</div>

							<div class="item">
							
							<center><H1 >Team Description</H1></center>
							<p><?php
								echo $event->teamDescription;
							?>
							</p>
								</div>

							<div class="item" >
							<center><H1 >Coordinator Details</H1></center>
							<p><?php
							echo $event->coordinatorDetails;
							?>
							</p>
							</div>							


						</div>
					</div>
				</div>
			</div>			
		</div>
    
    </section>
