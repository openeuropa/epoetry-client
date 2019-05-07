<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\CodeGenerator\Assembler;

use OpenEuropa\EPoetry\CodeGenerator\Assembler\ArraySetterAssembler;
use OpenEuropa\EPoetry\CodeGenerator\Assembler\ArraySetterAssemblerOptions;
use Phpro\SoapClient\CodeGenerator\Assembler\SetterAssembler;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;

/**
 * @internal
 * @coversNothing
 */
final class ArraySetterAssemblerTest extends AbstractAssemblerTest
{
    /**
     * @var ArraySetterAssembler
     */
    protected $assembler;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $whitelist = [
            'MyType' => ['prop1'],
        ];

        $this->assembler = new ArraySetterAssembler(
            (new ArraySetterAssemblerOptions())
                ->whitelist($whitelist)
        );
    }

    public function testItAssemble()
    {
        $context = $this->createContext();
        $this->assemble($context);

        $expected = <<<'CODE'
namespace MyNamespace;

class MyType
{

    /**
     * @param string[] $prop1
     */
    public function setProp1(array $prop1)
    {
        $this->prop1 = $prop1;
    }


}

CODE;

        static::assertEquals($expected, $context->getClass()->generate());
    }

    /**
     * @param \Phpro\SoapClient\CodeGenerator\Context\ContextInterface $context
     */
    protected function assemble(ContextInterface $context)
    {
        $originalAssembler = new SetterAssembler();
        $originalAssembler->assemble($context);
        $this->assembler->assemble($context);
    }
}
