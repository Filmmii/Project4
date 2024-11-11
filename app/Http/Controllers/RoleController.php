<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = RoleModel::get();

        return view('role/index',compact('role'), ['currentPage' => 'role']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role_id = RoleModel::max('role_id');
        return view('role/create', compact('role_id'), ['currentPage' => 'role']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = new RoleModel;

        $request->validate(
    [
                'role_id'=>'required|max:5',
                'role_name'=>'required',
    
            ]
        );

        $role->role_id = $request->role_id;
        $role->role_name = $request->role_name;

        $role->save();

        return redirect("role");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $role_id)
    {
        $role = RoleModel::find($role_id);
        return view('role/edit', compact('role'), ['currentPage' =>'role']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = RoleModel::find($id);

        $role->role_id = $request->role_id;
        $role->role_name = $request->role_name;

        $role->save();

        return redirect('role');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $role_id)
    {
        RoleModel::find($role_id)->delete();
        return redirect('role');
    }
}
