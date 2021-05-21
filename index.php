<?php
$paged     = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
$args      = array(
    'post_type' => 'post',
    'tax_query' => array(
        array(
            'taxonomy' => 'post_format',
            'field'    => 'slug',
            'terms'    => array('post-format-gallery'),
            'operator' => 'NOT IN',
        ),
    ),
    'paged'     => $paged,
);
$loop_post = new WP_Query($args);


if ($loop_post->have_posts()) :?>
    <div class="archive-content">
        <?php
        /* Start the Loop */
        while ($loop_post->have_posts()) : $loop_post->the_post();
            get_template_part('loop-templates/content');
        endwhile;
        thim_paging_nav();
        ?>
    </div>
    <?php
    wp_reset_postdata();
else :
    get_template_part('content', 'none');
endif;