<?php

namespace App\Http\Controllers\Web;

use DB;
use App\Models\Expense;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Expense $expense)
    {
        $this->expense = $expense;

        $this->data = config('web.dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['data'] = $this->expense::join('expense_categories', 'expense_categories.id', 'expenses.expense_category_id')
                                ->select(DB::raw('expense_categories.name as name'),
                                       DB::raw('SUM(expenses.amount) as amount'))

                                ->groupBy('expense_categories.name')
                                ->get();
        $amount = '';
        $name = '';

        foreach ($this->data['data'] as $datas) {
            $amount .= ','.$datas->amount;
            $name .= ',"'.$datas->name.'"';
        }
        $this->data['amount'] = ltrim($amount, ',');

        $this->data['name'] = ltrim($name, ',');

        return view($this->data['view'].'index', $this->data);
    }
}
