<?php

namespace App\Http\Controllers\Admin;

use App\Series;
use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLessonRequest;
use App\Http\Requests\CreateLessonRequest;

class LessonsController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Series $series, CreateLessonRequest $request)
    {
        return $series->lessons()->create($request->all());
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Series $series, Lesson $lesson, UpdateLessonRequest $request)
    {
        $lesson->update($request->all());

        return $lesson->fresh();
    }


    public function destroy(Series $series, Lesson $lesson)
    {
        $lesson->delete();

        return response()->json(['status' => 'ok'], 200);
    }
}
