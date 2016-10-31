<?php
//gallery
    $gal1 = get_field('gallery_image_1');
    $gal2 = get_field('gallery_image_2');
    $gal3 = get_field('gallery_image_3');
    $size = 'thumbnail';
    $thumb1 = $gal1['sizes'][ $size ];
    $thumb2 = $gal2['sizes'][ $size ];
    $thumb3 = $gal3['sizes'][ $size ];
//tags
    $media_links = get_the_term_list( $post->ID, 'media', '', ', ', '' );
    $media_terms = strip_tags( $media_links );
//button
    $project_url = get_field('related_url');
    $button_text = get_field('button_text');
?>

<article id="item-<?php the_ID(); ?>" class="uk-article" data-permalink="<?php the_permalink(); ?>">
<figure class="uk-overlay uk-overlay-hover">
    <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('portfolio-image', array('class' => 'uk-width-1-1 uk-overlay-scale uk-overlay-spin')); ?>
    <?php endif; ?>
    <figcaption class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle">
        <div class="uk-text-center">
            <h2 class="uk-h3 ca-titling uk-margin-remove"><?php the_title(); ?></h2>
            <?php echo '<h4 class="uk-margin-remove">'.$media_terms.'</h4>'; ?>
        </div>
    </figcaption>
    <a href="#portfolio-<?php the_ID(); ?>" title="<?php the_title_attribute(); ?>" class="uk-position-cover" data-uk-modal></a>
</figure>
    <div id="portfolio-<?php the_ID(); ?>" class="uk-modal">
        <div class="uk-modal-dialog uk-modal-dialog-large uk-">
            <a class="uk-modal-close uk-close"></a>
            <div class="uk-grid uk-grid-width-large-1-2 uk-height-1-1" data-uk-grid-match>
                <div class="uk-position-relative" style="background-image: url('http://caitlinalexander.net/wp-content/uploads/2016/05/nebula-space-hd-wallpaper-1920x1200-7028.jpg');">
                <?php if ($gal1) :?>
                    <ul id="switcher<?php the_ID(); ?>" class="uk-switcher uk-width-1-1 uk-height-1-1"><li>
                <?php endif; ?>
                    <div class="uk-height-1-1 uk-width-1-1 uk-text-center zoom-bg" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
                <?php if ($gal1) :?>
                    </li>
                    <li>
                    <div class="uk-height-1-1 uk-width-1-1 uk-text-center zoom-bg" style="background-image: url('<?php echo $gal1[url]; ?>');"></div>
                    </li>
                        <?php if ($gal2) :?>
                            <li><div class="uk-height-1-1 uk-width-1-1 uk-text-center zoom-bg" style="background-image: url('<?php echo $gal2[url]; ?>');"></div></li>
                        <?php endif; ?>
                        <?php if ($gal3) :?>
                            <li><div class="uk-height-1-1 uk-width-1-1 uk-text-center zoom-bg" style="background-image: url('<?php echo $gal3[url]; ?>');"></div></li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
                </div>
                <div class="uk-flex uk-flex-middle">
                    <div>
                        <!--Gallery thumbnails-->
                        <?php if ($gal1) :?>
                        <ul class="uk-list uk-margin-bottom port-thumb-list" data-uk-switcher="{connect:'#switcher<?php the_ID(); ?>'}">
                            <li><a href=""><?php echo get_the_post_thumbnail( $post_id, 'thumbnail' ); ?></a></li>
                            <li><a href=""><?php echo '<img src="'.$thumb1.'" />' ?></a></li>
                            <?php if ($gal2) :?>
                                <li><a href=""><?php echo '<img src="'.$thumb2.'" />' ?></a></li>
                            <?php endif; ?>
                            <?php if ($gal3) :?>
                                <li><a href=""><?php echo '<img src="'.$thumb3.'" />' ?></a></li>
                            <?php endif; ?>
                        </ul>
                        <?php endif; ?>
                        <!--Portfolio content-->
                        <h2 class="ca-titling uk-margin-remove"><?php the_title(); ?></h2>
                        <h5 class="uk-margin-remove"><?php echo $media_terms; ?> - <?php the_date('M Y', '<span>', '</span>'); ?></h5>
                        <div class="uk-margin"><?php the_content(''); ?></div>

                        <!--Portfolio Link-->
                        <?php if ($project_url) : ?>
                            <button href="<?php echo $project_url; ?>" class="uk-button uk-button-primary" target="_blank"><?php echo $button_text; ?></button>
                        <?php else : ?>
                            <button class="uk-button uk-button-primary" disabled><?php echo $button_text; ?></button>
                        <?php endif; ?>

                        
                    </div>
                </div>
            </div>
        </div>
        <script>
(function($) {
$(document).ready(function(){
   $('.zoom-bg').mousemove(function(e){
      var mousePosX = (e.pageX/$(window).width())*100;
      $('.zoom-bg').css('background-position-x', mousePosX +'%');
      var mousePosY = (e.pageY/$(window).height())*100;
      $('.zoom-bg').css('background-position-y', mousePosY +'%');
      console.log(mousePosX, mousePosY);
   }); 
});
})(jQuery);
    </script>
    </div>

</article>