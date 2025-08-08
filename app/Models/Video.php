<?php

namespace App\Models;

use App\VideoProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Video extends Model
{
    /** @use HasFactory<\Database\Factories\VideoFactory> */
    use HasFactory;

    /** @use SoftDeletes<\Illuminate\Database\Eloquent\SoftDeletes> */
    use SoftDeletes;

    /** @use HasSlug<\Spatie\Sluggable\HasSlug> */
    use HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'community_id',
        'provider',
        'url',
        'thumbnail_url',
        'description',
        'other',
    ];

    protected $casts = [
        'provider' => VideoProvider::class,
        'other' => 'array',
    ];


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }


    public function community(): BelongsTo
    {
        return $this->belongsTo(Community::class);
    }
}
