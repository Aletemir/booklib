<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Book;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 *Class DefaultController
 *@package App\controller
 *@Route ("/default")
 *
 */

class DefaultController extends BaseController
{
    /**
     * @Route("/{nom} ", name="default", methods={"GET"})
     */
    public function index(string $nom, Resquest $resquest)
    {
        $author = $this->getDoctrine()->getRepository(Author::class)->findOneByLastname($nom);

        if (!$author) {
            throw $this->createNotFoundException('Auteur introuvable!');
       }

       echo $resquest->query->get('Test');
        die;


        return new Response($author->getFirstName() .  ' ' . $author->getLastName()) ;

    }

    /**
     * @Route("/book/{slug}", name="show-book")
     */
    public function showBook(Book $book)
    {
        return new Response($book->getTitle());
    }


}
