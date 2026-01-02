<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'parent_id',
        'title',
        'subtitle',
        'description',
        'image',
        'slug',
        'user_id',
    ];

    protected static function booted()
    {
        parent::boot();

        static::creating(function ($model) {
            if (Auth::check()) {
                $model->user_id = Auth::id();
            }
        });

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title, '-');
            $count = static::where('slug', 'like', "{$model->slug}%")->count();
            if ($count > 0) {
                $model->slug .= '-' . ($count + 1);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

//    public function file()
//    {
//        return $this->belongsTo(File::class, 'image');
//    }

    public function file()
    {
        return $this->hasOne(File::class, 'id', 'image');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public static function getDropdownList($id = null, $onlyParents = false, $slug = null)
    {
        if ($id) {
            return static::where('parent_id', $id)->pluck('title', 'id')->toArray();
        } elseif ($onlyParents) {
            return static::where('parent_id', null)->pluck('title', 'id')->toArray();
        } elseif ($slug) {
            $category = static::whereNull('parent_id')->where('slug', $slug)->all();
            if ($category) {
                return [$category->id => $category->title ?? null];
            }
            return [];
        }

        return static::all()->pluck('title', 'id')->toArray();
    }

    public static function getSubCategoryDropdownList($cat_id)
    {
        return static::where('parent_id', $cat_id)
            ->get(['id', 'title as title'])
            ->toArray();
    }
}
