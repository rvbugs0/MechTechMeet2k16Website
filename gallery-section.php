<div class="carousel-inner">
						<?php
						$images=[];
						$y=0;
						foreach(glob('img/gallery/*.*') as $file) {
						$images[$y]=$file;
						$y++;
						}
						$count=sizeof($images);
							?>
							<div class="item active">
								<div class="row">
									<?php
									$z=0;
									while($z <$count && $z<4 )
									{
										$image=$images[$z];
										?>
									<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
										<div class="single-event2">
											<img style="cursor:pointer" class="img-responsive galleryImage" src="<?php echo $image;  ?>" alt="event-image">
											
											
										</div>
									</div>


										<?php

										$z++;
									}	
									?>


								</div>
							
							</div>

							<?php								
							while($z<$count)
							{

								if(($z)%4==0)
								{
									?>
							<div class="item">
							<div class="row">
									<?php

								}
								

									$x=0;
									while($z<$count && $x<4)
									{
										$image=$images[$z];
									?>
									<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
										<div class="single-event2">
											<img style="cursor:pointer" class="img-responsive galleryImage" src="<?php echo $image;  ?>" alt="event-image">
											
										</div>
									</div>
									<?php
									$z++;
									$x++;
									}

									?>
									</div>
							</div>	

							<?php
							}						

						?>							
							</div>
 