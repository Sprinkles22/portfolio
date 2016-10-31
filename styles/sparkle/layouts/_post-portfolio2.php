<article id="item-<?php the_ID(); ?>" class="uk-article" data-permalink="<?php the_permalink(); ?>">
<figure class="uk-overlay uk-overlay-hover">
    <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('portfolio-image', array('class' => 'uk-overlay-scale uk-overlay-spin')); ?>
    <?php endif; ?>
    <figcaption class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle">
        <div class="uk-text-center">
            <h2 class="uk-h3 ca-titling uk-margin-remove"><?php the_title(); ?></h2>
            <?php 
                $media_links = get_the_term_list( $post->ID, 'media', '', ', ', '' );
                $media_terms = strip_tags( $media_links );
                echo '<h4 class="uk-margin-remove">'.$media_terms.'</h4>';
            ?>
        </div>
    </figcaption>
    <a href="#portfolio-<?php the_ID(); ?>" title="<?php the_title_attribute(); ?>" class="uk-position-cover" data-uk-modal></a>
</figure>
    <div id="portfolio-<?php the_ID(); ?>" class="uk-modal">
        <div class="uk-modal-dialog uk-modal-dialog-large">
            <a class="uk-modal-close uk-close"></a>
            <div class="uk-grid uk-grid-width-large-1-2 uk-height-1-1" data-uk-grid-match>
                <div>
                    <div class="easyzoom easyzoom--overlay uk-height-1-1 uk-width-1-1 uk-text-center">
    <a href="<?php the_post_thumbnail_url(); ?>">
        <img src="<?php the_post_thumbnail_url(); ?>" style="height:75vh;" />
    </a>
</div>
                </div>
                <div class="uk-flex uk-flex-middle">
                    <div>
                        <h2 class="ca-titling uk-margin-remove"><?php the_title(); ?></h2>
                        <h5 class="uk-margin-remove"><?php echo $media_terms; ?></h5>
                        <div class="uk-margin"><?php the_content(''); ?></div>
                        <?php 
                        $project_url = get_field('related_url');
                        if ($project_url) : ?>
                        <a href="<?php echo $project_url; ?>" class="uk-button uk-button-primary" target="_blank">View Site</a>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <script>
(function($) {
        // Instantiate EasyZoom instances
        var $easyzoom = $('.easyzoom').easyZoom();
})(jQuery);
    </script>
    </div>

</article>