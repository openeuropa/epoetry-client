<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\CodeGenerator\Assembler;

use OpenEuropa\EPoetry\CodeGenerator\Assembler\NullableGetterAssembler;
use OpenEuropa\EPoetry\CodeGenerator\Assembler\NullableGetterAssemblerOptions;
use Phpro\SoapClient\CodeGenerator\Assembler\GetterAssembler;
use Phpro\SoapClient\CodeGenerator\Assembler\GetterAssemblerOptions;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;

/**
 * @internal
 * @coversNothing
 */
final class NullableGetterAssemblerTest extends AbstractAssemblerTest
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

        $this->assembler = new NullableGetterAssembler(
            (new NullableGetterAssemblerOptions())
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
     * @return string|null
     */
    public function getProp1() : ?string
    {
        return $this->prop1;
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
        $originalAssembler = new GetterAssembler(
            (new GetterAssemblerOptions())
                ->withReturnType()
                ->withBoolGetters()
        );
        $originalAssembler->assemble($context);
        $this->assembler->assemble($context);
    }
}
