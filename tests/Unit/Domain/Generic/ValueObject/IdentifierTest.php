<?php

declare(strict_types=1);

namespace CompanyTools\Tests\Unit\Domain\Generic\ValueObject;

use CompanyTools\Domain\Generic\ValueObject\Identifier;
use PHPUnit\Framework\TestCase;

class IdentifierTest extends TestCase
{
    public function testUniquenessOfNewId()
    {
        $i = Identifier::newId();
        $ii = Identifier::newId();

        $this->assertNotEquals($i->getValue(), $ii->getValue());
    }

    public function testFromString()
    {
        $i = Identifier::fromString('CompanyTools');

        $this->assertEquals('CompanyTools', $i->getValue());
    }

    public function testValue()
    {
        $i = Identifier::fromString('CompanyTools');

        $this->assertEquals('CompanyTools', $i->getValue());
    }
}