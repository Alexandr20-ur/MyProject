<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


/**
 * Class Post
 * @package App
 * @mixin Builder
 */
class Post extends Model {

    // protected $table = 'posts'; //Указание таблицы
    // protected $primaryKey = 'post_id'; //Указание первичного ключа
    // public $incrementing = false; //не инкриментируемое поле
    // protected $keyType = 'string' // будем отслеживать что ключ -строка

    // public $timestamps = false; //Ларавель не будет следить за заполнением этих полей
    // protected $attributes = [
    //     'content' => 'Lorem ipsum...'
    // ]; //Значение по умолчанию

    protected $fillable = ['title', 'content', 'rubric_id'];

    public function rubric() {
        return $this->belongsTo(Rubric::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function getPostDate() {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}