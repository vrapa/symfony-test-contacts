<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use App\Repository\ContactsRepository;
use App\Service\ContactService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// ...

class ContactsController extends AbstractController
{
    private const CONTACTS_PER_PAGE = 10;
    public function __construct(
        private readonly ContactService $contactService,
        private readonly ContactsRepository $contactsRepository,
    )
    {
    }

    #[Route('/')]
    public function contactList(Request $request, PaginatorInterface $paginator): Response
    {
        $queryBuilder = $this->contactsRepository->createQueryBuilder('c');
        $pagination = $paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            self::CONTACTS_PER_PAGE
        );

        return $this->render('contacts/list.html.twig', [
            'pagination' => $pagination,
        ]);
    }
}