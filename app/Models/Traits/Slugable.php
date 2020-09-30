<?php


namespace App\Models\Traits;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait Slugable
{
    public static function bootSlugable()
    {
        static::creating(function (Model $item) {
            $item->slug = self::generateSlug();
        });
    }

    public static function generateSlug()
    {
        return Str::slug(bcrypt(Str::uuid()));
    }
}
