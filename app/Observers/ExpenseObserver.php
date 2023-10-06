<?php

namespace App\Observers;

use App\Models\Expense;
use App\Models\ProjectCost;

class ExpenseObserver
{

    /**
     * Handle the Expense "created" event.
     *
     * @param  \App\Models\Expense  $expense
     * @return void
     */
    public function creating(Expense $expense)
    {
        //
        // $project_cost = ProjectCost::find($expense->project_cost_id);
        // $expense->project_id = $project_cost->project_id;
        // $expense->save();
    }
    /**
     * Handle the Expense "created" event.
     *
     * @param  \App\Models\Expense  $expense
     * @return void
     */
    public function created(Expense $expense)
    {
        //
        $project_cost = ProjectCost::find($expense->project_cost_id);
        $total_cost = Expense::where('project_cost_id', $expense->project_cost_id)->sum('total_amount');
        $project_cost->actual_spending = $total_cost;
        $project_cost->save();
    }


    /**
     * Handle the Expense "created" event.
     *
     * @param  \App\Models\Expense  $expense
     * @return void
     */
    public function updating(Expense $expense)
    {
        //
        $project_cost = ProjectCost::find($expense->project_cost_id);
        $expense->project_id = $project_cost->project_id;
        // $expense->save();
    }

    /**
     * Handle the Expense "updated" event.
     *
     * @param  \App\Models\Expense  $expense
     * @return void
     */
    public function updated(Expense $expense)
    {
        //
        $project_cost = ProjectCost::find($expense->project_cost_id);
        $total_cost = Expense::where('project_cost_id', $expense->project_cost_id)->sum('total_amount');
        $project_cost->actual_spending = $total_cost;
        $project_cost->save();
    }

    /**
     * Handle the Expense "deleted" event.
     *
     * @param  \App\Models\Expense  $expense
     * @return void
     */
    public function deleted(Expense $expense)
    {
        //
    }

    /**
     * Handle the Expense "restored" event.
     *
     * @param  \App\Models\Expense  $expense
     * @return void
     */
    public function restored(Expense $expense)
    {
        //
    }

    /**
     * Handle the Expense "force deleted" event.
     *
     * @param  \App\Models\Expense  $expense
     * @return void
     */
    public function forceDeleted(Expense $expense)
    {
        //
    }
}