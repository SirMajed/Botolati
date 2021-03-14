<?php /* Template Name: Stream */ ?>
<?php
    if(!pixiefreak_active()) {
        wp_redirect(get_home_url()); die();
    }
    $slug = esc_attr(get_query_var('stream_slug'));
    if (empty($stream = \PixieFreakPanel\Model\Stream::query()->where('slug', $slug)->get()->first())) {
        wp_redirect(get_home_url()); die();
    }

    $settings = pixiefreak_settings('stream');
    $headerBackground = $settings->get('banner_image');

    $pageTagLine = $stream->title;
?>
<?php get_header(); ?>
<section class="page-hero">
    <div class="container">
        <h2><?php echo esc_html__('البث المباشر', 'pixiefreak') ?></h2>
        <h4><?php echo esc_html__('هنا يمكنك رؤية البث المباشر لجميع الالعاب التي تقام في منصة بطولاتي', 'pixiefreak') ?></h4>
    </div>
</section>

			
<div class="stream-page">
    <div class="news-container">

    <section class="news">
        <div class="section-header">
            <div class="section-title normal">


<div class="stream-info">
                                        <span  class="streamer-name"> <h3> <?php echo esc_attr($stream->title); ?></h3></span>
                                        <span class="stream-name"> <h3> <?php echo esc_attr($stream->subtitle); ?></h3></span>
                                    </div>




            </div>
        </div>

        <div class="tab-content content">
            <div id="all" class="active">
                <?php if ($stream->type === 1): ?>
                    <iframe width="100%"
                            height="520"
                            src="<?php echo esc_url($stream->link); ?>"
                            frameborder="0"
                            allowfullscreen="true">
                    </iframe>
                <?php else: ?>
                    <iframe width="100%"
                            height="520"
                            src="<?php echo esc_url('//player.twitch.tv/?channel=' . substr($stream->link, strrpos($stream->link, '/') + 1));?>"
                            frameborder="0"
                            allowfullscreen>
                    </iframe>
                <?php endif; ?>
				
            </div>
			
        </div>
		
    </section>

</div>
</div>

<?php get_footer(); ?>
