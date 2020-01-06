<?php

namespace App\Http\Controllers\Web;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use App\Http\Requests\ExpenseRequest;
use App\Http\Controllers\Controller;
use DataTables;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Expense $expense, ExpenseCategory $expenseCategory)
    {
        $this->expense = $expense;

        $this->expenseCategory = $expenseCategory;

        $this->data = config('web.expense');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->data['view'].'index', $this->data);
    }

    /**
     * return data of the simple datatables.
     *
     * @return Json
     */
    public function dtList(Request $request)
    {
        $data = $this->expense::select('expenses.id as id',
                                       'expense_categories.name as name',
                                       'expenses.amount as amount',
                                       'expenses.entry_date as entry_date',
                                       'expenses.created_at as created_at',
                                       'expenses.id as action_id')
                                ->join('expense_categories', 'expense_categories.id', 'expenses.expense_category_id')
                                ->get()
                                ->toArray();

        return Datatables::of($data)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['category'] = $this->expenseCategory->pluck('name', 'id')->all();

        return view($this->data['view'].'create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseRequest $request)
    {
        $date = explode('/', $request->entry_date);
        $entry_date = $date[2].'-'.$date[1].'-'.$date[0];
        $expense = ['expense_category_id' => $request->category, 'amount' => $request->amount, 'entry_date' => $entry_date];

        if ($data = $this->expense->updateOrCreate($expense)) {
            return response(__('web.form.success_update'), 200);
        }

        return response(__('web.form.failed_create'), 433);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Area $area
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Department $department
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['data'] = $this->expense->where('id', $id)->first();

        $this->data['category'] = $this->expenseCategory->pluck('name', 'id')->all();

        return view($this->data['view'].'edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Department   $department
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseRequest $request, $id)
    {
        $date = explode('/', $request->entry_date);
        $entry_date = $date[2].'-'.$date[1].'-'.$date[0];
        $expense = ['expense_category_id' => $request->category, 'amount' => $request->amount, 'entry_date' => $entry_date];

        $update = $this->expense->find($id);

        if ($data = $update->update($expense)) {
            return response(__('web.form.success_update'), 200);
        }

        return response(__('web.form.failed_update'), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Area $area
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
    }
}
