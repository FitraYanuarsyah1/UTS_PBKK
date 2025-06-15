<?php

namespace App\Http\Controllers\API;

use App\Models\CourseLecturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseLecturerController extends Controller
{
    public function index()
    {
        return CourseLecturer::with(['course', 'lecturer'])->get();
    }

    public function store(Request $request)
    {
        $courseLecturer = CourseLecturer::create($request->all());
        return response()->json($courseLecturer, 201);
    }

    public function show($id)
    {
        return CourseLecturer::with(['course', 'lecturer'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $courseLecturer = CourseLecturer::findOrFail($id);
        $courseLecturer->update($request->all());
        return response()->json($courseLecturer);
    }

    public function destroy($id)
    {
        CourseLecturer::destroy($id);
        return response()->json(null, 204);
    }
}
