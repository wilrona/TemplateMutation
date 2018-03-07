<?php

	$abonnement = tr_post_type('abonnement', 'abonnements');
	$abonnement->setIcon('stack');

	$post_meta = tr_meta_box('infos')->setLabel('Caracteristiaue de l\'abonnement');
	$post_meta->apply($abonnement);
	$post_meta->setCallback(function(){
		$form = tr_form();

		echo $form->text('periode')->setType('number')->setDefault(1)->setAttributes(array('min' => 1))->setLabel('Période de l\'abonnement')->setHelp('Période en mois');
		echo $form->text('prix')->setType('number')->setDefault(500)->setAttributes(array('min' => 500))->setLabel('Prix de l\'abonnement')->setHelp('Prix en FCFA');
		$options = [
			'Oui' => 'yes',
			'Non' => 'no'
		];

		echo $form->radio('essaie')->setLabel('Activez l\'essai ?')->setOptions($options)->setSetting('default', 'no')->setHelp('Sur l\'abonnement en essai, il est appliqué un prix de zero sur la période');
		echo $form->radio('active')->setLabel('Appliquez Abonnement ?')->setOptions($options)->setSetting('default', 'no');

	});
