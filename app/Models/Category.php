<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'slug', 
        'description',
        'image',
        'meta_title',
        'meta_description',
        'parent_id',
        'sort_order',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    /**
     * Return the sluggable configuration array for this model.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Relationship: Parent category
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Relationship: Child categories
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('status', true)->orderBy('sort_order');
    }

    /**
     * Relationship: All descendants (recursive)
     */
    public function descendants()
    {
        return $this->children()->with('descendants');
    }

    /**
     * Relationship: Products in this category
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->where('status', true);
    }

    /**
     * Scope: Only active categories
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Scope: Main categories (no parent)
     */
    public function scopeMain($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Get category hierarchy breadcrumb
     */
    public function getBreadcrumbAttribute()
    {
        $breadcrumb = collect([$this]);
        $parent = $this->parent;

        while ($parent) {
            $breadcrumb->prepend($parent);
            $parent = $parent->parent;
        }

        return $breadcrumb;
    }

    /**
     * Get category image URL with default fallback
     */
    public function getImageUrlAttribute()
    {
        return $this->image 
            ? asset('storage/categories/' . $this->image)
            : asset('images/default-category.jpg');
    }
}