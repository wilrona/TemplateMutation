<?php
if ( ! function_exists( 'add_action' )) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

// Setup Form
$form = tr_form()->useJson()->setGroup( $this->getName() );
?>

<h1>Theme Options</h1>
<div class="typerocket-container">
	<?php
	echo $form->open();

	// Configuration Softeller
	$social = function() use ($form) {
	    echo '<h1>Paramétrage de solfteller</h1><br>';
		echo $form->text('user_id')->setLabel('l\'id de l\'utilisateur');
		echo $form->text('login')->setLabel('Login de l\'utilisateur');
		echo $form->text('password')->setLabel('Mot de passe de l\'utilisateur')->setHelp('l\'ensemble des informations est fournit par la plateforme Sorfteller');
	};

	// Save
	$save = $form->submit( 'Save' );

	// Layout
	tr_tabs()->setSidebar( $save )
	         ->addTab( 'Paramétrage Softeller', $social )
	         ->render( 'box' );
	echo $form->close();
	?>

</div>