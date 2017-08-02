<?php


declare(strict_types=1);

/*
 * This file is part of Laravel Vidible.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Vidible\Filters;

use FFMpeg\Media\Video;
use FFMpeg\Coordinate\Dimension;
use BrianFaust\Vidible\Contracts\FilterInterface;

class Resize implements FilterInterface
{
    private $dimension;

    private $mode;

    private $useStandards;

    public function __construct($config)
    {
        $this->dimension = new Dimension($config['width'], $config['height']);
        $this->mode = $config['mode'];
        $this->useStandards = $config['useStandards'];
    }

    public function applyFilter(Video $video)
    {
        return $video->filters()->resize(
            $this->dimension,
            $this->mode,
            $this->useStandards
        );
    }
}
