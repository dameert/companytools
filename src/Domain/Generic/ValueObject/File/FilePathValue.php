<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Generic\ValueObject\File;

use CompanyTools\Domain\Generic\ValueObject\String\NotEmptyStringValue;

class FilePathValue extends NotEmptyStringValue
{
    //Todo add test that file at path exists + custom exception
}