<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartementStoreRequest;
use App\Http\Requests\DepartementUpdateRequest;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
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
            $departements = Departement::where("name","like","%{$request->search}%")->orwhere("id","like","%{$request->search}%")->get();
            return view('departements.index',['departements'=> $departements ,'search'=>$request->search]);
        }
        else
        {
            $departements= Departement::all();
            return view('departements.index',compact('departements'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartementStoreRequest $request)
    {
        Departement::create([
            'name' => $request->name,
        ]);
        return redirect()->route('departements.index')->with('message', 'The Departement Created Succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Departement $departement)
    {
        return view('departements.edit',['departement'=> $departement]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartementUpdateRequest $request, Departement $departement)
    {
        $departement->update([
            'name' => $request->name,
        ]);
        return redirect()->route('departements.index')->with('message', 'The Departement Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departement $departement)
    {
        $departement->delete();
        return redirect()->route('departements.index')->with('message', 'The Departement Deleted Succesfully');
    }
}
