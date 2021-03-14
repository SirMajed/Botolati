<footer>
    <div class="container">
        <?php if (pixiefreak_active()): ?>
            <?php $sponsors = \PixieFreakPanel\Model\Sponsor::query()->orderBy('order_number', 'ASC')->get() ?>
            <?php if ($sponsors->isNotEmpty()): ?>
            <div class="sponsors">
                <div class="slider owl-carousel">
                    <?php foreach ($sponsors as $sponsor): ?>
                        <div class="slide">
                            <a href="<?php echo esc_url($sponsor->url); ?>" target="_blank">
                                <img src="<?php echo esc_url($sponsor->logo); ?>" alt="<?php echo esc_attr($sponsor->name); ?>">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        <?php endif; ?>



       

        <?php if (pixiefreak_active()): ?>
      
		
		
		
        <?php endif; ?>
		
		
    </div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

    <div class="bottom-bar">
	
        <div class="container">


            <div class="back-to-top">
                <i class="fas fa-angle-up"></i>
            </div>
            <div class="copyright">
                <span>
                    <?php if (!pixiefreak_active()): ?>
	                    <?php esc_html_e('Powered by Pixiesquad 2013-2018 All Rights Reserved.', 'pixiefreak') ?>
                    <?php else: ?>
					
					
					
					
					<div class="logo">
	                <?php echo pixiefreak_custom_logo() ?>

	                <?php if (pixiefreak_active()): ?>
                        <?php if (pixiefreak_settings('general')->shouldShow('show_socials_footer')): ?>
                            <ul>
                                <?php foreach (pixiefreak_settings('general')->get('social') as $social => $link): ?>
	                                <?php if (empty($link)) continue; ?>
                                    <li>
                                        <a href="<?php echo esc_url($link); ?>" target="_blank">
                                            <i class="fab fa-<?php echo esc_attr($social); ?>"></i>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
                        <?php if (pixiefreak_settings('general')->shouldShow('show_copyright')): ?>
                            <?php echo esc_html(pixiefreak_settings('general')->get('copyright')); ?>
    	                <?php endif; ?>
                    <?php endif; ?>
                </span>
            </div>
        </div>
    </div>
</footer>

<div class="search-modal modal fade" id="searchModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content search-box">
            <div class="modal-body">
                <?php echo pixiefreak_modal_search_form(); ?>
            </div>
        </div>
    </div>
</div>

<div class="mobile-menu-modal modal fade in" id="mobileMenu" tabindex="-1" role="dialog">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content mobile-menu">
            <button type="button" class="btnclose" data-dismiss="modal">&times;</button>

            <div class="modal-body">
                <?php if (pixiefreak_should_show_menu('header_menu')): ?>
                    <?php wp_nav_menu([
                        'theme_location' => 'header_menu',
                        'menu_id' => 'mobile_menu',
                        'items_wrap' => pixiefreak_header_menu_wrap(),
                        'container' => false,
                        'walker' => (new pixiefreak_Menu())
                    ]);
                    ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php wp_footer();?>

</body>
</html>