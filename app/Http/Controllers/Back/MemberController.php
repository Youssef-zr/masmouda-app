<?php

namespace App\Http\Controllers\Back;

use App\DataTables\MembersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Members\CreateMemberRequest;
use App\Http\Requests\Members\UpdateMemberRequest;
use App\Models\Committee;
use App\Models\RMember;
use App\Repositories\Back\Members\MemberRepository;

class MemberController extends Controller
{
    private MemberRepository $memberRepository;

    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(MembersDataTable $dataTable)
    {
        return $dataTable->render('back.members.index');
    }

    // get roles as and array
    public function getMemberRoles()
    {
        $roles = RMember::orderBy("id", 'asc')
            ->pluck('name_' . app()->getLocale(), 'id')
            ->toArray();

        return $roles;
    }

    // get committees as and array
    public function getCommittees()
    {
        $committees = Committee::orderBy("id", 'asc')
            ->pluck('name_' . app()->getLocale(), 'id')
            ->toArray();

        return $committees;
    }

    // get role salary
    public function getRoleSalary()
    {
        $role = RMember::find(request()->id);

        return response()->json(["salary" => $role->salary]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->getMemberRoles();
        $committees = $this->getCommittees();

        return view('back.members.create', compact('roles','committees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateMemberRequest $request)
    {
        $this->memberRepository->create($request->validated());
        toastr()->success(__(key: "global.record_created_success"));

        return to_route("admin.members.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $member = $this->memberRepository->find($id);
        $member->load("role");

        return view('back._includes.ajax.member-info', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $roles = $this->getMemberRoles();
        $committees = $this->getCommittees();
        $member = $this->memberRepository->find($id);

        return view('back.members.update', compact('member', "roles","committees"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, int $id)
    {
        $this->memberRepository->update($id, $request->validated());
        toastr()->success(__(key: "global.record_updated_success"));

        return to_route("admin.members.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->memberRepository->delete($id);
        toastr()->success(__(key: "global.record_deleted_success"));

        return to_route("admin.members.index");
    }
}
