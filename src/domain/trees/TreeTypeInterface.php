<?php

namespace domain\trees;

interface TreeTypeInterface
{
    public function createTop() :array;

    public function createLine(int $line, string $char = 'X');

    public function createTrunk();

    public function getHeight() :int;
}
