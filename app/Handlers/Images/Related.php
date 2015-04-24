<?php

namespace Rumta\Images;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Related implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(240, 120);
    }
}