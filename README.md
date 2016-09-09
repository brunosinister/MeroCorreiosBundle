MeroCorreiosBundle
==================

Bundle with Symfony services for integration of Correios(Brazil).

Requirements
------------

- PHP 5.5.9 or above
- Symfony 2.7 or above(including Symfony 3)
- SOAP extension

Instalation with composer
-------------------------

1. Open your project directory;
2. Run `composer require mero/correios-bundle` to add MeroCorreiosBundle in your project vendor;
3. Open **my/project/dir/app/AppKernel.php**;
4. Add `Mero\Bundle\CorreiosBundle\MeroCorreiosBundle()`.

Services
--------

To search an address using as parameter zip code(CEP in Brazil), use the service listed below corresponding to your
region and call method "findAddressByZipCode".

| Company  | Country | Service name         | Class                                                                                                                          |
| -------- | ------- | -------------------- | ------------------------------------------------------------------------------------------------------------------------------ |
| Correios | Brazil  | mero_correios.client | [Mero\Bundle\CorreiosBundle\Client\Correios](https://github.com/merorafael/MeroCorreiosBundle/blob/master/Client/Correios.php) |

### Usage example:
```php
namespace Acme\Bundle\BlogBundle\Controller;

use Mero\Bundle\CorreiosBundle\Client\Exception\AddressNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProfileController extends Controller
{

    /**
     * @Route("/", name="profile_index")
     */
    public function indexAction(Request $request)
    {
        $client = $this->get('mero_correios.client'); // Return "Client\Correios" object
        try {
            $address = $client->findAddressByZipCode('20071-003'); // Return "Address" model object
            
            echo $address->getAddress(); // Return the address(eg. "Av. Pres. Vargas")
            echo $address->getNeighborhood(); // Returns name of the neighborhood(eg. "Central")
            echo $address->getCity(); // Returns name of the city(eg. "Rio de Janeiro")
            echo $address->getState(); // Returns name of the state or federal unit(eg. "RJ")
            echo $address->getZipCode(); // Returns the zip code(eg. "20071-003")
            echo $address->getCountry(); // Returns ISO 3166-1 alpha 2 of the country(eg. "BR")
        } catch (AddressNotFoundException $e) {
            echo $e->getMessage();
        }
    }

}
```
