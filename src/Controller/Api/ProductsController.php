<?php

namespace App\Controller\Api;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController; 
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Products
 * @Route("/api", name="api_")
 */
class ProductsController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/products")
     */
    public function getProductsAction()
    {
        $data = ['id' => 11, 'title' => 'Prod 1']; // get data, in this case list of users.
        $view = $this->view($data, 200);

        return $this->handleView($view);
    }
}
