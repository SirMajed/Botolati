<?php /* Template Name: Bracket */ ?>

<?php
    if(!pixiefreak_active()) {
        wp_redirect(get_home_url()); die();
    }
    $slug = esc_attr(get_query_var('bracket_slug'));
    if (empty($tournament = \PixieFreakPanel\Model\Tournament::query()->where('slug', $slug)->get()->first())) {
        wp_redirect(get_home_url()); die();
    }
?>

    <?php get_header(); ?>

    <section class="page-hero">
        <div class="container">
		
		
            <h3><center>
		        
				
				<?php echo     '<span style="color:#FFF;text-align:center;"> ! انزل للأسفل لرؤية هيكل البطولة  </span>'     ?>
				 
				
            </center></h3>
			
			
          <figure><center>
                    <img src="<?php echo esc_url($tournament->logo); ?>" alt="<?php echo esc_attr($tournament->name); ?>">
               </center> </figure>
				
				
				
				
            <ul class="tab-nav">
                <li>
                    <a href="<?php echo pixiefreak_route('tournament', $tournament->slug); ?>" class="btn-default active">
		              <h3> <?php echo esc_html__('الرجوع لصفحة البطولة', 'pixiefreak'); ?> </h3>
                    </a>
					
                </li>
            </ul>
        </div>
    </section>

    <section class="brackets page-bg">
        <div class="container">
            <div class="zoomInOut">
                <button class="zoomOut"><i class="fas fa-minus"></i></button>
                <button class="zoomIn"><i class="fas fa-plus"></i></button>
            </div>

            <div class="bracket-wrapper">
                <div class="panzoom-elements"></div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
