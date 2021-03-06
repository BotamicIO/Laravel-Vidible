<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Vidible.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Vidible\Filters;

use Artisanry\Vidible\Contracts\FilterInterface;
use FFMpeg\Media\Video;

class Watermark implements FilterInterface
{
    private $watermarkPath;

    private $coordinates;

    public function __construct($config)
    {
        $this->watermarkPath = $config['watermarkPath'];
        $this->coordinates = $config['coordinates'];
    }

    public function applyFilter(Video $video)
    {
        return $video->filters()->watermark(
            $this->watermarkPath,
            $this->coordinates
        );
    }
}
