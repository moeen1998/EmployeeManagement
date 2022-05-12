<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Departement;
use App\Models\Employee;
use App\Models\State;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $employees = Employee::where("firstname","like","%{$request->search}%")
                                        ->orwhere("lastname","like","%{$request->search}%")
                                        ->orwhere("middlename","like","%{$request->search}%")
                                        ->orwhere("departement_id","like","%{$request->search}%")
                                        ->orwhere("birthdate","like","%{$request->search}%")
                                        ->orwhere("date_hired","like","%{$request->search}%")->get();
            return view('employees.index',['employees'=> $employees ,'search'=>$request->search]);
        }
        else
        {
            $employees= Employee::all();
            return view('employees.index',compact('employees'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $departements = Departement::all();
        return view('employees.create',['countries' => $countries,'departements' => $departements]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request )
    {
        Employee::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'middlename' => $request->middlename,
            'departement_id'=> $request->departement_id,
            'country_id'=> $request->country_id,
            'state_id'=> $request->state_id,
            'city_id'=> $request->city_id,
            'zip_code'=> $request->zip_code,
            'birthdate' => $request->birthdate,
            'date_hired'=> $request->date_hired,
        ]);
        return redirect()->route('employees.index')->with('message', 'The Employee Created Succesfully');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $departements = Departement::all();
        $countries = Country::all();
        $States = State::all();
        $Cities = City::all();
        return view('employees.edit',['employee'=> $employee,'departements' => $departements,'countries' => $countries,'States' => $States, 'Cities'=> $Cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $employee->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'middlename' => $request->middlename,
            'departement_id'=> $request->departement_id,
            'country_id'=> $request->country_id,
            'state_id'=> $request->state_id,
            'city_id'=> $request->city_id,
            'zip_code'=> $request->zip_code,
            'birthdate' => $request->birthdate,
            'date_hired'=> $request->date_hired,
        ]);
        return redirect()->route('employees.index')->with('message', 'The Employee Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('message', 'The Employee Deleted Succesfully');
    }
}
