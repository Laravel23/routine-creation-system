<?php

namespace App\Http\Controllers;

use App\Models\SeniorTeacher;
use App\Models\Teacher;
use App\Models\Slot;
use App\Models\Day;
use Illuminate\Http\Request;

class SeniorTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        $slots = Slot::all();
        $days = Day::all();
        return view('_seniorTeacher', compact('teachers', 'slots', 'days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeniorTeacher  $seniorTeacher
     * @return \Illuminate\Http\Response
     */
    public function show(SeniorTeacher $seniorTeacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SeniorTeacher  $seniorTeacher
     * @return \Illuminate\Http\Response
     */
    public function edit(SeniorTeacher $seniorTeacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SeniorTeacher  $seniorTeacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeniorTeacher $seniorTeacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeniorTeacher  $seniorTeacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeniorTeacher $seniorTeacher)
    {
        //
    }
}
