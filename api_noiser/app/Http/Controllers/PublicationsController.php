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
        return Publication::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $publication = Publication::findOrFail($id);
        $publication->update($request->all());

        return $publication;
    }

    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);
        $publication->delete();

        return 204;
    }
}
