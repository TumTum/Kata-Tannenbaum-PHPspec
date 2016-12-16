<?php

namespace spec\infrastruktur;

use application\TreeService;
use domain\output\OutputStreamInterface;
use domain\trees\TreeTypeInterface;
use infrastruktur\CLI;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CLISpec extends ObjectBehavior
{
    function it_is_initializable(OutputStreamInterface $outputStream)
    {
        $this->beConstructedWith($outputStream);
        $this->shouldHaveType(CLI::class);
    }

    public function it_will_print_me_a_tannenbaum(
        OutputStreamInterface $outputStream,
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
