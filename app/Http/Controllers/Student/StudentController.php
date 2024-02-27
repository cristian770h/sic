<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\students;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class StudentController extends Controller
{

    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $alumno = students::all();
        $this->middleware('auth')->only(['index','create','update']);
        return view('students.index',[ 'alumno'=> $alumno]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_student' => 'required|unique:students|max:10|min:6',
            'name_student' => 'required|max:20|min:3|alpha|regex:/^[\pL\s\-]+$/u',
            'last_name_student' => 'required|max:50|min:3|regex:/^[\pL\s\-]+$/u',
            'birthday' => 'required|date|before:today|after:01/01/1900',
            'descripcion' => 'required|max:50|min:3|regex:/^[\pL\s\-]+$/u',
        ]);
        $alumno = new students();
        $alumno->id_student = $request->input('id_student');
        $alumno->name_student = $request->input('name_student');
        $alumno->last_name_student = $request->input('last_name_student');
        $alumno->birthday = $request->input('birthday');
        $alumno->descripcion = $request->input('descripcion');
        $alumno->save();
        return alert('success ¡Estudiante registrado con éxito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $alumno = students::find($id);
        return view('students.edit', ['alumno' => $alumno]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_student' => 'required|max:10|min:6|unique:students,id_student,'.$id.'',
            'name_student' => 'required|max:20|min:3|alpha|regex:/^[\pL\s\-]+$/u',
            'last_name_student' => 'required|max:50|min:3|regex:/^[\pL\s\-]+$/u',
            'birthday' => 'required|date|before:today|after:01/01/1900',
            'descripcion' => 'required|max:50|min:3|regex:/^[\pL\s\-]+$/u',
        ]);
        $alumno = students::find($id);
        $alumno->id_student = $request->input('id_student');
        $alumno->name_student = $request->input('name_student');
        $alumno->last_name_student = $request->input('last_name_student');
        $alumno->birthday = $request->input('birthday');
        $alumno->descripcion = $request->input('descripcion');
        $alumno->save();
        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alumno = students::find($id);
        $alumno->delete();
        return redirect(   '/alumno');
    }
}
