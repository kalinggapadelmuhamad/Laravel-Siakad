<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type_menu  = 'schedules';
        $keyword    = $request->input('schedules');
        $schedules = Schedule::when($request->schedules, function ($query) use ($request) {
            $query->whereHas('subject', function ($subquery) use ($request) {
                $subquery->where('title', 'like', '%' . $request->schedules . '%');
            });
        })->orderBy('id', 'DESC')->paginate(10);


        $schedules->appends(['schedules' => $keyword]);

        return view('pages.schedule.index', compact(
            'type_menu',
            'schedules'
        ));
    }

    public function generateQrCode(Schedule $Schedule)
    {
        $type_menu  = 'schedules';
        return view('pages.schedule.input-qrcode', compact(
            'type_menu',
            'Schedule'
        ));
    }

    public function generateQrCodeUpdate(Request $request, Schedule $Schedule)
    {
        $type_menu  = 'schedules';

        $request->validate([
            'code' => 'required',
        ]);

        //update kode_absensi with code from input to schedule
        $Schedule->update([
            'kode_absensi' => $request->code,
        ]);
        $code = $request->code;

        return view('pages.schedule.show-qrcode', compact('code', 'type_menu',))->with('success', 'Code updated successfully.');
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
