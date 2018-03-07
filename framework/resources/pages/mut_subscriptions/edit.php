<?php
/**
 * Created by IntelliJ IDEA.
 * User: online2
 * Date: 02/03/2018
 * Time: 18:02
 */

//var_dump($abonnee);
?>


	<div id="poststuff"> <div id="post-body" class="metabox-holder columns-2">

			<div id="post-body-content">
				<div id="titlediv">
					<div id="titlewrap">
						<label class="screen-reader-text" id="title-prompt-text" for="title">Enter title here</label>
						<?php
							$user = get_user_by('id', $abonnee->wp_user);
						?>
						<input type="text" name="post_title" size="30" value="<?= $user->first_name.' '.$user->last_name ?>" id="title" autocomplete="off">
					</div>
				</div><!-- /titlediv -->
			</div><!-- /post-body-content -->

			<div id="postbox-container-1" class="postbox-container">
				<div id="side-sortables" class="meta-box-sortables ui-sortable">

					<!-- METABOX -->
					<div id="submitdiv" class="postbox">
						<h3 class="hndle"><span>Etat Abonnement</span></h3>
						<div class="inside">
							<div class="submitbox" id="submitpost">
								<div id="minor-publishing">
									<div id="misc-publishing-actions">
										<div class="misc-pub-section misc-pub-post-status">
											<label for="post_status">Status:</label> <span id="post-status-display"><?= (int)$abonnee->active_abonnement ? 'Activé' : 'Désactivé' ?></span>
										</div><!-- .misc-pub-section -->
										<div class="misc-pub-section curtime misc-pub-curtime">
											<span id="timestamp">Date de fin: <b><?php sky_date_french('d M Y', strtotime($abonnee->end_abonnement), 1); ?></b></span>

										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /SIDEBAR -->


			<!-- --------------------------------------------------- -->
			<!--                    MAIN AREA                        -->
			<!-- --------------------------------------------------- -->

            <?php

                $facture = $abonnee->factures()->get()

            ?>

			<div id="postbox-container-2" class="postbox-container">
				<div id="normal-sortables" class="meta-box-sortables ui-sortable">
					<div id="" class="postbox">
						<h3 class="hndle"> <span>Liste des factures</span> </h3>
						<div class="inside">
                            <table class="widefat fixed" cellspacing="0">
                                <thead>
                                <tr>

                                    <th id="columnname" class="manage-column column-columnname" scope="col">Num. fact.</th>
                                    <th id="columnname" class="manage-column column-columnname" scope="col">Date payée</th>
                                    <th id="columnname" class="manage-column column-columnname" scope="col">Période</th>
                                    <th id="columnname" class="manage-column column-columnname" scope="col">Forfait</th>
                                    <th id="columnname" class="manage-column column-columnname" scope="col">Méthode paie.</th>

                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                    if($facture):
                                        $i = 1;
                                ?>

                                    <?php foreach ( $facture as $item ): ?>
                                        <tr <?php if(($i % 2) !== 0): ?> class="alternate" <?php endif; ?>>
                                            <td class="column-columnname"><?= $item->codebill ?></td>
                                            <td class="column-columnname"><?= sky_date_french('d M Y', strtotime($item->paidDate), 1); ?></td>
                                            <td class="column-columnname"><?= $item->periode; ?></td>
                                            <td class="column-columnname"><?= $item->name_abonnement; ?></td>
                                            <td class="column-columnname"><?= $item->payment_type === 'om' ? 'Orange Money' : 'Mobile Money'; ?></td>
                                        </tr>
                                    <?php $i++; endforeach; ?>

                                <?php else: ?>
                                        <tr class="alternate">
                                            <td class="column-columnname" colspan="5">
                                                <h2 style="text-align: center;">Aucun Abonnement consommé</h2>
                                            </td>

                                        </tr>

                                <?php endif; ?>


                                </tbody>
                            </table>
						</div>
					</div>
				</div>
			</div>
			<!-- /MAIN -->









		</div><!-- /post-body --> <br class="clear"> </div><!-- /poststuff -->

