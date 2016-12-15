<?php

namespace domain\trees;

interface TreeTypeInterface
{
    public function createTop();

    public function createLine(int $line);

    public function createTrunk();

    public function getHeight() :int;
}
