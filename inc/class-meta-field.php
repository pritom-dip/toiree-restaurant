<?php

class TRT_MetaField
{

    /**
     * MetaBox constructor.
     */
    public function __construct()
    {
        //post-meta
        add_action('add_meta_boxes', array($this, 'register_meta_boxes'));
        add_action('save_post_menu_list', array($this, 'save_post_meta'));
        add_action('save_post_photo_gallary', array($this, 'save_gallary_sorting'));
        add_action('save_post', array($this, 'save_page_meta_option'), 10, 2);
        add_action('save_post_normal_gallary', array($this, 'save_page_normal_gallery_meta_option'), 10, 2);
    }

    public function register_meta_boxes()
    {
        add_meta_box('menu_post_options', 'Menu Settings', array($this, 'render_menu_meta_fields'), 'menu_list', 'normal', 'high');
        add_meta_box('portfolio_gallary_options', 'Portflio Video Option', array($this, 'render_portfolio_meta_fields'), 'photo_gallary', 'normal', 'high');
        add_meta_box('page_layout_option', 'Layout Option', array($this, 'render_page_meta_field'), 'page', 'normal', 'high');

        add_meta_box('normal_gallary_options', 'Gallery Settings', array($this, 'render_normal_gallery_meta_fields'), 'normal_gallary', 'normal');
    }

    public function render_normal_gallery_meta_fields( $post ) {

        $tr_gallery = get_post_meta($post->ID, 'tr_gallery', true);
        ?>

        <p>
            <label for="tr_gallery"><?php esc_html_e( 'Slider Gallery', 'themeplate' ); ?></label>
            <div class="separator gallery_images">
                <?php
                $img_array = ( isset( $tr_gallery ) && '' !== $tr_gallery ) ? explode( ',', $tr_gallery ) : '';

                if ( '' !== $img_array ) {
                    foreach ( $img_array as $img ) {
                        echo '<div class="gallery-item" data-id="' . esc_attr( $img ) . '"><div class="remove">x</div>' . wp_get_attachment_image( $img ) . '</div>';
                    }
                }
                ?>
            </div>
            <p class="separator gallery_buttons">
                <input id="tr_gallery_input" type="hidden" name="tr_gallery" value="<?php echo esc_attr( $tr_gallery ); ?>" />
                <input id="manage_gallery" title="<?php esc_html_e( 'Manage gallery', 'themeplate' ); ?>" type="button" class="button" value="<?php esc_html_e( 'Manage gallery', 'themeplate' ); ?>" />
                <input id="empty_gallery" title="<?php esc_html_e( 'Empty gallery', 'themeplate' ); ?>" type="button" class="button" value="<?php esc_html_e( 'Empty gallery', 'themeplate' ); ?>" />
            </p>
        </p>

        <?php

        if( $post->post_status == 'publish' ){
            if( $post->post_title == '' ){
                _e( "Give a title to the post", 'themeplate' );
                return;
            }
        ?>

            <div class="form-group">
                <h3>
                    <?php echo "[tr_gallery name='" . $post->post_title ."' id='" . $post->ID . "']"; ?>
                </h3>
            </div>

        <?php
        } else {
            _e( "Publish the gallery to see the shortcode", 'themeplate' );
        }
    }

    public function render_page_meta_field($post)
    {
        ?>

        <div class="form-group">
            <label for="thim_mtb_custom_layout"><?php _e("Use Custom Layout:", "themeplate"); ?></label>
            <?php $thim_mtb_custom_layout = trt_get_meta_value($post->ID, 'thim_mtb_custom_layout');
            $custom_layout_checked        = $thim_mtb_custom_layout == "1" ? 'checked="checked"' : ''; ?>
            <input class="custom_layout_on_off" id="thim_mtb_custom_layout" type="checkbox"
                   name="thim_mtb_custom_layout"
                   value="1" <?php echo $custom_layout_checked; ?> />
        </div>


        <div class="form-group layout-option-area">
            <label for="thim_mtb_layout"><?php _e("Select Layout:", "themeplate"); ?></label>
            <?php $thim_mtb_layout = trt_get_meta_value($post->ID, 'thim_mtb_layout');
            ?>
            <select name="thim_mtb_layout" id="thim_mtb_layout">
                <option value="full-content" <?php selected($thim_mtb_layout, 'full-content'); ?>>Full content</option>
                <option value="sidebar-left" <?php selected($thim_mtb_layout, 'sidebar-left'); ?>>Sidebar Left</option>
                <option value="sidebar-right" <?php selected($thim_mtb_layout, 'sidebar-right'); ?>>Sidebar Right
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="thim_mtb_no_padding"><?php _e("No Padding Content:", "themeplate"); ?></label>
            <?php $thim_mtb_no_padding = trt_get_meta_value($post->ID, 'thim_mtb_no_padding');
            $field_id_checked          = $thim_mtb_no_padding == "1" ? 'checked="checked"' : ''; ?>
            <input id="thim_mtb_no_padding" type="checkbox" name="thim_mtb_no_padding"
                   value="1" <?php echo $field_id_checked; ?> />
        </div>

        <?php

    }

    public function render_portfolio_meta_fields($post)
    {

        $portfolio_video_link = trt_get_meta_value($post->ID, 'portfolio_video_link');
        ?>

        <div class="form-group">
            <label for="portfolio_video_link"><?php _e("Video/PDF Link:", "themeplate"); ?></label>
            <input type="text" class="form-table form-control" name="portfolio_video_link"
                   value="<?php echo $portfolio_video_link; ?>"/>
        </div>

        <?php
    }

    public function render_menu_meta_fields($post)
    {
        $room_all_infos = maybe_unserialize(get_post_meta($post->ID, 'tt_room_info', true));
        echo "<div class='repeater-default'>";
        echo "<div data-repeater-list='tt_room' class='drag'>";

        if (!empty($room_all_infos)) {
            foreach ($room_all_infos as $room_all_info) {
                ?>
                <div data-repeater-item="">
                    <div class="form-group" style="width:100%;">

                        <div class="menu-inline width5">
                            <div class="menu-item-img">
                                <div class="form-group">
                                    <div class="upload tt_upload_image_button">

                                        <?php
                                        $default_image    = TP_THEME_URI . 'assets/images/room-101.jpg';
                                        $image_attributes = wp_get_attachment_image_src($room_all_info['image']);
                                        $src              = empty($image_attributes[0]) ? $default_image : $image_attributes[0];
                                        $value            = empty($room_all_info['image']) ? '' : $room_all_info['image'];
                                        ?>

                                        <img data-src="<?php echo $default_image; ?>" src="<?php echo $src; ?>"
                                             width="30px" height="30px" default_src="<?php echo $default_image; ?>"/>

                                        <input type="hidden" name="image" class="tt-msg-image"
                                               value="<?php echo $value; ?>"/>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-2 menu-inline">
                            <input type="text" name="title" value="<?php echo $room_all_info['title']; ?>"
                                   placeholder="Item Name" class="form-control">
                        </div>

                        <div class="col-sm-2 menu-inline width30">
                            <input type="text" name="desc" value="<?php echo $room_all_info['desc']; ?>"
                                   placeholder="Description" class="form-control width100">
                        </div>

                        <div class="col-sm-2 menu-inline width11">
                            <input type="text" name="price" value="<?php echo $room_all_info['price']; ?>"
                                   placeholder="Price" class="form-control" size="10">
                        </div>

                        <div class="col-sm-2 menu-inline menu-btn width11">
                                <span data-repeater-delete="" class="btn-delete-menu">
                                    <span class="dashicons dashicons-no"></span>
                                </span>
                        </div>

                        <div class="col-sm-2 menu-inline draggble-btn menu-btn width11">
                                <span data-repeater-delete="" class="btn-delete-menu">
                                    <span class="dashicons dashicons-editor-ul"></span>
                                </span>
                        </div>

                    </div>
                </div>

            <?php }
        } else { ?>

            <div data-repeater-item="">
                <div class="form-group" style="width:100%;">

                    <div class="menu-inline width5">
                        <div class="menu-item-img">
                            <div class="form-group">

                                <div class="upload tt_upload_image_button">
                                    <?php
                                    $default_image = TP_THEME_URI . 'assets/images/room-101.jpg';
                                    $src           = $default_image;
                                    $value         = '';
                                    ?>
                                    <img data-src="<?php echo $default_image; ?>" src="<?php echo $src; ?>" width="30px"
                                         height="30px"/>

                                    <input type="hidden" class="tt-msg-image" name="image"
                                           value="<?php echo $value; ?>"/>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-sm-2 menu-inline">
                        <input type="text" name="title" value="" placeholder="Item Name" class="form-control">
                    </div>

                    <div class="col-sm-2 menu-inline width30">
                        <input type="text" name="desc" value="" placeholder="Description" class="form-control width100">
                    </div>

                    <div class="col-sm-2 menu-inline width11">
                        <input type="text" name="price" value="" placeholder="Price" class="form-control" size="10">
                    </div>

                    <div class="col-sm-2 menu-inline menu-btn width11">
                            <span data-repeater-delete="" class="btn-delete-menu">
                                <span class="dashicons dashicons-no"></span>
                            </span>
                    </div>

                    <div class="col-sm-2 menu-inline draggble-btn menu-btn width11">
                            <span data-repeater-delete="" class="btn-delete-menu">
                                <span class="dashicons dashicons-editor-ul"></span>
                            </span>
                    </div>

                </div>
            </div>

        <?php } ?>

        </div>

        <div class="form-group">
            <div class="margin-t20">
                    <span data-repeater-create="" class="btn-add-menu">
                        <span class="dashicons dashicons-plus"></span>Add</span>
                </span>
            </div>
        </div>

        </div>

        <?php
    }


    public function save_page_meta_option($post_id, $post)
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        if (defined('DOING_AJAX') && DOING_AJAX) {
            return;
        }
        //Check the user's permissions.
        if ('page' == $post->post_type) {
            if (!current_user_can('edit_page', $post_id)) {
                return;
            }
        } else {
            if (!current_user_can('edit_post', $post_id)) {
                return;
            }
        }

        $thim_mtb_no_padding    = !empty($_POST["thim_mtb_no_padding"]) ? intval($_POST["thim_mtb_no_padding"]) : 0;
        $thim_mtb_custom_layout = !empty($_POST["thim_mtb_custom_layout"]) ? intval($_POST["thim_mtb_custom_layout"]) : 0;
        $thim_mtb_layout        = !empty($_POST["thim_mtb_layout"]) ? sanitize_text_field($_POST["thim_mtb_layout"]) : 'full-content';

        update_post_meta($post_id, 'thim_mtb_layout', $thim_mtb_layout);
        update_post_meta($post_id, 'thim_mtb_no_padding', $thim_mtb_no_padding);
        update_post_meta($post_id, 'thim_mtb_custom_layout', $thim_mtb_custom_layout);


    }

    public function save_post_meta($post_id)
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        if (defined('DOING_AJAX') && DOING_AJAX) {
            return;
        }

        if (isset($_POST['tt_room']) && !empty($_POST['tt_room'])) {
            $room_info = serialize($_POST["tt_room"]);;
            update_post_meta($post_id, 'tt_room_info', $room_info);
        }

    }

    public function save_gallary_sorting($post_id) {

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;

        if (defined('DOING_AJAX') && DOING_AJAX)
            return;

        if (!current_user_can('edit_post', $post_id))
            return;

        if (false !== wp_is_post_revision($post_id))
            return;
        $lan     = tr_get_current_language();

        if ('publish' == get_post_status($post_id)) {
            $options = get_option( $lan . 'portfolio_sorting_order');

            if (!empty($options)) {

                $postId = strval($post_id);
                $ids    = explode(',',$options);

                if (!in_array($postId, $ids)) {
                    $new_options = $options . ',' . $postId;
                    update_option( $lan . 'portfolio_sorting_order', $new_options);
                }

            } else {
                update_option( $lan . 'portfolio_sorting_order', $post_id);
            }

            $portfolio_video_link = !empty($_POST['portfolio_video_link']) ? sanitize_text_field($_POST['portfolio_video_link']) : '';

            update_post_meta($post_id, 'portfolio_video_link', $portfolio_video_link);

        }

        if ('trash' == get_post_status($post_id)) {

            $options = get_option( $lan . 'portfolio_sorting_order');

            if (!empty($options)) {
                $id = strval($post_id);
                if (strpos($options, $id) == true) {
                    $deleted_options = str_replace(',' . $id, '', $options);
                    update_option( $lan . 'portfolio_sorting_order', $deleted_options);
                }
            }
        }
    }

    public function save_page_normal_gallery_meta_option($post_id){

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        if (defined('DOING_AJAX') && DOING_AJAX) {
            return;
        }

        if ( isset( $_POST['tr_gallery'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'tr_gallery', sanitize_text_field( wp_unslash( $_POST['tr_gallery'] ) ) ); // Input var okay.
        }

    }

} 