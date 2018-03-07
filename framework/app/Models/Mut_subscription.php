<?php
namespace App\Models;

use \TypeRocket\Models\Model;

class Mut_subscription extends Model
{
    protected $resource = 'mut_subscription';

	/**
	 * Get the player records associated with the game.
	 */
	public function factures()
	{
		return $this->hasMany('\App\Models\Mut_facture', 'idsubcription');
	}
}