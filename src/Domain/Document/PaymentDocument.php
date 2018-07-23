<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Document;

use CompanyTools\Domain\Company\CompanyName;
use CompanyTools\Domain\Generic\ValueObject\DateTime\DayValue;
use CompanyTools\Domain\Generic\ValueObject\DateTime\QuarterValue;

class PaymentDocument
{
    /**
     * @var string
     */
    protected $referenceValue;

    /**
     * @var string
     */
    protected $companyName;

    /**
     * @var \DateTime
     */
    protected $dayValue;

    /**
     * @var float
     */
    protected $vatAmount;

    /**
     * @var float
     */
    protected $totalAmount;

    /**
     * @var array
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
        $this->referenceValue = $referenceValue->getValue();
        $this->companyName = $companyName->getValue();
        $this->dayValue = $dayValue->getValue();
        $this->vatAmount = $vatAmount->getValue();
        $this->totalAmount = $totalAmount->getValue();
        $this->quarterValue = $quarterValue->getValue()->getValue();
    }

    public function getReferenceValue(): ReferenceValue
    {
        return new ReferenceValue($this->referenceValue);
    }

    public function getCompanyName(): CompanyName
    {
        return new CompanyName($this->companyName);
    }

    public function getDayValue(): DayValue
    {
        return new DayValue($this->dayValue);
    }

    public function getVatAmount(): Amount
    {
        return new Amount($this->vatAmount);
    }

    public function getTotalAmount(): Amount
    {
        return new Amount($this->totalAmount);
    }

    public function getQuarterValue(): QuarterValue
    {
        return QuarterValue::fromDayValue(new DayValue($this->quarterValue));
    }
}