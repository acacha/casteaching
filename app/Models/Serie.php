<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tests\Unit\SerieTest;

class Serie extends Model
{
    use HasFactory;

    public static function testedBy()
    {
        return SerieTest::class;
    }

    protected $guarded = [];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    // formatted_created_at accessor
    public function getFormattedCreatedAtAttribute()
    {
        if(!$this->created_at) return '';
        $locale_date = $this->created_at->locale(config('app.locale'));
        return $locale_date->day . ' de ' . $locale_date->monthName . ' de ' . $locale_date->year;
    }

    public function getFormattedForHumansCreatedAtAttribute()
    {
        return optional($this->created_at)->diffForHumans(Carbon::now());
    }

    public function getCreatedAtTimestampAttribute()
    {
        return optional($this->created_at)->timestamp;
    }
}
