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
            $taxonomy_cat = 'categorie_vsd';
            global $titre_parent_vsd, $url_parent_vsd;
            $titre = $titre_parent_vsd;
            $url = $url_parent_vsd;
            if ( get_post_type( get_the_ID() ) == 'laj' ) {
                $taxonomy_cat = 'categorie_laj';
                global $titre_parent_laj, $url_parent_laj;
                $titre = $titre_parent_laj;
                $url = $url_parent_laj;
            }
            $terms = wp_get_post_terms(get_the_ID(), $taxonomy_cat);

            $show_tax = false;
            if ($terms):
                $term = array_pop($terms);
                $show_tax = true;
            endif;


            $show = false;
            if(get_field('lien_de_la_video')):
                $show = true;
            endif;
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
                                    <span class="td-bred"><a href="<?= $url; ?>"><?= strtolower($titre); ?></a></span>
                                    <?php if($show_tax): ?>
                                    <i class="td-icon-right td-bread-sep"></i>
                                    <span class="td-bred"><a href="<?= get_term_link($term->slug, $taxonomy_cat); ?>"><?= strtolower($term->name);  ?></a></span>
                                    <?php endif; ?>
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


    <div <?php if($show): ?>class="td-post-template-11" <?php else: ?>class="td-main-content-wrap td-main-page-wrap td-post-template-12"<?php endif; ?>>

        <?php if($show): ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();

//                    $taxonomy_cat = 'categorie_vsd';
//                    if ( get_post_type( get_the_ID() ) == 'laj' ) {
//                        $taxonomy_cat = 'categorie_laj';
//                    }
//                    $terms = wp_get_post_terms(get_the_ID(), $taxonomy_cat);
//                    $term = array_pop($terms);

                    ?>
            <div class="td-video-template-bg td-video-custom">
                <div class="td-container">
                    <div class="td-pb-row">
                        <div class="td-pb-span4 td-post-header">
                            <?php if($show_tax): ?>
                            <ul class="td-category">
                                <li class="entry-category">
                                    <a style="background-color:#e93050;color:#fff;border-color:#e93050" href="<?= get_term_link($term->slug, $taxonomy_cat); ?>"><?= strtolower($term->name);  ?></a>
                                </li>
                            </ul>
                            <?php endif; ?>
                            <header class="td-post-title">
                                <h1 class="entry-title"><?php the_title() ?></h1>
                                <div class="td-module-meta-info">
                                    <div class="td-post-author-name"><div class="td-author-by"></div> <a href=""><?php the_author(); ?></a><div class="td-author-line"> - </div> </div> <span class="td-post-date">
                                        <time class="entry-date updated td-module-date" datetime="<?php the_time('c'); ?>"><?php sky_date_french('l d F Y', get_post_time('U', true), 1); ?></time>
                                    </span> <div class="td-post-views"><i class="td-icon-views"></i><span class="td-nr-views-175"><?= wpb_get_post_views(get_the_ID()); ?></span></div>
                                </div>
                            </header>
                            <div class="td-a-rec td-a-rec-id-post_style_11  ">
                                <?php include 'publicite/video.php'; ?>

                            </div>
                        </div>
                        <div class="td-pb-span8 td-post-featured-video">
                            <div class="wpb_video_wrapper">
                                <iframe id="td_youtube_player" width="100%" height="560" src="https://www.youtube.com/embed/<?php the_field('lien_de_la_video'); ?>?enablejsapi=1&amp;feature=oembed&amp;wmode=opaque&amp;vq=hd720" frameborder="0" allowfullscreen="" style="height: 391.5px;"></iframe>
                                <script type="text/javascript">var tag=document.createElement("script");tag.src="https://www.youtube.com/iframe_api";var firstScriptTag=document.getElementsByTagName("script")[0];firstScriptTag.parentNode.insertBefore(tag,firstScriptTag);var player;function onYouTubeIframeAPIReady(){player=new YT.Player("td_youtube_player",{height:"720",width:"960",events:{"onReady":onPlayerReady}});}
                                    function onPlayerReady(event){player.setPlaybackQuality("hd720");}</script>
                            </div>
                            <div class="td-post-sharing td-post-sharing-top ">
                                <div class="td-default-sharing">
                                    <?php echo do_shortcode('[juiz_sps buttons="facebook, google"]'); ?>

                                </div></div>
                        </div>
                    </div>
                </div>
            </div>

                <?php endwhile; ?>
            <?php endif; ?>

        <?php endif; ?>


        <div class="td-container tdc-content-wrap td-white-background">



            <?php if(!$show): ?>
            <div class="vc_row wpb_row">
                <div class="wpb_column vc_column_container td-pb-span12">
                    <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                            <div class="td-pb-span12">
                            <?php if (have_posts()) : ?>
                                <?php while (have_posts()) : the_post();
//                                    $taxonomy_cat = 'categorie_vsd';
//                                    if ( get_post_type( get_the_ID() ) == 'laj' ) {
//                                        $taxonomy_cat = 'categorie_laj';
//                                    }
//                                    $terms = wp_get_post_terms(get_the_ID(), $taxonomy_cat);
//                                    $term = array_pop($terms);
                                    ?>
                                <div class="td-post-header">
                                    <header class="td-post-title">
                                        <?php if($show_tax): ?>
                                        <ul class="td-category">
                                            <li class="entry-category">
                                                <a style="background-color:#e93050;color:#fff;border-color:#e93050" href="<?= get_term_link($term->slug, $taxonomy_cat); ?>"><?= strtolower($term->name);  ?></a>
                                            </li>
                                        </ul>
                                        <?php endif; ?>
                                        <h1 class="entry-title"><?php the_title(); ?></h1>
                                        <div class="td-module-meta-info">
                                            <div class="td-post-author-name">
                                                <div class="td-author-by">Par</div>
                                                <span><?php the_author(); ?></span>
                                                <div class="td-author-line"> - </div>
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
            <?php endif; ?>
            <div class="vc_row wpb_row td-pb-row">
                <div class="wpb_column vc_column_container td-pb-span8">
                    <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                            <div class="clearfix"></div>
                            <div class="td-a-rec" style="margin-bottom:28px;">
                                <?php include 'publicite/single-haut.php'; ?>
                            </div>
	                        <?php if (have_posts()) : ?>
                                <?php while (have_posts()) : the_post();?>
                                    <div class="td-post-content" style="text-align: justify;">
                                        <div class="td-post-featured-image">
                                            <a href="" class="td-modal-image">
                                                    <?php the_post_thumbnail('image_696x604', array('class' => 'entry-thumb td-animation-stack-type0-2')); ?>

                                            </a>
                                        </div>


                                        <?php the_content(); ?>


                                    </div>
		                        <?php endwhile; endif; ?>
                            <footer>
                                <?php if (have_posts()) : ?>
                                    <?php while (have_posts()) : the_post();?>
                                        <?php
		                                $tag_ids = get_the_terms(get_the_ID(), 'tags');
		                                if($tag_ids):
                                        ?>
                                    <div class="td-post-source-tags">
                                        <ul class="td-tags td-post-small-box clearfix">
                                            <li><span>TAGS</span></li>
                                            <?php


                                                foreach ($tag_ids as $tag):
                                            ?>
                                            <li><a href="#"><?= $tag->name ?></a></li>
                                                    <?php
                                                     endforeach;
                                                    ?>

                                        </ul>
                                    </div>
                                                    <?php endif; ?>
	                            <?php endwhile; endif; ?>
                                <div class="td-block-row td-post-next-prev">
                                    <div class="td-block-span6 td-post-prev-post">
                                        <?php
                                        $prev_post = get_adjacent_post(true, '', true, $taxonomy_cat);
                                        if(!empty($prev_post)) {
                                        ?>
                                        <div class="td-post-next-prev-content">
                                            <span>Precedent article</span>
                                            <a href="<?= get_permalink($prev_post->ID) ?>"><?= $prev_post->post_title ?>
                                            </a>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="td-next-prev-separator"></div>

                                    <div class="td-block-span6 td-post-next-post">
                                        <?php
                                        $next_post = get_adjacent_post(true, '', false, $taxonomy_cat);
                                        if(!empty($next_post)) {
                                            ?>
                                        <div class="td-post-next-prev-content">
                                            <span>Article suivant</span>
                                            <a href="<?= get_permalink($next_post->ID) ?>"><?= $next_post->post_title ?>
                                            </a>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="td-a-rec" style="margin-bottom:28px;">
                                    <?php include 'publicite/single-bas.php'; ?>
                                </div>

                                <div class="author-box-wrap">
                                <?php if (have_posts()) : ?>
                                    <?php while (have_posts()) : the_post();?>
                                    <?php $author_id=$post->post_author;?>
                                    <a href="">
                                        <?php if(get_field('image_de_profil', 'user_'.$author_id)):?>
                                        <img src="<?php the_field('image_de_profil', 'user_'.$author_id); ?>" width="96" height="96" alt="<?php the_author_meta( 'display_name' , $author_id ); ?>" class="avatar avatar-96 wp-user-avatar wp-user-avatar-96 alignnone photo td-animation-stack-type0-2" style="height: 96px; width: 86px;">
                                        <?php else: ?>
                                            <img src="http://1.gravatar.com/avatar/d1a15f8555b35e0ed00f95624c11b4e7?s=64&d=mm&r=g" width="96" height="96" alt="<?php the_author_meta( 'display_name' , $author_id ); ?>" class="avatar avatar-96 wp-user-avatar wp-user-avatar-96 alignnone photo td-animation-stack-type0-2" style="height: 96px; width: 86px;">

                                        <?php endif; ?>
                                    </a>
                                    <div class="desc">
                                        <div class="td-author-name vcard author">
                                            <span class="fn"><a href=""><?php the_author_meta( 'display_name' , $author_id ); ?></a></span>
                                        </div>
                                        <div class="td-author-description">
                                            <?php the_author_meta( 'description' , $author_id ); ?>
                                        </div>
                                        <div class="td-author-social">
                                            <?php
                                            $facebook = get_the_author_meta( 'facebook' , $author_id );
                                            if($facebook): ?>
                                            <span class="td-social-icon-wrap">
                                                <a target="_blank" href="<?php the_author_meta( 'facebook' , $author_id ) ?>" title="Facebook">
                                                    <i class="td-icon-font td-icon-facebook"></i>
                                                </a>
                                            </span>
                                            <?php endif; ?>
                                            <?php
                                            $twitter = get_the_author_meta( 'twitter' , $author_id );
                                            if($twitter): ?>
                                            <span class="td-social-icon-wrap">
                                                <a target="_blank" href=http://twitter.com/<?php the_author_meta( 'twitter' , $author_id ) ?>" title="Twitter">
                                                    <i class="td-icon-font td-icon-twitter"></i>
                                                </a>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="clearfix"></div>
                                        </div>
                                <?php endwhile; endif; ?>
                                </div>
                            </footer>
                            <?php
                            $post_type = 'vsd';
                            if (have_posts()) :
                                while (have_posts()) : the_post();

                                    if ( get_post_type( get_the_ID() ) == 'laj' ) {
                                        $post_type = 'laj';
                                    }
                                endwhile;
                            endif;

                            $args = array(
                                'posts_per_page' => 6,
                                'post_type' => $post_type,
                                'orderby' => 'rand'
                            );

                            $query_article = new WP_Query( $args );
                            ?>
                            <div class="td_block_wrap td_block_15 td_with_ajax_pagination td-pb-border-top">
                                <div class="td-block-title-wrap"><h4 class="block-title"><span>Plus d'article</span></h4></div>
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