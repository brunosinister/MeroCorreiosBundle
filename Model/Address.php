<?php

namespace Mero\Bundle\CorreiosBundle\Model;

class Address
{

    /**
     * @var string Address
     */
    private $address;

    /**
     * @var string Name of the neighborhood
     */
    private $neighborhood;

    /**
     * @var string Name of the city
     */
    private $city;

    /**
     * @var string Name of the state or federal unit(FU)
     */
    private $state;

    /**
     * @var string Zip code
     */
    private $zipCode;

    /**
     * @var string ISO 3166-1 alpha 2 of the country
     */
    private $country;

    public function __construct($address, $neighborhood, $city, $state, $zipCode, $country = 'BR')
    {
        $this->address = $address;
        $this->neighborhood = $neighborhood;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->country = $country;
    }

    /**
     * Returns the address.
     *
     * @return string Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Returns name of the neighborhood.
     *
     * @return string Name of the neighborhood
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * Returns name of the city
     *
     * @return string Name of the city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Returns name of the state or federal unit(FU).
     *
     * @return string Name of the state or federal unit(FU)
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Returns zip code.
     *
     * @return string Zip code
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Returns ISO 3166-1 alpha 2 of the country.
     *
     * @return string ISO 3166-1 alpha 2 of the country
     */
    public function getCountry()
    {
        return $this->country;
    }

}
