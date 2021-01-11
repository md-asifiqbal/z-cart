<?php

namespace App;

use App\Common\Imageable;

class Slider extends BaseModel
{
    use Imageable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sliders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'title',
                    'sub_title',
                    'title_color',
                    'sub_title_color',
                    'link',
                    'order',
                ];

    /**
     * Setters
     */
    public function setOrderAttribute($value)
    {
        $this->attributes['order'] = $value ?: 100;
    }

    /**
     * Return the bannerbg related to the banner bg img
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function mobile()
    {
        return $this->morphOne(\App\Image::class, 'imageable')->where('featured', '!=', 1);
    }

    /**
     * Scope a query to only include mobile slider.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMobile($query)
    {
        return $query->where('featured', '!=', 1);
    }

    // public function setOptionsAttribute($value)
    // {
    //     $this->attributes['options'] = serialize($value);
    // }

    // /**
    //  * Getters
    //  */
    // public function getOptionsAttribute($value)
    // {
    //     return unserialize($value);
    // }
}
