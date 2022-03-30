<?php

namespace ImmobiliareLabs\BrazeSDK\Response;

use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

abstract class BaseResponse extends BaseObject
{
    private ?bool $isSuccess;

    private ?int $httpStatusCode;

    private ?string $fatalError;

    private ?array $minorErrors;

    public function setIsSuccess(bool $isSuccess): void
    {
        $this->isSuccess = $isSuccess;
    }

    public function isSuccess(): bool
    {
        return $this->isSuccess;
    }

    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }

    public function setHttpStatusCode(int $httpStatusCode): void
    {
        $this->httpStatusCode = $httpStatusCode;
    }

    public function getFatalError(): ?string
    {
        return $this->fatalError;
    }

    public function setFatalError(?string $fatalError): void
    {
        $this->fatalError = $fatalError;
    }

    public function getMinorErrors(): array
    {
        return $this->minorErrors;
    }

    public function setMinorErrors(array $minorErrors): void
    {
        $this->minorErrors = $minorErrors;
    }
}
