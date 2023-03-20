<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Category;
class ApiCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listdata = Category::paginate(5);
        return response()->json([
           'data'=>$listdata, 
        ], 200);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valiate = [
            'nama_category'=>'required',
            'is_publish'=>'required',
        ];
        $validator = Validator::make($request->all(), $valiate);
        if($validator->fails()){
            return response()->json([
                'Message'=>'Pastikan Data Terinput Semua',
            ], 400);
        }
       $listdata = Category::create([
        'name'=>$request->nama_category,
        'is_publish'=>$request->is_publish,
       ]);
       return response()->json([
        'data'=>$listdata,
       ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listdata = Category::find($id);
        if($listdata == null){
            return response()->json([
                'message'=>'Data Not Found',
            ], 404);
        }
        return response()->json([
            'data'=>$listdata,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        
        $listdata = Category::find($id);
        $valiate = [
            'nama_category'=>'required',
            'is_publish'=>'required',
        ];
        $validator = Validator::make($request->all(), $valiate);
        if($validator->fails()){
            return response()->json([
                'Message'=>'Pastikan Data Terinput Semua',
            ], 400);
        }
        $listdata->name = $request->nama_category;
        $listdata->is_publish = $request->is_publish;
        $listdata->save();
        return response()->json([
            'Message'=>'Data Sukses Di Edit',
            'data'=>$listdata,

        ], 200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listdata = Category::find($id);
        if($listdata == null){
            return response()->json([
                'Message'=>'Data Tidak Ditemukan',
            ], 404);
        }
        $listdata->delete();
        return response()->json([
            'Message'=>'Data Berhasil Dihapus',
        ], 200);
    }
}
