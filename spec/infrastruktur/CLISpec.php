<?php

namespace spec\infrastruktur;

use application\output\OutputStdoutStream;
use domain\trees\TreeTypeInterface;
use infrastruktur\CLI;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CLISpec extends ObjectBehavior
{
    function it_is_initializable(OutputStdoutStream $outputStream)
    {
        $this->beConstructedWith($outputStream);
        $this->shouldHaveType(CLI::class);
    }

    public function it_will_print_me_a_tannenbaum(
        OutputStdoutStream $outputStream,
        TreeTypeInterface $treeType
    )
    {
        $this->beConstructedWith($outputStream);

        $treeType->getHeight()->willReturn(2);
        $treeType->createTop()->willReturn(['X']);
        $treeType->createLine(Argument::any())->willReturn();
        $treeType->createTrunk()->willReturn('|');

        $outputStream->addLine(Argument::any())->shouldBeCalledTimes(3);
        $outputStream->output()->shouldBeCalled();

        $this->echoTree($treeType);
    }
}
