<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NameResource;
use App\Models\Name;
use Illuminate\Http\Request;

class NameController extends Controller
{
   public function index()
  {
        $names = Name::all();

        return NameResource::collection($names);
    }

   public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);

        $name = Name::create($validated);

        return new NameResource($name);
    }

   public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);

        $name = Name::findOrFail($id);

        $name->update($validated);

        return new NameResource($name);
    }

    public function destroy($id)
    {
        $name = Name::findOrFail($id);

        $name->delete();

        return response()->json([
            'message' => 'Name deleted successfully'
        ]);
    }
}