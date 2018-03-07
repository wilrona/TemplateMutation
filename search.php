<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/01/2017
 * Time: 16:19
 */

?>

<?php get_header(); ?>

<div class="td-category-header td_category_template_5">
    <div class="td-scrumb-holder">
        <div class="td-container">
            <div class="td-pb-row">
                <div class="td-pb-span12" style="margin-bottom:0;">
                    <div class="td-crumb-container">
                        <div class="entry-crumbs">
                            <span class="td-bred-first"><a href="<?= home_url(); ?>">Accueil</a></span>
                            <i class="td-icon-right td-bread-sep td-bred-no-url-last"></i>
                            <span class="td-bred-no-url-last">Rechercher</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    <div class="td-main-content-wrap td-main-page-wrap td-post-template-12">
        <div class="td-container tdc-content-wrap td-white-background">
            <div class="vc_row wpb_row">
                <div class="wpb_column vc_column_container td-pb-span12">
                    <div class="vc_column-inner">
                        <div class="content">
                            <div class="row" style="margin-bottom: 20px;">
                                <div class="col-xs-6 col-xs-offset-3">
                                    <h2 style="text-align: center">Recherche</h2>
                                    <form action="<?php bloginfo('url'); ?>">
                                        <div class="">
                                            <input type="text" class="form-control col-xs-12" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="recherche">

                                        </div>
                                    </form>

                                    <?php echo do_shortcode('[searchandfilter fields="search,post_date" types=",daterange" headings=",  " submit_label="Valider"]'); ?>

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="td-a-rec" style="margin-bottom:30px;">
                            <?php include 'publicite/home1.php'; ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="vc_row wpb_row td-pb-row">
                <div class="wpb_column vc_column_container td-pb-span8">
                    <div class="vc_column-inner">
                        <div class="wpb_wrapper">

                            <?php if (have_posts()): ?>
                                <?php while (have_posts()) : the_post(); ?>
                                    <div class="td_module_10 td_module_wrap td-animation-stack">
                                        <div class="td-module-thumb">
                                            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title() ?>">
                                                <?php if ( has_post_thumbnail() ): ?>
                                                    <?php the_post_thumbnail('image_218x150', array('class' => 'entry-thumb td-animation-stack-type0-2')); ?>
                                                <?php else:

                                                    echo wp_get_attachment_link( 303, 'image_218x150', false, false, false, array('class' => 'entry-thumb td-animation-stack-type0-2') );
                                                endif; ?>

                                            </a>
                                        </div>
                                        <div class="item-details">
                                            <h3 class="entry-title td-module-title">
                                                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title() ?>">
                                                    <?php the_title() ?>
                                                </a>
                                            </h3>
                                            <div class="td-module-meta-info">
                                                <span class="td-post-author-name">
                                                    <span><?php the_author(); ?></span> <span>-</span> </span>
                                                    <span class="td-post-date">
                                                        <time class="entry-date updated td-module-date" datetime="<?php the_time('c'); ?>"><?php sky_date_french('l d F Y', get_post_time('U', true), 1); ?></time>
                                                    </span>
                                            </div>
                                            <div class="td-excerpt">
                                                <?php echo substr(strtolower(strip_tags(get_the_content())),0, 200 ); ?> ...
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <div class="jumbotron" style="text-align: center">
                                    <h1>Opps !!! aucun resultat</h1>
                                </div>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="wpb_column vc_column_container td-pb-span4">
                    <?php include 'front/sidebar.php'; ?>
                </div>
            </div>






        </div>
    </div>


<?php get_footer(); ?>