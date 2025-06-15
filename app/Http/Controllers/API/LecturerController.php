<?php
namespace App\Http\Controllers\API;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LecturerController extends Controller
{
    public function index()
    {
        return Lecturer::with('courseLecturers')->get();
    }

    public function store(Request $request)
    {
        $lecturer = Lecturer::create($request->all());
        return response()->json($lecturer, 201);
    }

    public function show($id)
    {
        return Lecturer::with('courseLecturers')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $lecturer = Lecturer::findOrFail($id);
        $lecturer->update($request->all());
        return response()->json($lecturer);
    }

    public function destroy($id)
    {
        Lecturer::destroy($id);
        return response()->json(null, 204);
    }
}
