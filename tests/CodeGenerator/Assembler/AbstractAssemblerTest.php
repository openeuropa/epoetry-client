<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\CodeGenerator\Assembler;

use OpenEuropa\EPoetry\CodeGenerator\Assembler\AbstractAssembler;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Context\PropertyContext;
use Phpro\SoapClient\CodeGenerator\Model\Property;
use Phpro\SoapClient\CodeGenerator\Model\Type;
use PHPUnit\Framework\TestCase;
use Zend\Code\Generator\ClassGenerator;

abstract class AbstractAssemblerTest extends TestCase
{
    /**
     * @var \Phpro\SoapClient\CodeGenerator\Assembler\AssemblerInterface
     */
    protected $assembler;

    public function testItCanAssemble()
    {
        $context = $this->createContext();
        $this->assertTrue($this->assembler->canAssemble($context));
    }

    public function testItExtendsAbstractAssembler()
    {
        $this->assertInstanceOf(AbstractAssembler::class, $this->assembler);
    }

    abstract protected function assemble(ContextInterface $context);

    /**
     * @param string $propertyName
     *
     * @return PropertyContext
     */
    protected function createContext($propertyName = 'prop1')
    {
        $properties = [
            'prop1' => 'string',
            'prop2' => 'int',
            'prop3' => 'boolean',
            'prop4' => 'My_Response',
        ];

        $class = new ClassGenerator('MyType', 'MyNamespace');
        $type = new Type('MyNamespace', 'MyType', $properties);
        $property = new Property($propertyName, $properties[$propertyName], 'ns1');

        return new PropertyContext($class, $type, $property);
    }
}
