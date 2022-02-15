<?php

namespace App\Jobs;

use App\Models\Serie;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Tests\Unit\Jobs\ProcessSeriesImageTest;

class ProcessSeriesImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Serie $serie;

    public static function testedBy()
    {
        return ProcessSeriesImageTest::class;
    }

    /**
     * @param Serie $serie
     */
    public function __construct(Serie $serie)
    {
        $this->serie = $serie;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $imageContents = Storage::disk('public')->get($this->serie->image);
        $image = Image::make($imageContents);
        $image->resize(null,400,function ($constraint) {
            $constraint->aspectRatio();
        })->limitColors(255)->encode();
        Storage::disk('public')->put($this->serie->image, (string) $image);
    }
}
