<?php

namespace App\Models;

use App\Models\Ad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdImage extends Model
{
    use HasFactory;

    protected $casts = [
        'labels' => 'array',
    ];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    static public function getUrlByFilePath($filePath, $width = null, $height = null)
    {
        if(!$width && !$height)
        {
            return Storage::url($filePath);
        }

        $path = dirname($filePath);
        $filename = basename($filePath);
        $file = "{$path}/crop{$width}x{$height}_{$filename}";

        return Storage::url($file);
    }

    public function getUrl($width = null, $height = null)
    {
        return AdImage::getUrlByFilePath($this->file, $width, $height);
    }

}
