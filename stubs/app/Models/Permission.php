<?php

namespace App\Models;

use Samoylenko\Teams\Teams;
use Samoylenko\Teams\Models\Permission as PermissionModel;

class Permission extends PermissionModel
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'team_id', 'ability_id', 'entity_id', 'entity_type', 'forbidden'];

	/**
	 * Get the team that the invitation belongs to.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function team(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(Teams::teamModel());
	}
}