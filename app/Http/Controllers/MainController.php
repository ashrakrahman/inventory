<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session()->has('token')){
            return redirect()->route('login');
        }
        return redirect()->route('dashboard');
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
        //
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
        //
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
    }

    /**
     * Login
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Register
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Store a user info
     *
     */
    public function storeUserInfo(Request $request)
    {

        $user = User::where('email', $request->get('email'))->first();

        if($user) {
            return redirect()->back()->with('message', 'Email address already taken!');
        }
        $pass1 = $request->password1 ;
        $pass2 = $request->password2 ;

        if ($pass1!=$pass2){
            return redirect()->back()->with('message', 'Password didnt match!');
        }

        $user = new User();

        $user->name = $request->name;
        $user->email =  $request->get('email');
        $user->password = bcrypt($request->password1);
        $user->token = str_random(60);
        $user->username = $request->username;
        $user->usergroup_id = 1;

        $user->save();

        return redirect()->back()->with('message', 'Success!');

    }

    /**
     * Check if a user is valid or invalid
     * @param Request $request
     */
    public function checkUserInfo(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = User::where('email', $request->get('email'))->first();

            session([
                "user_id" => $user->id,
                "token" => $user->token,
                "email"=> $user->email
            ]);

            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('message', 'Invalid e-mail or password!');

    }

    /**
     * Admin panel homepage
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function dashboard()
    {
        if(!session()->has('token')){
            return redirect()->route('login');
        }

        $user_id = session()->get('user_id');
        $user = User::where('id', $user_id)->first();

        if(!$user){
            return redirect()->route('login');
        }

        $data['user_id'] = $user->id ;
        $data['username'] = $user->username ;
        $data['email'] = $user->email ;
        $data['token'] = $user->token ;

        return view('dashboard',$data);
    }

    /**
     * Logout method
     * @return [type] [description]
     */
    public function logout()
    {
        session()->flush();
        return redirect()->route('login');

    }
}
