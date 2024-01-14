<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type_menu  = 'subjects';
        $keyword    = $request->input('title');
        $subjects      = Subject::when($request->title, function ($query, $title) {
            $query->where('title', 'like', '%' . $title . '%');
        })->orderBy('id', 'DESC')->paginate(10);

        $subjects->appends(['title' => $keyword]);

        return view('pages.subject.index', compact(
            'type_menu',
            'subjects'
        ));
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
