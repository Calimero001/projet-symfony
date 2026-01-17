<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use App\Repository\BookRepository; // <-- Import important
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/book', name: 'app_book')]
    public function index(BookRepository $bookRepository): Response
    {
        
        $books = $bookRepository->findAll();

        
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
            'books' => $books,
        ]);
    }

    #[Route('/add_book', name: 'app_book_add')]
    public function addBook(Request $request): Response
    {
        $book = new Book();
        $bookForm = $this->createForm(BookType::class, $book);

        return $this->render('book/add.html.twig', [
            'bookForm' => $bookForm->createView(), 
        ]);
    }
}