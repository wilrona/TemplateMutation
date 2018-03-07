<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/01/2017
 * Time: 16:10
 */
?>


<?php get_header(); ?>
<?php

$current_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
global $titre_parent_vsd, $url_parent_vsd;

?>

    <div class="td-category-header td_category_template_5">
        <div class="td-scrumb-holder">
            <div class="td-container">
                <div class="td-pb-row">
                    <div class="td-pb-span12" style="margin-bottom:0;">
                        <div class="td-crumb-container">
                            <div class="entry-crumbs">
                                <span class="td-bred-first"><a href="<?= home_url(); ?>">Accueil</a></span>
                                <i class="td-icon-right td-bread-sep"></i>
                                <span class="td-bred"><a href="<?= $url_parent_vsd ?>"><?= strtolower($titre_parent_vsd); ?></a></span>
                                <i class="td-icon-right td-bread-sep td-bred-no-url-last"></i>
                                <span class="td-bred-no-url-last"><?php echo strtolower($current_term->name); ?></span>
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
                    <h1 class="entry-title td-page-title"><?= $current_term->name; ?></h1>

                    <div class="td_block_wrap td_block_big_grid_12 td-grid-style-1 td-hover-1 td-pb-border-top">
                        <div class="td_block_inner">
                            <div class="td-big-grid-wrapper">

                                <?php
                                $qobj = get_queried_object();
                                $count = 1;
                                $args = array(
                                    'posts_per_page' => 3,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => $qobj->taxonomy,
                                            'field' => 'id',
                                            'terms' => $qobj->term_id,
                                            //    using a slug is also possible
                                            //    'field' => 'slug',
                                            //    'terms' => $qobj->name
                                        )
                                    )
                                );

                                $random_query = new WP_Query( $args );
                                while ($random_query->have_posts()):
                                    $random_query->the_post();
                                    global $post;
                                    // Display
                                    if($count == 1):
                                        ?>

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
                                                        $terms = get_the_terms( $post->ID, $taxonomy);
                                                        if($terms):
                                                            $term = array_pop($terms);
                                                            ?>
                                                            <a href="<?= get_term_link($term->slug, $taxonomy); ?>" class="td-post-category">
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

                                    <?php else: ?>
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
                                                        $taxonomy_cat = 'categorie_vsd';
                                                        if ( get_post_type( get_the_ID() ) == 'laj' ) {
                                                            $taxonomy_cat = 'categorie_laj';
                                                        }
                                                        ?>
                                                        <?php
                                                        $terms = get_the_terms( $post->ID, $taxonomy_cat);
                                                        if($terms):
                                                            $term = array_pop($terms);
                                                            ?>
                                                            <a href="<?= get_term_link($term->slug, $taxonomy_cat); ?>" class="td-post-category">
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
                                    <?php $count = $count + 1; endwhile; ?>
                            </div>
                        </div>
                    </div>



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
                        <?php include 'publicite/vsd.php'; ?>
                    </div>
                    <div class="td_block_wrap td_block_2 td_with_ajax_pagination td-pb-border-top">
                        <div class="td_block_inner">
                            <div class="td-block-row">
                                <?php

                                wp_reset_postdata();
                                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                                $qobj = get_queried_object();
                                $args = array(
                                    'paged' => $paged,
                                    'order_by' => 'post_date',
                                    'order' => 'DESC',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => $qobj->taxonomy,
                                            'field' => 'id',
                                            'terms' => $qobj->term_id,
                                            //    using a slug is also possible
                                            //    'field' => 'slug',
                                            //    'terms' => $qobj->name
                                        )
                                    )
                                );
                                $query_post = new WP_Query( $args );

                                while ($query_post->have_posts()) :
                                    $query_post->the_post();
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
                                                $terms = get_the_terms( $post->ID, 'categorie_vsd');
                                                if($terms):
                                                    $term = array_pop($terms);
                                                    ?>
                                                    <a href="<?= get_term_link($term->slug, 'categorie_vsd'); ?>" class="td-post-category">
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
                                                <?php echo substr(strtolower(strip_tags(get_the_content())),0, 120 ); ?> ...
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