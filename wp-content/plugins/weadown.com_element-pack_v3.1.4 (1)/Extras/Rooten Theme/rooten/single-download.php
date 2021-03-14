<?php get_header(); 

// Layout
$rooten_position = (get_post_meta( get_the_ID(), 'rooten_page_layout', true )) ? get_post_meta( get_the_ID(), 'rooten_page_layout', true ) : get_theme_mod( 'rooten_page_layout', 'sidebar-right' );

/**
 * Remove the purchase link at the bottom of the single download page.
 *
 * @since 1.0.0
 */
remove_action( 'edd_after_download_content', 'edd_append_purchase_link' );

?>

<div<?php rooten_helper::section(); ?>>
    <div<?php rooten_helper::container(); ?>>
        <div<?php rooten_helper::grid(); ?>>
            <div class="bdt-width-expand">
                <main class="tm-content tm-edd-details-page">
            
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        
                        <?php get_template_part( 'template-parts/download/entry' ); ?>                        
                        
                        <?php if( get_theme_mod( 'rooten_blog_next_prev', 1) ) { ?>

                            <hr>    

                            <ul class="bdt-pagination">
                                <li>
                                    <?php
                                        $rooten_pre_btn_txt = '<span class="bdt-margin-small-right" bdt-pagination-previous></span> '. esc_html__('Previous', 'rooten'); 
                                        previous_post_link('%link', "{$rooten_pre_btn_txt}", FALSE); 
                                    ?>
                                    
                                </li>
                                <li class="bdt-margin-auto-left">
                                    <?php $rooten_next_btn_txt = esc_html__('Next', 'rooten') . ' <span class="bdt-margin-small-left" bdt-pagination-next></span>';
                                        next_post_link('%link', "{$rooten_next_btn_txt}", FALSE); ?>
                                </li>
                            </ul>
                        <?php } ?>
                
                    <?php endwhile; endif; ?>

                </main> <!-- end main -->
            </div> <!-- end expand -->
            
        </div> <!-- end grid -->
    </div> <!-- end container -->
</div> <!-- end tm main -->
    
<?php get_footer(); ?>