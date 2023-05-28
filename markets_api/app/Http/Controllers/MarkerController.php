<?php

namespace App\Http\Controllers;
use App\Models\Marker;
use Illuminate\Http\Request;
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
        $markers = Marker::get();

        /*return view('marker.index', compact('markers'))
            ->with('i', (request()->input('page', 1) - 1) * $markers->perPage());*/
        return json_encode($markers);
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
        try{
        $marker = Marker::find($id);
        return response()->json([
            'mkr' => 'lista de marcadores',
            'data' => $marker
            ],250);
            }catch(\Exception $e){
                return response()->json([
                    'mkr' => $e->getMessage(),
                    'data' => []
                ],450);
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
        $marker = Marker::find($id);
        return response()->json([
            'mkr' => 'marcador editado',
            'data' => $marker
            ],250);
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
        try{
        request()->validate(Marker::$rules);
        $marker->update($request->all());
        return response()->json([
            'mkr' => 'marcador actualizado',
            'data' => $request ->all ()
            ],250);
            } catch(\Exception $e){
            return response()->json([
                'mkr' => $e->getMessage(),
                'data' => []
            ],450);
            }  
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {   
        try{
        $marker = Marker::find($id)->delete();

        return response()->json([
            'mkr' => 'marcador eliminado con exito',
            'data' => $marker
            ],250);
        }catch(\Exception $e){
            return response()->json([
                'mkr' => $e->getMessage(),
                'data' => []
            ],450);
            }  
    }
}
