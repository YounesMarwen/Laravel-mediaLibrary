<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\Models\Media;

class Medialibrary extends Model implements HasMedia
{
    //
    use HasMediaTrait;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'medialibrary';

    public function registerMediaCollections()
    {
        $this->addMediaCollection('media')

            ->singleFile()

            ->registerMediaConversions(function (Media $media) {

                $this
                    ->addMediaConversion('card')

                    ->width(237)

                    ->height(160) ;
                $this
                    ->addMediaConversion('thumb')

                    ->width(100)

                    ->height(100) ;

            }) ;
    }
}
