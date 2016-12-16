<?php

namespace spec\application\output;

use application\output\OutputStdoutStream;
use domain\output\OutputStreamInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OutputStdoutStreamSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(OutputStdoutStream::class);
        $this->shouldHaveType(OutputStreamInterface::class);
    }

    public function it_will_return_me_a_new_line_string()
    {
        $this->addLine('lineOne');
        $this->addLine('lineTwo');
        $this->output()->shouldBe("lineOne\nlineTwo\n");
    }
}
