<?php

namespace App\Http\Controllers\Web;

use DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;

        $this->role = $role;

        $this->data = config('web.user');
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
        $data = $this->user::select('id', 'name', 'email', 'created_at', 'id as action_id')->get()->toArray();

        return Datatables::of($data)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['role'] = $this->role->pluck('name', 'id')->all();

        return view($this->data['view'].'create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = ['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password)];

        if ($data = $this->user->updateOrCreate($user)) {
            $user_id = $this->user->find($data->id);

            $user_id->assignRole($request->role);

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
        $this->data['data'] = $this->user->where('id', $id)->first();

        $this->data['role'] = $this->role->pluck('name', 'id')->all();

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
    public function update(UserRequest $request, $id)
    {
        $user = ['name' => $request->name, 'email' => $request->email, 'password' => $request->password];

        $update = $this->user->find($id);

        if ($data = $update->update($user)) {
            $user_id = $this->user->find($id);
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user_id->assignRole($request->role);

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
