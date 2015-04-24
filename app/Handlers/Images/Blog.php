<?php
namespace Rumta\Images;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Blog implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(330, 100);
    }
}