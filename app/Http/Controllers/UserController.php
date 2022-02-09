<?php

namespace App\Http\Controllers;


use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public $userService;

    /**
     * @param \App\Services\UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->getAll();

        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
        // Validate request
        $validate = $this->userService->validator($request);
        if ($validate->fails()) {
            // Validate fall, redirect form with error
            return redirect('users/create')->withErrors($validate->errors())->withInput();
        }
  
        // Validate success and store User
        $user = $this->userService->storeUser($request); 
        
        // Send Email to User
        $this->userService->sendMail($user);
       
        return Redirect::route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get user from Database
        $user = $this->userService->findUser($id);

        $this->userService->sendNotification($user);

        return $this->index();
       // return view('user.info', ['user' => $user]);
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
        // Get user from Database
        $user = $this->userService->findUser($id);

        $this->userService->updateUser($request, $user);

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userService->findUser($id);
        $this->userService->deleteUser($user);

        return $this->index();
    }
}
