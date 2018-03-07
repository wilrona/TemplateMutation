<?php
/**
 * Created by IntelliJ IDEA.
 * User: online2
 * Date: 05/03/2018
 * Time: 15:39
 */

get_header(); ?>

<div class="td-category-header td_category_template_5">
	<div class="td-scrumb-holder">
		<div class="td-container">
			<div class="td-pb-row">
				<div class="td-pb-span12" style="margin-bottom:0;">
					<div class="td-crumb-container">
						<div class="entry-crumbs">
							<span class="td-bred-first"><a href="<?= home_url(); ?>">Accueil</a></span>
							<i class="td-icon-right td-bread-sep td-bred-no-url-last"></i>
							<span class="td-bred-first"><a href="<?= home_url('/member/profil'); ?>">Mes abonnements</a></span>
							<i class="td-icon-right td-bread-sep td-bred-no-url-last"></i>
							<span class="td-bred-no-url-last">Activez un Abonnement</span>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<div class="td-main-content-wrap td-main-page-wrap td-post-template-12">

	<div class="container" style="min-height: 100vh">
		<div class="col-sm-8" style="margin: 0 auto; float: none;">
			<section class="blue-section" style="margin-bottom: 20px;">
				<h1>Activez un abonnement en remplissant ce formulaire</h1>
			</section>

            <?php
                if(!empty($error)):
            ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error !</strong> <?= $error; ?>
            </div>
            <?php
                endif;
            ?>

            <div style="margin: 20px 0px 0px;" class="plans">
                <form method="post" id="id_formulaire_abonnement">
                    <div class="form-group row" style="margin-bottom: 40px;">
                        <label for="exampleInputEmail1" class="col-lg-3 control-label">Nom :</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nom" name="nom" value="<?php if(!empty($_POST) && $_POST['nom']) : echo $_POST['nom']; else:?> <?= $user->first_name ?> <?php endif; ?>" required>
                        </div>

                    </div>
                    <div class="form-group row" style="margin-bottom: 40px;">
                        <label for="exampleInputEmail2" class="col-lg-3 control-label">Prénom :</label>
                        <div class="col-lg-9">
                            <input type="text" name="prenom" class="form-control" id="exampleInputEmail2" placeholder="Prénom" value="<?php if(!empty($_POST) && $_POST['prenom']) : echo $_POST['prenom']; else:?> <?= $user->last_name ?> <?php endif; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom: 40px;">
                        <label class="col-lg-3 control-label">Pays :</label>
                        <div class="col-lg-9">
                            <p class="form-control-static" style="margin: 0;">Cameroun</p>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom: 40px;">
                        <label for="exampleInputEmail3" class="col-lg-3 control-label">Ville :</label>
                        <div class="col-lg-9">
                            <input type="text" name="ville" class="form-control" id="exampleInputEmail3" placeholder="Ville" value="<?php if(!empty($_POST) && $_POST['ville']) : echo $_POST['ville']; endif; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom: 40px;">
                        <label for="exampleInputEmail3" class="col-lg-3 control-label">Moyen de paiment :</label>
                        <div class="col-lg-9">
                            <label class="radio-inline">
                                <input type="radio" name="paiement" id="inlineRadio1" value="momo" checked="checked">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/momo.jpeg" alt="" style="height: 100px">

                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="paiement" id="inlineRadio2" value="om">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/om.jpg" alt="" style="height: 100px">
                            </label>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom: 40px;">
                        <label for="exampleInputEmail3" class="col-lg-3 control-label">Numéro phone :</label>
                        <div class="col-lg-9">
                            <input type="text" name="phone" class="form-control" id="exampleInputEmail3" placeholder="numéro de téléphone" value="<?php if(!empty($_POST) && $_POST['phone']) : echo $_POST['phone']; endif; ?>" required>
                        </div>
                    </div>

                    <input type="hidden" name="plan" id="plan">
	                <?php
	                    wp_nonce_field("form_seed_59cdf94920d75", "_tr_nonce_form");
	                ?>

                </form>
            </div>

			<ul class="plans">
                <?php
                    $args = array(
                        'post_type' => 'abonnement',
                        'posts_per_page' => -1,
                    );
                    $query_abonnement = new WP_Query( $args );

                ?>
<!--				<li class="plan">-->
<!--                    <div class="row">-->
<!--                        <div class="col-lg-3">-->
<!--                            <span class="price price-green">0 XAF</span>-->
<!--                        </div>-->
<!--                        <div class="col-lg-7">-->
<!--                            <div class="details">-->
<!--                                <h1 class="plan-title">Free</h1>-->
<!--                                <p class="plan-description">Not even a cookie</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-lg-2 uk-text-right">-->
<!--                            <button class="btn select">Choisir</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--				</li>-->
				<?php

                    while ($query_abonnement->have_posts()) :
                        $query_abonnement->the_post();
                        global $post;
				?>
				<li class="plan">
                    <div class="row">
                        <div class="col-lg-3">
                            <span class="price price-red"><?= tr_posts_field('prix', get_the_ID()) ?> XAF</span>
                        </div>
                        <div class="col-lg-7">
                            <div class="details">
                                <h1 class="plan-title"><?= get_the_title() ?></h1>
                                <p class="plan-description"><?= get_the_content() ?></p>
                            </div>
                        </div>
                        <div class="col-lg-2 uk-text-right">
                            <button class="btn select" id="<?= get_the_ID() ?>">Choisir</button>
                        </div>
                    </div>
				</li>
                <?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>

<?php get_footer(); ?>
