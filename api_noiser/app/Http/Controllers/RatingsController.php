<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    public function index()
    {
        return Rating::all();
    }

    public function show($id)
    {
        return Rating::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'publication_id' => 'required|exists:publications,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        return Rating::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'publication_id' => 'sometimes|required|exists:publications,id',
            'rating' => 'sometimes|required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $rating = Rating::findOrFail($id);
        $rating->update($validatedData);

        return $rating;
    }

    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();

        return response()->json(null, 204);
    }
}
