<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Tests\Feature\Series\SeriesApiTest;

class SeriesApiController extends Controller
{
    public static function testedBy()
    {
        return SeriesApiTest::class;
    }

    public function index()
    {
        return Serie::all();
        //return Serie::with('videos')->get();
    }

    public function store(Request $request)
    {
        // TODO
    }

    public function show($id)
    {
        return Serie::findOrFail($id);
//        return Serie::with('videos')->findOrFail($id);

    }

    public function update(Request $request, $id)
    {
        // TODO
    }

    public function destroy($id)
    {
//        TODO
    }
}
