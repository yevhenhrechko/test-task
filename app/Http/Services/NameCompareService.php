<?php

namespace App\Http\Services;

/**
 * Class NameCompareService
 * @package App\Http\Services
 */
class NameCompareService
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $secondName;

    /**
     * @var string
     */
    private $splitPattern = '@[\s,.]+@';

    /**
     * @var int
     */
    private $minimumPercentageMatching;

    /**
     * NameCompareService constructor.
     * @param string $firstName
     * @param string $secondName
     * @param int $minimumPercentageMatching
     */
    public function __construct($firstName, $secondName, $minimumPercentageMatching = 50)
    {
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->minimumPercentageMatching = $minimumPercentageMatching;
    }

    /**
     * @return bool
     */
    public function compare()
    {
        $firstNameArray = $this->getFormattedName($this->firstName);
        $secondNameArray = $this->getFormattedName($this->secondName);
        $maxArray = max($firstNameArray, $secondNameArray);
        $countMatches = 0;

        foreach (min($firstNameArray, $secondNameArray) as $value) {
            if (in_array($value, $maxArray)) {
                $countMatches++;
            }
        }

        return ($countMatches * 100 / count($maxArray)) > $this->minimumPercentageMatching;
    }

    /**
     * @param $name
     * @return array|false|string[]
     */
    private function getFormattedName($name)
    {
        return preg_split($this->splitPattern, $name);
    }
}
