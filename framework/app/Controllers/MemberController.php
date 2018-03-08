<?php
namespace App\Controllers;

use \TypeRocket\Controllers\Controller;

class MemberController extends Controller
{


	public function routing()
	{
		$this->setMiddleware('not_member', ['only' => ['login', 'logout']]);
	}



	public function login(){


//		$user = _wp_get_current_user();

		if(isset($_POST) && isset($_POST['_tr_nonce_form']) && wp_verify_nonce($_POST['_tr_nonce_form'], "form_seed_59cdf94920d75") ):

			$error = 'OK';

			$user = wp_signon($_POST);
			if(is_wp_error($user)):
				$error = $user->get_error_message();
				return json_encode(['error' => $error]);
			else:

				return json_encode(['error' => $error, 'url' => $_POST['url']]);

			endif;
		endif;
	}

	public function logout(){
		wp_logout();
		return tr_redirect()->toUrl(home_url('/'));
	}

	public function register(){

		if(isset($_POST) && isset($_POST['_tr_nonce_form']) && wp_verify_nonce($_POST['_tr_nonce_form'], "form_seed_59cdf94920d75") ):

			$error = 'OK';

			if(empty($_POST['user_login']) || empty($_POST['user_first_name']) || empty($_POST['user_last_name']) || empty($_POST['user_pass']) || empty($_POST['user_email'])):

				$error = 'Des Champs n\'ont pas été renseignés.';

			else:

				if(!is_email($_POST['user_email'])):
					$error = 'Veuillez entrer un email valide';

				else:

					$user = wp_insert_user(array(
						'user_login' => $_POST['user_login'],
						'first_name' => $_POST['user_first_name'],
						'last_name' => $_POST['user_last_name'],
						'user_pass' => $_POST['user_pass'],
						'user_email' => $_POST['user_email'],
						'user_registered' => date('Y-m-d H:i:s')
					));
					if(is_wp_error($user)):
						$error = $user->get_error_message();
					else:
						global $wpdb;
						$table_subcription = $wpdb->prefix. 'mut_subscription';
						$data = array(
							'id' => null,
							'wp_user' => null,
							'end_abonnement' => null,
							'active_abonnement' => null,
							'wp_full_name' => null
						);
						$data['wp_user'] = $user;
						$data['wp_full_name'] = $user->display_name;
						$wpdb->insert($table_subcription, $data);

					endif;

				endif;

			endif;

			echo json_encode(['error' => $error]);
		endif;
	}

	public function profil(){

		$user = _wp_get_current_user();
		if($user->ID == 0 && !in_array( 'subscriber', (array) $user->roles )):
			return tr_redirect()->toUrl(home_url('/'));
		endif;

		$query = tr_query()->table('wp_mut_subscription')->where('wp_user', $user->ID);
		$data = $query->first();

		if(empty($data['wp_full_name'])){

			$uptate = $query->setIdColumn('id');
			$donnee = ['wp_full_name' => $user->first_name.' '.$user->last_name];
			$uptate->update($donnee);
			return tr_redirect()->toUrl(home_url('/membre/profil'));
		}


		$factures = tr_query()->table('wp_mut_facture')->where('idsubcription', $data['id'])->get();



		return tr_view('member/profil', ['data' => $data, 'factures' => $factures]);

	}


	public function abonnement(){

		$user = _wp_get_current_user();
		if($user->ID == 0 && !in_array( 'subscriber', (array) $user->roles )):
			return tr_redirect()->toUrl(home_url('/'));
		endif;

		$error = '';

		$query = tr_query()->table('wp_mut_subscription')->where('wp_user', $user->ID);

		if(isset($_POST) && isset($_POST['_tr_nonce_form']) && wp_verify_nonce($_POST['_tr_nonce_form'], "form_seed_59cdf94920d75") ):

			$url = 'https://www.softeller.com/api_softeller/request_payment';
			$userid = tr_options_field('mut_options.user_id');
			$password = tr_options_field('mut_options.password');
			$login = tr_options_field('mut_options.login');
			$country = 'Cameroun';
			$town = $_POST['ville'];

			$abonnement = get_post($_POST['plan']);
			$amount = 0;

			$essaie = tr_posts_field('essaie', $abonnement->ID);
			if($essaie === 'no'){
				$amount = tr_posts_field('prix', $abonnement->ID);
			}
			$periode = tr_posts_field('periode', $abonnement->ID);
			$motif = $abonnement->post_title;
			$phone = $_POST['phone'];
			$type = $_POST['paiement'];
			$currency = 'XAF';

			$first_name = $_POST['nom'];
			$last_name = $_POST['prenom'];

			$car = 4;
			$string = "";
			$chaine = "1234567890";
			srand((double)microtime()*1000000);
			for($i=0; $i<$car; $i++) {
				$string .= $chaine[rand()%strlen($chaine)];
			}

			if($amount != 0):

				$salt = md5($userid);
				$pass = hash('sha256', $salt.$password);
				$data = array(
					'Login' => $login,
					'Password' => $pass,
					'Country' => $country,
					'Town' => $town,
					'Amount' => $amount,
					'First_name' => $first_name,
					'Last_name' => $last_name,
					'Motif' => $motif. ' '.$periode,
					'Phone' => $phone,
					'Type' => $type,
					'Currency' => $currency,
				);
				$table_json = json_encode($data);

				$ch = curl_init();
				curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt( $ch, CURLOPT_URL, $url );
				curl_setopt( $ch, CURLOPT_POST, true );
				curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch, CURLOPT_POSTFIELDS, $table_json);

				$result = curl_exec($ch);
				$result = json_decode($result, true);

				if(curl_errno($ch))
					print curl_error($ch);
				else
					curl_close($ch);

				if($result['status'] === '1000'){



					$data = array(
						'status' => 0,
						'dateCreated' => current_time('mysql'),
						'dueDate' => null,
						'paidDate' => current_time('mysql'),
						'label' => $motif,
						'codebill' => 'MUT'. $string,
						'periode' => $periode,
						'montant' => $amount,
						'payment_type' => $type,
						'idsubcription' => $_POST['member'],
						'name_abonnement' => $abonnement->post_title,
						'desc_abonnement' => $abonnement->post_content,
						'transaction' => $result['TransactionCode'],
						'ville' => $town,
						'phone' => $phone,
						'first_name' => $first_name,
						'last_name' => $last_name
					);

					tr_query()->table('wp_mut_facture')->setIdColumn('id')->create($data);

					return tr_redirect()->toUrl(home_url('/member/abonnement/valid'));



				}else{
					$error = $result['message'];
				}
			else:

				$data = array(
					'status' => 1,
					'dateCreated' => current_time('mysql'),
					'dueDate' => null,
					'paidDate' => current_time('mysql'),
					'label' => $motif,
					'codebill' => 'MUT'. $string,
					'periode' => $periode,
					'montant' => $amount,
					'payment_type' => $type,
					'idsubcription' => $_POST['member'],
					'name_abonnement' => $abonnement->post_title,
					'desc_abonnement' => $abonnement->post_content,
					'transaction' => null,
					'ville' => $town,
					'phone' => $phone,
					'first_name' => $first_name,
					'last_name' => $last_name
				);

				tr_query()->table('wp_mut_facture')->setIdColumn('id')->create($data);

				$donnee = ['active_abonnement' => 1, 'end_abonnement' => date('Y-m-d',strtotime("+".$periode." month"))];

				$query->update($donnee);
				return tr_redirect()->toUrl(home_url('/member/profil'));

			endif;


		endif;

		$subscription = $query->first();

		$query2 = tr_query()->table('wp_mut_facture')->where('idsubcription', $subscription['id'])->where('status', 0);
		if($query2->first()){
			$query2->delete();
		}

		return tr_view('member/abonnement', ['user' => $user, 'error' => $error, 'member' => $subscription]);
	}


	public function abonnementValid(){

		$user = _wp_get_current_user();
		if($user->ID == 0 && !in_array( 'subscriber', (array) $user->roles )):
			return tr_redirect()->toUrl(home_url('/'));
		endif;

		$query = tr_query()->table('wp_mut_subscription')->where('wp_user', $user->ID);
		$subscription = $query->first();

		$query2 = tr_query()->table('wp_mut_facture')->where('idsubcription', $subscription['id'])->where('status', 0);
		$facture = $query2->first();

		if(!$facture){
			return tr_redirect()->toUrl(home_url('/member/abonnement'));
		}

		$error = '';

		if(isset($_POST) && isset($_POST['_tr_nonce_form']) && wp_verify_nonce($_POST['_tr_nonce_form'], "form_seed_59cdf94920d75") ):

			$url = 'https://www.softeller.com/api_softeller/check_status';

			$userid = tr_options_field('mut_options.user_id');
			$password = tr_options_field('mut_options.password');
			$login = tr_options_field('mut_options.login');

			$TransactionCode = $facture['transaction'];

			$salt = md5($userid);
			$pass = hash('sha256', $salt.$password);
			$data = array(
				'Login' => $login,
				'Password' => $pass,
				'TransactionCode' => $TransactionCode
			);
			$table_json = json_encode($data);

			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);

			curl_setopt( $ch, CURLOPT_URL, $url );
			curl_setopt( $ch, CURLOPT_POST, true );
			curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $table_json);

			$result = curl_exec($ch);
			$result = json_decode($result, true);

			if(curl_errno($ch))
				print curl_error($ch);
			else
				curl_close($ch);

			if($result['status'] === '01'){

				$donnee = ['active_abonnement' => 1, 'end_abonnement' => date('Y-m-d',strtotime("+".$facture['periode']." month"))];
				$query->update($donnee);

				$donnee = ['status' => 1];
				$query2->update($donnee);
				return tr_redirect()->toUrl(home_url('/member/profil'));
			}else{
				$error = $result['message'];
			}

		endif;

		return tr_view('member/abonnementValid', ['member' => $subscription, 'facture' => $facture, 'error' => $error]);

	}


	public function ckeckAbonnement(){

		$user = _wp_get_current_user();

		$error = 'OK';
		$register = 'none';
		$url = 'none';

		if($user->ID != 0 && in_array( 'subscriber', (array) $user->roles )):

			$query = tr_query()->table('wp_mut_subscription')->where('wp_user', $user->ID);

			if(!$query->first()):
				tr_query()->table('wp_mut_subscription')->create(['wp_user' => $user->ID]);
			endif;

			$url = home_url('/member/abonnement');

		else:
			$error = 'Identifiez vous pour acheter votre abonnement';
			$register = 'login';

		endif;

		return json_encode(['error' => $error, 'url' => $url, 'register' => $register]);

	}

}