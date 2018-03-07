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
							<span class="td-bred-no-url-last">Mes abonnements</span>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<div class="td-main-content-wrap td-main-page-wrap td-post-template-12">

	<div class="td-container tdc-content-wrap td-white-background" style="min-height: 500px;">
		<div class="td-pb-row">
			<div class="td-pb-span8 td-main-content">
				<div class="td-ss-main-content"><div class="clearfix"></div>
					<div class="td-page-header">
						<h1 class="entry-title td-page-title">
							<span>Historique des abonnements</span>
						</h1>
					</div>
					<div class="td_module_10 td_module_wrap td-animation-stack">
						<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
							<tr>
								<th>Code facture</th>
								<th>Période</th>
								<th>Montant</th>
								<th>Etat</th>
							</tr>
							</thead>
							<tfoot>
							<tr>
								<th>Code facture</th>
								<th>Période</th>
								<th>Montant</th>
								<th>Etat</th>
							</tr>
							</tfoot>
							<tbody>
							<?php
                            if($factures):
							foreach($factures as $facture): ?>
								<tr>
									<td><strong><?= $facture['label'] ?> : </strong><?= $facture['codebill'] ?><br/>
										<small><?= $facture['name_abonnement'] ?></small>

									</td>
									<td><?= $facture ['periode'] ?> Mois</td>
									<td><?= $facture['montant'] ?></td>
									<td><?php
										if($facture['status']):
											echo 'Payée';
										else:
											echo 'Impayée';
										endif;
										?>
									</td>
								</tr>
							<?php endforeach; ?>
                            <?php endif; ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="td-pb-span4 td-main-sidebar">
				<div class="td-ss-main-sidebar"><div class="clearfix"></div>
					<aside class="widget widget_archive">
						<div class="block-title">
							<span>Mon profil</span>
						</div>
						<div class="panel panel-default">
							<ul class="list-group">
								<li class="list-group-item" style="margin: 0;"><strong>Nom :</strong> <?= _wp_get_current_user()->display_name ?></li>
								<li class="list-group-item" style="margin: 0;"><strong>Etat Abonnement :</strong> <?= (int)$data['active_abonnement'] === 1 ? 'Abonnée' : 'Non Abonnée'; ?></li>
								<li class="list-group-item" style="margin: 0;"><strong>Date Exp. :</strong> <?= $data['end_abonnement'] ? date('d/m/Y', strtotime($data['end_abonnement'])) : 'Aucune'; ?></li>
							</ul>


						</div>
						<a href="<?= home_url('/member/abonnement'); ?>" class="btn btn-danger btn-block" style="color: #fff;background-color: #e93050;border-color: #e93050;">Ajouter un abonnement</a>
<!--						<a href="--><?//= home_url('/member/abonnement'); ?><!--" class="btn btn-danger btn-block" id="abonnement" style="color: #fff;background-color: #e93050;border-color: #e93050;">Ajouter un abonnement</a>-->

					</aside>

				</div>

			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
