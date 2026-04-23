<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Student;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return response()->json($courses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'duration' => 'nullable|integer',
        ]);

        $course = Course::create($validatedData);

        return response()->json($course, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return response()->json($course->load('students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'duration' => 'nullable|integer',
        ]);

        $course->update($validatedData);

        return response()->json($course);   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(null, 204);
    }
    public function addStudents(Request $request, Course $course)
    {
        //Log::debug('Adding students to course 2', ['course_id' => $course->id, 'request_data' => $request->all()]);

        $validatedData = $request->validate([
            'student_ids' => 'required|array',
            'student_ids.*' => 'integer|exists:students,id',
        ]);

        $course->students()->syncWithoutDetaching($validatedData['student_ids']);

        return response()->json(
            [
                'message' => 'Students added to course successfully.',
                'course' => $course->load('students')
            ]
        );
    }
    public function removeStudent(Course $course, Student $student)
    {
        //Log::debug('Removing student from course', ['course_id' => $course->id, 'student_id' => $student->id]);
        $course->students()->detach($student->id);
        return response()->json(
            [
                'message' => 'Student removed from course successfully.',
                'course' => $course->load('students')
            ]
        );
    }
}

//durante la lettura del corso (show) restituire anche gli studenti iscritti al corso