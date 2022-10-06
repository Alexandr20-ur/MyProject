<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


/**
 * Class Post
 * @property mixed $thumbnail
 * @package App
 * @mixin Builder
 */
class Post extends Model {
    use HasFactory, Sluggable;

    protected $fillable = ['title', 'content', 'category_id', 'description', 'thumbnail'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function rubric() {
        return $this->belongsTo(Rubric::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class)->withTimestamps();
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

    /**
     * @param Request $request
     * @return bool|string|null
     */
    public static function uploadImage(Request $request, $image = null): bool|string|null
    {
        if($request->hasFile('thumbnail')) {
            if($image) Storage::delete($image);
            $folder = date('Y-m-d');
            return $request->file('thumbnail')->store("images/$folder");
        }
        return null;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        if(!$this->thumbnail) {
            return asset('public/storage/images/istockphoto-1357365823-612x612.jpg');
        }

        return asset('public/storage/'.$this->thumbnail);
    }
}
