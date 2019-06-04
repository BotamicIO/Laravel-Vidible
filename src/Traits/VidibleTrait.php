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

namespace Artisanry\Vidible\Traits;

trait VidibleTrait
{
    public function videos()
    {
        return $this->morphMany('Artisanry\Vidible\Models\Video', 'vidible');
    }
}
