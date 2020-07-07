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
                        ->with('success','Propuesta creada!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categories = Category::latest()->paginate(10);
        $proposals = Proposal::latest()->paginate(100);  
        return view('proposals.edit',compact('proposals','categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Proposal $proposal)
    {
        
        $votos = $proposal->votos;
        $votos += 1;                

        $proposal->update(['votos' => $votos]); 
      
        return redirect()->route('proposals.index')
                        ->with('success','Gracias por votar!');
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $propose = Proposal::find($request->idp);
        $propose->delete();
        return redirect()->route('proposals.index')
                        ->with('success','Propuesta borrada!');

    }

    public function adminstore(Request $request)
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
   
        return redirect()->route('admin.proposals')
                        ->with('success','Propuesta creada!.');

    }
    public function adminupdate(Request $request)
    {
        $request->validate([
            'alias_emprendedor' => 'required',
            'nombre_propuesta' => 'required',
            'detalle' => 'required',
            'categoria' => 'required',
            //'votos' => 'required',
        ]);
        $propose = Proposal::find($request->idp);
        $propose->alias_emprendedor = $request->alias_emprendedor;
        $propose->nombre_propuesta = $request->nombre_propuesta;
        $propose->detalle = $request->detalle;
        $propose->categoria = $request->categoria;
        $propose->save(); 
        return redirect()->route('admin.proposals')
                        ->with('success','Propuesta actualizada!');
    }
    public function admindestroy(Request $request)
    {
        $propose = Proposal::find($request->idp);
        $propose->delete();
        return redirect()->route('admin.proposals')
                        ->with('success','Propuesta borrada!');
    }

    public function admindestroy2(Request $request)
    {
        $propose = Proposal::find($request->idp);
        $propose->delete();
        return redirect()->route('proposals.index')
                        ->with('success','Propuesta borrada!');
    }
}
