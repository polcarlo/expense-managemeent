<?php

namespace App\Http\Controllers\Web;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use App\Http\Requests\ExpenseCategoryRequest;
use App\Http\Controllers\Controller;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ExpenseCategory $expenseCategory)
    {
        $this->expenseCategory = $expenseCategory;

        $this->data = config('web.category');
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
        $data = $this->expenseCategory::select('id', 'name', 'description', 'created_at', 'id as action_id')->get()->toArray();

        return Datatables::of($data)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->data['view'].'create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseCategoryRequest $request)
    {
        $category = ['name' => $request->name, 'description' => $request->description];

        if ($data = $this->expenseCategory->updateOrCreate($category)) {
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
        $this->data['data'] = $this->expenseCategory->where('id', $id)->first();

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
    public function update(ExpenseCategoryRequest $request, $id)
    {
        $category = ['name' => $request->name, 'description' => $request->description];

        $update = $this->expenseCategory->find($id);

        if ($data = $update->update($category)) {
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
    public function destroy($id)
    {
        $this->expenseCategory->where('id', $id)->delete();
    }
}
