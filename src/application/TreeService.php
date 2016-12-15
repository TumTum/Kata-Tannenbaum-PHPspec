<?php

namespace application;

use domain\output\outputStreamInterface;
use domain\trees\TreeTypeInterface;

class TreeService
{
    /**
     * @var outputStreamInterface
     */
    private $outputStream;

    public function __construct(outputStreamInterface $outputStream)
    {
        $this->outputStream = $outputStream;
    }

    public function farm(TreeTypeInterface $treeType)
    {
        $this->outputStream->addLine($treeType->createTop());

        for ($i = 2; $i <= $treeType->getHeight(); $i++) {
            $this->outputStream->addLine($treeType->createLine($i));
        }

        $this->outputStream->addLine($treeType->createTrunk());
    }
}
