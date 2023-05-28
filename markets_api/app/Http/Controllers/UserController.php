<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use ErrorException;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = User::get();

            return response()->json([
                'msg' => "Ururios listados",
                'data' => $users
            ], 200);
        } catch (ErrorException $e) {
            return response()->json([
                'msg' => $e->getMessage(),
                'data' => []
            ], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $user = new User();
            return response()->json([
                'msg' => "user created",
                'data' => []
            ], 200);
        } catch (ErrorException $e) {
            return response()->json([
                'msg' => $e->getMessage(),
                'data' => []
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            request()->validate(User::$rules);

            $user = User::create($request->all());
            return response()->json([
                'msg' => 'User created successfully.',
                'data' => $user
            ], 200);
        } catch (ErrorException $e) {
            return response()->json([
                'msg' => $e->getMessage(),
                'data' => []
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = User::find($id);
            return response()->json([
                'msg' => 'User',
                'data' => $user
            ], 200);
        } catch (ErrorException $e) {
            return response()->json([
                'msg' => $e->getMessage(),
                'data' => []
            ], 400);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            request()->validate(User::$rules);

            $user->update($request->all());
            return response()->json([
                'msg' => 'User updated successfully',
                'data' => $user
            ], 200);
        } catch (ErrorException $e) {
            return response()->json([
                'msg' => $e->getMessage(),
                'data' => []
            ], 400);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id)->delete();
            return response()->json([
                'msg' => 'User deleted successfully',
                'data' => $user
            ], 200);
        } catch (ErrorException $e) {
            return response()->json([
                'msg' => $e->getMessage(),
                'data' => []
            ], 400);
        }
    }
}
