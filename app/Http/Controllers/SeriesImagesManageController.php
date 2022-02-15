<?php

namespace App\Http\Controllers;

use App\Events\SeriesImageUpdated;
use App\Models\Serie;
use Illuminate\Http\Request;
use Tests\Feature\Series\SeriesImagesManageControllerTest;

class SeriesImagesManageController extends Controller
{
    public static function testedBy()
    {
        return SeriesImagesManageControllerTest::class;
    }

    public function update(Request $request)
    {

        $request->validate([
//            'image' => ['image',Rule::dimensions()->minHeight(400)->ratio(1.777777778)],
            'image' => ['image','dimensions:min_height=400,ratio=16/9'],
        ]);
        $serie = Serie::findOrFail($request->id);
        $serie->image = $request->file('image')->store('series','public');
        $serie->save();
        session()->flash('status', __('Successfully updated'));

        SeriesImageUpdated::dispatch($serie);

        return back()->withInput();
    }
}
