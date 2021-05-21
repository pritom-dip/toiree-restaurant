<div class="menu-tab-wrapper">
    <?php
    $show_class = '';
    //Settings page attributes
    $menu_settings = get_option( 'menu_list_settings' );
    if( $menu_settings  != '' ){
       $show_line            = $menu_settings['line'];
       $column_num           = $menu_settings['column_num'];
       $show_seperator       = $menu_settings['heading_seperator'];
       $show_class          .= $menu_settings['heading_position'];
       $seperator_position   = $menu_settings['seperator_position'];
        $abc=$menu_settings['content'];
    }

    if(  $show_seperator === 'show' && $seperator_position == 'center' ){
        $show_class .= ' heading-new-line heading-double-razor';
    }

    if(  $show_line === 'hide' ){
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

    if ( !empty($menu_categories) ) {
        $menu_categories = wp_list_pluck( $menu_categories, 'name', 'term_id' );
        echo '<ul id="myTabs" class="nav nav-pills nav-justified tab-parent" role="tablist" data-tabs="tabs">';
        $ci = 0;
        foreach ($menu_categories as $menu_category) { ?>
            <li class="<?php echo $ci == 0 ? 'active' : ''; ?>">
                <a href="<?php echo '#' . $menu_category; ?>" data-toggle="tab"><?php echo $menu_category; ?></a>
            </li>
            <?php $ci++;
        }
        echo '</ul>';

        echo '<div class="tab-content">';
        $pi = 0;
        global $post;
        foreach ( $menu_categories as $menu_category ) {
        $menu_lists = get_posts(array(
            'post_type'   => 'menu_list',
            'numberposts' => -1,
            'tax_query'   => array(
                array(
                    'taxonomy' => 'menu_list_category',
                    'field'    => 'name',
                    'terms'    => $menu_category,
                )
            )
        ));
        ?>

            <div  role="tabpanel" class="tab-pane fade <?php echo $pi == 0 ? 'in active' : ''; ?>" id="<?php echo $menu_category; ?>">

                <?php foreach ( $menu_lists as $post ) {
                    setup_postdata($post);
                    ?>
                    <div class="heading-wrapper">
                        <?php if($seperator_position == 'above'){ ?>
                            <hr style="width:100px; border-bottom: 1px solid <?php echo $menu_settings['heading_color']; ?>" />
                        <?php } ?>
                        <h4 class="price-item-heading <?php echo $show_class; ?>" style="color:<?php echo $menu_settings['heading_color']; ?>;"><?php echo get_the_title(); ?></h4>
                        <?php if($seperator_position == 'bellow'){ ?>
                        <hr style="width:100px; border-bottom: 1px solid <?php echo $menu_settings['heading_color']; ?>" />
                        <?php } ?>

                        <?php
                        if( !empty($menu_settings['content']) == 'show' ){ ?>
                        <h6 class="price-item-subheading"><?php echo get_the_content(); ?></h6>
                        <?php } ?>

                    </div>

                    <?php
                    $room_all_infos = get_post_meta( $post->ID, 'tt_room_info', true );

                    if ( is_serialized( $room_all_infos ) ) {
                        $menu_lists = unserialize($room_all_infos); //alx359
                    } else { $menu_lists = ''; }

                    if( !empty( $menu_lists ) ){
                        echo "<ul class='menu-list-items'>";
                        foreach ( $menu_lists as $menu_list ){
                            $default_image    = TP_THEME_URI . 'assets/images/room-101.jpg';
                            $image_attributes = wp_get_attachment_image_src( $menu_list['image'] );
                            $src              = empty($image_attributes[0]) ? $default_image : $image_attributes[0];
                            $value            = empty($menu_list['image']) ? '' : $menu_list['image'];
                            $title            = empty($menu_list['title']) ? '' : $menu_list['title'];
                            $desc             = empty($menu_list['desc']) ? '' : $menu_list['desc'];
                            $price            = empty($menu_list['price']) ? '' : $menu_list['price'];
                    ?>
                        <div class="<?php echo $column_num == 'two' ? 'col-md-6' : 'col-md-12'; ?>">
                            <li class="menu-list-item">
                                <h4 class="menu-list-item-title">
                                    <span class="item-title"><?php echo $title; ?></span>
                                    <hr class="dots <?php echo $line; ?>">
                                    <span class="menu-list-item-price">€ <?php echo  $price; ?></span>
                                </h4>
                                <p class="menu-list-item-desc">
                                    <span class="desc-content"><?php echo $desc; ?></span>
                                </p>
                            </li>
                        </div>

                    <?php
                        }
                        echo '</ul>';
                    }
                }
                wp_reset_postdata(); ?>

            </div>
            <?php $pi++;?>
        <?php } ?>
        </div>

    <?php } ?>

</div>