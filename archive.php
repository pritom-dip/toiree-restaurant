<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package themeplate
 */
?>

<?php
if (have_posts()) :?>
    <div class="archive-content">
        <?php
        /* Start the Loop */
        while (have_posts()) : the_post();
            get_template_part('loop-templates/content');
        endwhile;
        thim_paging_nav();
        ?>
    </div>
<?php
else :
    get_template_part('content', 'none');
endif;