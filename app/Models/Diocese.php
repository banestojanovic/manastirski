<?php

namespace App\Models;

use App\Support\Disk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Diocese extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\DioceseFactory> */
    use HasFactory;

    /** @use HasSlug<\App\Models\Diocese> */
    use HasSlug;

    /** @use HasTranslations<\App\Models\Diocese> */
    use HasTranslations;

    /** @use InteractsWithMedia<\App\Models\Diocese> */
    use InteractsWithMedia;

    /** @use SoftDeletes<\Illuminate\Database\Eloquent\SoftDeletes> */
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'other',
    ];

    protected $casts = [
        'other' => 'array',
    ];

    public array $translatable = [
        'name',
        'description',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Media::class, 'model')->where('collection_name', Disk::DioceseImage)->orderBy('order_column');
    }

    public function parish(): HasOne
    {
        return $this->hasOne(Parish::class);
    }
}
