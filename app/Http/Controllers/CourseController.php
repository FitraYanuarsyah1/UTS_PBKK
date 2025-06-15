<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        return Course::with(['enrollments', 'courseLecturers'])->get();
    }

    public function store(Request $request)
    {
        $course = Course::create($request->all());
        return response()->json($course, 201);
    }

    public function show($id)
    {
        return Course::with(['enrollments', 'courseLecturers'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($request->all());
        return response()->json($course);
    }

    public function destroy($id)
    {
        Course::destroy($id);
        return response()->json(null, 204);
    }
}
