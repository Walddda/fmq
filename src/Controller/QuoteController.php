<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuoteController extends AbstractController
{
    /**
     * @Route("/quote", name="quote")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to the Quote controller!',
            'path' => 'src/Controller/QuoteController.php',
        ]);
    }
}
