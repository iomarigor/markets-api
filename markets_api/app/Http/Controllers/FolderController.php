<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use ErrorException;

/**
 * Class FolderController
 * @package App\Http\Controllers
 */
class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $folder = Folder::get();

            return response()->json([
                'msg' => 'Lista de folders',
                'data' => $folder
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
            $folder = new Folder();
            return response()->json([
                'msg' => $folder,
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

        request()->validate(Folder::$rules);
        try {
            $folder = Folder::create($request->all());
            return response()->json([
                'msg' => $folder,
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
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try {
            $folder = Folder::find($id);

            return response()->json([
                'msg' => 'Lista de folders',
                'data' => $folder
            ], 200);
        } catch (ErrorException $e) {
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
    /*  public function edit($id)
    {
        $folder = Folder::find($id);

        return view('folder.edit', compact('folder'));
    }  */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Folder $folder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Folder $folder)
    {

        try {
            request()->validate(Folder::$rules);

            $folder->update($request->all());

            return response()->json([
                'msg' => 'Folder editado',
                'data' => $request->all()
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
            $folder = Folder::find($id)->delete();

            return response()->json([
                'msg' => 'Folder eliminado',
                'data' => $folder
            ], 200);
        } catch (ErrorException $e) {
            return response()->json([
                'msg' => $e->getMessage(),
                'data' => []
            ], 400);
        }
    }
}
