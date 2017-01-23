<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Investment;
use App\Customer;
use Auth;


class InvestmentController extends Controller
{
     public function index()
    {
        $Investment=Investment::all();

        if (Auth::check())
        return view('investments.index',compact('Investment'));
        else
        return view('/auth/login');
    }

    public function show($id)
    {        
        $Investment = Investment::findOrFail($id);
        return view('investments.show',compact('Investment'));
    }


    public function create()
    {
        $customers = Customer::lists('name','id');
        return view('investments.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)   
    {
		$this->validate($request, [
        'category' => 'required',
        'description' => 'required',
		'acquired_value' => 'required',
        'acquired_date' => 'required',
		'recent_value' => 'required',
        'recent_date' => 'required',
		    ]);
       $Investment= new Investment($request->all());
       $Investment->save();

       return redirect('investments');
    }

    public function edit($id)
    {
        $investment=Investment::find($id);
        return view('investments.edit',compact('investment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        //
        $Investment= new Investment($request->all());
        $Investment=Investment::find($id);
        $Investment->update($request->all());
        return redirect('investments');
    }

    public function destroy($id)
    {
        Investment::find($id)->delete();
        return redirect('investments');
    }
}
