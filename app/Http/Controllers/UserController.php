<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUpdateUserFormRequest; 

use Illuminate\Support\Collection;

use Illuminate\Http\Request;


class UserController extends Controller
{
    //modelo padrao de index de listagem
    /*public function index()
    {
        $users = User::get();       
        return view('users.index', compact('users'));
    }
    ou também com fitro
    public function index(Request $request)
    {
        $users = User::where('name','like', "%{$request->search}%")->get();       
        return view('users.index', compact('users'));
    }*/

    public function index(Request $request)
    {
        $search = $request->search;
        $users = User::where(function($query) use ($search){
            if($search){
                $query->where('email',$search);
                $query->orwhere('name','like',"%{$search}%");
            }
        })->get();
            return view('users.index', compact('users'));
    }

    public function show($id)
    {

            
        //$user = User::where('id', $id)->first();
        if (!$user = User::find($id))
            //return redirect()->back(); //volta anterior
            return redirect()->route('users.index'); 
            // dd($user);
            // dd('users.show', $id);
       return view('users.show', compact('user'));
    }

    public function create()
    {      
        return view('users.create');
    }
    //chamada sem regra de validacao
    //public function store(Request $request)
    public function store(StoreUpdateUserFormRequest $request)
    {
      //  dd($_REQUEST->all());
     // dd($request->only([
     //   'name','email','password'
     // ]));
        //metodo comum 
    //  $user = new User;
    //  $user->name = $request->name;
    //  $user->email = $request->email;
    //  $user->password = $request->password;
    //  $user->save();
        //meotdo mais simples        
    //User::create($request->all());
        //Metodo com tratamento de variaveis 
        $data= $request->all();
        $data['password']= bcrypt($request->password);
        $user = User::create($data);

        return redirect()->route('users.index');

    }

    public function edit($id)
    {
        if (!$user = User::find($id))
            //return redirect()->back(); //volta anterior
            return redirect()->route('users.index'); 
           
       return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if (!$user = User::find($id))
            //return redirect()->back(); //volta anterior
            return redirect()->route('users.index'); 
            //metodo de edicao antigo e nao usual
            // $user->name = $request->get('name');
            // $user->save();
            $data = $request->only('name','email','password');
            
            if ($request->password){
                $data['password']=bcrypt($request->password);
            }
            $user->update($data);
            return redirect()->route('users.index'); 
            
    }

    public function delete($id)
    {
        if (!$user = User::find($id))
            //return redirect()->back(); //volta anterior
            return redirect()->route('users.index'); 
        $user->delete();   
        return redirect()->route('users.index'); 
    }


}
