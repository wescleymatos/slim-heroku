<?php

namespace Core\Validation;

class AssertionConcern
{
    public static function assertArgumentEquals($anObject1, $anObject2, $aMessage)
    {
        if ($anObject1 != $anObject2) {
            throw new \InvalidArgumentException($aMessage);
        }
    }

    public static function assertArgumentFalse($aBoolean, $aMessage)
    {
        if ($aBoolean) {
            throw new \InvalidArgumentException($aMessage);
        }
    }

    public static function assertArgumentGreaterThan($aString, $aMaximum, $aMessage)
    {
        $length = strlen(trim($aString));

        if ($length > $aMaximum) {
            throw new \InvalidArgumentException($aMessage);
        }
    }

    public static function assertArgumentBetween($aString, $aMinimum, $aMaximum, $aMessage)
    {
        $length = strlen(trim($aString));

        if ($length < $aMinimum || $length > $aMaximum) {
            throw new \InvalidArgumentException($aMessage);
        }
    }

    public static function assertArgumentNotEmpty($aString, $aMessage)
    {
        if (null === $aString || empty($aString)) {
            throw new \InvalidArgumentException($aMessage);
        }
    }

    public static function assertArgumentNotEquals($anObject1, $anObject2, $aMessage)
    {
        if ($anObject1 == $anObject2) {
            throw new \InvalidArgumentException($aMessage);
        }
    }

    public static function assertArgumentNotNull($anObject, $aMessage)
    {
        if (null === $anObject) {
            throw new \InvalidArgumentException($aMessage);
        }
    }

    public static function assertArgumentRange($aValue, $aMinimum, $aMaximum, $aMessage)
    {
        if ($aValue < $aMinimum || $aValue > $aMaximum) {
            throw new \InvalidArgumentException($aMessage);
        }
    }

    public static function assertArgumentTrue($aBoolean, $aMessage)
    {
        if (!$aBoolean) {
            throw new \InvalidArgumentException($aMessage);
        }
    }

    public static function assertArgumentInArray($aValue, $array, $aMessage)
    {
        if (!in_array($aValue, $array)) {
            throw new \InvalidArgumentException($aMessage);
        }
    }

    public static function assertStateFalse($aBoolean, $aMessage)
    {
        self::assertArgumentFalse($aBoolean, $aMessage);
    }

    public static function assertStateTrue($aBoolean, $aMessage)
    {
        self::assertArgumentTrue($aBoolean, $aMessage);
    }

    public static function assertArgumentLength($aString, $aMaximum, $aMessage)
    {
        $length = count(trim($aString));

        if ($length > $aMaximum) {
            throw new \InvalidArgumentException($aMessage);
        }
    }

    public static function assertArgumentIsAnEmailAddress($anEmailAddress, $aMessage)
    {
        if (false === filter_var($anEmailAddress, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException($aMessage);
        }
    }

    public static function assertArgumentIsString($aValue)
    {
        if (!is_string($aValue)) {
            throw new \TypeError('This param is not string.');
        }
    }
}
