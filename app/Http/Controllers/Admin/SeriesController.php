<?php

namespace App\Http\Controllers\Admin;

use App\Series;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSeriesRequest;
use App\Http\Requests\UpdateSeriesRequest;

class SeriesController extends Controller
{

    public function index()
    {
        return view('admin.series.all')->withSeries(Series::all());
    }


    public function create()
    {
        return view('admin.series.create');
    }


    public function store(CreateSeriesRequest $request)
    {
        return $request->uploadSeriesImage()
                ->storeSeries();
    }


    public function show(Series $series)
    {
        return view('admin.series.index')
                ->withSeries($series);
    }


    public function edit(Series $series)
    {
        return view('admin.series.edit')->withSeries($series);
    }


    public function update(UpdateSeriesRequest $request, Series $series)
    {
        $request->updateSeries($series);

        session()->flash('success', 'Successfully updated series');
        return redirect()->route('series.index');
    }


    public function destroy($id)
    {
        //
    }
}
