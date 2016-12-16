<?php

namespace infrastruktur;

use application\output\OutputStdoutStream;
use application\TreeService;
use domain\output\OutputStreamInterface;
use domain\trees\TreeTypeInterface;

class CLI
{
    /**
     * @var OutputStdoutStream
     */
    private $outputStream;

    /**
     * CLI constructor.
     *
     * @param OutputStdoutStream $outputStream
     */
    public function __construct(OutputStdoutStream $outputStream)
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
