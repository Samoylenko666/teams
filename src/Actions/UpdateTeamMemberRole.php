<?php

namespace Samoylenko\Teams\Actions;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Samoylenko\Teams\Events\TeamMemberUpdated;
use Samoylenko\Teams\Teams;
use Samoylenko\Teams\Rules\Role;

class UpdateTeamMemberRole
{
    /**
     * Update the role for the given team member.
     *
     * @param  mixed  $user
     * @param  mixed  $team
     * @param int $teamMemberId
     * @param  string  $role
     * @return void
     */
    public function update(mixed $user, mixed $team, int $teamMemberId, string $role)
    {
        Gate::forUser($user)->authorize('updateTeamMember', $team);

        Validator::make([ 'role' => $role ], [
            'role' => ['required', 'string', new Role($team)],
        ])->validate();

        $team->users()->updateExistingPivot($teamMemberId, [ 'role' => $team->roles->firstWhere('name', $role)->id ]);

        TeamMemberUpdated::dispatch($team->fresh(), Teams::findUserByIdOrFail($teamMemberId));
    }
}
