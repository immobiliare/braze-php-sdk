<?php

namespace ImmobiliareLabs\BrazeSDK\Object;

use ImmobiliareLabs\BrazeSDK\ValidationInterface;

abstract class BaseObject implements \JsonSerializable, ValidationInterface
{
    public function jsonSerialize(): mixed
    {
        $dataToSerialize = array_filter(get_object_vars($this), function ($val) {
            return null !== $val;
        });

        foreach ($dataToSerialize as $fieldKey => $fieldValue) {
            if ($fieldValue instanceof \DateTimeInterface) {
                $dataToSerialize[$fieldKey] = $fieldValue->format(\DateTimeInterface::ATOM);
            }
        }

        return $dataToSerialize;
    }

    public static function fromArray(array $params, bool $allowExtraProperties = false): static
    {
        $instance = new static();
        $instance->fillFromArray($params, $allowExtraProperties);
        return $instance;
    }

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        foreach ($params as $paramKey => $paramValue) {
            if (!property_exists($this, $paramKey) && !$allowExtraProperties) {
                continue;
            }

            if (null !== $this->$paramKey) {
                continue;
            }

            try {
                if (
                    is_scalar($paramValue)
                    || (!is_array($paramValue) && !empty($paramValue) && $this->isInstanceOf($paramKey, $paramValue))
                ) {
                    $this->$paramKey = $paramValue;
                }
            } catch (\ReflectionException) {
                continue;
            }
        }
    }

    /**
     * @throws \ReflectionException
     */
    private function isInstanceOf(mixed $paramKey, mixed $paramValue): bool
    {
        if (preg_match('/\|/', $paramKey)) {
            return false;
        }
        $reflectionProperty = new \ReflectionProperty($this, $paramKey);
        $reflectionClass = new \ReflectionClass($paramValue);

        return $reflectionClass->isSubclassOf($reflectionProperty->getType()->getName())
            || $reflectionClass->getName() === $reflectionProperty->getType()->getName();
    }

    public function validate(bool $strict): void
    {
    }
}
