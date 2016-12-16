<?php

namespace infrastruktur;

use application\TreeService;
use domain\output\OutputStreamInterface;
use domain\trees\TreeTypeInterface;

class CLI
{
    /**
     * @var OutputStreamInterface
     */
    private $outputStream;

    /**
     * CLI constructor.
     *
     * @param OutputStreamInterface $outputStream
     */
    public function __construct(OutputStreamInterface $outputStream)
    {
        $this->outputStream = $outputStream;
    }

    public function echoTree(TreeTypeInterface $treeType)
    {
        $treeService = new TreeService($this->outputStream);
        $treeService->farm($treeType);

        $output = $this->outputStream->output();

        print $output;
    }
}
