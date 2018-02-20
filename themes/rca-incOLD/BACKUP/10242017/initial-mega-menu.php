					<?php if(false): ?>
					<!-- MEGA MENU -->
					<div id="top-menu">
						<div id="top-menu" class="row">
							<div class="large-12 columns">
								<ul id="mega-menu-container" class="dropdown menu show-for-large" data-dropdown-menu> 
									<li class="mega-menu">

										<!-- MEDICAL DEVICES -->
										<a href="<?php echo home_url('/medical-devices/'); ?>">Medical Devices</a>
										<ul class="menu">
											<li>
												<div class="row">
													<div class="small-8 columns">

														<div class="medium-6 columns">
															<h3><a href="<?php echo home_url('services/regulatory-affairs');?>">Regulatory Affairs</a></h3>
															<?php

															wp_nav_menu( 
															  array(
															    'menu' => 'Regulatory Affairs', 
															    'menu_class' => 'menu',
															  )
															); ?>
														</div>

														<div class="medium-6 columns">
															<h3>Quality Services</h3>
														</div>

														<div class="medium-6 columns">
															<h3>Compliance Assurance</h3>
															<?php wp_nav_menu( array('menu' => 'Compliance Assurance' )); ?>
														</div>

														<div class="medium-6 column end">
															<h3>Remediation Strategy and Support</h3>
															<?php wp_nav_menu( array('menu' => 'Remediation Strategy and Support' )); ?>
														</div>

													</div>
													<div class="small-4 columns">
														<div class="medium-12 column">
															<h3>Strategic Consulting</h3>
															<?php wp_nav_menu( array('menu' => 'Strategic Consulting' )); ?>
														</div>
													</div>
												</div>
											</li>
										</ul>
									</li>

									<!-- PHARMA -->
									<li class="mega-menu">
										<a href="<?php echo home_url('/Pharmaceutical/'); ?>">Pharmaceutical</a>
											<ul class="menu">
												<li>
													<div class="row">
														<div class="small-8 columns">
															
															<div class="medium-6 columns">
																<h3><a href="<?php echo home_url('services/regulatory-affairs');?>">Regulatory Affairs</a></h3>
																<?php

																wp_nav_menu( 
																  array(
																    'menu' => 'Pharmaceutical Regulatory Affairs', 
																    'menu_class' => 'menu',
																  )
																); ?>
															</div>
															<div class="medium-6 end columns">
																<h3><a href="<?php echo home_url('services/regulatory-affairs');?>">Quality Services</a></h3>
																<?php
																// wp_nav_menu( 
																//   array(
																//     'menu' => 'Pharmaceutical Quality Services', 
																//     'menu_class' => 'menu',
																//   )
																// );
																 ?>
															</div>
															<div class="medium-6 columns">
																<h3><a href="<?php echo home_url('services/regulatory-affairs');?>">Compliance Assurance</a></h3>
																<?php

																wp_nav_menu( 
																  array(
																    'menu' => 'Pharmaceutical Compliance Assurance', 
																    'menu_class' => 'menu',
																  )
																); ?>
															</div>
															<div class="medium-6 end columns">
																<h3><a href="<?php echo home_url('services/regulatory-affairs');?>">Remediation Strategy & Support</a></h3>
																<?php

																wp_nav_menu( 
																  array(
																    'menu' => 'Pharmaceutical Remediation Strategy and Support', 
																    'menu_class' => 'menu',
																  )
																); ?>
															</div>
														</div>
														<div class="small-4 columns">
																	<h3>Strategic Consulting</h3>
																	<?php wp_nav_menu( array('menu' => 'Pharmaceutical Strategic Consulting' )); ?>
														</div>
													</div>

												</li>
											</ul>
										</li>
										<!-- /PHARMA -->

										<!-- ADDITIONAL SERVICES -->
										<li><a href="<?php echo get_permalink( get_page_by_path('Additional Services' ) ); ?>">Additional Services</a></li>
										
										<!-- ABOUT -->
										<li class="mega-menu">
											<a href="<?php echo get_permalink( get_page_by_path( 'About' ) ); ?>">About</a>
												<ul class="menu">
												<li>
													<div class="row">
														<div class="small-12 columns">

															<div class="medium-4 columns">
																<h3><a href="<?php echo home_url('services/regulatory-affairs');?>">About</a></h3>
																<?php

																wp_nav_menu( 
																  array(
																    'menu' => 'About', 
																    'menu_class' => 'menu',
																  )
																); ?>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</li>
										<!-- /ABOUT -->

										<!-- NEWS -->
										<li><a href="<?php echo home_url('/news/' );?>">News</a></li>

										<!-- CONTACT -->
										<li class="contact-menu-item" style="float:right;"><a href="<?php echo home_url('/contact/');?>"><i class="fa fa-paper-plane" aria-hidden="true"></i> Contact</a></li></a>
									</li>
								</ul>	 	
							</div>
						</div>
						<?php endif; ?>