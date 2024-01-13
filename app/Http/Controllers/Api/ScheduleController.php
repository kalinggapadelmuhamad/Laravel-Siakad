<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $schedule = Schedule::with(['subject', 'subject.lecture', 'student'])->where('student_id', $user->id)->get();
        return response()->json([
            'data' => $schedule
        ]);

        // $customScheduleData = $schedule->map(function ($item) {
        //     return [
        //         'schedule_id' => $item->id,
        //         'subject_id' => $item->subject->id,
        //         'subject_title' => $item->subject->title,
        //         'lecture_name' => $item->subject->lecture->name,
        //         'lecture_email' => $item->subject->lecture->email,
        //         'student_name' => $item->student->name,
        //         'student_email' => $item->student->email,
        //         'schedule_time' => $item->schedule_time,
        //         'schedule_type' => $item->schedule_type,
        //         // Tambahkan kolom-kolom lain yang Anda perlukan
        //     ];
        // });

        // return response()->json([
        //     'data' => $customScheduleData
        // ]);
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
