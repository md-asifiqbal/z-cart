<?php

namespace App\Common;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Attach this Trait to a User (or other model) for easier read/writes on Replies
 *
 * @author Munna Khan
 */
trait Imageable {

	/**
	 * Check if model has an images.
	 *
	 * @return bool
	 */
	public function hasImages()
	{
		return (bool) $this->images()->count();
	}

	/**
	 * Return collection of images related to the imageable
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function images()
    {
        return $this->morphMany(\App\Image::class, 'imageable')
        ->where(function($q){
        	$q->whereNull('featured')->orWhere('featured', 0);
        })->orderBy('order', 'asc');
    }

	/**
	 * Return the image related to the imageable
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function image()
    {
        return $this->morphOne(\App\Image::class, 'imageable')->orderBy('order', 'asc');
    }

	/**
	 * Return the logo related to the logoable
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function logo()
    {
        return $this->morphOne(\App\Image::class, 'imageable')->where('featured','!=',1);
    }

	/**
	 * Return the bannerbg related to the banner bg img
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function bannerbg()
    {
        return $this->morphOne(\App\Image::class, 'imageable')->where('featured','!=',1);
    }

	/**
	 * Return the featured Image related to the imageable
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function featuredImage()
    {
        return $this->morphOne(\App\Image::class, 'imageable')->where('featured',1);
    }

	/**
     * Save images
     *
     * @param  file  $image
     *
     * @return image model
	 */
	public function saveImage($image, $featured = null)
	{
		$dir = image_storage_dir();

		// if(!Storage::exists($dir))
		// 	Storage::makeDirectory($dir, 0775, true, true);

        $path = Storage::put($dir, $image);

        return $this->createImage($path, $image->getClientOriginalName(), $image->getClientOriginalExtension(), $image->getClientSize(), $featured);
	}

	/**
     * Save images from external URL
     *
     * @param  file  $image
     *
     * @return image model
	 */
	public function saveImageFromUrl($url, $featured = null)
	{
		// Get file info and validate
    	$file_headers = get_headers($url, TRUE);
    	$pathinfo = pathinfo($url);
    	// $size = getimagesize($url);

		if ($file_headers === false) return; // when server not found

    	// Get file extension
    	$extension = isset($pathinfo['extension']) ? $pathinfo['extension'] : substr($url, strrpos($url, '.', -1) + 1);

    	// Check if the file is a valid image file
    	if(! in_array($extension, config('image.mime_types', ['jpg','png','jpeg']))  ) return;

    	// Get file name
    	$name = isset($pathinfo['filename']) ? $pathinfo['filename'].'.'.$extension : substr($url, strrpos($url, '/', -1) + 1);

    	// Get the original file
	    $file_content = file_get_contents($url);

    	// Get file size in Bite
	    $size = isset($file_headers['Content-Length']) ? $file_headers['Content-Length'] : strlen($file_content);
		if(is_array($size)) {
    		$size = array_key_exists(1, $size) ? $size[1] : $size[0];
		}

    	// Make path and upload
		$path = image_storage_dir() . '/' . uniqid() . '.' . $extension;
    	Storage::put($path, $file_content);

        return $this->createImage($path, $name, $extension, $size, $featured);
	}

	/**
	 * Deletes the given image.
	 *
	 * @return bool
	 */
	public function deleteImage($image = Null)
	{
		if (!$image) {
			$image = $this->image;
		}

		if (optional($image)->path) {
	    	Storage::delete($image->path);
			Storage::deleteDirectory(image_cache_path($image->path));
		    return $image->delete();
		}

		return;
	}

	/**
	 * Deletes the Featured Image of this model.
	 *
	 * @return bool
	 */
	public function deleteFeaturedImage()
	{
		if($img = $this->featuredImage) {
			$this->deleteImage($img);
		}

		return;
	}

	/**
	 * Deletes the Brand Logo Image of this model.
	 *
	 * @return bool
	 */
	public function deleteLogo()
	{
		if($img = $this->logo) {
			$this->deleteImage($img);
		}

		return;
	}

	/**
	 * Deletes all the images of this model.
	 *
	 * @return bool
	 */
	public function flushImages()
	{
		foreach ($this->images as $image) {
			$this->deleteImage($image);
		}

		$this->deleteLogo();
		$this->deleteFeaturedImage();

		return;
	}

	/**
	 * Create image model
	 *
	 * @return array
	 */
	private function createImage($path, $name, $ext = '.jpeg', $size = Null, $featured = Null)
	{
        return $this->image()->create([
            'path' => $path,
            'name' => $name,
            'extension' => $ext,
            'featured' => (bool) $featured,
            'size' => $size,
        ]);
	}

	/**
	 * Prepare the previews for the dropzone
	 *
	 * @return array
	 */
	public function previewImages()
	{
		$urls = '';
		$configs = '';

		foreach ($this->images as $image) {
            // $path = Storage::url($image->path);
            $path = url("image/".$image->path);
            $deleteUrl = route('image.delete', $image->id);
            $urls .= '"' .$path . '",';
            $configs .= '{caption:"' . $image->name . '", size:' . $image->size . ', url: "' . $deleteUrl . '", key:' . $image->id . '},';
		}

		return [
			'urls' => rtrim($urls, ','),
			'configs' => rtrim($configs, ',')
		];
	}
}