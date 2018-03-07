<?php

$settings = ['capability' => 'administrator', 'position' => '50'];

$subscription = tr_page('Mut_subscription', 'index', 'Liste des Abonnées', $settings)->apply(
	tr_page('Mut_subscription', 'edit', 'Consulter Abonnée')->useController()->removeMenu(),
	tr_page('Mut_subscription', 'show', 'Abonnée')->useController()->removeMenu()
)->useController();

$subscription->setIcon('user-tie')->setArgument('menu', 'Abonnée');


// action a faire pour activer une page d'option de theme
add_filter('tr_theme_options_page', function() {
	return get_template_directory() . '/admin/theme.options.php';
});

add_filter('tr_theme_options_name', function() {
	return 'mut_options';
});