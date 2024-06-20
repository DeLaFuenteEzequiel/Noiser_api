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
        return Rating::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $rating = Rating::findOrFail($id);
        $rating->update($request->all());

        return $rating;
    }

    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();

        return 204;
    }
}
