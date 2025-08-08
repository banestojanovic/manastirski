<?php

namespace App\Models;

use App\Support\Disk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Parish extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\ParishFactory> */
    use HasFactory;

    /** @use HasSlug<\App\Models\Parish> */
    use HasSlug;

    /** @use HasTranslations<\App\Models\Parish> */
    use HasTranslations;

    /** @use InteractsWithMedia<\App\Models\Parish> */
    use InteractsWithMedia;

    /** @use SoftDeletes<\Illuminate\Database\Eloquent\SoftDeletes> */
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'diocese_id',
        'description',
        'other',
    ];

    protected $casts = [
        'other' => 'array',
    ];

    protected array $translatable = [
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
        return $this->morphOne(Media::class, 'model')->where('collection_name', Disk::ParishImage)->orderBy('order_column');
    }

    public function diocese(): BelongsTo
    {
        return $this->belongsTo(Diocese::class);
    }

    public function community(): HasOne
    {
        return $this->hasOne(Community::class);
    }
}
