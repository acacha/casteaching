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
        $this->extracted($video);
        return view('videos.show',[
            'video' => $video
        ]);
    }

    /**
     * @param $video
     */
    public function extracted($video): void
    {
//        if($video->isNotPublished) return;
//        if($video->published_at !== null) {
//            return;
//        }
        if($video->published) return;

        IF()

        if (!optional(Auth::user())->can('videos_manage_show')) {
            if ($video->user_id === null) {
                abort(404);
            }
            if (!($video->user_id == optional(Auth::user())->id)) {
                abort(404);
            }
        }
    }
}
