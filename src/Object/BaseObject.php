<?php

namespace ImmobiliareLabs\BrazeSDK\Object;

use ImmobiliareLabs\BrazeSDK\ValidationInterface;

abstract class BaseObject implements \JsonSerializable, ValidationInterface
{
    public function jsonSerialize()
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

    /**
     * @todo: set return type to static when PHP 8.0 (or above) will be the minimum supported version
     *
     * @return static
     */
    public static function fromArray(array $params, bool $allowExtraProperties = false)
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

            if (is_scalar($paramValue)) {
                $this->$paramKey = $paramValue;
            }
        }
    }

    public function validate(bool $strict): void
    {
    }
}
