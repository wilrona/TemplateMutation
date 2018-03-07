<div class="vc_column-inner">
    <div class="wpb_wrapper">
        <div class="clearfix"></div>

        <?php
        $date = date('Ymd');
        $args = array(
            'post_type' => 'shop',
            'posts_per_page' => 1,
            'meta_query' => array(
                array(
                    'key'     => 'date_de_parution',
                    'value'   => $date,
                    'compare' => '=',
                ),
            )
        );
        $query_shop = new WP_query($args);
        if($query_shop->have_posts()):
            while ($query_shop->have_posts()) :
                $query_shop->the_post();
                global $post;
            if(get_field('lien_du_pdf')):
        ?>

            <div class="td_block_wrap td_block_social_counter td-pb-border-top">
                <h4 class="block-title"><span>Jounal du jour</span></h4>
                <div class="td-social-list">
                    <?php if ( has_post_thumbnail() ): ?>
                        <a href="<?php the_permalink(); ?>" data-toggle="modal" data-target="#customModal" data-backdrop="static">
                            <?php the_post_thumbnail('image_300x300'); ?>
                        </a>
                    <?php endif; ?>
                    <a href="<?php bloginfo('url'); ?>/user/download/" class="btn btn-danger btn-block download_pdf" data-id="<?= get_the_ID(); ?>"><i class="glyphicon glyphicon-download-alt"></i> Téléchargez</a>
                </div>
            </div>

        <?php
                 endif;
                endwhile;

        endif;
        ?>

        <div class="td_block_wrap td_block_social_counter td-pb-border-top">
            <div class="td-block-title"><h4 class="block-title"><span>Newsletter: Restez au courant de l'actualité</span></h4></div>
                <div class="td_block_inner td-column-1">
                    <?php es_subbox( $namefield = "YES", $desc = "", $group = "public" ); ?>
                </div>
            </div>
        </div>
    <hr/>
        <div class="td-a-rec td-a-rec-id-sidebar">
            <?php include 'sidebar_pub.php'; ?>
        </div>

        <?php if(is_home()): ?>

            <?php
            wp_reset_postdata();
            $taxonomy_etranger = 'categorie_laj';
            if (date('N') >= 1 && date('N') <= 4):
                $args = array(
                    'post_type' => 'laj',
                    'post_per_page' => 4,
                    'lang' => pll_current_language('slug'),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'zone_laj',
                            'field' => 'slug',
                            'terms' => 'etranger'
                        )
                    )
                );
            else:
                if (get_option('vsd')):
                    $args = array(
                        'post_type' => 'vsd',
                        'post_per_page' => 4,
                        'lang' => pll_current_language('slug'),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'zone_vsd',
                                'field' => 'slug',
                                'terms' => 'etranger'
                            )
                        )
                    );
                    $taxonomy_etranger = 'categorie_vsd';
                else:
                    $args = array(
                        'post_type' => 'laj',
                        'post_per_page' => 4,
                        'lang' => pll_current_language('slug'),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'zone_laj',
                                'field' => 'slug',
                                'terms' => 'etranger'
                            )
                        )
                    );
                endif;
            endif;


            $query = new WP_Query( $args );


            ?>



            <div class="td_block_wrap td_block_15 td_with_ajax_pagination td-pb-border-top">
                <div class="td-block-title-wrap"><h4 class="block-title"><span>Etranger</span></h4></div>
                <div class="td_block_inner td-column-1">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                        global $post;
                    ?>
                    <div class="td-block-span12">
                        <div class="td_module_mx4 td_module_wrap td-animation-stack">
                            <div class="td-module-image">
                                <div class="td-module-thumb">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                                        <?php if ( has_post_thumbnail() ): ?>
                                            <?php the_post_thumbnail('image_218x150', array('class' => 'entry-thumb td-animation-stack-type0-2')); ?>
                                        <?php else:

                                            echo '<img src="' . home_url() . '/wp-content/uploads/2017/01/PUTATION-218x150.jpg' . '" alt="" class="entry-thumb td-animation-stack-type0-2" />';
                                        endif; ?>

                                    </a>
                                </div>
                                <?php
                                $terms = get_the_terms( $post->ID, $taxonomy_etranger);
                                if($terms):
                                    $term = array_pop($terms);
                                    ?>
                                    <a href="<?= get_term_link($term->slug, $taxonomy_etranger); ?>" class="td-post-category">
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

        <?php endif; ?>


        <?php
        if(!is_archive() && get_queried_object() && get_queried_object()->name != 'events'):
            $current_date = get_the_time('U');
            $args = array(
                'post_type' 		=> 'events',
                'posts_per_page' 	=> 6,
                'lang' => pll_current_language('slug'),
                'orderby' 		=> '_start_eventtimestamp',
                'order' 		=> 'DESC',
                'meta_query'	=> array(
                    array(
                        'key'	 	=> '_start_eventtimestamp',
                        'value'	  	=> $current_date,
                        'compare' 	=> '>',
                    ),
                )
            );

            $query_annonce = new WP_Query( $args );

            if($query_annonce->have_posts()):
        ?>

        <div class="td_block_wrap td_block_10 td_uid_55_58590bfa65253_rand td-pb-border-top">
            <div class="td-block-title-wrap"><h4 class="block-title"><span>AGENDA</span></h4></div>
            <div class="td_block_inner">
                <?php
                while ($query_annonce->have_posts()) :
                    $query_annonce->the_post();
                    global $post;
                ?>
                <div class="td-block-span12">
                    <div class="td_module_wrap">
                        <div class="item-details">
                            <h3 class="entry-title td-module-title truncate"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                            <div class="td-module-meta-info">
                                <span class="td-post-date">
                                    <span class="td-post-author-name" style="font-size: 14px; top:0; color: #e93050;">
                                         <?php
                                        $location = get_post_meta(get_the_ID(), '_event_location', true);
                                        echo $location;
                                        ?>
                                    </span><br/><br/>
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
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <a href="<?php echo get_permalink( get_page_by_path( 'agendas' )); ?>" class="btn btn-danger btn-block" style="color: #fff;background-color: #e93050;border-color: #e93050;"><i class="glyphicon glyphicon-calendar"></i> Tous nos évènements</a>
            </div>
        </div>
        <?php endif; endif;?>

    </div>
</div>