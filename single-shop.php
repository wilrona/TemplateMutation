<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23/01/2017
 * Time: 05:35
 */


get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); wpb_set_post_views(get_the_ID()); ?>

        <div class="td-category-header td_category_template_5">
            <div class="td-scrumb-holder">
                <div class="td-container">
                    <div class="td-pb-row">
                        <div class="td-pb-span12" style="margin-bottom:0;">
                            <div class="td-crumb-container">
                                <div class="entry-crumbs">
                                    <span class="td-bred-first"><a href="<?= home_url(); ?>">Accueil</a></span>
                                    <i class="td-icon-right td-bread-sep"></i>
                                    <span class="td-bred"><a href="<?= home_url(); ?>/shop"><?= strtolower('Mutations shop'); ?></a></span>
                                    <i class="td-icon-right td-bread-sep td-bred-no-url-last"></i>
                                    <span class="td-bred-no-url-last"><?php strtolower(the_title()); ?></span>
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
                            <div class="wpb_wrapper">
                                <div class="td-pb-span12">
                                            <div class="td-post-header">
                                                <header class="td-post-title">
                                                    <ul class="td-category">
                                                        <li class="entry-category">
                                                            <a style="background-color:#e93050;color:#fff;border-color:#e93050" href="<?= home_url(); ?>/shop"><?= strtolower('Journaux');  ?></a>
                                                        </li>
                                                    </ul>
                                                    <h1 class="entry-title"><?php the_title(); ?></h1>
                                                    <div class="td-module-meta-info">
                                                        <div class="td-post-views"><i class="td-icon-views"></i><span class="td-nr-views-197"><?= wpb_get_post_views(get_the_ID()); ?></span>
                                                        </div>
                                                </header>
                                                <div class="td-post-sharing td-post-sharing-top ">
                                                    <?php echo do_shortcode('[juiz_sps buttons="facebook, google"]'); ?>
                                                </div>
                                            </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="vc_row wpb_row td-pb-row">

                    <div class="wpb_column vc_column_container td-pb-span4">
	                    <?php the_post_thumbnail('image_300x300', array('class' => 'attachment-shop_catalog size-shop_catalog wp-post-imag image_shop')); ?>
                    </div>
                    <div class="wpb_column vc_column_container td-pb-span8">
                        <?= get_the_content() ?>
                    </div>
                    <div class="wpb_column vc_column_container td-pb-span12" style="height: 800px">
                        <?php
                        $user = _wp_get_current_user();
                        if($user->ID != 0):
                            $query = tr_query()->table('wp_mut_subscription')->where('wp_user', $user->ID);
	                        $subscription = $query->first();

	                        $today = date("Y-m-d");
	                        $expire = $subscription['end_abonnement'];

	                        $today_dt = new DateTime($today);
	                        $expire_dt = new DateTime($expire);

                            if($expire_dt <= $today_dt):
                                $query->update(['active_abonnement', 0]);
                            endif;

                            $current = $query->first();

                            if($current['active_abonnement']):

                        ?>
                            <?= do_shortcode('[shop id="'.get_the_ID().'"][/shop]') ?>

                            <?php else: ?>

                                <div class="jumbotron" style="padding: 60px">
                                    <h1 style="line-height: initial;"><?= tr_options_field('mut_options.texteabon'); ?></h1>

                                    <div>
                                        <?= tr_options_field('mut_options.textedesc'); ?>
                                    </div>

                                    <div style="margin-top: 20px;"><a href="<?= home_url('/member/paid') ?>" class="btn btn-primary btn-lg button-shop abonnementCheck" role="button" data-id="<?= $current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">Payer un abonnement</a></div>
                                </div>

                            <?php endif; ?>

                        <?php else: ?>

                                <div class="jumbotron" style="padding: 60px">
                                    <h1 style="line-height: initial;"><?= tr_options_field('mut_options.texteabon'); ?></h1>

                                    <div>
                                        <?= tr_options_field('mut_options.textedesc'); ?>
                                    </div>

                                    <div style="margin-top: 20px;"><a href="<?= home_url('/member/paid') ?>" class="btn btn-primary btn-lg button-shop abonnementCheck" role="button" data-id="<?= $current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">Payer un abonnement</a></div>
                                </div>

                        <?php
                            endif;
                        ?>
                    </div>
                </div>

            </div>

        </div>


	<?php endwhile; ?>
<?php endif; ?>

<?php  get_footer(); ?>
