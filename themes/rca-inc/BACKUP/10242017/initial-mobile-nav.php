<?php if(FALSE): ?>
					<ul id="mobile-menu" class="vertical menu accordion-menu hide" data-accordion-menu >
						<div id="top-nav-wrapper">
							<div class="row">
								<div class="small-10 small-offset-1 columns">
									<?php get_search_form(); ?>
								</div>
							</div>
							<div class="row">
								<div class="small-10 small-offset-1 columns">
									<button class="">Explore all of Our Expertise</button>
								</div>
							</div>
						</div>
					<div id="bottom-nav-wrapper">
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'Medical Devices' ) ); ?>">Medical Devices</a>

						<!-- Regulatory Affairs -->
						<ul>
							<li>
								<h3><a href="<?php echo site_url(); ?>/medical-device/regulatory-affairs">Regulatory Affairs</a></h3>
								<?php wp_nav_menu( array('menu' => 'Regulatory Affairs')); ?>

							</li>
						</ul>
						
						<!-- Compliance Assurance -->
						<ul>
							<li>
								<h3><a href="<?php echo site_url(); ?>medical-device/compliance-assurance">Compliance Assurance</a></h3>
								<?php wp_nav_menu( array('menu' => 'Compliance Assurance')); ?>

							</li>
						</ul>

						<!-- Quality Services -->
						<ul>
							<li>
								<h3><a href="<?php echo site_url(); ?>medical-device/quality-services">Quality Services</a></h3>
								<?php #wp_nav_menu( array('menu' => 'Quality Services')); ?>

							</li>
						</ul>
						
						<!-- Remediation Strategy & Support -->
						<ul>
							<li>
								<h3><a href="<?php echo site_url(); ?>/medical-device/remediation-strategy-support-for-medical-device-quality-and-regulatory-remediations">Remediation Strategy and Support</a></h3>
								<?php wp_nav_menu( array('menu' => 'Remediation Strategy and Support')); ?>

							</li>
						</ul>

						<!-- Strategic Consulting -->
						<ul>
							<li>
								<h3><a href="<?php echo site_url(); ?>/medical-device/strategic-consulting">Strategic Consulting</a></h3>
								<?php wp_nav_menu( array('menu' => 'Strategic Consulting')); ?>
								
							</li>
						</ul>
					</li>
					<!-- Pharm Dropdown Menu -->
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'Pharmaceutical' ) ); ?>">Pharmaceutical</a>
				
						<ul>
							<li>
								<h3><a href="<?php echo site_url(); ?>/pharmaceutical/regulatory-affairs">Regulatory Affairs</a></h3>
								<?php wp_nav_menu(array('menu' => 'Pharmaceutical Regulatory Affairs',)); ?>
							</li>
						</ul>
						<ul>
							<li>
								<h3><a href="<?php echo site_url(); ?>/pharmaceutical/compliance-assurance">Compliance Assurance</a></h3>
								<?php wp_nav_menu( array('menu' => 'Pharmaceutical Compliance Assurance')); ?>
							</li>
						</ul>
						<ul>
							<li>
								<h3><a href="<?php echo site_url(); ?>/pharmaceutical/quality-services">Quality Services</a></h3>
								<?php //wp_nav_menu(array('menu' => 'Pharmaceutical Quality Services')); ?>
							</li>
						</ul>
						<ul>
							<li>
								<h3><a href="<?php echo site_url(); ?>/pharmaceutical/remediation-strategy-support-for-medical-device-quality-and-regulatory-remediations">Remediation Strategy and Support</a></h3>
								<?php wp_nav_menu( array('menu' => 'Pharmaceutical Remediation Strategy and Support')); ?>
							</li>
						</ul>
						<ul>
							<li>
								<h3><a href="<?php echo site_url(); ?>/pharmaceutical/strategic-consulting">Strategic Consulting</a></h3>
								<?php wp_nav_menu( array('menu' => 'Pharmaceutical Strategic Consulting')); ?>
							</li>
						</ul>
					</li><!-- /Pharm Dropdown Menu -->

					<li><a href="<?php echo get_permalink( get_page_by_title( 'Additional Services' ) ); ?>">Additional Services</a></li>
					<!-- About Dropdown Menu -->
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'About' ) ); ?>">About</a>
						<ul>
							<li>
								<h3><a href="<?php echo get_permalink(get_page_by_path( 'about/our-people') ); ?>">Our People</a></h3>
								<?php wp_nav_menu( array('menu' => 'Our People')); ?>
							</li>
						</ul>
						<ul>
							<li>
								<h3><a href="<?php echo get_permalink(get_page_by_title('Giving Back')); ?>">Giving Back</a></h3>
							</li>
						</ul>
						<ul>
							<li>
								<h3><a href="<?php echo get_permalink(get_page_by_title('Join Our Global Team and Discover the RCA Difference!')); ?>">Join Our Team</a></h3>
							</li>
						</ul>
					</li>
					<li><a href="<?php echo get_permalink( get_page_by_path( 'news' ) ); ?>">News & Events</a></li>
					</ul>
					</div>
				</section>
			<?php endif; ?>
			<!-- /MOBILE NAV -->