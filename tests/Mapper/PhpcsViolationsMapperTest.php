<?php

namespace PhpcsDiff\Tests\Mapper;

use PhpcsDiff\Mapper\MapperInterface;
use PhpcsDiff\Mapper\PhpcsViolationsMapper;
use PhpcsDiff\Tests\TestBase;

class PhpcsViolationsMapperTest extends TestBase
{
    /**
     * @covers PhpcsOutputMapper::__construct
     */
    public function testMapperInstance(): void
    {
        $mapper = new PhpcsViolationsMapper([], '');

        $this->assertInstanceOf(MapperInterface::class, $mapper);
    }

    /**
     * @covers PhpcsOutputMapper::map
     */
    public function testEmptyMapper(): void
    {
        $mappedData = (new PhpcsViolationsMapper([], ''))->map([]);

        $this->assertEmpty($mappedData);
    }
}
