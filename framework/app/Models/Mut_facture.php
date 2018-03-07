<?php
namespace App\Models;

use \TypeRocket\Models\Model;

class Mut_facture extends Model
{
    protected $resource = 'mut_facture';


	/**
	 * Get the game record associated with the player.
	 */
	public function subcription()
	{
		return $this->belongsTo('\App\Models\Mut_subscription', 'idsubcription');
	}
}