<?php

namespace App\Http\Controllers;

use App\Models\Dormitory;
use App\Models\Student;
use App\Models\StudentScholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = Student::$defaultFilters;

        if (\count($request->query()) > 0) {
            $filters = $request->query();
        }

        return view('admin.students.list', [
            'students' => Student::getByParams($filters),
            'dormitories' => Dormitory::all(),
            'fieldsToSort' => Student::$fieldsToSort,
            'filters' => $filters,
        ]);
    }

    public function view(int $id)
    {
        return view('admin.students.view', ["student" => Student::find($id)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.students.add', ['dormitories' => Dormitory::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $student = new Student();
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->course = $request->input('course');
        $student->rating = $request->input('rating');
        $student->dormitory()->associate(Dormitory::find($request->input('dormitory')));
        $student->save();

        return Redirect::to('/admin/students');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('admin.students.edit', [
            'student' => Student::find($id),
            'dormitories' => Dormitory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student): RedirectResponse
    {
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->course = $request->input('course');
        $student->rating = $request->input('rating');
        $student->dormitory()->associate(Dormitory::find($request->input('dormitory')));
        $student->save();

        return Redirect::to('/admin/students');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        Student::destroy($id);

        return Redirect::to('/admin/students');
    }

    public function scholarshipPayment(int $id)
    {
        return view('admin.students.scholarship_payment', ['student' => Student::find($id)]);
    }

    public function payScholarship(Request $request, int $studentId): RedirectResponse
    {
        $scholarship = new StudentScholarship();
        $scholarship->amount = $request->input('amount');
        $scholarship->student()->associate(Student::find($studentId));
        $scholarship->save();

        return Redirect::to('/admin/students');
    }
}
