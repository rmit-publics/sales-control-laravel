<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\UseCases\User\GetSellerUseCase;
use Illuminate\Http\Request;
use App\UseCases\User\LoginUseCase;

class UserController extends Controller
{
    private $loginUseCase;
    private $getSellerUseCase;
    public function __construct() {
        $this->loginUseCase = new LoginUseCase();
        $this->getSellerUseCase = new GetSellerUseCase();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function login() {
        return view('login.login');
    }

    public function authenticate(Request $request) {
        return $this->loginUseCase->execute($request);
    }

    public function getSeller(int $store_id) {
        return $this->getSellerUseCase->execute($store_id);
    }
}
