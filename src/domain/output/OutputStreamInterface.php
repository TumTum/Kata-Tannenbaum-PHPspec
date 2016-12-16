<?php

namespace domain\output;

/**
 * Interface outputStreamInterface
 * @package domain\output
 */
interface OutputStreamInterface
{
    public function addLine($line);

    public function output();
}
