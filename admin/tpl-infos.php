<div class="wrap">
		<h1 class="wp-heading-inline">Mes informations</h1>
		<br/>
		<form action="" method="post">
				<table cellspacing="0" class="wp-list-table widefat fixed striped posts">
					<tbody>
					<tr>
						<td scope="row">Mini Description de l'entreprise :</td>
						<td> <textarea name="options[description]" cols="40" rows="10" class="regular-text"><?php echo get_option('description', ''); ?></textarea></td>
					</tr>
					<tr>
						<td scope="row">Email de contact :</td>
						<td><input type="text" name="options[email]" value="<?php echo get_option('email', ''); ?>" class="regular-text" ></td>
					</tr>
					<tr>
						<td scope="row">Numéro de Téléphone :</td>
						<td><input type="text" name="options[phone_1]" value="<?php echo get_option('phone_1', ''); ?>" class="regular-text" ></td>
					</tr>

					<tr>
						<td scope="row">Lien Page Facebook :</td>
						<td><input type="text" name="options[facebook]" value="<?php echo get_option('facebook', ''); ?>" class="regular-text" ></td>
					</tr>
					<tr>
						<td scope="row">Lien Compte Twitter:</td>
						<td>
							<input type="text" name="options[twitter]" value="<?php echo get_option('twitter', ''); ?>" class="regular-text" ></td>
					</tr>
					<tr>
						<td scope="row">Lien Page youtube :</td>
						<td><input type="text" name="options[youtube]" value="<?php echo get_option('youtube', ''); ?>" class="regular-text" ></td>
					</tr>
					</tbody>
				</table>
            <hr/>
                <table cellspacing="0" class="wp-list-table widefat fixed striped posts">
                    <tbody>
                    <tr>
                        <td scope="row">Activation de la fonctionnalité Mutation VSD :</td>
                        <td><input type="checkbox" name="options[vsd]" value="<?php echo get_option('vsd', ''); ?>"/></td>
                    </tr>
                    </tbody>
                </table>
            <hr/>
                <table cellspacing="0" class="wp-list-table widefat fixed striped posts">
                    <tbody>
                        <tr>
                            <td scope="row">Description sur la boutique :</td>
                            <td> <textarea name="options[descboutique]" cols="40" rows="10" class="regular-text"><?php echo get_option('descboutique', ''); ?></textarea></td>
                        </tr>
                    </tbody>
                </table>
			<?php wp_nonce_field('contact_infos', 'contact_noncename'); ?>
			<p class="submit">
				<input type="submit" name="contact_update" class="button button-primary" value="Enregistrer les informations">
			</p>
		</form>
</div>
