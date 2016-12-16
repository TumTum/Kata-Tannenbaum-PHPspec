<?php

namespace application\factory;

use domain\trees\Tannenbaum;

/**
 * Class TreeFactory
 *
 * @package application\factory
 */
class TreeFactory
{
    /**
     * @param int $height
     * @param bool $star
     *
     * @return Tannenbaum
     */
    public function makeTannenbaum(int $height, bool $star): Tannenbaum
    {
        return new Tannenbaum($height, $star);
    }
}
