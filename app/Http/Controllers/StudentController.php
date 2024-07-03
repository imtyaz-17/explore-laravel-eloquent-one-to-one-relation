<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Contact;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::with('getContact')->get();
        $student = Student::with('getContact')->find(2);
        $f_student = Student::with('getContact')->where('gender', 'F')->get();

        //Search in Secondary Table
        $city_students = Student::withWhereHas('getContact', function ($query) {
            $query->where('city', 'Brockway');
        })->get();

        //Search in Primary Table
        $f_city_student = Student::where('gender', 'F')
            ->WhereHas('getContact', function ($query) {
                $query->where('city', 'Brockway');
            })->get();



        // return $student;
        // return $student->getContact->email;

        return $students;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $student = Student::create([
            'name' => 'Ahmed',
            'class' => 16,
            'gender' => 'M'
        ]);
        $student->getContact()->create([
            'email' => 'a@example.com',
            'phone' => '111111111',
            'address' => 'Gulshan',
            'city' => 'Dhaka'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
