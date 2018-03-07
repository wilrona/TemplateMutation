<?php
namespace App\Controllers;

use \TypeRocket\Controllers\Controller;

class Mut_subscriptionController extends Controller
{

    /**
     * The index page for admin
     *
     * @return mixed
     */
    public function index()
    {
        // TODO: Implement index() method.

	    return tr_view('mut_subscriptions.index');
    }

    /**
     * The edit page for admin
     *
     * @param $id
     *
     * @return mixed
     */
    public function edit($id, \App\Models\Mut_subscription $abonnee)
    {
        // TODO: Implement edit() method.
	    return tr_view('mut_subscriptions.edit', ['abonnee' => $abonnee]);
    }

}