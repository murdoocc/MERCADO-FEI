<?php

namespace App\Http\Controllers;

use App\Proposal;
use App\Category;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        $proposals = Proposal::latest()->paginate(100);  
        return view('proposals.index',compact('proposals','categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('proposals.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'alias_emprendedor' => 'required',
            'nombre_propuesta' => 'required',
            'detalle' => 'required',
            'categoria' => 'required',
            //'votos' => 'required',
        ]);
  
        Proposal::create(
            [
                'alias_emprendedor' => $request->input('alias_emprendedor'),                
                'nombre_propuesta' => $request->input('nombre_propuesta'),                
                'detalle' => $request->input('detalle'),
                'categoria' => $request->input('categoria'),
            ]);  
   
        return redirect()->route('proposals.index')
                        ->with('success','Proposal created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        return view('proposals.show',compact('proposals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        return view('proposals.edit',compact('proposals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
        $request->validate([
            'alias_emprendedor' => 'required',
            'nombre_propuesta' => 'required',
            'detalle' => 'required',
            'categoria' => 'required',
            'votos' => 'required',
        ]);
  
        $proposal->update($request->all());
  
        return redirect()->route('proposals.index')
                        ->with('success','Proposal updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        $proposal->delete();
  
        return redirect()->route('proposals.index')
                        ->with('success','Proposal deleted successfully');

    }
}
