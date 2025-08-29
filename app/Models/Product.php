<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'sku',
        'price',
        'compare_price',
        'quantity',
        'weight',
        'dimensions',
        'main_image',
        'gallery_images',
        'meta_title',
        'meta_description',
        'specifications',
        'track_quantity',
        'continue_selling_when_out_of_stock',
        'featured',
        'status',
        'published_at'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'compare_price' => 'decimal:2',
        'weight' => 'decimal:2',
        'gallery_images' => 'array',
        'specifications' => 'array',
        'track_quantity' => 'boolean',
        'continue_selling_when_out_of_stock' => 'boolean',
        'featured' => 'boolean',
        'status' => 'boolean',
        'published_at' => 'datetime'
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
     * Relationship: Categories this product belongs to
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get primary category (first category)
     */
    public function primaryCategory()
    {
        return $this->categories()->first();
    }

    /**
     * Scope: Only active products
     */
    public function scopeActive($query)
    {
        return $query->where('status', true)
                    ->where(function($q) {
                        $q->whereNull('published_at')
                          ->orWhere('published_at', '<=', now());
                    });
    }

    /**
     * Scope: Featured products
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Scope: In stock products
     */
    public function scopeInStock($query)
    {
        return $query->where(function($q) {
            $q->where('track_quantity', false)
              ->orWhere('quantity', '>', 0)
              ->orWhere('continue_selling_when_out_of_stock', true);
        });
    }

    /**
     * Check if product is in stock
     */
    public function getInStockAttribute()
    {
        if (!$this->track_quantity) {
            return true;
        }

        return $this->quantity > 0 || $this->continue_selling_when_out_of_stock;
    }

    /**
     * Get main image URL with fallback
     */
    public function getMainImageUrlAttribute()
    {
        return $this->main_image 
            ? asset('storage/products/' . $this->main_image)
            : asset('images/default-product.jpg');
    }

    /**
     * Get all gallery images URLs
     */
    public function getGalleryImageUrlsAttribute()
    {
        if (!$this->gallery_images) {
            return [];
        }

        return collect($this->gallery_images)->map(function($image) {
            return asset('storage/products/' . $image);
        })->toArray();
    }

    /**
     * Get discount percentage
     */
    public function getDiscountPercentageAttribute()
    {
        if (!$this->compare_price || $this->compare_price <= $this->price) {
            return 0;
        }

        return round((($this->compare_price - $this->price) / $this->compare_price) * 100);
    }

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute()
    {
        return '₹' . number_format($this->price, 2);
    }

    /**
     * Get formatted compare price
     */
    public function getFormattedComparePriceAttribute()
    {
        return $this->compare_price ? '₹' . number_format($this->compare_price, 2) : null;
    }
}