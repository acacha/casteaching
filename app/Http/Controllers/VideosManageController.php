<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Tests\Feature\Videos\VideosManageControllerTest;

class VideosManageController extends Controller
{
    public static function testedBy()
    {
        return VideosManageControllerTest::class;
    }

    public function index()
    {
        return view('videos.manage.index',[
            'videos' => Video::all()
        ]);
    }

//    public function create()
//    {
//        //
//    }

    public function store(Request $request)
    {
        //
    }

    /** R-> NO LLISTA -> Individual ->
     */
    public function show($id)
    {
        //
    }

    /** U -> update - > Form */
    public function edit($id)
    {
        //
    }

    /** U -> update - > Processarà el Form i guardara las modificacions */
    public function update(Request $request, $id)
    {
        //
    }

    /** D -> DELETE
     */
    public function destroy($id)
    {
        //
    }
}
