<?php if ( ! empty( get_post(get_post_thumbnail_id())->post_excerpt )) : ?>
    <figure class="wp-caption alignnone">
        <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
        <figcaption class="wp-caption-text">
            <div itemprop="image"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></div>
        </figcaption>
    </figure>
<?php else : ?>
    <div itemprop="image"><?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?></div>
<?php endif; ?>
