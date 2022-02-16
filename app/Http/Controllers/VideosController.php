<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Tests\Feature\Videos\VideoTest;

class VideosController extends Controller
{

    public static function testedBy()
    {
        return VideoTest::class;
    }

    public function show($id)
    {

        $video = Video::findOrFail($id);
        if ($video->published_at === null) {
            if (!optional(Auth::user())->can('videos_manage_show')) {
                if ($video->user_id === null){
                    abort(404);
                }
                if (!($video->user_id == optional(Auth::user())->id)) {
                    abort (404);
                }
            }
        }

////        dd($video->serie?->videos);//
////        dd(collect(null));
////        dd($video->serie?->videos);
////        dd((array)$video->serie?->videos);
//        dd($video->serie?->videos->toArray());
//        dd($p);
//        dd(collect(null));


        return view(count($videos_series = collect($video->serie?->videos)) > 0 ? 'videos.show' : 'videos.show_without_series_navigation',[
            'video' => $video,
            'videos_series' => $videos_series
        ]);
    }
}
