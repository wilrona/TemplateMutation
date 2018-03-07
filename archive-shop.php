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
                                <span class="td-bred-no-url-last"><?php strtolower(the_title()); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="woocommerce woocommerce-page td-main-content-wrap td-main-page-wrap">
        <div class="td-container tdc-content-wrap td-white-background">
            <div class="td-pb-row">
                <div class="td-pb-span12 td-main-content">
                    <div class="td-ss-main-content">
                        <div class="page-description"><p></p>
                            <div class="vc_row wpb_row td-pb-row">
                                <div class="wpb_column vc_column_container td-pb-span12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_text_column wpb_content_element ">
                                                <div class="wpb_wrapper">
                                                    <p>
                                                        <img style="margin-top:-35px" src="<?php echo get_template_directory_uri(); ?>/images/mutations.jpg" alt="banner-shop" width="1068" height="475" class="td-retina aligncenter size-full wp-image-384">
                                                    </p>
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper"></div>
                                                    </div>
                                                    <p style="text-align:center">
                                                        <?php echo get_option('descboutique'); ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="vc_empty_space" style="height:10px"><span class="vc_empty_space_inner"></span></div>
                                            <div class="content">
                                                <div class="row" style="margin-bottom: 20px;">
                                                    <div class="col-xs-6 col-xs-offset-3">
                                                        <h2 style="text-align: center">Rechercher un jounal</h2>
                                                        <form action="<?php bloginfo('url'); ?>">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="recherche">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-default rechercher-btn" type="submit" name="submit"><span class="glyphicon glyphicon-search"></span></button>
                                                                </span>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row wpb_row td-pb-row">
                                <div class="wpb_column vc_column_container td-pb-span12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_text_column wpb_content_element ">
                                                <div class="wpb_wrapper">
                                                    <div class="block-title"><label style="margin-bottom: 0;">Nos journaux</label></div>
                                                    <div class="woocommerce">
                                                        <ul class="products">
                                                            <?php
                                                                wp_reset_postdata();
                                                                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                                                                $args = array(
                                                                    'post_type' => 'shop',
                                                                    'posts_per_page' => 12,
                                                                    'paged' => $paged,
                                                                    'meta_key'			=> 'date_de_parution',
                                                                    'orderby'			=> 'meta_value',
                                                                    'order'				=> 'DESC'
                                                                );
                                                                $query_post = new WP_Query( $args );

                                                                while ($query_post->have_posts()) :
                                                                    $query_post->the_post();
                                                                    global $post;
                                                            ?>
                                                                    <li class="post-359 product type-product status-publish has-post-thumbnail product_cat-posters first instock featured shipping-taxable purchasable product-type-simple">
                                                                        <a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-link">
                                                                            <?php the_post_thumbnail('image_300x300', array('class' => 'attachment-shop_catalog size-shop_catalog wp-post-imag image_shop')); ?>
                                                                            <h3 class="truncate"><?php the_title(); ?></h3>
                                                                        </a>

                                                                    </li>
                                                            <?php
                                                                endwhile;
                                                            ?>
                                                        </ul>
                                                        <?php wp_reset_postdata(); ?>
                                                        <?php custom_pagination($query_post->max_num_pages, "", $paged);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>










<?php get_footer(); ?>