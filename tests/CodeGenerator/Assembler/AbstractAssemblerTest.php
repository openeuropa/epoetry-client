<?php

declare(strict_types=1);

namespace OpenEuropa\EPoetry\Tests\CodeGenerator\Assembler;

use OpenEuropa\EPoetry\CodeGenerator\Assembler\AbstractAssembler;
use Phpro\SoapClient\CodeGenerator\CodingStandards\DefaultCodingStandardsStrategy;
use Phpro\SoapClient\CodeGenerator\Config\Destination;
use Phpro\SoapClient\CodeGenerator\Config\TypeNamespaceMap;
use Phpro\SoapClient\CodeGenerator\Context\CodeGeneratorContext;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Context\PropertyContext;
use Phpro\SoapClient\CodeGenerator\Model\Property;
use Phpro\SoapClient\CodeGenerator\Model\Type;
use PHPUnit\Framework\TestCase;
use Laminas\Code\Generator\ClassGenerator;
use Soap\Engine\Metadata\Model\XsdType;
use Soap\Engine\Metadata\Model\Property as MetadataProperty;

abstract class AbstractAssemblerTest extends TestCase
{
    /**
     * @var \Phpro\SoapClient\CodeGenerator\Assembler\AssemblerInterface
     */
    protected $assembler;

    public function testItCanAssemble()
    {
        $context = $this->createContext();
        static::assertTrue($this->assembler->canAssemble($context));
    }

    public function testItExtendsAbstractAssembler()
    {
        static::assertInstanceOf(AbstractAssembler::class, $this->assembler);
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
        $context = new CodeGeneratorContext(TypeNamespaceMap::create(new Destination('', 'MyNamespace')), new DefaultCodingStandardsStrategy());
        $typed = array_map(fn ($p, $t) => Property::fromMetaData($context, new MetadataProperty($p, XsdType::create($p)->withBaseType($t))), array_keys($properties), $properties);
        $type = new Type($context, 'MyType', 'MyType', $typed, XsdType::create('MyType'));
        $property = new Property($propertyName, $properties[$propertyName], $context, 'ns1', XsdType::create($propertyName));

        return new PropertyContext($class, $type, $property, $context);
    }
}
