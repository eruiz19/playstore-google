<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\App;

class DeveloperController extends Controller
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
    public function index()
    {
        $apps=App::orderBy('id','DESC')->paginate(3);
        return view('developer.index',compact('apps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('developer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*'price'=>'required|numeric|regex:/^[\d]{0,5}(\.[\d]{1,2})?$/'
        Acepta un numero entero de maximo 5 digitos con decimales opcionales 1 o 2 como maximo*/

        $this->validate($request, [ 'name'=>'required|unique:apps,name|max:50', 'price'=>'required|numeric|regex:/^[\d]{0,5}(\.[\d]{1,2})?$/', 'picture'=>'required', 'description'=>'required|max:150', 'category_id'=>'required']);

        $app = App::create($request->all());

        //dd ($app);

        //$categorias = $request->input('category_id');

        //$categorias = $request['category_id'];

        //dd($categorias);

        /*foreach ($categorias as $categoria) {

                $app->category()->attach($categoria);
        }

        /*$categorias = $request->input('category_id');
        if ($categorias) {
            $app->category()->attach($categorias);
        }*/
        
        return redirect()->route('developer.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $apps=App::find($id);
        return  view('developer.show',compact('apps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $app=App::find($id);
        return view('developer.edit',compact('app'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[ 'price'=>'required', 'picture'=>'required', 'description'=>'required|max:150']);

        App::find($id)->update($request->all());
        return redirect()->route('developer.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        App::find($id)->delete();
        return redirect()->route('developer.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
