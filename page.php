<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15/01/2017
 * Time: 12:46
 */

get_header();

if (date('N') >= 1 && date('N') <= 4):

    $arg = array(
        'post_type' => 'laj',
        'posts_per_page' => 10,
        'meta_query' => array(
            array(
                'key'     => 'breacking_new',
                'value'   => 1,
                'compare' => '='
            )
        )
    );
else:
    if (get_option('vsd')):
        $arg = array(
            'post_type' => 'vsd',
            'posts_per_page' => 10,
            'meta_query' => array(
                array(
                    'key'     => 'breacking_new',
                    'value'   => 1,
                    'compare' => '=',
                ),
            )
        );
    else:
        $arg = array(
            'post_type' => 'laj',
            'posts_per_page' => 10,
            'meta_query' => array(
                array(
                    'key'     => 'breacking_new',
                    'value'   => 1,
                    'compare' => '='
                )
            )
        );
    endif;

endif;

$service = new WP_query($arg);

?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post();

        $content = get_the_content();
        ?>

        <div class="td-category-header td_category_template_5">
            <div class="td-scrumb-holder">
                <div class="td-container">
                    <div class="td-pb-row">
                        <div class="td-pb-span12" style="margin-bottom:0;">
                            <div class="td-crumb-container">
                                <div class="entry-crumbs">
                                    <span class="td-bred-first"><a href="<?= home_url(); ?>">Accueil</a></span>
                                    <i class="td-icon-right td-bread-sep td-bred-no-url-last"></i>
                                    <span class="td-bred-no-url-last"><?php $title_tax = get_the_title(); strtolower(the_title()); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
        <div class="td-main-content-wrap td-main-page-wrap">
            <div class="td-container tdc-content-wrap td-white-background">
                <div class="vc_row wpb_row td-pb-row">
                    <div class="wpb_column vc_column_container td-pb-span12">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="td_block_wrap td_block_trending_now td-pb-border-top" data-td-block-uid="td_uid_16_58590bfa1d458">
                                    <?php

                                    if($service->have_posts()):

                                        ?>
                                        <div id="td_uid_16_58590bfa1d458" class="td_block_inner">
                                            <div class="td-block-row">

                                                <div class="td-trending-now-wrapper" data-start="">
                                                    <div class="td-trending-now-title">Flash infos</div>
                                                    <div class="td-trending-now-display-area">
                                                        <?php
                                                        while ($service->have_posts()) :
                                                            $service->the_post();
                                                            global $post;
                                                            ?>
                                                            <div class="td_module_trending_now td-trending-now-post">
                                                                <h3 class="entry-title td-module-title truncate">
                                                                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                                                                        <?php the_title(); ?>
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                        <?php endwhile; ?>
                                                    </div>

                                                    <div class="td-next-prev-wrap">
                                                        <a href="#" class="td_ajax-prev-pagex td-trending-now-nav-left" data-block-id="td_uid_16_58590bfa1d458" data-moving="left" data-control-start="">
                                                            <i class="td-icon-menu-left"></i>
                                                        </a>
                                                        <a href="#" class="td_ajax-next-pagex td-trending-now-nav-right" data-block-id="td_uid_16_58590bfa1d458" data-moving="right" data-control-start="">
                                                            <i class="td-icon-menu-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <h1 class="entry-title td-page-title"><?= $title_tax ?></h1>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="vc_row wpb_row td-pb-row">
                    <div class="wpb_column vc_column_container td-pb-span8">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="clearfix"></div>
                                <div class="td-a-rec" style="margin-bottom:28px;">
                                    <?php include 'publicite/single-haut.php'; ?>
                                </div>
                                <div class="td-post-content" style="text-align: justify;">
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
                                    <?php the_content() ?>
    <?php endwhile; ?>
<?php endif; ?>
                                </div>
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