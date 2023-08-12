<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computre;

class ComputresController extends Controller
{
    //Array of  Static Data 
   /* private static function getData(){
       return [
            ['id'=> 1, 'name' => 'LG' , 'origin' => 'Koria'  ],
            ['id'=> 2, 'name' => 'HP' , 'origin' => 'USA'  ],
            ['id'=> 3, 'name' => 'Siemens' , 'origin' => 'Germany'  ],
           ];

    }
    */


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('computres.index',
                  ['computres'=>Computre::all()
                ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('computres.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'computre-name' => 'required',
            'computre-origin' => 'required',
            'computre-price' => ['required','integer'],
        ]);

       $computre = new Computre();
       $computre -> name   = strip_tags($request -> input('computre-name')) ;
       $computre -> origin =strip_tags( $request -> input('computre-origin')) ;
       $computre -> price   =strip_tags ($request -> input('computre-price')) ;

       $computre -> save();

       return redirect() -> route ('computres.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($computre)
    {
       
       
        return view('computres.show',[
            'computre' => Computre::findOrFail($computre)

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($computre)
    {
        return view('computres.edit',[
            'computre' => Computre::findOrFail($computre)
        ]);
 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $computre)
    {
        $request -> validate([
            'computre-name' => 'required',
            'computre-origin' => 'required',
            'computre-price' => ['required','integer'],
        ]);

        $to_update = Computre::findOrFail($computre);
        $to_update -> name   = strip_tags($request -> input('computre-name')) ;
        $to_update -> origin =strip_tags( $request -> input('computre-origin')) ;
        $to_update -> price   =strip_tags ($request -> input('computre-price')) ;

        $to_update -> save();

       return redirect() -> route ('computres.show',$computre);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($computre)
    {
       $to_delete =  Computre::findOrFail($computre);
       $to_delete -> delete();
       return redirect() -> route ('computres.index',$computre);
    }
}
