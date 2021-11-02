<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function show($id)
    {
//        dd($id);
//        return 'Ubuntu 101 | Here description | December 13';
//    dd($video->title);
//    $video = new stdClass();
//    $video->title = 'Ubuntu 101';
//    $video->description = 'Here description';
//    $video->published_at = 'December 13';

        return view('videos.show',[
            'video' => Video::find($id)
        ]); // CRUD -> RETRIEVE -> només un video
    }
}
