<?php

namespace App\Http\Controllers\Back;

use App\DataTables\RoleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RMembers\CreateRMemberRequest;
use App\Http\Requests\RMembers\UpdateRMemberRequest;
use App\Models\RMember;
use App\Repositories\Both\ModelRepository;

class RMemberController extends Controller
{
    private ModelRepository $roleRepository;

    public function __construct()
    {
        $this->roleRepository = new ModelRepository(new RMember);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(RoleDataTable $dataTable)
    {
        return $dataTable->render('back.members.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.members.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRMemberRequest $request)
    {
        $this->roleRepository->create($request->validated());
        toastr()->success(__(key: "global.record_created_success"));

        return to_route("admin.role-members.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $role = $this->roleRepository->find($id);
        return view('back._includes.ajax.role-member-info', data: compact(var_name: 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $role = $this->roleRepository->find($id);
        return view('back.members.roles.update', compact(var_name: 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRMemberRequest $request, int $id)
    {
        $this->roleRepository->update($id, $request->validated());
        toastr()->success(__(key: "global.record_updated_success"));

        return to_route("admin.role-members.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->roleRepository->delete($id);
        toastr()->success(__(key: "global.record_deleted_success"));

        return to_route("admin.role-members.index");
    }
}
