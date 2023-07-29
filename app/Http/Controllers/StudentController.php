<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Student/Index',[
            'students' =>Student::orderBy('last_name', 'asc')->get()
        ]);
    }


    public function search($searchKey){
        return inertia('Student/Index', [
            'students' => Student::where('last_name', 'like' , "%$searchKey%")->orWhere('first_name', 'like' , "%$searchKey%")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Student/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'age' => 'required|numeric',
            'dob' => 'required',
            'address' => 'required',
            'course' => 'required',
            'year' => 'required',
            'email'=> 'required',
            'gender' => 'required'
            
        ]);

        $fileName = null;

        //process image
        if($request->pic){
            $fileName = time().'.'.$request->pic->extension();
            $request->pic->move(public_path('images/students_pics'), $fileName);
            $fields['pic'] = $fileName;
        }

        Student::create($fields);

        return redirect('/students')->banner( 'Student Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return inertia('Student/Show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return inertia('Student/Edit', [
            'student'=>$student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $fields = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'age' => 'required|numeric',
            'dob' => 'required',
            'address' => 'required',
            'course' => 'required',
            'year' => 'required',
            'email'=> 'required'


        ]);

        $student->update($fields);
        return redirect('/students/' . $student->id)->banner( 'Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('/students')->dangerBanner('Student successfully deleted');
    }

    public function toggle(Student $student){
        $student->active = !$student->active;
        $student->save();

        return back()->banner('Toggle Enable');
    }

    public function email(Student $student){
      
        $pdf = Pdf::loadView('pdf.studentInfo',[
            'student'=>$student,

        ]);

        $filename='stud/' .$student->name . ".pdf";
        $pdf->save($filename);

        Mail::send('emails.stud' ,['student'=>$student], function($message) use ($student, $filename){
            $message->to($student->email);
            $message->subject('Student Info');
            $message->attach($filename);
        });

        return back()->banner('Email has been sent successfully!');


    }
}
