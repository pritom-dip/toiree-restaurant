<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package themeplate
 */


if (!function_exists('themeplate_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function themeplate_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf($time_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date('c')),
            esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
            esc_html_x('Posted on %s', 'post date', 'themeplate'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        $byline = sprintf(
            esc_html_x('by %s', 'post author', 'themeplate'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

    }
endif;

if (!function_exists('themeplate_entry_footer')) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function themeplate_entry_footer()
    {
        // Hide category and tag text for pages.
        if ('post' == get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(__(', ', 'themeplate'));
            if ($categories_list && themeplate_categorized_blog()) {
                printf('<span class="cat-links">' . __('Posted in %1$s', 'themeplate') . '</span>', $categories_list);
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', __(', ', 'themeplate'));
            if ($tags_list) {
                printf('<span class="tags-links">' . __('Tagged %1$s', 'themeplate') . '</span>', $tags_list);
            }
        }

        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link">';
            comments_popup_link(__('Leave a comment', 'themeplate'), __('1 Comment', 'themeplate'), __('% Comments', 'themeplate'));
            echo '</span>';
        }

        edit_post_link(
            sprintf(
            /* translators: %s: Name of current post */
                esc_html__('Edit %s', 'themeplate'),
                the_title('<span class="screen-reader-text">"', '"</span>', false)
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function themeplate_categorized_blog()
{
    if (false === ($all_the_cool_cats = get_transient('themeplate_categories'))) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories(array(
            'fields'     => 'ids',
            'hide_empty' => 1,

            // We only need to know if there is more than one category.
            'number'     => 2,
        ));

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count($all_the_cool_cats);

        set_transient('themeplate_categories', $all_the_cool_cats);
    }

    if ($all_the_cool_cats > 1) {
        // This blog has more than 1 category so themeplate_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so themeplate_categorized_blog should return false.
        return false;
    }
}

/**
 * Flush out the transients used in themeplate_categorized_blog.
 */
function themeplate_category_transient_flusher()
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient('themeplate_categories');
}

add_action('edit_category', 'themeplate_category_transient_flusher');
add_action('save_post', 'themeplate_category_transient_flusher');


if (!function_exists('thim_the_archive_title')) :
    /**
     * Shim for `the_archive_title()`.
     *
     * Display the archive title based on the queried object.
     *
     *
     * @param string $before Optional. Content to prepend to the title. Default empty.
     * @param string $after Optional. Content to append to the title. Default empty.
     */
    function thim_the_archive_title($before = '', $after = '')
    {
        if (is_category()) {
            $title = sprintf(esc_html__('%s', 'sailing'), single_cat_title('', false));
        } elseif (is_tag()) {
            $title = sprintf(esc_html__('%s', 'sailing'), single_tag_title('', false));
        } elseif (is_author()) {
            $title = sprintf(esc_html__('Author: %s', 'sailing'), '<span class="vcard">' . get_the_author() . '</span>');
        } elseif (is_year()) {
            $title = sprintf(esc_html__('Year: %s', 'sailing'), get_the_date(_x('Y', 'yearly archives date format', 'sailing')));
        } elseif (is_month()) {
            $title = sprintf(esc_html__('Month: %s', 'sailing'), get_the_date(_x('F Y', 'monthly archives date format', 'sailing')));
        } elseif (is_day()) {
            $title = sprintf(esc_html__('Day: %s', 'sailing'), get_the_date(_x('F j, Y', 'daily archives date format', 'sailing')));
        } elseif (is_tax('post_format', 'post-format-aside')) {
            $title = _x('Asides', 'post format archive title', 'sailing');
        } elseif (is_tax('post_format', 'post-format-gallery')) {
            $title = _x('Galleries', 'post format archive title', 'sailing');
        } elseif (is_tax('post_format', 'post-format-image')) {
            $title = _x('Images', 'post format archive title', 'sailing');
        } elseif (is_tax('post_format', 'post-format-video')) {
            $title = _x('Videos', 'post format archive title', 'sailing');
        } elseif (is_tax('post_format', 'post-format-quote')) {
            $title = _x('Quotes', 'post format archive title', 'sailing');
        } elseif (is_tax('post_format', 'post-format-link')) {
            $title = _x('Links', 'post format archive title', 'sailing');
        } elseif (is_tax('post_format', 'post-format-status')) {
            $title = _x('Statuses', 'post format archive title', 'sailing');
        } elseif (is_tax('post_format', 'post-format-audio')) {
            $title = _x('Audio', 'post format archive title', 'sailing');
        } elseif (is_tax('post_format', 'post-format-chat')) {
            $title = _x('Chats', 'post format archive title', 'sailing');
        } elseif (is_post_type_archive()) {
            $title = sprintf(esc_html__('Archives: %s', 'sailing'), post_type_archive_title('', false));
        } elseif (is_tax()) {
            $tax = get_taxonomy(get_queried_object()->taxonomy);
            /* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
            $title = sprintf(esc_html__('%1$s: %2$s', 'sailing'), $tax->labels->singular_name, single_term_title('', false));
        } elseif (is_search()) {
            $title = printf(esc_html__('Search Results for: %s', 'sailing'), '<span>' . get_search_query() . '</span>');
        } else {
            $title = esc_html__('Archives', 'sailing');
        }
        /**
         * Filter the archive title.
         *
         * @param string $title Archive title to be displayed.
         */
        $title = apply_filters('get_the_archive_title', $title);

        if (!empty($title)) {
            echo ent2ncr($before . $title . $after);
        }
    }
endif;

if (!function_exists('trt_entry_meta')) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function trt_entry_meta()
    {
        ?>
        <ul class="entry-meta">
            <?php
            if (get_theme_mod('thim_show_author') == 1) {
                ?>
                <li class="author">
                    <span><?php echo esc_html__('Post by', 'sailing'); ?></span>
                    <?php printf(' <a href="%1$s">%2$s</a>',
                        esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                        esc_html(get_the_author())
                    ); ?>
                </li>
                <?php
            }
            if (get_theme_mod('thim_show_category') == 1 && get_the_category()) {
                ?>
                <li>
                    <?php
                    if (get_theme_mod('thim_limit_cates') == 1) {
                        ?>
                        <span><?php echo esc_attr_e('on', 'sailing'); ?></span> <?php thim_random_cats(2, ', '); ?>
                        <?php
                    } else {
                        ?>
                        <span><?php echo esc_attr_e('on', 'sailing'); ?></span> <?php the_category(', ', ''); ?>
                        <?php
                    }
                    ?>
                </li>
                <?php
            }

            if (get_theme_mod('thim_show_comment') == 1) {
                ?>
                <?php if (!post_password_required() && (comments_open() || '0' != get_comments_number())) :
                    ?>
                    <li class="comment-total">
                        <?php comments_popup_link(esc_html__('0 comment', 'sailing'), esc_html__('1 comment', 'sailing'), esc_html__('% comments', 'sailing')); ?>
                    </li>
                <?php
                endif;
            }
            ?>

        </ul>
        <?php
    }
endif;


if (!function_exists('trt_single_entry_meta')) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function trt_single_entry_meta()
    {
        ?>
        <ul class="entry-meta">
            <?php
            if (get_theme_mod('thim_single_show_author') == 1) {
                ?>
                <li class="author">
                    <span><?php echo esc_html__('Post by', 'sailing'); ?></span>
                    <?php printf(' <a href="%1$s">%2$s</a>',
                        esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                        esc_html(get_the_author())
                    ); ?>
                </li>
                <?php
            }
            if (get_theme_mod('thim_single_show_category') == 1 && get_the_category()) {
                ?>
                <li>
                    <?php
                    if (get_theme_mod('thim_limit_cates') == 1) {
                        ?>
                        <span><?php echo esc_attr_e('on', 'sailing'); ?></span> <?php thim_random_cats(2, ', '); ?>
                        <?php
                    } else {
                        ?>
                        <span><?php echo esc_attr_e('on', 'sailing'); ?></span> <?php the_category(', ', ''); ?>
                        <?php
                    }
                    ?>
                </li>
                <?php
            }

            if (get_theme_mod('thim_single_show_comment') == 1) {
                ?>
                <?php if (!post_password_required() && (comments_open() || '0' != get_comments_number())) :
                    ?>
                    <li class="comment-total">
                        <?php comments_popup_link(esc_html__('0 comment', 'sailing'), esc_html__('1 comment', 'sailing'), esc_html__('% comments', 'sailing')); ?>
                    </li>
                <?php
                endif;
            }
            ?>

        </ul>
        <?php
    }
endif;

if (!function_exists('thim_paging_nav')) :

    /**
     * Display navigation to next/previous set of posts when applicable.
     */
    function thim_paging_nav()
    {
        global $wp_query, $wp_rewrite;
        $total        = isset($wp_query->max_num_pages) ? $wp_query->max_num_pages : 1;
        $paged        = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
        $pagenum_link = html_entity_decode(get_pagenum_link());

        $query_args = array();
        $url_parts  = explode('?', $pagenum_link);

        if (isset($url_parts[1])) {
            wp_parse_str($url_parts[1], $query_args);
        }

        $pagenum_link = esc_url(remove_query_arg(array_keys($query_args), $pagenum_link));
        $pagenum_link = trailingslashit($pagenum_link) . '%_%';

        $format = $wp_rewrite->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
        $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit($wp_rewrite->pagination_base . '/%#%', 'paged') : '?paged=%#%';

        // Set up paginated links.
        $links = paginate_links(array(
            'base'      => $pagenum_link,
            'format'    => $format,
            'total'     => $total,
            'current'   => $paged,
            'mid_size'  => 1,
            'add_args'  => array_map('urlencode', $query_args),
            'prev_text' => esc_html__('Prev', 'sailing'),
            'next_text' => esc_html__('Next', 'sailing'),
            'type'      => 'list'
        ));

        if ($links) :
            ?>
            <div class="pagination loop-pagination">
                <?php //echo '<span> Page </span>'
                ?>
                <?php echo ent2ncr($links); ?>
            </div>
            <!-- .pagination -->
        <?php
        endif;
    }
endif;


if (!function_exists('thim_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function thim_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf($time_string, esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_attr(get_the_modified_date('c')), esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
            _x('Posted on %s', 'post date', 'sailing'), '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        $byline = sprintf(
            _x('by %s', 'post author', 'sailing'), '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';
    }

endif;

if (!function_exists('thim_entry_footer')) :

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function thim_entry_footer()
    {
        // Hide category and tag text for pages.
        if ('post' == get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'sailing'));
            if ($categories_list && thim_categorized_blog()) {
                printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'sailing') . '</span>', $categories_list);
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html__(', ', 'sailing'));
            if ($tags_list) {
                printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'sailing') . '</span>', $tags_list);
            }
        }

        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link">';
            comments_popup_link(esc_html__('Leave a comment', 'sailing'), esc_html__('1 Comment', 'sailing'), esc_html__('% Comments', 'sailing'));
            echo '</span>';
        }

        edit_post_link(esc_html__('Edit', 'sailing'), '<span class="edit-link">', '</span>');
    }

endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function thim_categorized_blog()
{
    if (false === ($all_the_cool_cats = get_transient('thim_categories'))) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories(array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ));

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count($all_the_cool_cats);

        set_transient('thim_categories', $all_the_cool_cats);
    }

    if ($all_the_cool_cats > 1) {
        // This blog has more than 1 category so thim_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so thim_categorized_blog should return false.
        return false;
    }
}
