<?php
    $author_avatar = get_avatar(
        get_the_author_meta( 'ID' ), // id_or_email
        32, // size,
        'mm', // default
        get_the_author_meta('display_name') // alt
    );
    $author_name = get_the_author_meta('display_name');
    $author_description = get_the_author_meta('description');
    $author_url = get_author_posts_url(get_the_author_meta( 'ID' ));
?>

<div class="entry-author">
    <div class="media">
        <div class="mr-2">
            <a title="<?php echo $author_name; ?>" href="<?php echo $author_url; ?>"><?php echo $author_avatar; ?></a>
        </div>
        <div class="media-body">
            <h5 class="mt-1">
                <a title="<?php echo $author_name; ?>" href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a>
            </h5>
            <?php echo $author_description; ?>
        </div>
    </div>
</div><!-- .entry-author -->
