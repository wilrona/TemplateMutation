<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03/01/2017
 * Time: 11:38
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title(); ?></title>
	<meta name="description" content="
	<?php if ( is_single() ) {
		single_post_title('', true);
	} else {

		bloginfo('name'); echo " - "; bloginfo('description');
	}
	?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/logo.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/custom.css" type="text/css">
    <?php include 'publicite/bg.php'; ?>

</head>

<body <?php body_class(); ?>>
<div class="td-scroll-up"><i class="td-icon-menu-up"></i></div>
<div class="td-menu-background"></div>
<div id="td-mobile-nav">
	<div class="td-mobile-container">
		<div class="td-menu-socials-wrap">
			<div class="td-menu-socials">
                    <?php if (get_option('facebook')): ?>
                        <span class="td-social-icon-wrap">
                            <a target="_blank" href="<?php echo get_option('facebook'); ?>" title="Facebook">
                                <i class="td-icon-font td-icon-facebook"></i>
                            </a>
                        </span>
                    <?php endif;

                    if (get_option('twitter')): ?>

                        <span class="td-social-icon-wrap">
                                <a target="_blank" href="<?php echo get_option('twitter'); ?>" title="Twitter">
                                    <i class="td-icon-font td-icon-twitter"></i>
                                </a>
                        </span>
                    <?php endif;

                    if (get_option('youtube')): ?>
                        <span class="td-social-icon-wrap">
                            <a target="_blank" href="<?php echo get_option('youtube'); ?>" title="Youtube">
                                <i class="td-icon-font td-icon-youtube"></i>
                            </a>
                        </span>
                    <?php endif;?>
			</div>
			<div class="td-mobile-close">
				<a href="#"><i class="td-icon-close-mobile"></i></a>
			</div>
		</div>
		<div class="td-mobile-content">
			<div class="menu-main-menu-container">

                <?php
                $defaults = array(
                    'container'       => '',
                    'container_class' => '',
                    'menu_class' => 'td-mobile-main-menu',
                    'menu_id' => 'menu-main-menu',
                    'theme_location' => 'header',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'walker' => new BS3_Walker_Nav_Menu_mobile,
                    'menu' => ''
                );
                wp_nav_menu( $defaults );
                ?>
			</div>
		</div>
	</div>
</div>

<div class="td-search-background"></div>

<div class="td-search-wrap-mob">
	<div class="td-drop-down-search" aria-labelledby="td-header-search-button">
		<form method="get" class="td-search-form" action="">
			<div class="td-search-close">
				<a href="#"><i class="td-icon-close-mobile"></i></a>
			</div>
            <form method="get" action="<?php bloginfo('url'); ?>">
                <div class="td-search-input">
                    <span>Search</span>
                    <input id="td-header-search-mob-custom" type="text" value="<?php the_search_query(); ?>" name="s" autocomplete="off">
                </div>
            </form>
		</form>
		<div id="td-aj-search-mob"></div>
	</div>
</div>

<div id="td-outer-wrap">
	<div class="td-header-wrap td-header-style-1">

		<div class="td-header-top-menu-full">
			<div class="td-container td-header-row td-header-top-menu">
				<div class="top-bar-style-1">
					<div class="td-header-sp-top-menu">
						<div class="td_data_time">
							<div><?= $GLOBALS['DT']->format('l, j F Y'); ?></div>
						</div>
                        <div class="menu-top-container">
                            <ul id="menu-top-menu" class="top-header-menu sf-js-enabled">
                                <!--								<li id="menu-item-10" class="menu-item menu-item-type-post_type menu-item-object-page current_page_parent menu-item-first td-menu-item td-normal-menu menu-item-10"><a href="#">Recrutement</a></li>-->
                                <li id="menu-item-10" class="menu-item menu-item-type-post_type menu-item-object-page current_page_parent menu-item-first td-menu-item td-normal-menu menu-item-10"><a href="<?php echo get_permalink( get_page_by_path( 'faqs' )); ?>">FAQ</a></li>

                            </ul>
                        </div>


					</div>
					<div class="td-header-sp-top-widget">
								<?php if (get_option('facebook')): ?>
                                <span class="td-social-icon-wrap">
                                    <a target="_blank" href="<?php echo get_option('facebook'); ?>" title="Facebook">
	                                    <i class="td-icon-font td-icon-facebook"></i>
                                    </a>
                                </span> |
								<?php endif;

								if (get_option('twitter')): ?>

                                <span class="td-social-icon-wrap">
                                    <a target="_blank" href="<?php echo get_option('twitter'); ?>" title="Twitter">
	                                    <i class="td-icon-font td-icon-twitter"></i>
                                    </a>
                                </span>|
								<?php endif;

								if (get_option('youtube')): ?>
                                <span class="td-social-icon-wrap">
                                    <a target="_blank" href="<?php echo get_option('youtube'); ?>" title="Youtube">
	                                    <i class="td-icon-font td-icon-youtube"></i>
                                    </a>
                                </span>
                                    |
								<?php endif;?>

                                <ul class="top-header-menu">
                                    <?php $user = _wp_get_current_user();
                                    if($user->ID == 0):
                                        ?>
                                        <li class="menu-item">
                                            <a class="td-login-modal-js menu-item" id="login_form" href="#login-form" data-effect="mpf-td-login-effect">Inscription / Connexion</a><span class="td-sp-ico-login td_sp_login_ico_style"></span>
                                        </li>
                                    <?php else: ?>
                                        <li style="margin-right: 22px;">
                                           Bienvenue <span style="font-weight: bolder;"><?= $user->display_name; ?></span>
                                        </li>
                                        <?php
                                        if ( in_array( 'subscriber', (array) $user->roles ) ) :
                                        ?>
                                        <li class="custom">
                                            <a href="<?= home_url('/member/profil'); ?>">Mes abonnements</a>
                                        </li>
                                        <?php else: ?>
                                            <li class="custom">
                                                <a href="<?= home_url('/wp-admin'); ?>" target="_blank">Espace d'administration</a>
                                            </li>

                                        <?php endif; ?>
                                        <li>
                                            <a href="<?= home_url('/member/logout'); ?>">Déconnexion</a>
                                        </li>

                                    <?php endif; ?>
                                </ul>
					</div>
				</div>
                <?php
                if($user->ID == 0):

                ?>
                <div id="login-form" class="white-popup-block mfp-hide mfp-with-anim">
                    <div class="td-login-wrap">
                        <button type="button" class="td-back-button" style="background: transparent; border: none;"><i class="td-icon-modal-back"></i></button>
                        <div id="td-login-div" class="td-login-form-div td-display-block">
                            <form action="<?= home_url('/member/login'); ?>" method="post" id="form_login">
                                <div class="td-login-panel-title">Connexion</div>
                                <div class="td-login-panel-descr">Bienvenue ! <br> <br> Connectez vous avec ton compte</div>
                                <div class="td_display_err" id="error_display"></div>
                                <?php
                                    wp_nonce_field("form_seed_59cdf94920d75", "_tr_nonce_form");
                                ?>
                                <div class="td-login-inputs"><input class="td-login-input" type="text" name="user_login" id="log_email" value="" required=""><label>Login ou identifiant</label></div>
                                <div class="td-login-inputs"><input class="td-login-input" type="password" name="user_password" id="log_pass" value="" required=""><label>Mot de passe</label></div>
                                <input type="submit" name="login_button" id="login_button" class="wpb_button btn td-login-button" value="Connexion">
                                <?php
                                    global $wp;
                                    $current_url = home_url(add_query_arg(array(),$wp->request));
                                ?>
                                <input type="hidden" name="url" value="<?= $current_url; ?>"/>
                                <a href="#" id="forgot-pass-link" class="wpb_button btn td-login-button" style="line-height: 45px;">Inscription</a>
                                <br><br>
                                <div class="td-login-info-text">Tu n'as pas de compte inscrit toi.</div>
                                <div class="td-login-info-text">Si vous avez des problèmes avec votre compte, contactez-nous !!!</div>
                            </form>
                            <script>
                                jQuery('#login_button').on('click', function(e){
                                    e.preventDefault();
                                    var vide = false;

                                    if(jQuery('#log_mail').val() == ''){
                                        vide = true;
                                    }

                                    if(jQuery('#log_pass').val() == ''){
                                        vide = true;
                                    }

                                    if(vide === false){
                                        var form = jQuery('#form_login');
                                        jQuery.ajax({
                                            url: form.attr('action'), // Le nom du fichier indiqué dans le formulaire
                                            type: form.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
                                            data: form.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                                            dataType: 'json',
                                            success: function(json) { // Je récupère la réponse du fichier PHP
                                                if(json.error !== 'OK') {
                                                    jQuery('#error_display').html(json.error).attr('style','display:block !important; margin:0 !important;');
                                                }else{
                                                    jQuery(window).attr('location',json.url);
                                                }
                                            }
                                        });
                                    }else{
                                        jQuery('#error_display').html("Des champs sont encore resté vide").attr('style','display:block !important; margin:0 !important;');
                                    }
                                });

                            </script>
                        </div>
                        <div id="td-forgot-pass-div" class="td-login-form-div td-display-none">
                            <form  method="post" action="<?php bloginfo('url'); ?>/user/register" id="form_register">
                                <?php
                                    wp_nonce_field("form_seed_59cdf94920d75", "_tr_nonce_form");

                                ?>
                                <div class="td-login-panel-title">Insciption</div>
                                <div class="td-login-panel-descr" style="margin-bottom: 80px;">Créez votre compte sur le Quotidien Mutations</div>
                                <div class="td_display_err" id="error_display_inscription"></div>
                                <div class="td-login-inputs"><input class="td-login-input" type="text" name="user_last_name" id="sign_last_name" value="" required=""><label>Votre nom</label></div>
                                <div class="td-login-inputs"><input class="td-login-input" type="text" name="user_first_name" id="sign_first_name" value="" required=""><label>Votre prénom</label></div>
                                <div class="td-login-inputs"><input class="td-login-input" type="text" name="user_email" id="sign_email" value="" required=""><label>Votre adresse email</label></div>
                                <div class="td-login-inputs"><input class="td-login-input" type="text" name="user_login" id="sign_name" value="" required=""><label>Votre identifiant ou login</label></div>
                                <div class="td-login-inputs"><input class="td-login-input" type="password" name="user_pass" id="sign_pass" value="" required=""><label>Votre mot de passe</label></div>
                                <div class="td-login-inputs"><input class="td-login-input" type="password" name="user_pass_2" id="sign_pass_confirm" value="" required=""><label>Confirmer le mot de passe</label></div>
                                <a href="#" id="sign-link" class="wpb_button btn td-login-button" style="line-height: 45px;">Validez</a>
                                <script>
                                    var checkPassword = false;
                                    function checkPasswordMatch() {
                                        var password = jQuery("#sign_pass").val();
                                        var confirmPassword = jQuery("#sign_pass_confirm").val();

                                        if (password != confirmPassword){
                                            jQuery('#error_display_inscription').html("Les 2 mots de passes ne correspondent pas").attr('style','display:block !important; margin:0 !important;');
                                        }else{
                                            jQuery('#error_display_inscription').html("").attr('style','display:none');
                                            checkPassword = true;
                                        }
                                    }

                                    jQuery("#sign_pass, #sign_pass_confirm").keyup(checkPasswordMatch);

                                    jQuery('#sign-link').on('click', function(e){
                                        e.preventDefault();
                                        checkPasswordMatch();
                                        if(checkPassword === true){
                                            var form = jQuery('#form_register');
                                            jQuery.ajax({
                                                url: form.attr('action'), // Le nom du fichier indiqué dans le formulaire
                                                type: form.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
                                                data: form.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                                                dataType: 'json',
                                                success: function(json) { // Je récupère la réponse du fichier PHP
                                                    if(json.error !== 'OK') {
                                                        jQuery('#error_display_inscription').html(json.error).attr('style','display:block !important; margin:0 !important;');
                                                    }else{
                                                        jQuery('.td-back-button').trigger('click');
                                                        jQuery('#error_display').html("Votre inscription est reussi. Vous pouvez maintenant vous connecter.").attr('style','display:block !important; margin:0 !important;');
                                                    }
                                                }
                                            });
                                        }
                                    });

                                    jQuery('#login-form').on('click', '.mfp-close', function(){
                                        jQuery('#log_email').val('');
                                        jQuery('#log_pass').val('');
                                        jQuery('#sign_last_name').val('');
                                        jQuery('#sign_first_name').val('');
                                        jQuery('#sign_email').val('');
                                        jQuery('#sign_name').val('');
                                        jQuery('#sign_pass').val('');
                                        jQuery('#sign_pass_confirm').val('');

                                        jQuery('body .download_pdf').removeClass('not-active');
                                        jQuery('body #abonnement').removeClass('not-active');
                                    });


                                </script>
                            </form>
                        </div>
                    </div>
                </div>

                <?php endif; ?>
			</div>
		</div>
		<div class="td-banner-wrap-full td-logo-wrap-full">
			<div class="td-container td-header-row td-header-header">
				<div class="td-header-sp-logo">
					<a class="td-main-logo" href="<?php bloginfo('url'); ?>">
                        <img class="td-retina-data" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="">
						<span class="td-visual-hidden">Quotidien mutations</span>
					</a>
				</div>
				<div class="td-header-sp-recs">
					<div class="td-header-rec-wrap">
						<div class="td-a-rec td-a-rec-id-header  ">
                            <?php include 'publicite/entete.php'; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="td-header-menu-wrap-full" style="height:48px;">
			<div class="td-header-menu-wrap td-header-gradient" style="transform: translate3d(0px, 0px, 0px);">
				<div class="td-container td-header-row td-header-main-menu">
					<div id="td-header-menu">
						<div id="td-top-mobile-toggle"><a href="#"><i class="td-icon-font td-icon-mobile"></i></a></div>
						<div class="td-main-menu-logo td-logo-in-header td-logo-sticky">
							<a class="td-mobile-logo td-sticky-header" href="<?php bloginfo('url'); ?>">
                                <img class="td-retina-data" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="">
<!--								--><?php //echo the_custom_logo(); ?>
							</a>
							<!--<a class="td-header-logo td-sticky-header" href="index.html">
								<img class="td-retina-data" src="images/logo.png" alt="">
							</a>-->
						</div>
						<div class="menu-main-menu-container">
                            <?php
                            $defaults = array(
                                'container'       => '',
                                'container_class' => '',
                                'menu_class' => 'sf-menu sf-js-enabled',
                                'menu_id' => 'menu-main-menu-1',
                                'theme_location' => 'header',
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'walker' => new BS3_Walker_Nav_Menu,
                                'menu' => ''
                            );
                            wp_nav_menu( $defaults );
                            ?>

						</div>
					</div>
					<div class="td-search-wrapper">
						<div id="td-top-search">
							<div class="header-search-wrap">
								<div class="dropdown header-search">
									<a id="td-header-search-button" href="#" role="button" class="dropdown-toggle " data-toggle="dropdown"><i class="td-icon-search"></i></a>
									<a id="td-header-search-button-mob" href="#" role="button" class="dropdown-toggle " data-toggle="dropdown"><i class="td-icon-search"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="header-search-wrap">
                        <div class="dropdown header-search">
                            <div class="td-drop-down-search" aria-labelledby="td-header-search-button">
                                <form method="get" class="td-search-form" action="<?php bloginfo('url'); ?>">
                                    <div role="search" class="td-head-form-search-wrap">
                                        <input id="td-header-search" type="text" value="<?php the_search_query(); ?>" name="s" autocomplete="off">
                                        <input class="wpb_button wpb_btn-inverse btn" type="submit" id="td-header-search-top" value="Search">
                                    </div>
                                </form>
                                <div id="td-aj-search"></div>
                            </div>
                        </div>
					</div>

				</div>
			</div>
		</div>
	</div>



