<?php
/**
 * Created by IntelliJ IDEA.
 * User: online2
 * Date: 02/03/2018
 * Time: 16:27
 */


$tables = tr_tables();

$tables->setSearchColumns([
	'id' => 'ID',
	'wp_full_name' => 'Abonnée'
]);


$tables->setColumns('id', [

	'id' => [
		'label' => 'ID',
		'sort' => true
	],
	'wp_user' => [
		'label' => 'Abonnée',
		'sort' => true,
		'actions' => ['show'],
		'delete_ajax' => false, // disable AJAX delete
		'callback' => function( $text, $result ) {
			$author_obj = get_user_by('id', $text);
			return $result ? '<strong>'.$author_obj->first_name.' '.$author_obj->last_name.'</strong>' : '';
		}
	]

]);

$tables->addCheckboxes();


$tables->render();