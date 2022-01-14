<?php

namespace App\Http\Controllers;

use App\Events\VideoCreated;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
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

    public function store(Request $request)
    {
        $video = Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
        ]);

        session()->flash('status', 'Successfully created');

        // SEND NOTIFICATION TO ADMINS
        // Primer problema -> Codi no expressiu, caldria crear un mètode que permetes llegir el codi ->senNotificationToAdmins() -> Separació en mòduls
        // Fins i tot podriem cridar a una classe/objecte extern que s'encarregues ell d'enviar la notificació -> Tindriem dos mòduls però OCO ACOPALTS
        // Segon Problema -> La creació d'un vídeo (codi d'aquest controlador/mòdul) i l'enviament de la notificació són codis no separats en moduls
        Notification::route('mail', config('casteaching.admins'))->notify(new \App\Notifications\VideoCreated($video));


        return redirect()->route('manage.videos');

    }

    public function edit($id)
    {
        return view('videos.manage.edit',['video' => Video::findOrFail($id) ]);
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $video->title = $request->title;
        $video->description = $request->description;
        $video->url = $request->url;
        $video->save();

        session()->flash('status', 'Successfully updated');
        return redirect()->route('manage.videos');
    }

    public function destroy($id)
    {
        Video::find($id)->delete();
        session()->flash('status', 'Successfully removed');
        return redirect()->route('manage.videos');
    }
}
