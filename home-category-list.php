<div class="carousel-inner">
						<?php
						require_once("DAO/CategoryDAO.php");
						$CategoryDAO=new CategoryDAO();
						$categories=$CategoryDAO->getAll();
						$count=sizeof($categories);
							?>
							<div class="item active">
								<div class="row">
									<?php
									$z=0;
									while($z <$count && $z<3 )
									{
										$category=$categories[$z];
										?>
									<a href="ViewCategory.php?code=<?php echo $category->code; ?>">
									<div class="col-lg-4 col-xs-12 col-sm-6 col-md-3">
										<div class="single-event">
											<img class="img-responsive galleryImage2" src="<?php echo $category->imageURL;  ?>" alt="event-image">
											<center><h4><?php echo $category->name; ?></h4></center>
											
										</div>
									</div>
									</a>


										<?php

										$z++;
									}	
									?>


								</div>
							
							</div>

							<?php								
							while($z<$count)
							{
								if(($z)%3==0)
								{
									?>
							<div class="item">
							<div class="row">
									<?php

								}
								

									$x=0;
									while($z<$count && $x<3)
									{
									?>
									<a href="ViewCategory.php?code=<?php echo $category->code; ?>">
									<div class="col-lg-4 col-xs-12 col-sm-6 col-md-3">
										<div class="single-event">
											<img class="img-responsive galleryImage2" src="<?php echo $category->imageURL;  ?>" alt="event-image">
											<h4><?php echo $category->name; ?></h4>
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

							<?php
							}						

						?>							
							</div>
