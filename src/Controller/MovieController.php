<?php

namespace App\Controller;

use App\Entity\Movie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class MovieController extends AbstractController
{
    /**
     * @Route("/movie", name="movie")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to the Movie controller!',
            'path' => 'src/Controller/MovieController.php',
        ]);
    }


    /**
     * @Route("/product", name="create_product")
     */
    public function createMovie(): Response
    {
        $movie = new Movie();

        $movie->setName('Terminator');

        $movie->setReleaseYear('1984');


        // $errors = $validator->validate($movie);
        // if (count($errors) > 0) {
        // return new Response((string) $errors, 400);
        // }
    }
}
