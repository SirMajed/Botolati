<?php
$withOutHeader = false;
$hasPostThumbnail = has_post_thumbnail();
?>

<?php get_header(); ?>

<?php
    if (have_posts()) {
        the_post();
        $postID = array(get_the_ID());
    }
    $addClass = ['single-page'];
    if (!pixiefreak_active()) {
        $addClass[] = 'not-active-pixie';
    }
?>
<section id="post-<?php the_ID(); ?>" <?php post_class(implode(' ', $addClass)); ?>>
    <div class="container">

        <?php if (has_post_thumbnail()): ?>
            <figure class="featured-box">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>">
            </figure>
        <?php endif; ?>

        <div class="wrapper">
            <?php $fullWidth = true; ?>

            <?php $postClass = ($fullWidth) ? 'post full-width': 'post'; ?>
            <div class="<?php echo esc_attr($postClass) ?>">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <span class="post-details">
                    <?php if (is_sticky()): ?>
                        <span class="sticky">
                            <i class="fa fa-map-pin"></i> <?php echo esc_html__('Sticky', 'pixiefreak'); ?>
                        </span>
                    <?php endif; ?>
                    <?php esc_html_e('Posted by', 'pixiefreak') ?>
                    <span class="author"><?php (get_the_author()) ? the_author_link() : '/' ?></span> <?php the_date() ?> <?php esc_html_e('in', 'pixiefreak'); ?>
                    <?php
                        $post_categories = wp_get_post_categories(get_the_ID());
                        $cats = array();

                        foreach($post_categories as $c){
                            $cat = get_category($c);
                            echo '<a href="'.get_category_link($cat).'">'.esc_html($cat->name).'</a>';
                        }
                    ?>
                </span>

                <?php the_content(); ?>

                <div class="clearfix"></div>

                <?php
                $defaults = array(
                    'before'           => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'pixiefreak') . '</span>',
                    'after'            => '</div>',
                    'next_or_number'   => 'number',
                    'separator'        => ' ',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'nextpagelink'     => esc_html__( 'Next page', 'pixiefreak'),
                    'previouspagelink' => esc_html__( 'Previous page', 'pixiefreak'),
                    'pagelink'         => '%',
                    'echo'             => true
                );

                wp_link_pages( $defaults );
                ?>

                <?php $posttags = get_the_tags(); ?>
                <?php if (!empty($posttags)): ?>
                <div class="post-tags">
                    <?php the_tags('<span>'.esc_html__('Tags:', 'pixiefreak').'</span>', '', ''); ?>
                </div>
                <?php endif; ?>

            </div>
        </div>
         <?php
            if (comments_open() || get_comments_number()) {
                comments_template('/comments.php', true);
            }
        ?>
    </div>
</section>
<?php get_footer(); ?>