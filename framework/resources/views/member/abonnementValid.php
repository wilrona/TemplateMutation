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
					<h1>Validez la transaction sur le <?= $facture['phone'] ?> par le moyen de paiement
                        <?php
                            if($facture['payment_type'] === 'momo'):
                        ?>
                        Mobile Money
                        <?php endif; ?>

						<?php
						if($facture['payment_type'] === 'om'):
							?>
                            Orange Money
						<?php endif; ?>

                    </h1>
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
								<p class="form-control-static" style="margin: 0;"><?= $facture['first_name'] ?></p>

							</div>

						</div>
						<div class="form-group row" style="margin-bottom: 40px;">
							<label for="exampleInputEmail2" class="col-lg-3 control-label">Prénom :</label>
							<div class="col-lg-9">
								<p class="form-control-static" style="margin: 0;"><?= $facture['last_name'] ?></p>
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
								<p class="form-control-static" style="margin: 0;"><?= $facture['ville'] ?></p>
							</div>
						</div>
						<div class="form-group row" style="margin-bottom: 40px;">
							<label for="exampleInputEmail3" class="col-lg-3 control-label">Moyen de paiment :</label>
							<div class="col-lg-9">
								<?php
									if($facture['payment_type'] === 'momo'):
								?>
								<label class="radio-inline">
									<img src="<?php echo get_template_directory_uri(); ?>/images/momo.jpeg" alt="" style="height: 100px">

								</label>
								<?php endif; ?>
								<?php
								if($facture['payment_type'] === 'om'):
									?>
								<label class="radio-inline">
									<img src="<?php echo get_template_directory_uri(); ?>/images/om.jpg" alt="" style="height: 100px">
								</label>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group row" style="margin-bottom: 40px;">
							<label for="exampleInputEmail3" class="col-lg-3 control-label">Numéro phone :</label>
							<div class="col-lg-9">
								<p class="form-control-static" style="margin: 0;"><?= $facture['phone'] ?></p>
							</div>
						</div>
						<input type="hidden" name="member" value="<?= $member['id'] ?>">
						<?php
						wp_nonce_field("form_seed_59cdf94920d75", "_tr_nonce_form");
						?>

					</form>
				</div>

				<ul class="plans">
					<li class="plan">
						<div class="row">
							<div class="col-lg-3">
								<span class="price price-red"><?= $facture['montant'] ?> XAF</span>
							</div>
							<div class="col-lg-7">
								<div class="details">
									<h1 class="plan-title"><?= $facture['name_abonnement'] ?></h1>
									<p class="plan-description"><?= $facture['desc_abonnement'] ?> </p>
								</div>
							</div>
							<div class="col-lg-2 uk-text-right">
								<button class="btn select">Valider</button>
								<a href="<?= home_url('/member/abonnement') ?>" class="btn btn-danger">Annuler</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>


<?php get_footer(); ?>