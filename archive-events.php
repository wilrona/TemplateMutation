<?php
    /**
     * Created by PhpStorm.
     * User: User
     * Date: 10/01/2017
     * Time: 10:28
     */

    get_header();

    $post_type_obj = get_queried_object();
    $target = $post_type_obj->name;
    $presentation = new WP_Query( array(
    'post_type' => 'page',
    'meta_query' => array(
        array(
            'key' => '_archive_page',
            'value' => $target,
            'compare' => '='
        )
    )
    ) );
    $presentation->the_post();

    $title_tax = get_the_title();

    ?>

    <div class="td-category-header td_category_template_5">
        <div class="td-scrumb-holder">
            <div class="td-container">
                <div class="td-pb-row">
                    <div class="td-pb-span12" style="margin-bottom:0;">
                        <div class="td-crumb-container">
                            <div class="entry-crumbs">
                                <span class="td-bred-first"><a href="<?= site_url(); ?>">Accueil</a></span>
                                <i class="td-icon-right td-bread-sep td-bred-no-url-last"></i>
                                <span class="td-bred-no-url-last"><?php $title_tax = get_the_title(); strtolower(the_title()); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

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
                                <?php include 'publicite/laj.php'; ?>
                            </div>
                            <div class="td_block_wrap td_block_2 td_with_ajax_pagination td-pb-border-top">
                                <div class="td_block_inner">
                                    <div class="">
                                        <?php

//                                            wp_reset_postdata();
                                            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                                            $current_dates = get_the_time('U');
                                            $arg_2 = array(
                                                'post_type' => 'events',
                                                'orderby' 		=> '_start_eventtimestamp',
                                                'order' 		=> 'DESC',
                                                'meta_query'	=> array(
                                                    array(
                                                        'key'	 	=> '_start_eventtimestamp',
                                                        'value'	  	=> $current_dates,
                                                        'compare' 	=> '>',
                                                    ),
                                                )
                                            );

                                            $query_post = new WP_Query( $arg_2 );

                                            while ($query_post->have_posts()) :
                                                $query_post->the_post();
                                                global $post;

                                        ?>

                                        <div class="td_module_10 td_module_wrap td-animation-stack">
                                                    <div class="td-module-thumb">
                                                        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                                                            <?php if ( has_post_thumbnail() ): ?>
                                                                <?php the_post_thumbnail('image_218x150', array('class' => 'entry-thumb td-animation-stack-type0-2')); ?>
                                                            <?php else:
                                                                echo wp_get_attachment_link( 303, 'image_218x150', false, false, false, array('class' => 'entry-thumb td-animation-stack-type0-2') );
                                                            endif; ?>
                                                        </a>
                                                    </div>
                                                    <div class="item-details">
                                                        <h3 class="entry-title td-module-title truncate">
                                                            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title() ?>">
                                                                <?php the_title() ?>
                                                            </a>
                                                        </h3>
                                                        <div class="td-module-meta-info">
                                                            <span class="td-post-date">
                                                                <span class="td-post-author-name" style="font-size: 14px; top:0; color: #e93050;">
                                                                     <?php
                                                                     $location = get_post_meta(get_the_ID(), '_event_location', true);
                                                                     echo $location;
                                                                     ?>
                                                                </span><span> - </span>
                                                                <time class="entry-date updated td-module-date" datetime="<?php the_time('c'); ?>" style="color: #000;">
                                                                    <?php
                                                                    $date = get_post_meta($post->ID,'_start_eventtimestamp', true);
                                                                    //$date = get_post_meta($post->ID,'_end_eventtimestamp', true);
                                                                    sky_date_french('l d F Y', date('U', $date), 1);
                                                                    echo ' à '.date('H' , $date).':'; // Hora
                                                                    echo date('i' , $date); // Minutos
                                                                    ?>
                                                                </time>
                                                            </span>
                                                        </div>
                                                        <div class="td-excerpt">
                                                            <?php echo substr(strtolower(strip_tags(get_the_content())),0, 200 ); ?> ...
                                                        </div>
                                                    </div>


                                        </div>


                                            <?php endwhile; ?>
                                    </div>
                                    <?php wp_reset_postdata(); ?>
                                    <?php custom_pagination($query_post->max_num_pages, "", $paged);?>
                                </div>
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