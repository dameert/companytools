<?php

declare(strict_types=1);

namespace CompanyTools\Tests\Unit\Domain\Generic\ValueObject\DateTime;

use CompanyTools\Domain\Generic\ValueObject\DateTime\YearValue;
use PHPUnit\Framework\TestCase;

class YearValueTest extends TestCase
{
    public function testFromDateTime()
    {
        $y = new YearValue(2018);
        $yfdt = YearValue::fromDateTime(new \DateTime('1-7-2018'));

        $this->assertEquals($y, $yfdt);
    }
}