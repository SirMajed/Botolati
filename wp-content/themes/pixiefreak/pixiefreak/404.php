<?php
if(pixiefreak_active()) {
	$settings         = pixiefreak_settings( 'general' );
	$headerBackground = $settings->get( 'notfound_background' );
}
?>
<?php get_header(); ?>

<section class="page-hero not-found">
    <div class="container">
        <h2>
	        <?php echo esc_html__('404 الصفحة غير موجودة', 'pixiefreak'); ?>
        </h2>
        <h4>
	        <?php echo esc_html__('عذرا , الصفحة غير موجودة الرجاء التاكد من الرابط', 'pixiefreak'); ?>
        </h4>

        <?php echo pixiefreak_custom_form() ?>
    </div>
</section>

<?php get_footer(); ?>