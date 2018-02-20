<?php
/*Template Name: Staff Department*/

global $post;
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$department = strtolower($post->post_name);

get_header(); ?>
	
	<!-- Featured Image -->
	<div id="featured-img-wrapper" class="row expanded">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
	            rgba(196,97,43,0.7) url('<?php echo $backgroundImg[0]; ?>'); background-size: cover;">
				<div class="featured-img-title"><h1><?php the_title(); ?></h1></div>
		</div>
	</div>
	<!-- / Featured Image -->

	<?php get_template_part( 'template-parts/section', 'breadcrumbs-social'); ?>
	<?php
		//var_dump($department);
		$staff_id = get_field('staff_id');
		$staff_data = get_userdata($staff_id);
		$staff_meta = get_user_meta($staff_id);
		$first_name = $staff_meta["first_name"];
		$last_name = $staff_meta["last_name"];
		$full_name = $first_name[0] . ' ' . $last_name[0];
		$position = get_field('position', $staff_data);

		//var_dump($department);

		// Get page content based on post slug
		// IE. If post == /board-of-directors pass board_of_directors role to get_team_members_department()
		// get_team_members_department returns page content for that user role.
		switch($department) {
			case("board-of-directors"):
				get_team_members_department($department);
				break;

			case("executive-leadership-team"):
				get_team_members_department($department);
				break;

			case("directors"):
				get_team_members_department($department);
				break;
			
			case("operations"):
				get_team_members_department($department);
				break;

			case("sales-operations"):
				get_team_members_department($department);
				break;

			case("finance"):
				get_team_members_department($department);
				break;
			default:
				echo 'No members found...';
				break;
		}

	?>


	<div class="row">


		<div class="small-10 small-offset-1 columns text-center">
				<!-- name -->

				<!-- position -->
		</div>

	</div>
	
	
	<div id="contact-learn-more-wrapper">
		<?php get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	</div>

	<!-- NEWS -->
	<?php get_template_part('template-parts/section', 'news'); ?>
	<!-- /NEWS -->

<?php
//get_sidebar();
get_footer();