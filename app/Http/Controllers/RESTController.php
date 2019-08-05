<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class RESTController extends Controller
{
    /**
     * Index function for general listing.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $notes = Note::all();

        return response()->json($notes);
    }


    /**
     * Store-Action
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $note = Note::create($request->all());

        return response()->json($note);
    }


    /**
     * Show-Action
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, $id)
    {
        $note = Note::find($id);

        return response()->json($note);
    }


    /**
     * Update-Action
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->update($request->all());

        return response()->json($note);


    }


    /**
     * Destroy-Action
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $id)
    {
        Note::find($id)->delete();

        return response()->json([], 204);
    }
}