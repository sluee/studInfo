<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students=[
            [
                'first_name' => 'Bruce',
                'last_name'=> 'Unabia',
                'age'   =>21,
                'dob'=>'June 20,2001',
                'email' =>'bruceunabia2000@gmail.com',
                'address' =>'Clarin, Bohol',
                'year' =>'3rd year',
                'course' =>'BSIt',
           
           'gender' => 'Male' ],
            [
                'first_name' => 'Angela',
                'last_name'=> 'Lenteria',
                'age'   =>21,
                'dob'=>'June 06,2001',
                'email' =>'angelacecilalenteria@gmail.com',
                'address' =>'Clarin, Bohol',
                'year' =>'3rd year',
                'course' =>'BSIt',
           
           'gender' => 'Male' ],
            [
                'first_name' => 'Eula',
                'last_name'=> 'Gabas',
                'age'   =>21,
                'dob'=>'June 24,2001',
                'email' =>'eulagabas28@gmail.com',
                'address' =>'Sagbayan, Bohol',
                'year' =>'3rd year',
                'course' =>'BSIt',
           
           'gender' => 'Male' ],
            [
                'first_name' => 'Eunizel',
                'last_name'=> 'gabas',
                'age'   =>21,
                'dob'=>'June 24,2001',
                'email' =>'geunizel@gmail.com',
                'address' =>'Sagbayan, Bohol',
                'year' =>'3rd year',
                'course' =>'BSIt',
           
           'gender' => 'Male' ],


        ];

        foreach($students as $student){
             Student::create([
                'last_name' => $student['last_name'],
                'first_name' => $student['first_name'],
                'dob' => $student['dob'],
                'email' => $student['email'],
                'address' => $student['address'],
                'age' => $student['age'],
                'year' =>$student['year'],
                'course' =>$student['course'],
                'gender' => 'Male'
            ]);



        }
    }
}
