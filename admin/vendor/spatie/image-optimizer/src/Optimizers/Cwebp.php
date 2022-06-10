<?php

namespace Spatie\ImageOptimizer\Optimizers;

use Spatie\ImageOptimizer\Image;

class Cwebp extends BaseOptimizer
{
    public $binaryName = 'cwebp';

    public function canHandle(Image $image): bool
    {
        if($image->mime() === 'image/webp'){
            return $image->mime() === 'image/webp';
        }
        elseif($image->mime() === 'image/jpeg'){
            return true;
        }
        elseif($image->mime() === 'image/png'){
            return true;
        }
    }

    public function getCommand(): string
    {
        $optionString = implode(' ', $this->options);

        return "\"{$this->binaryPath}{$this->binaryName}\" {$optionString}"
            .' '.escapeshellarg($this->imagePath)
            .' -o '.escapeshellarg($this->imagePath);
    }
}
