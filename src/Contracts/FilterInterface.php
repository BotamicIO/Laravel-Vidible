<?php

/*
 * This file is part of Laravel Vidible.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Vidible\Contracts;

use FFMpeg\Media\Video;

/**
 * Interface FilterInterface.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
interface FilterInterface
{
    /**
     * @param Video $video
     *
     * @return mixed
     */
    public function applyFilter(Video $video);
}
