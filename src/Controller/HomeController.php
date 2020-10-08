<?php
namespace App\Controller;

use App\Repository\PropertyMainRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

    /**
     * @Route("/", name="home")
     * @return Response
    */
    public function index(PropertyMainRepository $repository): Response {
        $properties = $repository->findLatest();
        return $this->render("pages/home.html.twig", [
            'properties' => $properties
        ]);
    }
}