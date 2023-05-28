<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use Illuminate\Http\Request;
use ErrorException;

/**
 * Class MarkerController
 * @package App\Http\Controllers
 */
class MarkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $markers = Marker::get();

            return response()->json([
                'msg' => 'Lista de marcadores',
                'data' => $markers
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
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Marker::$rules);
        try {
            $marker = Marker::create($request->all());
            return response()->json([
                'msg' => $marker,
                'data' => []
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'msg' => $e->getMessage(),
                'data' => []
            ], 400);
        }
    }
    public function show($id)
    {
        try {
            $marker = Marker::find($id);
            return response()->json([
                'msg' => 'lista de marcadores',
                'data' => $marker
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'msg' => $e->getMessage(),
                'data' => []
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $marker = Marker::find($id);
            return response()->json([
                'msg' => 'marcador editado',
                'data' => $marker
            ], 200);
        } catch (\Exception $e) {
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
     * @param  Marker $marker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marker $marker)
    {
        try {
            request()->validate(Marker::$rules);
            $marker->update($request->all());
            return response()->json([
                'msg' => 'marcador actualizado',
                'data' => $request->all()
            ], 200);
        } catch (\Exception $e) {
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
            $marker = Marker::find($id)->delete();

            return response()->json([
                'msg' => 'marcador eliminado con exito',
                'data' => $marker
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'msg' => $e->getMessage(),
                'data' => []
            ], 400);
        }
    }
}
