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
     * @Route("/createMovie/{name}/{year}", name="create_movie")
     */
    public function createMovie(string $name, int $year): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $movie = new Movie();

        $movie->setName($name);

        $movie->setReleaseYear($year);

        $entityManager->persist($movie);

        $entityManager->flush();

        return new Response((string) $movie . ' - ' . $year, 400);

        // $errors = $validator->validate($movie);
        // if (count($errors) > 0) {
        // return new Response((string) $errors, 400);
        // }
    }
}
