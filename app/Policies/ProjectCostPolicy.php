<?php

namespace App\Policies;

use App\Models\ProjectCost;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectCostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
        return $user->can('List project costs');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProjectCost  $projectCost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ProjectCost $projectCost)
    {
        return $user->can('View project cost')
            && ($projectCost->project->owner_id === $user->id
                ||
                $projectCost->project->users()->where('users.id', $user->id)->count()
            );
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('Create project cost');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProjectCost  $projectCost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ProjectCost $projectCost)
    {
        return $user->can('Update project cost')
            && ($projectCost->project->owner_id === $user->id
                ||
                $projectCost->project->users()->where('users.id', $user->id)
                ->where('role', config('system.projects.affectations.roles.can_manage'))
                ->count()
            );
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProjectCost  $projectCost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ProjectCost $projectCost)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProjectCost  $projectCost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ProjectCost $projectCost)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProjectCost  $projectCost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ProjectCost $projectCost)
    {
        //
    }
}