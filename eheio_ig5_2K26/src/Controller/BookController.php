<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/book', name: 'app_book')]
    public function index(): Response
    {
        // Cette page n'a pas de formulaire, elle affiche juste un message
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }

    #[Route('/add_book', name: 'app_book_add')]
    public function addBook(Request $request): Response
    {
        $book = new Book();
        $bookForm = $this->createForm(BookType::class, $book);

        // Cette page utilise add.html.twig et possède la variable bookForm
        return $this->render('book/add.html.twig', [
            'bookForm' => $bookForm->createView(), 
        ]);
    }
}