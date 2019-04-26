<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\User;

class AdminUserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $users = User::paginate(3);
        return view('admin.user.index', ['users' => $users]);
    }
    public function getAdmin(){
        $users = User::paginate(2);
        return view('admin.user.index', ['users' => $users]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|min:4|max:50',           
            'email' => 'required|email|min:6|max:64|unique:users',
            'password' => 'required|min:6|max:64',
            'password_confirmation' => 'required|same:password',
        ],[
            'name.required' => 'The name field is required.',
            'name.min' => 'The name must be at least 4 characters.',
            'name.max' => 'The name may not be greater than 50 characters.',
            'email.required' => 'The email field is required.',
            'email.max' => 'The email may not be greater than 64 characters.',
            'email.min' => 'The email must be at least 6 characters.',
            'email.email' => 'Wrong email format.',
            'email.unique' => 'Email existed.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters',
            'password.max' => 'The password may not be greater than 64 characters.',
            'password_confirmation.required' => 'The comfirm password field is required.',
            'password_confirmation.same' => 'The password does not match.',
        ]);
        $user = new User();
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt( $request->password );
        $user->remember_token = $request->_token;
        $user->save();
        return redirect('admin/user')->with('success','The user has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::findOrFail($id);
        
        return view('admin.user.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
       $user = User:: findOrFail($id);
       $this->validate($request, [
        'name' => 'required|min:4|max:50',
    ],[
        'name.required' => 'The name field is required.',
        'name.min' => 'The name must be at least 4 characters.',
        'name.max' => 'The name may not be greater than 50 characters.',
    ]);
        $input = $request->all();
       $user->update($input);
       return redirect('admin/user')->with('success','The user has edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
       $user = User:: findOrFail($id);
       
       $user->delete();
       return redirect('/admin/user')->with('success','The user has deleted!');
    }

}
