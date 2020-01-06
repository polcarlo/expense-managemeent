<?php

namespace App\Http\Controllers\Web;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Role $role)
    {
        $this->role = $role;

        $this->data = config('web.role');
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
        $data = $this->role::select('id', 'name', 'guard_name', 'created_at', 'id as action_id')->get()->toArray();

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
    public function store(RoleRequest $request)
    {
        $role = ['name' => $request->name, 'guard_name' => $request->guard_name];

        if ($data = $this->role->updateOrCreate($role)) {
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
        $this->data['data'] = $this->role->where('id', $id)->first();

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
    public function update(RoleRequest $request, $id)
    {
        $role = ['name' => $request->name, 'guard_name' => $request->guard_name];

        $update = $this->role->find($id);

        if ($data = $update->update($role)) {
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
