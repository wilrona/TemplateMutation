<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/01/2017
 * Time: 08:50
 */

 get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post();
            wpb_set_post_views(get_the_ID());
        ?>
        <!-- mfunc wpb_set_post_views(get_the_ID()); --><!-- /mfunc -->

        <div class="td-category-header td_category_template_5">
            <div class="td-scrumb-holder">
                <div class="td-container">
                    <div class="td-pb-row">
                        <div class="td-pb-span12" style="margin-bottom:0;">
                            <div class="td-crumb-container">
                                <div class="entry-crumbs">
                                    <span class="td-bred-first"><a href="<?= home_url(); ?>">Accueil</a></span>
                                    <i class="td-icon-right td-bread-sep"></i>
                                    <span class="td-bred"><a href="<?php echo get_permalink( get_page_by_path( 'agendas' )); ?>">Agenda</a></span>
                                    <i class="td-icon-right td-bread-sep td-bred-no-url-last"></i>
                                    <span class="td-bred-no-url-last"><?php strtolower(the_title()); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>


    <div class="td-main-content-wrap td-main-page-wrap td-post-template-12">


        <div class="td-container tdc-content-wrap td-white-background">




            <div class="vc_row wpb_row">
                <div class="wpb_column vc_column_container td-pb-span12">
                    <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                            <div class="td-pb-span12">
                            <?php if (have_posts()) : ?>
                                <?php while (have_posts()) : the_post();
                                    $taxonomy_cat = 'categorie_vsd';
                                    if ( get_post_type( get_the_ID() ) == 'laj' ) {
                                        $taxonomy_cat = 'categorie_laj';
                                    }
                                    $terms = wp_get_post_terms(get_the_ID(), $taxonomy_cat);
                                    $term = array_pop($terms);
                                    ?>
                                <div class="td-post-header">
                                    <header class="td-post-title">
                                        <h1 class="entry-title"><?php the_title(); ?></h1>
                                        <div class="td-module-meta-info">
                                            <div class="td-post-author-name">
                                                <div class="td-author-by"></div>
                                                <span>Publié le </span>
                                                <div class="td-author-line">:</div>
                                            </div>
                                                        <span class="td-post-date">
                                                            <time class="entry-date updated td-module-date" datetime="<?php the_time('c'); ?>"><?php sky_date_french('l d F Y', get_post_time('U', true), 1); ?></time>
                                                        </span>
                                            <div class="td-post-views"><i class="td-icon-views"></i><span class="td-nr-views-197"><?= wpb_get_post_views(get_the_ID()); ?></span>
                                            </div>
                                    </header>
                                    <div class="td-post-sharing td-post-sharing-top ">
                                        <?php echo do_shortcode('[juiz_sps buttons="facebook, google"]'); ?>
                                    </div>
                                </div>

                                <?php endwhile; endif; ?>
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
                                <?php include 'publicite/single-haut.php'; ?>
                            </div>
                            <div class="td-post-content" style="text-align: justify;">
                                <div class="td-post-featured-image">
                                    <a href="" class="td-modal-image">
                                        <?php the_post_thumbnail('image_696x604', array('class' => 'entry-thumb td-animation-stack-type0-2')); ?>

                                    </a>
                                </div>
                            <?php if (have_posts()) : ?>
                                <?php while (have_posts()) : the_post();?>

                                    <?php the_content(); ?>



                            <?php endwhile; endif; ?>
                            </div>
                            <footer>
                                <div class="td-block-row td-post-next-prev">
                                    <div class="td-block-span6 td-post-prev-post">
                                        <?php
                                        $prev_post = get_previous_post();
                                        if(!empty($prev_post)) {
                                        ?>
                                        <div class="td-post-next-prev-content">
                                            <span>Precedent evenement</span>
                                            <a href="<?= get_permalink($prev_post->ID) ?>"><?= $prev_post->post_title ?>
                                            </a>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="td-next-prev-separator"></div>

                                    <div class="td-block-span6 td-post-next-post">
                                        <?php
                                        $next_post = get_next_post();
                                        if(!empty($next_post)) {
                                            ?>
                                        <div class="td-post-next-prev-content">
                                            <span>Evenement suivant</span>
                                            <a href="<?= get_permalink($next_post->ID) ?>"><?= $next_post->post_title ?>
                                            </a>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="td-a-rec" style="margin-bottom:28px;">
                                    <?php include 'publicite/single-bas.php'; ?>
                                </div>
                            </footer>
                            <?php
                            $args = array(
                                'posts_per_page' => 8,
                                'post_type' => ['vsd','laj'],
                                'orderby' => 'rand'
                            );

                            $query_article = new WP_Query( $args );
                            ?>
                            <div class="td_block_wrap td_block_15 td_with_ajax_pagination td-pb-border-top">
                                <div class="td-block-title-wrap"><h4 class="block-title"><span>Nos publications</span></h4></div>
                                <div class="td_block_inner td-column-2">
                                    <div class="td-block-row">
                                        <?php
                                            while ($query_article->have_posts()) :
                                                $query_article->the_post();
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
                                                    $terms = get_the_terms( $post->ID, $taxonomy_cat);
                                                    if($terms):
                                                        $term = array_pop($terms);
                                                        ?>
                                                        <a href="<?= get_term_link($term->slug, $taxonomy_cat); ?>" class="td-post-category">
                                                            <?= $term->name ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                                <h3 class="entry-title td-module-title truncate"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>

                            <?php
                                if (have_posts()) :
                                    while (have_posts()) : the_post();
                                        if ( comments_open() || get_comments_number() ) :
                                            comments_template();
                                        endif;
                                    endwhile;
                                endif;
                            ?>



                        </div>
                    </div>
                </div>
                <div class="wpb_column vc_column_container td-pb-span4">
                    <?php include 'front/sidebar.php'; ?>
                </div>
            </div>
        </div>
    </div>

<?php  get_footer(); ?>