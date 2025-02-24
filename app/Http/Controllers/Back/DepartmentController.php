<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Departments\CreateDepartmentRequest;
use App\Http\Requests\Departments\UpdateDepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Repositories\Both\ModelRepository;
use App\DataTables\DepartmentDataTable;
 
class DepartmentController extends Controller
{
    private ModelRepository $departmentRepository;

    public function __construct()
    {
        $this->departmentRepository = new ModelRepository(new Department);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(DepartmentDataTable $dataTable)
    {
        return $dataTable->render('back.departments.index');
    }


    /**
     * get departments as an array
     */
    public function pluckedDepartments()
    {
       return Department::pluck("name",'id')->toArray();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = $this->pluckedDepartments();

        return view("back.departments.create",compact(var_name: 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDepartmentRequest $request)
    {
        $this->departmentRepository->create($request->all());
        toastr()->success(__(key: "global.record_created_success"));

        return redirect()->route('admin.departments.index');
    }
   

    /**
     * Display the specified resource.
   */
    public function show($id)
    {
        $department = $this->departmentRepository->find($id);
        $department->load(relations: "parent");

        return view('back._includes.ajax.department-info', compact('department'));
    }

    /**
    *show the form for editing the specified resource.
     */
   public function edit($id)
    { 
        $departments = $this->pluckedDepartments();
        $department = $this->departmentRepository->find($id);
        $department->load(relations: "parent");


        return view('back.departments.update', compact('department', "departments"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, $id)
    {
        $this->departmentRepository->update($id, $request->validated());
        toastr()->success(__(key: "global.record_updated_success"));

        return to_route("admin.departments.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->departmentRepository->delete($id);
        toastr()->success(__(key: "global.record_deleted_success"));

        return to_route("admin.departments.index");
    }
}
