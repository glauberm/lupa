<?php if ( ! empty( get_post(get_post_thumbnail_id())->post_excerpt )) : ?>
    <figure class="wp-caption alignnone">
        <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
        <figcaption class="wp-caption-text">
            <?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>
        </figcaption>
    </figure>
<?php else : ?>
    <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
<?php endif; ?>
