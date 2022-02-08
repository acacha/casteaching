<?php

namespace App\Http\Controllers;

use App\Events\SerieCreated;
use App\Models\Serie;
use Illuminate\Http\Request;
use Tests\Feature\Series\SeriesManageControllerTest;

class SeriesManageController extends Controller
{
    public static function testedBy()
    {
        return SeriesManageControllerTest::class;
    }

    public function index()
    {
        return view('series.manage.index',[
            'series' => Serie::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $serie = Serie::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'teacher_name' => $request->teacher_name
        ]);

        session()->flash('status', 'Successfully created');

        // DISPARAR UN EVENT
        SerieCreated::dispatch($serie);

        return redirect()->route('manage.series');

    }

    public function edit($id)
    {
        return view('series.manage.edit',['serie' => Serie::findOrFail($id) ]);
    }

    public function update(Request $request, $id)
    {
        $serie = Serie::findOrFail($id);
        $serie->title = $request->title;
        $serie->description = $request->description;
        $serie->image = $request->image;
        $serie->save();

        session()->flash('status', 'Successfully updated');
        return redirect()->route('manage.series');
    }

    public function destroy($id)
    {
        Serie::find($id)->delete();
        session()->flash('status', 'Successfully removed');
        return redirect()->route('manage.series');
    }
}
