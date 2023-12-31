<?php

namespace App\Actions\Teams;

use Samoylenko\Teams\Contracts\DeletesTeams;

class DeleteTeam implements DeletesTeams
{
	/**
	 * Delete the given team.
	 *
	 * @param  mixed  $team
	 * @return void
	 */
	public function delete($team)
	{
		$team->purge();
	}
}