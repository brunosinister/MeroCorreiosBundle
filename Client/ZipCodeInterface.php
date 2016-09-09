<?php

namespace Mero\Bundle\CorreiosBundle\Client;

use Mero\Bundle\CorreiosBundle\Client\Exception\AddressNotFoundException;
use Mero\Bundle\CorreiosBundle\Model\Address;

interface ZipCodeInterface
{

    /**
     * Find address information using the zip code.
     *
     * @param string $zipCode Zip code
     *
     * @return Address Address information
     *
     * @throws AddressNotFoundException When the address is not found
     */
    public function findAddressByZipCode($zipCode);

}
