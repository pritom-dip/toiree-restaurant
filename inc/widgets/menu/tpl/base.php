<div class="menu-tab-wrapper">
    <?php
    $show_class         = '';
    $column_num         = $instance['column_num'];
    $show_line          = $instance['line'];
    $show_seperator     = $instance['heading_seperator'];
    $show_class         .= $instance['heading_position'];
    $seperator_position = $instance['seperator_position'];
    $abc                = $instance['content'];


    if ($show_seperator === 'show' && $seperator_position == 'center') {
        $show_class .= ' heading-new-line heading-double-razor';
    }

    if ($show_line === 'hide') {
        $line = 'dots-hide';
    } else {
        $line = '';
    }

    // Category based name and posts
    $menu_categories = get_terms(array(
        'taxonomy'   => 'menu_list_category',
        'hide_empty' => false,
        'parent'     => 0
    ));

    $lan     = tr_get_current_language();


    $options = get_option($lan . '_menulist_sorting_order');

   // $options = get_option('menulist_sorting_order');

    if(!empty( $options )){

        $sorting_array = explode( ',', $options );

        echo '<ul id="myTabs" class="nav tab-parent" role="tablist" data-tabs="tabs">';
        $ci = 0;

        foreach( $sorting_array as $option ){
           $category_info = get_term_by( 'id', $option, 'menu_list_category' );

        ?>
            <li class="<?php echo $ci == 0 ? 'active' : ''; ?>">
                <a href="<?php echo '#' . $category_info->slug; ?>" data-toggle="tab" style="color:<?php echo $instance['category_color']; ?>"><?php echo $category_info->name; ?></a>
            </li>

        <?php
        $ci++;
        }
        ?>
        </ul>

        <select name="tr_menu_select" class="tr_menu_select"></select>

        <div class="tab-content">
       <?php
        $pi = 0;
        global $post;

        foreach( $sorting_array as $option ){

            $category_info = get_term_by( 'id', $option, 'menu_list_category' );

            $menu_lists = get_posts(array(
                'post_type'   => 'menu_list',
                'numberposts' => -1,
                'tax_query'   => array(
                    array(
                        'taxonomy' => 'menu_list_category',
                        'field'    => 'slug',
                        'terms'    => $category_info->slug,
                    )
                )
            ));

            ?>

            <div role="tabpanel" class="tab-pane fade <?php echo $pi == 0 ? 'in active' : ''; ?>"
                id="<?php echo $category_info->slug; ?>" tabcontent="#<?php echo $category_info->slug; ?>">

                <?php if(empty($menu_lists)){
                    echo _e("Please add some menu within this category", 'themeplate');
                }

                foreach ($menu_lists as $post) {
                    setup_postdata($post);
                    ?>
                    <div class="heading-wrapper">
                        <?php if ($seperator_position == 'above') { ?>
                            <hr style="width:100px; border-bottom: 1px solid <?php echo $instance['heading_color']; ?>"/>
                        <?php } ?>
                        <h4 class="price-item-heading <?php echo $show_class; ?>"
                            style="color:<?php echo $instance['heading_color']; ?>;"><?php echo get_the_title(); ?></h4>
                        <?php if ($seperator_position == 'bellow') { ?>
                            <hr style="width:100px; border-bottom: 1px solid <?php echo $instance['heading_color']; ?>"/>
                        <?php } ?>
                        <?php
                        if (!empty($instance['content']) == 'show') { ?>
                            <h6 class="price-item-subheading" style="color:<?php echo $instance['heading_color']; ?>; font-weight: 400;padding-top:10px;"><?php echo get_the_content(); ?></h6>
                        <?php } ?>
                    </div>

                    <?php
                    $room_all_infos = get_post_meta($post->ID, 'tt_room_info', true);
                    if (is_serialized($room_all_infos)) {
                        $menu_lists = unserialize($room_all_infos);
                    } else {
                        $menu_lists = '';
                    }

                    if (!empty($menu_lists)) {
                        echo "<ul class='menu-list-items'>";
                        foreach ($menu_lists as $menu_list) {
                            $default_image    = TP_THEME_URI . 'assets/images/room-101.jpg';
                            $image_attributes = wp_get_attachment_image_src($menu_list['image']);
                            $src              = empty($image_attributes[0]) ? $default_image : $image_attributes[0];
                            $value            = empty($menu_list['image']) ? '' : $menu_list['image'];
                            $title            = empty($menu_list['title']) ? '' : $menu_list['title'];
                            $desc             = empty($menu_list['desc']) ? '' : $menu_list['desc'];
                            $price            = empty($menu_list['price']) ? '' : $menu_list['price'];
                            ?>
                            <div class="<?php echo $column_num == 'two' ? 'col-md-6' : 'col-md-12'; ?>">
                                <div class="menu-list-item">
                                    <div class="menu-list-item-title" style="font-weight:<?php echo $instance['content_price_font_weight']; ?>">
                                        <h4 class="item-title" style="color:<?php echo $instance['content_color']; ?>"><?php echo $title; ?></h4>
                                        <span class="menu-list-item-price" style="color:<?php echo $instance['content_color']; ?>"><?php echo $instance['currency'].' '.$price; ?></span>
                                    </div>
                                    <p class="menu-list-item-desc" style="text-align: left;">
                                        <span class="desc-content" style="color:<?php echo $instance['content_desc_color']; ?>"><?php echo $desc; ?></span>
                                    </p>
                                </div>
                            </div>

                            <?php
                        }
                        echo '</ul>';
                    }
                }
                wp_reset_postdata(); ?>
            </div>

            <?php
            $pi++;
        }
        echo '</div>';
    }
    ?>

</div>
