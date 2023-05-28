<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

/**
 * Class ProfileController
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{

    public function index()
    {
        $profiles = Profile::get();

        return json_encode($profiles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Profile::$rules);

        try{
            $profile = Profile::create($request->all());
            return response()->json([
                'msg' => $profile,
                'data' =>[]
            ],200);

        }catch(ErrorException $e){
            return response()->json([
                'msg' => $e->getMessage(),
                'data' =>[]
            ],400);
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
        try{
        $profile = Profile::find($id);
        return response()->json([
            'msg' => 'Lista de perfiles',
            'data' => $profile
        ],200);
        }catch(ErrorException $e){
            return response()->json([
                'msg' => $e->getMessage(),
                'data' =>[]
            ],400);
        }
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        request()->validate(Profile::$rules);

        $profile->update($request->all());
        try{
        return response()->json([
            'msg' => 'Perfil editado',
            'data' => request()->all
        ],200);
        }catch(ErrorException $e){
            return response()->json([
                'msg' => $e->getMessage(),
                'data' =>[]
            ],400);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $profile = Profile::find($id)->delete();
        try{
            return response()->json([
                'msg' => 'Perfil elimninado',
                'data' => $profile
            ],200);
        }catch(ErrorException $e){
            return response()->json([
                'msg' => $e->getMessage(),
                'data' =>[]
            ],400);
        }
    }
}
