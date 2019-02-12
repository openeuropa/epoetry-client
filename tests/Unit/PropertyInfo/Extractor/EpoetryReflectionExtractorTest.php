<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\PropertyInfo\Extractor;

use OpenEuropa\EPoetry\PropertyInfo\Extractor\MappingReflectionExtractor;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Yaml;

/**
 * Class EpoetryReflectionExtractorTest.
 *
 * @internal
 * @coversNothing
 */
final class EpoetryReflectionExtractorTest extends TestCase
{
    /**
     * Data provider.
     *
     * @return array
     */
    public function getTypesCases()
    {
        return $this->getFixture(__DIR__ . '/../../../fixtures/epoetry-reflection-extractor.yml');
    }

    /**
     * @dataProvider getTypesCases
     *
     * @param mixed $input
     */
    public function testGetTypes($input)
    {
        $reflectionExtractor = new MappingReflectionExtractor();

        $parent = $input['parent'];

        foreach ($input['properties'] as $property => $property_type) {
            /** @var \Symfony\Component\PropertyInfo\Type $type */
            $type = $reflectionExtractor->getTypes($parent, $property);
            $this->assertArrayHasKey(0, $type);
            $this->assertEquals($property_type, $type[0]->getClassName());
        }
    }

    /**
     * Get the content of the fixture.
     *
     * @param string $filename
     *   The filename
     *
     * @return array
     *   The array
     */
    private function getFixture(string $filename)
    {
        return Yaml::parseFile($filename);
    }
}
