<!-- 4 -->

<div class="navigation menu_v4_wrapper">
    <div class="tm-flex">
        <div id="menuToggle" class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
            <input type="checkbox" class="humberger-check"/>

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

            <ul id="menu">
            </ul>

        </div>

        <div class="width-logo sm-logo row margin-l0">

            <div class="col-md-4 align-center v4_logo">

                <?php
                do_action( 'thim_logo' );
                do_action( 'thim_mobile_logo' );
                ?>

            </div>

        </div>
    </div>

    <div>

        <div class="navigation col-sm-12">
            <div class="tm-table">
                <nav class="width-navigation table-cell table-center">
                    <?php
                    get_template_part( 'inc/header/main-menu' );
                    ?>
                </nav>
            </div>
            <!--end .row-->
        </div>

    </div>

</div>

