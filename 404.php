<section class="error-404 not-found">

    <header class="page-header text-center">
        <p class="error404-alert">404!</p>
        <h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.', 'themeplate'); ?></h1>
    </header>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center error-page-text">
                    <p><?php _e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'themeplate'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </div>

</section>
