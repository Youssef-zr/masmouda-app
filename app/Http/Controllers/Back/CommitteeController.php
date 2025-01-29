<?php

namespace App\Http\Controllers\Back;

use App\DataTables\CommitteeDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Committe\CreateCommitteeRequest;
use App\Http\Requests\Committe\UpdateCommitteeRequest;
use App\Models\Committee;
use App\Repositories\Both\ModelRepository;
use Illuminate\Http\Request;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class CommitteeController extends Controller
{
    private ModelRepository $committeeRepository;

    public function __construct()
    {
        $this->committeeRepository = new ModelRepository(new Committee);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(CommitteeDataTable $datatable) {
        return $datatable->render('back.members.committees.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("back.members.committees.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCommitteeRequest $request)
    {

        $this->committeeRepository->create($request->validated());
        toastr()->success(__(key: "global.record_created_success"));

        return to_route("admin.committees.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $committee = $this->committeeRepository->find($id);

        return view("back._includes.ajax.commettee-info",compact('committee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $committee = $this->committeeRepository->find($id);
        
        return view("back.members.committees.update",compact("committee"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommitteeRequest $request, int $id)
    {
        $this->committeeRepository->update($id,$request->validated());
        toastr()->success(__(key: "global.record_updated_success"));

        return to_route("admin.committees.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->committeeRepository->delete($id);
        toastr()->success(__(key: "global.record_deleted_success"));

        return to_route("admin.committees.index");
    }
}
