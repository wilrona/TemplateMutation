<?php
/**
 * Created by IntelliJ IDEA.
 * User: online2
 * Date: 02/03/2018
 * Time: 16:03
 */


function create_datatable($oldname, $oldtheme=false){
	global $wpdb;
	global $custom_table_example_db_version;
	$custom_table_example_db_version = '1.2';
	$charset_collate = $wpdb->get_charset_collate();

	require_once(ABSPATH.'wp-admin/includes/upgrade.php');

	$table_name = $wpdb->prefix . 'mut_subscription';
	$sql        = "CREATE TABLE $table_name (
                id INT NOT NULL AUTO_INCREMENT,
                wp_user INT NULL,
                wp_full_name VARCHAR(255) NULL,
                end_abonnement DATE NULL,
                active_abonnement TINYINT(1) NULL,
                PRIMARY KEY (id)
                ) $charset_collate;";

	dbDelta( $sql );

	$table_name = $wpdb->prefix . 'mut_facture';
	$sql        = "CREATE TABLE $table_name (
                id INT NOT NULL AUTO_INCREMENT,
                status INT NULL,
                dateCreated DATE NULL,
                paidDate DATE NULL,
                dueDate DATE NULL,
                label VARCHAR(255) NULL,
                codebill VARCHAR(45) NULL,
                periode INT NULL,
                montant INT NULL,
                payment_type VARCHAR(255) NULL,
                idsubcription INT NOT NULL,
                name_abonnement VARCHAR(255) NULL,
                desc_abonnement TEXT NULL,
                transaction TEXT NULL,
                phone TEXT NULL,
                ville TEXT NULL,
                first_name TEXT NULL,
                last_name TEXT NULL,
                PRIMARY KEY (id)
                ) $charset_collate;";

	dbDelta( $sql );


	add_option('custom_table_example_db_version', $custom_table_example_db_version);

}

add_action("after_switch_theme", "create_datatable", 10 , 2);

