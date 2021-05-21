<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package themeplate
 */
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function themeplate_body_classes($classes)
{
    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }
    return $classes;
}

add_filter('body_class', 'themeplate_body_classes');

//custom-function
function trt_ssl_secure_url($sources)
{
    $scheme = parse_url(site_url(), PHP_URL_SCHEME);
    if ('https' == $scheme) {
        if (stripos($sources, 'http://') === 0) {
            $sources = 'https' . substr($sources, 4);
        }

        return $sources;
    }

    return $sources;
}

function thim_ssl_secure_url($sources)
{
    $scheme = parse_url(site_url(), PHP_URL_SCHEME);
    if ('https' == $scheme) {
        if (stripos($sources, 'http://') === 0) {
            $sources = 'https' . substr($sources, 4);
        }

        return $sources;
    }

    return $sources;
}

/************ List Comment ***************/
if (!function_exists('trt_comment')) {
    function trt_comment($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        //extract( $args, EXTR_SKIP );
        if ('div' == $args['style']) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo ent2ncr($tag . ' ') ?><?php comment_class('description_comment') ?> id="comment-<?php comment_ID() ?>">
        <div class="wrapper-comment">
            <?php
            if ($args['avatar_size'] != 0) {
                echo '<div class="avatar">';
                echo get_avatar($comment, $args['avatar_size']);
                echo '</div>';
            }
            ?>
            <div class="comment-right">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'sailing') ?></em>
                <?php endif; ?>

                <div class="comment-extra-info">
                    <div
                            class="author"><span class="author-name"><?php echo get_comment_author_link(); ?></span>
                    </div>
                    <div class="date" itemprop="commentTime">
                        <?php printf(get_comment_date(), get_comment_time()) ?></div>
                    <?php edit_comment_link(esc_html__('Edit', 'sailing'), '', ''); ?>

                    <?php comment_reply_link(array_merge($args, array(
                        'reply_text' => esc_html__('Reply', 'sailing'),
                        'after'      => '',
                        'depth'      => $depth,
                        'max_depth'  => $args['max_depth']
                    ))); ?>
                </div>

                <div class="content-comment">
                    <?php comment_text() ?>
                </div>
            </div>
        </div>
        <?php
    }
}
/************end list comment************/

function thim_excerpt($limit)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = strip_tags(preg_replace('`\[[^\]]*\]`', '', $excerpt));

    return '<p>' . $excerpt . '</p>';
}

if (!function_exists('thim_meta')) {
    function thim_meta($key, $args = array(), $post_id = null)
    {
        $post_id = empty($post_id) ? get_the_ID() : $post_id;

        $args = wp_parse_args($args, array(
            'type' => 'text',
        ));

        // Image
        if (in_array($args['type'], array('image'))) {
            if (isset($args['single']) && $args['single'] == "false") {
                // Gallery
                $temp          = array();
                $data          = array();
                $attachment_id = get_post_meta($post_id, $key, false);
                if (!$attachment_id) {
                    return $data;
                }

                if (empty($attachment_id)) {
                    return $data;
                }
                foreach ($attachment_id as $k => $v) {
                    $image_attributes = wp_get_attachment_image_src($v, $args['size']);
                    $temp['url']      = $image_attributes[0];
                    $data[]           = $temp;
                }

                return $data;
            } else {
                // Single Image
                $attachment_id    = get_post_meta($post_id, $key, true);
                $image_attributes = wp_get_attachment_image_src($attachment_id, $args['size']);

                return $image_attributes;
            }
        }

        return get_post_meta($post_id, $key, $args);
    }
}

function trt_post_share()
{

    if ((get_theme_mod('archive_sharing_facebook') == 1) ||
        (get_theme_mod('archive_sharing_twitter') == 1) ||
        (get_theme_mod('archive_sharing_pinterest')) == 1
    ) {
        echo '<ul class="social-share">';
        if (get_theme_mod('archive_sharing_facebook') == 1) {
            //echo '<li><a target="_blank" class="facebook" href="' . esc_url( 'https://www.facebook.com/sharer.php?s=100&amp;p[title]=' . get_the_title() . '&amp;p[url]=' . urlencode( get_permalink() ) . '&amp;p[images][0]=' . urlencode( wp_get_attachment_url( get_post_thumbnail_id() ) ) ) . '" title="' . esc_html__( 'Facebook', 'sailing' ) . '"><i class="fa fa-facebook"></i></a></li>';
            echo '<li><a target="_blank" class="facebook"  href="https://www.facebook.com/sharer.php?u=' . urlencode(get_permalink()) . '" title="' . esc_attr__('Facebook', 'sailing') . '"><i class="fa fa-facebook"></i></a></li>';
        }
        if (get_theme_mod('archive_sharing_twitter') == 1) {
            echo '<li><a target="_blank" class="twitter" href="' . esc_url('https://twitter.com/share?url=' . urlencode(get_permalink()) . '&amp;text=' . esc_attr(get_the_title())) . '" title="' . esc_html__('Twitter', 'sailing') . '"><i class="fa fa-twitter"></i></a></li>';
        }
        if (get_theme_mod('archive_sharing_pinterest') == 1) {
            echo '<li><a target="_blank" class="pinterest" href="' . esc_url('http://pinterest.com/pin/create/button/?url=' . urlencode(get_permalink()) . '&amp;description=' . get_the_excerpt() . '&media=' . urlencode(wp_get_attachment_url(get_post_thumbnail_id()))) . '" onclick="window.open(this.href); return false;" title="' . esc_html__('Pinterest', 'sailing') . '"><i class="fa fa-pinterest"></i></a></li>';
        }

        echo '</ul>';
    }

}

add_action('thim_social_share', 'trt_post_share');

function thim_getCSSAnimation($css_animation)
{
    $output = '';
    if ($css_animation != '') {
        $output = ' wpb_animate_when_almost_visible wpb_' . $css_animation;
    }
    return $output;
}

//add site origin pannel Widget Group
function thim_widget_group($tabs)
{
    $tabs[] = array(
        'title'  => esc_html__('Thim Widget', 'themeplate'),
        'filter' => array(
            'groups' => array('thim_widget_group')
        )
    );

    return $tabs;
}

add_filter('siteorigin_panels_widget_dialog_tabs', 'thim_widget_group', 19);

function trt_get_meta_value($post_id, $key = '', $default = false)
{
    $meta_value = get_post_meta($post_id, $key, true);

    return empty($meta_value) ? $default : $meta_value;
}

// Disable Gutenberg Editor
if (version_compare($GLOBALS['wp_version'], '5.0-beta', '>')) {
    // WP > 5 beta
    add_filter('use_block_editor_for_post_type', '__return_false', 100);
} else {
    // WP < 5 beta
    add_filter('gutenberg_can_edit_post_type', '__return_false');
}