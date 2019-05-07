<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\CodeGenerator\Assembler;

use OpenEuropa\EPoetry\CodeGenerator\Assembler\ArrayPropertyAssembler;
use OpenEuropa\EPoetry\CodeGenerator\Assembler\ArrayPropertyAssemblerOptions;
use Phpro\SoapClient\CodeGenerator\Assembler\PropertyAssembler;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;

/**
 * @internal
 * @coversNothing
 */
final class ArrayPropertyAssemblerTest extends AbstractAssemblerTest
{
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $whitelist = [
            'MyType' => ['prop1'],
        ];

        $this->assembler = new ArrayPropertyAssembler(
            (new ArrayPropertyAssemblerOptions())
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
     * @var string[]|array
     */
    private $prop1 = [];


}

CODE;

        static::assertEquals($expected, $context->getClass()->generate());
    }

    /**
     * @param \Phpro\SoapClient\CodeGenerator\Context\ContextInterface $context
     */
    protected function assemble(ContextInterface $context)
    {
        $originalAssembler = new PropertyAssembler();
        $originalAssembler->assemble($context);
        $this->assembler->assemble($context);
    }
}
