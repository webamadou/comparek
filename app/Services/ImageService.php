<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    protected ImageManager $manager;
    protected string $disk;

    public function __construct()
    {
        // Initialize with GD driver for Intervention Image v3
        $this->manager = new ImageManager(GdDriver::class);
        // Local disk now; can switch to 's3' later via config
        $this->disk = 'public';
    }

    /**
     * Store an uploaded image, convert to WebP,
     * generate a thumbnail, and create the DB record.
     *
     * @param  UploadedFile  $file
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  array  $options
     *        - quality (int): main image WebP quality 0–100
     *        - thumb_quality (int): thumbnail WebP quality 0–100
     *        - thumb_width (int): thumbnail width in pixels
     *        - is_default (bool): whether to clear previous defaults
     *        - alt_text (string|null)
     *        - caption (string|null)
     *        - sort_order (int)
     *
     * @return Image
     */
    public function store(UploadedFile $file, $model, array $options = []): Image
    {
        $folder       = strtolower(class_basename($model));
        $filename     = uniqid() . '.webp';
        $quality      = $options['quality']      ?? 85;
        $thumbQuality = $options['thumb_quality'] ?? 75;
        $thumbWidth   = $options['thumb_width']   ?? 200;

        // Read the original image into an Intervention Image instance
        $image = $this->manager->read($file);

        // Encode to WebP for main image
        $webpImage = $image->encode(new WebpEncoder($quality));
        $path = "{$folder}/{$filename}";
        Storage::disk($this->disk)->put($path, (string) $webpImage);

        // Create and encode thumbnail
        $thumbImage = $this->manager
            ->read($file)
            ->resize($thumbWidth, null, fn($c) => $c->aspectRatio());

        $webpThumb = $thumbImage->encode(new WebpEncoder($thumbQuality));
        $thumbPath = "{$folder}/thumbs/{$filename}";
        Storage::disk($this->disk)->put($thumbPath, (string) $webpThumb);

        // Clear old default image if requested
        if (($options['is_default'] ?? false) && method_exists($model, 'images')) {
            $model->images()->update(['is_default' => false]);
        }

        // Create DB record with all data
        return $model->images()->create(array_merge($options, [
            'path'       => $path,
            'thumb_path' => $thumbPath,
        ]));
    }
}
