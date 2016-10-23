<?php
/**
 * ISO 3166-1
 * 
 * ISO 3166-1 country codes
 * 
 * Copyright © 2016 Juan Pedro Gonzalez Gutierrez
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 */
namespace ISOCodes\ISO3166_1\Model;

use ISOCodes\I18n\Translator;
use ISOCodes\ISO3166_1\Exception;

class ISO3166_1 implements ISO3166_1Interface
{
    /**
     * The translator
     * 
     * @var Translator
     */
    protected $_translator;

    /**
     * Two letter alphabetic code of the item
     * 
     * @var string
     */
    protected $alpha2;

    /**
     * Three letter alphabetic code of the item
     * 
     * @var string
     */
    protected $alpha3;

    /**
     * Name of the item
     * 
     * @var string
     */
    protected $name;

    /**
     * Three digit numeric code of the item, including leading zeros
     * 
     * @var string
     */
    protected $numeric;

    /**
     * Official name of the item (optional)
     * 
     * @var string
     */
    protected $officialName;

    /**
     * Common name of the item (optional)
     * 
     * @var string
     */
    protected $commonName;

    /**
     * Magic method utilized for reading data from inaccessible properties.
     * 
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        switch($name)
        {
            case '_translator':
                return $this->_translator;
                break;
            case 'alpha_2':
            case 'alpha2':
                return $this->alpha2;
                break;
            case 'alpha_3':
            case 'alpha3':
                return $this->alpha3;
                break;
            case 'name':
                return $this->name;
                break;
            case 'numeric':
                return $this->numeric;
                break;
            case 'official_name':
            case 'officialName':
                return $this->officialName;
                break;
            case 'common_name':
            case 'commonName':
                return $this->commonName;
                break;
        }

        trigger_error(sprintf('Undefined property: %s::$%s', __CLASS__, $name), E_USER_NOTICE);
    }

    /**
     * Magic method triggered by calling isset() or empty() on inaccessible properties.
     * 
     * @param string $name
     * @return bool
     */
    public function __isset($name)
    {
        switch($name)
        {
            case '_translator':
                if  (isset($this->translator) && ($this->_translator instanceof Translator)) {
                    return true;
                }
                return false;
                break;
            case 'alpha_2':
            case 'alpha2':
                return isset($this->alpha2);
                break;
            case 'alpha_3':
            case 'alpha3':
                return isset($this->alpha3);
                break;
            case 'name':
                return isset($this->name);
                break;
            case 'numeric':
                return isset($this->numeric);
                break;
            case 'official_name':
            case 'officialName':
                return isset($this->officialName);
                break;
            case 'common_name':
            case 'commonName':
                return isset($this->commonName);
                break;
        }

        return false;
    }

    /**
     * Magic method runned when writing data to inaccessible properties.
     * 
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function __set($name, $value)
    {
        switch($name)
        {
            case '_translator':
                if (!$value instanceof Translator) {
                    throw new Exception\InvalidArgumentException(sprintf(
                        '%s::$%s must be of the type ISOCodes\I18n\Translator, %s given',
                        __CLASS__,
                        $name,
                        (is_object($value) ? get_class($value) : gettype($value))
                    ));
                }
                $this->_translator = $value;
                return;
                break;
            case 'alpha_2':
            case 'alpha2':
            case 'alpha_3':
            case 'alpha3':
            case 'name':
            case 'numeric':
            case 'official_name':
            case 'officialName':
            case 'common_name':
            case 'commonName':
                trigger_error(sprintf('Cannot access protected property %s::$%s', __CLASS__, $name), E_USER_ERROR);
                return;
                break;
        }

        trigger_error(sprintf('Undefined property: %s::$%s', __CLASS__, $name), E_USER_NOTICE);
    }

    /**
     * Get a translation for a message from the translator.
     * 
     * TODO: The class generator cannot tell for sure which fields are
     *       translatable so you must hook them by hand or the translator
     *       will be of no use.
     * 
     * @param string      $message The message to translate
     * @param string|null $locale  The locale of the translation or null for the default locale.
     * @return string
     */
    protected function _translate($message, $locale = null)
    {
        if (!$this->_translator instanceof Translator) {
            return $message;
        }

        return $this->_translator->translate($message, 'iso-3166-1', $locale);
    }
    /**
     * Get two letter alphabetic code of the item
     * 
     * @return string
     */
    public function getAlpha2()
    {
        return $this->alpha2;
    }

    /**
     * Get three letter alphabetic code of the item
     * 
     * @return string
     */
    public function getAlpha3()
    {
        return $this->alpha3;
    }

    /**
     * Get name of the item
     * 
     * @return string
     */
    public function getName($locale = null)
    {
        return $this->_translate($this->name, $locale);
    }

    /**
     * Get three digit numeric code of the item, including leading zeros
     * 
     * @return string
     */
    public function getNumeric()
    {
        return $this->numeric;
    }

    /**
     * Get official name of the item (optional)
     * 
     * @return string
     */
    public function getOfficialName($locale = null)
    {
        return $this->_translate($this->officialName, $locale);
    }

    /**
     * Get common name of the item (optional)
     * 
     * @return string
     */
    public function getCommonName($locale = null)
    {
        return $this->_translate($this->commonName, $locale);
    }

    /**
     * Exchange the array with this object
     * 
     * @param array $input
     */
     public function exchangeArray($input)
     {
        // make sure we have all the data
        $input['alpha_2']       = isset($input['alpha_2'])       ? $input['alpha_2']       : null;
        $input['alpha_3']       = isset($input['alpha_3'])       ? $input['alpha_3']       : null;
        $input['name']          = isset($input['name'])          ? $input['name']          : null;
        $input['numeric']       = isset($input['numeric'])       ? $input['numeric']       : null;
        $input['official_name'] = isset($input['official_name']) ? $input['official_name'] : null;
        $input['common_name']   = isset($input['common_name'])   ? $input['common_name']   : null;

        if (empty($input['alpha_2'])) {
            throw new Exception\InvalidArgumentException('alpha_2 is a required property an can not be empty.');
        }
        if (!preg_match('/^[A-Z]{2}$/', $input['alpha_2'])) {
            throw new Exception\InvalidArgumentException('alpha_2 has an invalid value.');
        }

        if (empty($input['alpha_3'])) {
            throw new Exception\InvalidArgumentException('alpha_3 is a required property an can not be empty.');
        }
        if (!preg_match('/^[A-Z]{3}$/', $input['alpha_3'])) {
            throw new Exception\InvalidArgumentException('alpha_3 has an invalid value.');
        }

        if (empty($input['name'])) {
            throw new Exception\InvalidArgumentException('name is a required property an can not be empty.');
        }

        if (empty($input['numeric'])) {
            throw new Exception\InvalidArgumentException('numeric is a required property an can not be empty.');
        }
        if (!preg_match('/^[0-9]{3}$/', $input['numeric'])) {
            throw new Exception\InvalidArgumentException('numeric has an invalid value.');
        }

        $this->alpha2       = $input['alpha_2'];
        $this->alpha3       = $input['alpha_3'];
        $this->name         = $input['name'];
        $this->numeric      = $input['numeric'];
        $this->officialName = $input['official_name'];
        $this->commonName   = $input['common_name'];
     }

    /**
     * Creates a copy of the object as an array.
     * 
     * @return array
     */
    public function getArrayCopy()
    {
        return array(
            'alpha_2'       => $this->alpha2,
            'alpha_3'       => $this->alpha3,
            'name'          => $this->name,
            'numeric'       => $this->numeric,
            'official_name' => $this->officialName,
            'common_name'   => $this->commonName,
        );
    }

}