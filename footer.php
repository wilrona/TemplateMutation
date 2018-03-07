<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03/01/2017
 * Time: 11:38
 */

?>




<div class="td-footer-wrapper">
	<div class="td-footer-bottom-full">
		<div class="td-container">
			<div class="td-pb-row">
				<div class="td-pb-span3">
					<aside class="footer-logo-wrap">
						<a href="<?= home_url(); ?>"><?php echo the_custom_logo(); ?></a>
					</aside>
				</div>
				<div class="td-pb-span5">
					<aside class="footer-text-wrap">
						<div class="block-title">
							<span>Qui Sommes Nous ?</span>
						</div>
						<?= get_option('description') ?>
						<div class="footer-email-wrap">Contact: <a href="mailto:<?= get_option('email') ?>"><?= get_option('email') ?></a></div>
						<div class="footer-email-wrap">Telephone : <?= get_option('phone_1') ?></a></div>
					</aside>
				</div>
				<div class="td-pb-span4">
					<aside class="footer-social-wrap td-social-style-2">
						<div class="block-title"><span>Nous Rejoindre</span></div>
                                <span class="td-social-icon-wrap">
                                    <a target="_blank" href="<?php echo get_option('facebook'); ?>" title="Facebook">
	                                    <i class="td-icon-font td-icon-facebook"></i>
                                    </a>
                                </span>
                                <span class="td-social-icon-wrap">
                                    <a target="_blank" href="<?php echo get_option('twitter'); ?>" title="Twitter">
	                                    <i class="td-icon-font td-icon-twitter"></i>
                                    </a>
                                </span>
                                <span class="td-social-icon-wrap">
                                    <a target="_blank" href="<?php echo get_option('youtube'); ?>" title="Youtube">
	                                    <i class="td-icon-font td-icon-youtube"></i>
                                    </a>
                                </span>
					</aside>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="td-sub-footer-container">
	<div class="td-container">
		<div class="td-pb-row">
			<div class="td-pb-span7 td-sub-footer-menu">
				<div class="menu-footer-menu-container">
					<!--<ul id="menu-footer-menu" class="td-subfooter-menu">
						<li id="menu-item-16" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-first td-menu-item td-normal-menu menu-item-16"><a href="#">Disclaimer</a></li>
						<li id="menu-item-17" class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-17"><a href="#">Privacy</a></li>
						<li id="menu-item-18" class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-18"><a href="#">Advertisement</a></li>
						<li id="menu-item-19" class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-19"><a href="#">Contact us</a></li>
					</ul>-->
				</div>
			</div>
			<div class="td-pb-span5 td-sub-footer-copy">
				© Copyright <?= date('Y'); ?> - Quotidien Mutations </div>
		</div>
	</div>
</div>




<!--Fin de la div body-->
</div>
<div id="td-theme-settings" class="td-live-theme-demos td-theme-settings-closed td-ts-closed-no-transition">
	<div class="clearfix btn"></div>
	<div class="td-set-hide-show"><a href="<?= site_url(); ?>/shop/">Mutations SHOP</a></div>
	<div class="td-screen-demo-extend" style="width: 101px; top: 0px; display: none;"></div>
</div>


<div class="modal" id="customModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>


<?php if(is_home()): ?>
    <?php rewind_posts(); ?>

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

<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<div class="header-logo">
                    <img class="td-retina-data" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="">
				</div>
				<div class="row">
					<div class="padding">
						<div class="col-sm-12">
							<h2> Journal du jour - <?php the_title() ?></h2>
                            <div class="row">
                                <div class="col-sm-4">
                                    <?php if ( has_post_thumbnail() ): ?>
                                            <?php the_post_thumbnail('image_300x300'); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-8">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <hr/>
                            <a href="<?= site_url(); ?>/shop/" class="btn btn-danger btn-block" style="color: #fff;background-color: #e93050;border-color: #e93050;"><i class="glyphicon glyphicon-shop"></i> Accedez à la boutique</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
            <?php
                             endif;
            endwhile;

    endif;
    ?>
<?php endif; ?>

<?php wp_footer(); ?>
</body>

</html>