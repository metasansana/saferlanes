<?php

/**
 * timestamp May 30, 2012 1:30:50 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlane\core\domain
 *
 *
 */

namespace saferlanes\core\domain;

use callow\domain\Validator;

class DriverValidator implements Validator
{

    private $errors = array ();

    private function _validatePlate($plate)
    {
        $pattern = '/^(p|d|r|h|v|x|t{1})([a-z]){0,2}(\d){1,4}$/';

        if (!preg_match($pattern, $plate))
        {
            $this->errors['plate'] = "Hey! That's not a valid plate number.";
            return FALSE;
        }
        else
        {
            return TRUE;
        }

    }

    /**
     * Validates the plus attribute.
     * @param string $plus
     * @return boolean
     */
    private function _validatePlus($plus)
    {
        if ($plus !== 'plus')
        {
            $this->errors['plus'] = "Whoops! We have a tainted vote here! Try again.";
            return FALSE;
        }

        return TRUE;

    }

    /**
     * Validates the minus attribute.
     * @param string $minus
     * @return boolean
     */
    private function _validateMinus($minus)
    {
        if ($minus !== 'minus')
        {
            $this->errors['minus'] = "Whoops! We have a tainted vote here! Try again.";
            return FALSE;
        }

        return TRUE;

    }

    public function isValid($property, $value)
    {

        $result = NULL;

        switch ($property)
        {

            case 'plate': $result = $this->_validatePlate($value);
                break;

            case 'plus': $result = $this->_validatePlus($value);
                break;

            case 'minus': $result = $this->_validateMinus($value);
                break;

            default: $result = FALSE;
                break;
        }
        return $result;

    }

    public function getError($name)
    {
        if (array_key_exists($name, $this->errors))
            return $this->errors[$name];

    }

    public function getErrors()
    {
        return $this->errors;

    }

}

?>
