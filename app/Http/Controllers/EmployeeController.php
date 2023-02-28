<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::select('employees.*')->where('name', 'like', 'prof%')->orderBy('id','asc')->limit(10)->get();
        return view('indexV')->with('employee', $employee);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createV');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email',
            
        ]);
        $employee = Employee::create($data);
        return redirect('/employee')->withSuccess('Entry has been saved');
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
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('editV', compact('employee'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = $request->validate([
            'username' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email',
        ]);
        Employee::whereId($id)->update($employee);
        return redirect('/employee')->withSuccess('Entry has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect('/employee')->withSuccess('Entry has been deleted');
    }
}
