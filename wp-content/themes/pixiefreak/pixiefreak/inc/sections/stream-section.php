<?php $streams = \PixieFreakPanel\Model\Stream::query()->get(); ?>

<?php if (count($streams) > 0): ?>
    <section class="streams">

        <div class="container">
            <div class="section-header border-bottom">
                <!-- Title -->
                <div class="section-title">
                    <h2><?php echo esc_html__('البث المباشر', 'pixiefreak'); ?></h2>
                </div>

                <!-- Filter -->
                <ul>
                    <li class="active">
                       <a href="#all-stream" data-toggle="tab"> <h3>   <?php echo esc_html__('جميع البثوث', 'pixiefreak'); ?></h3></a>
                    </li>

                    <li>
                        <a href="#youtube-stream" data-toggle="tab"><h3><?php echo esc_html__('يوتيوب', 'pixiefreak'); ?></h3></a>
                    </li>

                    <li>
                        <a href="#twitch-stream"  data-toggle="tab"><h3><?php echo esc_html__('تويتش', 'pixiefreak'); ?></h3></a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">
                <div id="all-stream" class="stream-list active">
		            <?php foreach ($streams as $stream): ?>
                        <div class="stream-box" style="background-image: url('<?php echo esc_attr($stream->thumbnail); ?>');">
                            <a href="<?php echo pixiefreak_route('stream', $stream->slug); ?>" class="overlay">

                                <div class="stream-views">
                                    <span>
                                        <h3><?php $stream->is_online == 1 ? esc_html_e('مباشر', 'pixiefreak') : esc_html_e('غير مباشر', 'pixiefreak'); ?></h3>
                                    </span>
                                </div>

                                <i class="fas fa-play text--center"></i>

                                <div class="stream-desc">
                                    <div class="stream-info">
                                        <span  class="streamer-name"> <h3> <?php echo esc_attr($stream->title); ?></h3></span>
                                        <span class="stream-name"> <h3> <?php echo esc_attr($stream->subtitle); ?></h3></span>
                                    </div>
                                </div>
                            </a>
                        </div>
		            <?php endforeach; ?>
                </div>
	            <?php if (!empty($streams)): ?>
		            <?php foreach (\PixieFreakPanel\Model\Stream::TYPES as $key => $type): ?>
                        <div class="stream-list" id="<?php echo esc_attr(strtolower($type)); ?>-stream">
				            <?php foreach ($streams as $stream): ?>
					            <?php if ($stream->type !== $key): continue; endif;?>
                                <div class="stream-box" style="background-image: url('<?php echo esc_attr($stream->thumbnail); ?>');">
                                    <a href="<?php echo pixiefreak_route('stream', $stream->slug); ?>" class="overlay">

                                        <div class="stream-views">
                                            <span>
                                                <?php $stream->is_online == 1 ? esc_html_e('Online', 'pixiefreak') : esc_html_e('Offline', 'pixiefreak'); ?>
                                            </span>
                                        </div>

                                        <i class="fas fa-play text--center"></i>

                                        <div class="stream-desc">
                                            <div class="stream-info">
                                                <span class="streamer-name"><?php echo esc_attr($stream->title); ?></span>
                                                <span class="stream-name"><?php echo esc_attr($stream->subtitle); ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
				            <?php endforeach; ?>
                        </div>
		            <?php endforeach; ?>
	            <?php endif; ?>
            </div>

            <div class="section-footer">
                <div>
                    <h4><?php echo esc_html__('اذا اردت مشاهدة المزيد من البثوث المباشرة', 'pixiefreak'); ?></h4>
                     <span> <h5>  <?php echo esc_html__('ادخل لصفحة البثوث المباشرة', 'pixiefreak'); ?></h5></span>
                </div>

                 <a href="<?php echo esc_url(get_home_url(null, 'streams/')); ?>" class="btn-default">
			     <h3>
					 
					   <?php echo esc_html__('صفحة البثوث', 'pixiefreak'); ?> </h3>
                </a>
				
				
            </div>
        </div>
    </section>
<?php endif; ?>