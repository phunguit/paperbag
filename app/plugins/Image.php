<?php

class Image extends \Phalcon\Mvc\User\Plugin
{
    const JPEG_QUALITY = 90;

    const PNG_COMPRESSION = 9;

    protected $baseUri = '/img/';

    protected $imagesDir = '../../img/';

    protected $sizes;

    /**
     * @param mixed $sizes
     */
    public function __construct($sizes = false)
    {
        if (!$sizes) {
            $sizes = array(
                'tiny' => '32x32',
                'small' => '64x64',
                'medium' => '128x128',
                'large' => '512x512'
            );
        }

        $this->sizes = array();
        foreach ($sizes as $type => $size) {
            $array = explode('x', $size, 2);
            if (count($array) == 2) {
                $this->sizes[$type] = array(
                    'width' => $array[0],
                    'height' => $array[1]
                );
            }
        }
    }

    public function tiny($image = false, $altImage = 'holder.png')
    {
        if (!$image || !file_exists($this->imagesDir . $image)) {
            $image = $altImage;
        }

        $width = $this->sizes['tiny']['width'];
        $height = $this->sizes['tiny']['height'];
        $array = explode('/', $image);
        $cache = 'cache/' . $width . 'x' . $height . '-' . implode('-', $array);

        if (!file_exists($this->imagesDir . $cache)) {
            $this->resizeImage($this->imagesDir . $image, $this->imagesDir . $cache, $width, $height);
        }
        return $this->baseUri . $cache;
    }

    public function small($image = false, $altImage = 'holder.png')
    {
        if (!$image || !file_exists($this->imagesDir . $image)) {
            $image = $altImage;
        }

        $width = $this->sizes['small']['width'];
        $height = $this->sizes['small']['height'];
        $array = explode('/', $image);
        $cache = 'cache/' . $width . 'x' . $height . '-' . implode('-', $array);

        if (!file_exists($this->imagesDir . $cache)) {
            $this->resizeImage($this->imagesDir . $image, $this->imagesDir . $cache, $width, $height);
        }
        return $this->baseUri . $cache;
    }

    public function medium($image = false, $altImage = 'holder.png')
    {
        if (!$image || !file_exists($this->imagesDir . $image)) {
            $image = $altImage;
        }

        $width = $this->sizes['medium']['width'];
        $height = $this->sizes['medium']['height'];
        $array = explode('/', $image);
        $cache = 'cache/' . $width . 'x' . $height . '-' . implode('-', $array);

        if (!file_exists($this->imagesDir . $cache)) {
            $this->resizeImage($this->imagesDir . $image, $this->imagesDir . $cache, $width, $height);
        }
        return $this->baseUri . $cache;
    }

    public function large($image = false, $altImage = 'holder.png')
    {
        if (!$image || !file_exists($this->imagesDir . $image)) {
            $image = $altImage;
        }

        $width = $this->sizes['large']['width'];
        $height = $this->sizes['large']['height'];
        $array = explode('/', $image);
        $cache = 'cache/' . $width . 'x' . $height . '-' . implode('-', $array);

        if (!file_exists($this->imagesDir . $cache)) {
            $this->resizeImage($this->imagesDir . $image, $this->imagesDir . $cache, $width, $height);
        }
        return $this->baseUri . $cache;
    }

    protected function resizeImage($inputPath, $outputPath, $width, $height)
    {
        $imageInfo = getimagesize($inputPath);
        $oriWidth = $imageInfo[0];
        $oriHeight = $imageInfo[1];

        if ($imageInfo['mime'] == 'image/png') {
            $imageType = 'png';
        } elseif ($imageInfo['mime'] == 'image/jpeg' || $imageInfo['mime'] == 'image/jpg') {
            $imageType = 'jpeg';
        } else {
            $imageType = 'unknown';
        }

        if ($imageType == 'png') {
            $srcImage = imagecreatefrompng($inputPath);
        } elseif ($imageType == 'jpeg') {
            $srcImage = imagecreatefromjpeg($inputPath);
        } else {
            return false;
        }

        $scaleWidth = $width;
        $scaleHeight = $oriHeight * ($scaleWidth / $oriWidth);
        if ($scaleWidth < $width || $scaleHeight < $height) {
            $scaleHeight = $height;
            $scaleWidth = $oriWidth * ($scaleHeight / $oriHeight);
        }

        $tempImage = imagecreatetruecolor($scaleWidth, $scaleHeight);
        imagefill($tempImage, 0, 0, imagecolorallocate($tempImage, 255, 255, 255));
        imagecopyresampled($tempImage, $srcImage, 0, 0, 0, 0, $scaleWidth, $scaleHeight, $oriWidth, $oriHeight);

        $cropX = ($scaleWidth - $width) / 2;
        $cropY = ($scaleHeight - $height) / 2;
        $destImage = imagecreatetruecolor($width, $height);
        imagecopy($destImage, $tempImage, 0, 0, $cropX, $cropY, $width, $height);

        if ($imageType == 'png') {
            imagepng($destImage, $outputPath, self::PNG_COMPRESSION);
        } elseif ($imageType == 'jpeg') {
            imagejpeg($destImage, $outputPath, self::JPEG_QUALITY);
        }

        imagedestroy($srcImage);
        imagedestroy($tempImage);
        imagedestroy($destImage);
        return true;
    }

    public function getBaseUri()
    {
        return $this->baseUri;
    }

    public function setBaseUri($baseUri)
    {
        $this->baseUri = $baseUri;
    }

    public function getImagesDir()
    {
        return $this->imagesDir;
    }

    public function setImagesDir($imagesDir)
    {
        $this->imagesDir = $imagesDir;
    }
}
