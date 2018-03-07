<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03/01/2017
 * Time: 11:38
 */

?>

<?php get_header(); ?>
    <div class="td-main-content-wrap td-main-page-wrap">
        <div class="td-container tdc-content-wrap td-white-background">
            <div class="vc_row wpb_row td-pb-row">
                <div class="wpb_column vc_column_container td-pb-span12">
                    <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                            <div class="td_block_wrap td_block_trending_now td-pb-border-top" data-td-block-uid="td_uid_16_58590bfa1d458">
                                <?php
                                    wp_reset_postdata();
                                    if (date('N') >= 1 && date('N') <= 4):

                                        $arg = array(
                                            'post_type' => 'laj',
                                            'posts_per_page' => 10,
                                            'lang' => pll_current_language('slug'),
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
                                                'lang' => pll_current_language('slug'),
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
                                                'lang' => pll_current_language('slug'),
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

                            <div class="td_block_wrap td_block_big_grid_3 td_uid_17_58590bfa20a02_rand td-grid-style-1 td-hover-1 td-pb-border-top" data-td-block-uid="td_uid_17_58590bfa20a02">
                                <div id="td_uid_17_58590bfa20a02" class="td_block_inner">
                                        <?php
                                        wp_reset_postdata();
                                        $taxonomy_header = 'categorie_laj';
                                        if (date('N') >= 1 && date('N') <= 4):

                                            $arg = array(
                                                'post_type' => 'laj',
                                                'posts_per_page' => 4,
                                                'meta_query' => array(
                                                    array(
                                                        'key'     => 'mettre_en_valeur',
                                                        'value'   => 1,
                                                        'compare' => '=',
                                                    ),
                                                )
                                            );
                                        else:
                                            if (get_option('vsd')):
                                                $arg = array(
                                                    'post_type' => 'vsd',
                                                    'posts_per_page' => 4,
                                                    'meta_query' => array(
                                                        array(
                                                            'key'     => 'mettre_en_valeur',
                                                            'value'   => 1,
                                                            'compare' => '=',
                                                        ),
                                                    )
                                                );
                                                $taxonomy_header = 'categorie_vsd';
                                            else:
                                                $arg = array(
                                                    'post_type' => 'laj',
                                                    'posts_per_page' => 4,
                                                    'meta_query' => array(
                                                        array(
                                                            'key'     => 'mettre_en_valeur',
                                                            'value'   => 1,
                                                            'compare' => '=',
                                                        ),
                                                    )
                                                );
                                            endif;

                                        endif;

                                        $service = new WP_query($arg);
                                        $service_2 = new WP_query($arg);
                                        $count = 1;


                                    ?>
                                    <div class="td-big-grid-wrapper">

                                        <?php
                                            while ($service->have_posts()) :
                                                $service->the_post();
                                                global $post;
                                        ?>

                                        <?php if($count == 1): ?>
                                        <div class="td_module_mx5 td-animation-stack td-big-grid-post-0 td-big-grid-post td-big-thumb">
                                            <div class="td-module-thumb">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php if ( has_post_thumbnail() ): ?>
                                                        <?php the_post_thumbnail('image_534x462', array('class' => 'entry-thumb td-animation-stack-type0-2')); ?>
                                                    <?php else:

                                                        echo wp_get_attachment_link( 303, 'image_534x462', false, false, false, array('class' => 'entry-thumb td-animation-stack-type0-2') );
                                                    endif; ?>
                                                </a>

                                            </div>
                                            <div class="td-meta-info-container">
                                                <div class="td-meta-align">
                                                    <div class="td-big-grid-meta">
                                                        <?php
                                                        $terms = get_the_terms( $post->ID, $taxonomy_header);
                                                        if($terms):
                                                            $term = array_pop($terms);
                                                            ?>
                                                            <a href="<?= get_term_link($term->slug, $taxonomy_header); ?>" class="td-post-category">
                                                                <?= $term->name ?>
                                                            </a>
                                                        <?php endif; ?>
                                                        <h3 class="entry-title td-module-title">
                                                            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title() ?>">
                                                               <?php the_title() ?>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div class="td-module-meta-info">
                                                        <span class="td-post-author-name">
                                                            <span><?php the_author(); ?></span>
                                                            <span>-</span>
                                                        </span>
                                                        <span class="td-post-date">
                                                            <time class="entry-date updated td-module-date" datetime="<?php the_time('c'); ?>"><?php sky_date_french('l d F Y', get_post_time('U', true), 1); ?></time>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            endif;
                                            $count = $count + 1;
                                            if($count > 1){break;}

                                        endwhile; ?>

                                        <div class="td-big-grid-scroll">
                                        <?php
                                        $count_anim = 1;
                                        while ($service_2->have_posts()) :
                                            $service_2->the_post();
                                            global $post;
                                            if($count_anim >= 2): ?>
                                                <?php if($count_anim == 2): ?>
                                                <div class="td_module_mx11 td-animation-stack td-big-grid-post-1 td-big-grid-post td-medium-thumb">
                                                            <div class="td-module-thumb">
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <?php if ( has_post_thumbnail() ): ?>
                                                                        <?php the_post_thumbnail('image_534x462', array('class' => 'entry-thumb td-animation-stack-type0-2')); ?>
                                                                    <?php else:

                                                                        echo wp_get_attachment_link( 303, 'image_534x462', false, false, false, array('class' => 'entry-thumb td-animation-stack-type0-2') );
                                                                    endif; ?>
                                                                </a>

                                                            </div>
                                                            <div class="td-meta-info-container">
                                                                <div class="td-meta-align">
                                                                    <div class="td-big-grid-meta">
                                                                        <?php
                                                                        $terms = get_the_terms( $post->ID, $taxonomy_header);
                                                                        if($terms):
                                                                            $term = array_pop($terms);
                                                                            ?>
                                                                            <a href="<?= get_term_link($term->slug, $taxonomy_header); ?>" class="td-post-category">
                                                                                <?= $term->name ?>
                                                                            </a>
                                                                        <?php endif; ?>
                                                                        <h3 class="entry-title td-module-title">
                                                                            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title() ?>">
                                                                                <?php the_title() ?>
                                                                            </a>
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                <?php else: ?>
                                                <div class="td_module_mx6 td-animation-stack <?php if($count_anim == 3): ?>td-big-grid-post-2 <?php else: ?> td-big-grid-post-3 <?php endif; ?> td-big-grid-post td-small-thumb">
                                                    <div class="td-module-thumb">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php if ( has_post_thumbnail() ): ?>
                                                                <?php the_post_thumbnail('image_265x198', array('class' => 'entry-thumb td-animation-stack-type0-2')); ?>
                                                            <?php else:

                                                                echo wp_get_attachment_link( 303, 'image_265x198', false, false, false, array('class' => 'entry-thumb td-animation-stack-type0-2') );
                                                            endif; ?>

                                                        </a>

                                                    </div>
                                                    <div class="td-meta-info-container">
                                                        <div class="td-meta-align">
                                                            <div class="td-big-grid-meta">
                                                                <?php
                                                                $terms = get_the_terms( $post->ID, $taxonomy_header);
                                                                if($terms):
                                                                    $term = array_pop($terms);
                                                                    ?>
                                                                    <a href="<?= get_term_link($term->slug, $taxonomy_header); ?>" class="td-post-category">
                                                                        <?= $term->name ?>
                                                                    </a>
                                                                <?php endif; ?>
                                                                <h3 class="entry-title td-module-title">
                                                                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title() ?>">
                                                                        <?php the_title() ?>
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php endif; ?>
                                            <?php endif; $count_anim = $count_anim + 1; if($count_anim >= 5){break;}?>
                                        <?php endwhile; ?>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="vc_row wpb_row td-pb-row">
                <div class="wpb_column vc_column_container td-pb-span12">
                    <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                            <?php include 'publicite/home1.php' ?>

                        </div>

                    </div>

                </div>
            </div>

            <div class="vc_row wpb_row td-pb-row">
                <div class="wpb_column vc_column_container td-pb-span8">

                    <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                            <div class="clearfix"></div>
                            <div class="td_block_wrap td_block_1 td_with_ajax_pagination td-pb-border-top">
                                <div class="td-block-title-wrap">
                                    <h4 class="block-title"><span style="margin-right: 0px;">Cameroun</span></h4>
                                </div>
                                <div class="td_block_inner">
                                    <div class="td-block-row">
                                        <?php
                                            wp_reset_postdata();
                                            $taxonomy = 'categorie_laj';
                                            if (date('N') >= 1 && date('N') <= 4):
                                                $args = array(
                                                    'post_type' => 'laj',
                                                    'post_per_page' => 5,
                                                    'lang' => pll_current_language('slug'),
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'zone_laj',
                                                            'field' => 'slug',
                                                            'terms' => 'cameroun'
                                                        )
                                                    )
                                                );
                                            else:
                                                if (get_option('vsd')):
                                                    $args = array(
                                                        'post_type' => 'vsd',
                                                        'post_per_page' => 5,
                                                        'tax_query' => array(
                                                            array(
                                                                'taxonomy' => 'zone_vsd',
                                                                'field' => 'slug',
                                                                'terms' => 'cameroun'
                                                            )
                                                        )
                                                    );
                                                    $taxonomy = 'categorie_vsd';
                                                else:
                                                    $args = array(
                                                        'post_type' => 'laj',
                                                        'post_per_page' => 5,
                                                        'tax_query' => array(
                                                            array(
                                                                'taxonomy' => 'zone_laj',
                                                                'field' => 'slug',
                                                                'terms' => 'cameroun'
                                                            )
                                                        )
                                                    );
                                                endif;
                                            endif;


                                            $query = new WP_Query( $args );


                                        ?>


                                        <div class="td-block-span6">
                                                <?php
                                                $count_cam = 1;
                                                while ($query->have_posts()) :
                                                $query->the_post();
                                                global $post;

                                                if($count_cam==1): ?>
                                            <div class="td_module_4 td_module_wrap td-animation-stack">
                                                <div class="td-module-image">
                                                    <div class="td-module-thumb">
                                                        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">

                                                            <?php if ( has_post_thumbnail() ): ?>
                                                                <?php the_post_thumbnail('image_324x235', array('class' => 'entry-thumb td-animation-stack-type0-2')); ?>
                                                            <?php else:

                                                                echo wp_get_attachment_link( 303, 'image_324x235', false, false, false, array('class' => 'entry-thumb td-animation-stack-type0-2') );
                                                            endif; ?>
                                                        </a>
                                                    </div>
                                                    <?php
                                                    $terms = get_the_terms( $post->ID, $taxonomy);
                                                    if($terms):
                                                        $term = array_pop($terms);
                                                    ?>
                                                    <a href="<?= get_term_link($term->slug, $taxonomy); ?>" class="td-post-category">
                                                        <?= $term->name ?>
                                                    </a>
                                                    <?php endif; ?>
                                                </div>
                                                <h3 class="entry-title td-module-title truncate"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                                <div class="td-module-meta-info">
                                                    <span class="td-post-author-name">
                                                        <span><?php the_author(); ?></span>
                                                        <span>-</span>
                                                    </span>
                                                    <span class="td-post-date">
                                                        <time class="entry-date updated td-module-date" datetime="<?php the_time('c'); ?>"><?php sky_date_french('l d F Y', get_post_time('U', true), 1); ?></time>
                                                    </span>
                                                </div>
                                                <div class="td-excerpt">
                                                    <?php echo substr(strtolower(strip_tags(get_the_content())),0, 200 ); ?> ...
                                                </div>
                                            </div>
                                                <?php endif; $count_cam = $count_cam + 1;  if($count_cam > 1){break;}  endwhile; ?>
                                        </div>

                                        <div class="td-block-span6">
                                                <?php
                                                $count_cam_last = 1;
                                                while ($query->have_posts()) :
                                                    $query->the_post();
                                                    global $post;

                                                    if($count_cam_last >= 2): ?>
                                            <div class="td_module_6 td_module_wrap td-animation-stack">
                                                <div class="td-module-thumb">
                                                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                                                        <?php if ( has_post_thumbnail() ): ?>
                                                            <?php the_post_thumbnail('image_100x70', array('class' => 'entry-thumb td-animation-stack-type0-2')); ?>
                                                        <?php else:

                                                            echo wp_get_attachment_link( 303, 'image_100x70', false, false, false, array('class' => 'entry-thumb td-animation-stack-type0-2') );
                                                        endif; ?>


                                                    </a>
                                                </div>
                                                <div class="item-details">
                                                    <h3 class="entry-title td-module-title truncate"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                                    <div class="td-module-meta-info">
                                                        <?php
                                                        $terms = get_the_terms( $post->ID, $taxonomy);
                                                        if($terms):
                                                            $term = array_pop($terms);
                                                            ?>
                                                            <a href="<?= get_term_link($term->slug, $taxonomy); ?>" class="td-post-category">
                                                                <?= $term->name ?>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php   endif; $count_cam_last = $count_cam_last + 1; if($count_cam_last >= 6){break;} endwhile; ?>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <?php

                            wp_reset_postdata();
                            $taxonomy_inverse = 'categorie_vsd';
                            $titre = 'Le quotidien du weekend';
                            if (date('N') >= 1 && date('N') <= 4):
                                if (get_option('vsd')):
                                    $args = array(
                                        'post_type' => 'vsd',
                                        'post_per_page' => 6
                                    );
                                else:
                                    $args = array(
                                        'post_type' => 'laj',
                                        'post_per_page' => 6
                                    );
                                    $taxonomy_inverse = 'categorie_laj';
                                    $titre = 'Le quotidien de la semaine';
                                endif;
                            else:
                                $args = array(
                                    'post_type' => 'laj',
                                    'post_per_page' => 6
                                );
                                $taxonomy_inverse = 'categorie_laj';
                                $titre = 'Le quotidien de la semaine';
                            endif;


                            $query_2 = new WP_Query( $args );
                            if($query_2->have_posts()):

                                ?>
                            <div class="td_block_wrap td_block_2 td_with_ajax_pagination td-pb-border-top">

                                <div class="td-block-title-wrap">
                                    <h4 class="block-title"><span style="margin-right: 0px;"><?= $titre ?></span></h4>
                                </div>
                                <div class="td_block_inner">
                                    <div class="td-block-row">
                                        <?php
                                            $count_2 = 1;
                                            while ($query_2->have_posts()) :
                                                $query_2->the_post();
                                                global $post;
                                                    if($count_2 <= 2):
                                                ?>
                                        <div class="td-block-span6">
                                            <div class="td_module_2 td_module_wrap td-animation-stack">
                                                <div class="td-module-image">
                                                    <div class="td-module-thumb">
                                                        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                                                            <?php if ( has_post_thumbnail() ): ?>
                                                                <?php the_post_thumbnail('image_324x160', array('class' => 'entry-thumb td-animation-stack-type0-2')); ?>
                                                            <?php else:

                                                                echo wp_get_attachment_link( 303, 'image_324x160', false, false, false, array('class' => 'entry-thumb td-animation-stack-type0-2') );
                                                            endif; ?>

                                                        </a>
                                                    </div>
                                                    <?php
                                                    $terms = get_the_terms( $post->ID, $taxonomy_inverse);
                                                    if($terms):
                                                        $term = array_pop($terms);
                                                        ?>
                                                        <a href="<?= get_term_link($term->slug, $taxonomy_inverse); ?>" class="td-post-category">
                                                            <?= $term->name ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                                <h3 class="entry-title td-module-title truncate">
                                                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title() ?>">
                                                        <?php the_title() ?>
                                                    </a>
                                                </h3>
                                                <div class="td-module-meta-info">
                                                            <span class="td-post-author-name">
                                                                 <span><?php the_author(); ?></span> <span>-</span>
                                                            </span>
                                                            <span class="td-post-date">
                                                                <time class="entry-date updated td-module-date" datetime="<?php the_time('c'); ?>"><?php sky_date_french('l d F Y', get_post_time('U', true), 1); ?></time>
                                                            </span>
                                                </div>
                                                <div class="td-excerpt">
                                                    <?php echo substr(strtolower(strip_tags(get_the_content())),0, 200 ); ?> ...
                                                </div>
                                            </div>
                                        </div>
                                          <?php  endif; $count_2 = $count_2 + 1; if($count_2 >  2){break;} endwhile;?>
                                    </div>
                                    <div class="td-block-row">
                                        <?php
                                        $count_2_last = 1;
                                        while ($query_2->have_posts()) :
                                            $query_2->the_post();
                                            global $post;
                                            if($count_2 > 2):
                                                ?>
                                                <div class="td-block-span6">
                                                    <div class="td_module_6 td_module_wrap td-animation-stack">
                                                        <div class="td-module-thumb">
                                                            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                                                                <?php if ( has_post_thumbnail() ): ?>
                                                                    <?php the_post_thumbnail('image_100x70', array('class' => 'entry-thumb td-animation-stack-type0-2')); ?>
                                                                <?php else:

                                                                    echo wp_get_attachment_link( 303, 'image_100x70', false, false, false, array('class' => 'entry-thumb td-animation-stack-type0-2') );
                                                                endif; ?>


                                                            </a>
                                                        </div>
                                                        <div class="item-details">
                                                            <h3 class="entry-title td-module-title truncate"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                                            <div class="td-module-meta-info">
                                                                <?php
                                                                $terms = get_the_terms( $post->ID, $taxonomy_inverse);
                                                                if($terms):
                                                                    $term = array_pop($terms);
                                                                    ?>
                                                                    <a href="<?= get_term_link($term->slug, $taxonomy_inverse); ?>" class="td-post-category">
                                                                        <?= $term->name ?>
                                                                    </a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php  endif; $count_2_last = $count_2_last + 1; if($count_2_last >  2){break;} endwhile;?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <div class="td_block_wrap td_block_15 td_with_ajax_pagination td-pb-border-top">
                                <div class="td-block-title-wrap"><h4 class="block-title"><span>Publications Vidéos</span></h4></div>
                                <div class="td_block_inner td-column-2">
                                    <div class="td-block-row">
                                        <?php

                                            $args = array(
                                                'post_type' => ['laj', 'vsd'],
                                                'posts_per_page' => 6,
                                                'order' => 'desc',
                                                'meta_query' => array(
                                                    array(
                                                        'key'     => 'lien_de_la_video',
                                                        'value'   => null,
                                                        'compare' => '!=',
                                                    ),
                                                )
                                            );

                                            $query_video = new WP_Query( $args );

                                            while ($query_video->have_posts()) :
                                                $query_video->the_post();
                                                global $post;

                                        ?>
                                        <div class="td-block-span4">
                                            <div class="td_module_mx4 td_module_wrap td-animation-stack">
                                                <div class="td-module-image">
                                                    <div class="td-module-thumb">
                                                        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                                                            <?php if ( has_post_thumbnail() ): ?>
                                                                <?php the_post_thumbnail('image_218x150', array('class' => 'entry-thumb td-animation-stack-type0-2')); ?>
                                                            <?php else:

                                                                echo wp_get_attachment_link( 303, 'image_218x150', false, false, false, array('class' => 'entry-thumb td-animation-stack-type0-2') );
                                                            endif; ?>


                                                        </a>
                                                    </div>
                                                    <?php
                                                        $taxonomy_video = 'categorie_vsd';
                                                        if ( get_post_type( get_the_ID() ) == 'laj' ) {
                                                            $taxonomy_video = 'categorie_laj';
                                                        }
                                                    ?>
                                                    <?php
                                                    $terms = get_the_terms( $post->ID, $taxonomy_video);
                                                    if($terms):
                                                        $term = array_pop($terms);
                                                        ?>
                                                        <a href="<?= get_term_link($term->slug, $taxonomy_video); ?>" class="td-post-category">
                                                            <?= $term->name ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                                <h3 class="entry-title td-module-title truncate">
                                                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                                </h3>
                                            </div>
                                        </div>

                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                            <?php include 'publicite/home2.php' ?>

                            <?php
                                wp_reset_postdata();
                                $taxonomy_popular = 'categorie_laj';
                                $current_year = date('Y');
                                $current_month = date('n');
                                if (date('N') >= 1 && date('N') <= 4):

                                    $arg = array(
                                        'post_type' => 'laj',
                                        'posts_per_page' => 8,
                                        'year'     => $current_year,
                                        'monthnum' => $current_month,
                                        'meta_key' => 'wpb_post_views_count',
                                        'orderby' => 'meta_value_num',
                                        'order' => 'DESC'

                                    );
                                else:
                                    if (get_option('vsd')):
                                        $arg = array(
                                            'post_type' => 'vsd',
                                            'posts_per_page' => 8,
                                            'year'     => $current_year,
                                            'monthnum' => $current_month,
                                            'meta_key' => 'wpb_post_views_count',
                                            'orderby' => 'meta_value_num',
                                            'order' => 'DESC'

                                        );
                                        $taxonomy_popular = 'categorie_vsd';
                                    else:
                                        $arg = array(
                                            'post_type' => 'laj',
                                            'posts_per_page' => 8,
                                            'year'     => $current_year,
                                            'monthnum' => $current_month,
                                            'meta_key' => 'wpb_post_views_count',
                                            'orderby' => 'meta_value_num',
                                            'order' => 'DESC'

                                        );
                                    endif;

                                endif;

                                $query_popular = new WP_query($arg);
                                if($query_popular->have_posts()):
                            ?>
                            <div class="td_block_wrap td_block_2 td_with_ajax_pagination td-pb-border-top">
                                <div class="td-block-title-wrap">
                                    <h4 class="block-title"><span style="margin-right: 0px;">Articles les plus consultés</span></h4>
                                </div>
                                <div class="td_block_inner">
                                    <div class="td-block-row">
                                        <?php



                                        while ($query_popular->have_posts()) :
                                            $query_popular->the_post();
                                            global $post;

                                        ?>
                                        <div class="td-block-span6">
                                            <div class="td_module_2 td_module_wrap td-animation-stack">
                                                <div class="td-module-image">
                                                    <div class="td-module-thumb">
                                                        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                                                            <?php if ( has_post_thumbnail() ): ?>
                                                                <?php the_post_thumbnail('image_324x160', array('class' => 'entry-thumb td-animation-stack-type0-2')); ?>
                                                            <?php else:

                                                                echo wp_get_attachment_link( 303, 'image_324x160', false, false, false, array('class' => 'entry-thumb td-animation-stack-type0-2') );
                                                            endif; ?>


                                                        </a>
                                                    </div>
                                                    <?php
                                                    $terms = get_the_terms( $post->ID, $taxonomy_popular);
                                                    if($terms):
                                                        $term = array_pop($terms);
                                                        ?>
                                                        <a href="<?= get_term_link($term->slug, $taxonomy_popular); ?>" class="td-post-category">
                                                            <?= $term->name ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                                <h3 class="entry-title td-module-title truncate">
                                                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title() ?>">
                                                        <?php the_title() ?>
                                                    </a>
                                                </h3>
                                                <div class="td-module-meta-info">
                                                            <span class="td-post-author-name">
                                                                 <span><?php the_author(); ?></span> <span>-</span>
                                                            </span>
                                                            <span class="td-post-date">
                                                                <time class="entry-date updated td-module-date" datetime="<?php the_time('c'); ?>"><?php sky_date_french('l d F Y', get_post_time('U', true), 1); ?></time>
                                                            </span>
                                                </div>
                                                <div class="td-excerpt">
                                                    <?php echo substr(strtolower(strip_tags(get_the_content())),0, 200 ); ?>
                                                </div>
                                            </div>
                                        </div>


                                        <?php endwhile; ?>
                                    </div>
                                </div>
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