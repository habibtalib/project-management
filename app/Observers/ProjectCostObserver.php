<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\ProjectCost;

class ProjectCostObserver
{

    /**
     * Handle the ProjectCost "created" event.
     *
     * @param  \App\Models\ProjectCost  $projectCost
     * @return void
     */
    public function creating(ProjectCost $projectCost)
    {
        $projectCost->total_cost = $projectCost->cost * $projectCost->quantity;
        $projectCost->balance = $projectCost->total_cost - $projectCost->actual_spending;
        // $projectCost->project->total_cost = 0;
        // $projectCost->project->save();
        // $projectCost->save();
    }

    /**
     * Handle the ProjectCost "created" event.
     *
     * @param  \App\Models\ProjectCost  $projectCost
     * @return void
     */
    public function created(ProjectCost $projectCost)
    {
        // $projectCost->total_cost = $projectCost->cost * $projectCost->quantity;
        // $projectCost->save();
        $project = Project::find($projectCost->project_id);
        $total_costs = ProjectCost::where('project_id', $projectCost->project_id)->sum('total_cost');
        $total_spending = ProjectCost::where('project_id', $projectCost->project_id)->sum('actual_spending');
        $project->total_budget = $total_costs;
        $project->total_spending = $total_spending;
        $project->total_balance = $project->total_budget - $project->total_spending;
        $project->save();
    }

    /**
     * Handle the ProjectCost "updated" event.
     *
     * @param  \App\Models\ProjectCost  $projectCost
     * @return void
     */
    public function updating(ProjectCost $projectCost)
    {
        $projectCost->total_cost = $projectCost->cost * $projectCost->quantity;
        $projectCost->balance = $projectCost->total_cost - $projectCost->actual_spending;
        // $projectCost->save();
    }

    /**
     * Handle the ProjectCost "updated" event.
     *
     * @param  \App\Models\ProjectCost  $projectCost
     * @return void
     */
    public function updated(ProjectCost $projectCost)
    {
        // $projectCost->total_cost = $projectCost->cost * $projectCost->quantity;
        // $projectCost->balance = $projectCost->total_cost * $projectCost->actual_spending;
        // $projectCost->save();
        $project = Project::find($projectCost->project_id);
        $total_costs = ProjectCost::where('project_id', $projectCost->project_id)->sum('total_cost');
        $total_spending = ProjectCost::where('project_id', $projectCost->project_id)->sum('actual_spending');
        $project->total_budget = $total_costs;
        $project->total_spending = $total_spending;
        $project->total_balance = $project->total_budget - $project->total_spending;
        $project->save();
    }

    /**
     * Handle the ProjectCost "deleted" event.
     *
     * @param  \App\Models\ProjectCost  $projectCost
     * @return void
     */
    public function deleted(ProjectCost $projectCost)
    {
        //
    }

    /**
     * Handle the ProjectCost "restored" event.
     *
     * @param  \App\Models\ProjectCost  $projectCost
     * @return void
     */
    public function restored(ProjectCost $projectCost)
    {
        //
    }

    /**
     * Handle the ProjectCost "force deleted" event.
     *
     * @param  \App\Models\ProjectCost  $projectCost
     * @return void
     */
    public function forceDeleted(ProjectCost $projectCost)
    {
        //
    }
}