<?php

namespace App\Models;

use App\CommunityType;
use App\Support\Disk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Community extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\CommunityFactory> */
    use HasFactory;

    /** @use SoftDeletes<\Illuminate\Database\Eloquent\SoftDeletes> */
    use SoftDeletes;

    /** @use HasSlug<\App\Models\Community> */
    use HasSlug;

    /** @use HasTranslations<\App\Models\Community> */
    use HasTranslations;

    /** @use InteractsWithMedia<\App\Models\Community> */
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'user_id',
        'parish_id',
        'description',
        'other',
    ];

    protected $casts = [
        'type' => CommunityType::class,
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
        return $this->morphOne(Media::class, 'model')->where('collection_name', Disk::CommunityImage)->orderBy('order_column');
    }

    public function parish(): BelongsTo
    {
        return $this->belongsTo(Parish::class);
    }
}
