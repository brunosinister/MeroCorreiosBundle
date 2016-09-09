<?php

namespace Mero\Bundle\CorreiosBundle\Client;

use Mero\Bundle\CorreiosBundle\Client\Exception\AddressNotFoundException;
use Mero\Bundle\CorreiosBundle\Model\Address;

class Correios implements ZipCodeInterface
{

    /**
     * @var \SoapClient Webservice connection
     */
    private $wsConn;

    public function __construct()
    {
        $this->wsConn = new \SoapClient(
            'https://apps.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl'
        );
    }

    /**
     * @inheritDoc
     */
    public function findAddressByZipCode($zipCode)
    {
        $zipCode = preg_replace('/[^0-9]/', '', $zipCode);
        try {
            $addressInformation = $this->wsConn->__soapCall(
                'consultaCEP',
                [
                    'consultaCEP' => [
                        'cep' => $zipCode
                    ]
                ]
            );

            return new Address(
                $addressInformation['end'],
                $addressInformation['bairro'],
                $addressInformation['cidade'],
                $addressInformation['uf'],
                $addressInformation['cep'],
                'BR'
            );
        } catch (\SoapFault $e) {
            throw new AddressNotFoundException($e->getMessage());
        }
    }

}
