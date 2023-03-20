<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
Use App\User;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listdatacategory = Category::paginate(5);
        return view('listdata',['listdatacategory'=>$listdatacategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahdata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newdata = new Category;
        $validate =[
            'nama_category'=> 'required',
            'is_publish' => 'required',
        ];
        $validator = Validator::make($request->all(), $validate);
        if($validator->fails()){
            $request->session()->flash('errorinput');
            return redirect('/listdata/tambah-category');
        }
        if($request->is_publish == "1"){
            $newdata->is_publish = 1;
        }elseif($request->is_publish == "0"){
            $newdata->is_publish = 0;
        }else{
            $request->session()->flash('errorpublish');
            return redirect('/listdata/tambah-category');
        }
        $newdata->name = $request->nama_category;
        $newdata->save();
        $array = ['name'=>$request->nama_category];
        $users = User::all();
        foreach($users as $user){
            $email[]=$user->email;
        }
        foreach($email as $send){
            Mail::send('emails.CategoryCreated',['array'=>$array], function($message) use($send){
                $message->to($send)->subject('CategoryCreated');
            });
        }
       
        $request->session()->flash('suksestambahdata');
        return redirect(route('list-data'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listdata = Category::find($id);
        return view('editdata', ['listdata'=>$listdata]);
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
        $validate =[
            'nama_category'=> 'required',
            'is_publish' => 'required',
        ];
        $validator = Validator::make($request->all(), $validate);
        if($validator->fails()){
            $request->session()->flash('errorinput');
            return redirect('/listdata/edit/'.$id);
        }
        $listdata = Category::find($id);
        $name = $listdata->name;
        $listdata->name = $request->nama_category;
        $listdata->is_publish = $request->is_publish;
        $listdata->save();
        $array = [
            'namebefore'=>$name,
            'newname'=>$request->nama_category,
            'time'=>date('d/D-M-Y'),
        ];
        $users = User::all();
        foreach($users as $user){
            $email[]=$user->email;
        }
        foreach($email as $send){
            Mail::send('emails.EditSuccesfully',['array'=>$array], function($message) use($send){
                $message->to($send)->subject('EditSuccesfully');
            });
        }
        $request->session()->flash('sukseseditdata');
        return redirect(route('edit-data', ['id'=>$id]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $listdata = Category::find($id);
        $name = $listdata->name;
        $listdata->delete();
        $array = [
            'name'=>$name,
            'time'=>date('d/D-M-Y'),
        ];
        $users = User::all();
        foreach($users as $user){
            $email[]=$user->email;
        }
        foreach($email as $send){
            Mail::send('emails.DeleteSuccesfully',['array'=>$array], function($message) use($send){
                $message->to($send)->subject('DeleteSuccesfully');
            });
        }
        $request->session()->flash('suksesdeletdata');
        return redirect(route('list-data'));
    }
}
