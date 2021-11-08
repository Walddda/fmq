<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Entity\Quote;
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


    /**
     * @Route("/createQuote/{text}/{char}/{movie_id}", name="create_quote")
     */
    public function createQuote(string $text, string $char, int $movie_id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $quote = new Quote();

        $quote->setText($text);

        $quote->setCharacter($char);

        $movie = $this->getDoctrine()
            ->getRepository(Movie::class)
            ->find($movie_id);

        $quote->setMovie($movie);

        $entityManager->persist($quote);

        $entityManager->flush();

        return new Response((string) $text . ' - ' . $char . ' - ' . $movie_id, 400);

        // $errors = $validator->validate($movie);
        // if (count($errors) > 0) {
        // return new Response((string) $errors, 400);
        // }
    }
}
