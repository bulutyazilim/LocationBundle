<?php

namespace OkulBilisim\LocationBundle\Controller;

use OkulBilisim\LocationBundle\Entity\Country;
use OkulBilisim\LocationBundle\Entity\Province;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @method RegistryInterface getDoctrine
 */
class DefaultController extends Controller
{
    public function citiesAction($country)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var Country $country */
        if ( ! $country = $em->getRepository('OkulBilisimLocationBundle:Country')->find($country)) {
            throw $this->createNotFoundException();
        }

        return JsonResponse::create($country->getProvinces()->map(function(Province $province) {

            return [
                'id' => $province->getId(),
                'name' => $province->getName()
            ];

        })->toArray());
    }
}
