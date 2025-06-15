<?php

namespace App\Http\Controllers\API;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnrollmentController extends Controller
{
    public function index()
    {
        return Enrollment::with(['student', 'course'])->get();
    }

    public function store(Request $request)
    {
        $enrollment = Enrollment::create($request->all());
        return response()->json($enrollment, 201);
    }

    public function show($id)
    {
        return Enrollment::with(['student', 'course'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update($request->all());
        return response()->json($enrollment);
    }

    public function destroy($id)
    {
        Enrollment::destroy($id);
        return response()->json(null, 204);
    }
}
