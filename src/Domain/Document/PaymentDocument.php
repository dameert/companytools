<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Document;

use CompanyTools\Domain\Company\CompanyName;
use CompanyTools\Domain\Generic\ValueObject\DateTime\DayValue;
use CompanyTools\Domain\Generic\ValueObject\DateTime\QuarterValue;

class PaymentDocument
{
    /**
     * @var ReferenceValue
     */
    protected $referenceValue;

    /**
     * @var CompanyName
     */
    protected $companyName;

    /**
     * @var DayValue
     */
    protected $dayValue;

    /**
     * @var Amount
     */
    protected $vatAmount;

    /**
     * @var Amount
     */
    protected $totalAmount;

    /**
     * @var QuarterValue
     */
    protected $quarterValue;

    public function __construct(
        ReferenceValue $referenceValue,
        CompanyName $companyName,
        DayValue $dayValue,
        Amount $vatAmount,
        Amount $totalAmount,
        QuarterValue $quarterValue
    )
    {
        $this->referenceValue = $referenceValue;
        $this->companyName = $companyName;
        $this->dayValue = $dayValue;
        $this->vatAmount = $vatAmount;
        $this->totalAmount = $totalAmount;
        $this->quarterValue = $quarterValue;
    }

    public function getReferenceValue(): ReferenceValue
    {
        return $this->referenceValue;
    }

    public function getCompanyName(): CompanyName
    {
        return $this->companyName;
    }

    public function getDayValue(): DayValue
    {
        return $this->dayValue;
    }

    public function getVatAmount(): Amount
    {
        return $this->vatAmount;
    }

    public function getTotalAmount(): Amount
    {
        return $this->totalAmount;
    }

    public function getQuarterValue(): QuarterValue
    {
        return $this->quarterValue;
    }
}