<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use DB;
use Response;
use Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\support\Facades\Auth;
use App\models\Kategori,
    App\models\ImageUser;
use Session;
use Datatables;
use Alert;

class kategoriController extends Controller
{

public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('xss');
    }


 public function Index(Request $request)
    {
        $kategori = Kategori::all();
        return view ('adminMaster.kategori.index',array('kategori' => $kategori));
    }
      
 
 public function create(){
        return view::make('adminMaster.kategori.create');
 }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {  $msg = array(
        'nama_kategori.required' => 'Kolom tidak boleh kosong !!'
        );
        $rules = array (
                'nama_kategori' => 'required' 
        );
        $validator = Validator::make ( Input::all (), $rules, $msg );
        if ($validator->fails ())
            return Response::json ( array (
                    
                    'errors' => $validator->getMessageBag ()->toArray () 
            ) );
        else {
            $data = new Kategori ();
            $data->nama_kategori = $request->nama_kategori;
            $data->save ();
            return Response()->json ( $data );
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $kategori = Kategori::find($id);
        return View::make('adminMaster.kategori.index')->with('kategori', $kategori);
    }


    public function update(Request $Request, $id)
    {
        $data = Kategori::find($id)->update($request->all());
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        Kategori::find($request->id)->delete();
        return response ()->json();
    }

}
