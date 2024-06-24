<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationsController extends Controller
{
    public function index()
    {
        return Publication::all();
    }

    public function show($id)
    {
        return Publication::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required|exists:users,id',
            'media' => 'nullable',
        ]);

        return Publication::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required|exists:users,id',
            'media' => 'nullable',
        ]);

        $publication = Publication::findOrFail($id);
        $publication->update($validatedData);

        return $publication;
    }

    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);
        $publication->delete();

        return response()->json(null, 204);
    }
}
