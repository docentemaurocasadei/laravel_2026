<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
class StudentController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum')->except(['index', 'show']);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Student::where('id',1)->with(['votes'])->get()   // estrarre lo studente con id 1 e tutte le sue votazioni
        //$students = DB::table('students')->get();
        $students = Student::all();
        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:20',
            'surname' => 'required|string|max:20',
            'mobile' => 'nullable|string|max:20',
            'email' => 'nullable|string|max:150',
            'birth_date' => 'nullable|date',
        ]);

        //$result = DB::table('students')->insert($validatedData);
        //$student = DB::table('students')->where('id', DB::getPdo()->lastInsertId())->firstOrFail();   
        $student = Student::create($validatedData);
        return response()->json($student, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$student = DB::table('students')->where('id', $id)->firstOrFail();
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:20',
            'surname' => 'required|string|max:20',
            'mobile' => 'nullable|string|max:20',
            'email' => 'nullable|string|max:150',
            'birth_date' => 'nullable|date',
        ]);

        // DB::table('students')->where('id', $id)->update($validatedData);
        // $student = DB::table('students')->where('id', $id)->firstOrFail();
        $student = Student::findOrFail($id);
        $student->update($validatedData);
        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $student = DB::table('students')->where('id', $id)->firstOrFail();
        // DB::table('students')->where('id', $id)->delete();
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json($student);
    }
}
