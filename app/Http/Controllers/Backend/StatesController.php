<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateStoreRequest;
use App\Http\Requests\StateUpdateRequest;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StatesController extends Controller
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
            $states = State::where("name","like","%{$request->search}%")->orwhere("country_id","like","%{$request->search}%")->get();
            return view('states.index',['states'=> $states ,'search'=>$request->search]);
        }
        else
        {
            $states= State::all();
            return view('states.index',compact('states'));
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
        return view('states.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateStoreRequest $request)
    {
        State::create([
            'country_id' => $request->country_id,
            'name' => $request->statename,
        ]);
        return redirect()->route('states.index')->with('message', 'The State Created Succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        $countries = Country::all();
        return view('states.edit',['countries'=> $countries,'state'=> $state]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StateUpdateRequest $request, State $state)
    {
        $state->update([
            'country_id' => $request->country_id,
            'name' => $request->statename,
        ]);
        return redirect()->route('states.index')->with('message', 'The State Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('states.index')->with('message', 'The State Deleted Succesfully');
    }
}
