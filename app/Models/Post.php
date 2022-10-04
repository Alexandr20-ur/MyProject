<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;


/**
 * Class Post
 * @package App
 * @mixin Builder
 */
class Post extends Model {
    use HasFactory, Sluggable;

    protected $fillable = ['title', 'content', 'rubric_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function rubric() {
        return $this->belongsTo(Rubric::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function getPostDate() {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function setTitleAttribute($value) {
        $this->attributes['title'] = Str::title($value);
    }

    public function getTitleAttribute($value) {
        return Str::upper($value);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
