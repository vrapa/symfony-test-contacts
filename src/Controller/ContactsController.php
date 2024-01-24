<?php
namespace App\Controller;

use App\Repository\ContactsRepository;
use App\Service\ContactService;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

// ...

class ContactsController extends AbstractController
{
    private const CONTACTS_PER_PAGE = 10;
    public function __construct(
        private readonly ContactService $contactService,
        private readonly ContactsRepository $contactsRepository,
        private readonly EntityManagerInterface $entityManager
    )
    {
    }

    #[Route('/', name: 'contact_list')]
    public function contactList(Request $request, PaginatorInterface $paginator, SluggerInterface $slugger): Response
    {
        $queryBuilder = $this->contactsRepository->createQueryBuilder('c');
        $pagination = $paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            self::CONTACTS_PER_PAGE
        );

        return $this->render('contacts/list.html.twig', [
            'pagination' => $pagination,
            'slugger' => $slugger,
        ]);
    }

    #[Route('/{id}-{slug}', name: 'contact_edit', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
    public function contactEdit(Request $request, int $id, string $slug, SluggerInterface $slugger): Response
    {
        $contact = $this->contactsRepository->find($id);

        // Kontrola, zda slug odpovídá kontaktu
        $expectedSlug = $slugger->slug($contact->getName())->lower();

        if ($slug !== (string)$expectedSlug) {
            return $this->redirectToRoute('contact_edit', [
                'id' => $id,
                'slug' => $expectedSlug,
            ]);
        }

        $contactForm = $this->contactService->getContactForm($id);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $contactData = $contactForm->getData();
            $contact->setName($contactData->name);
            $contact->setSurname($contactData->surname);
            $contact->setTelefon($contactData->phone);
            $contact->setEmail($contactData->mail);
            $contact->setNote($contactData->note);

            $this->entityManager->persist($contact);
            $this->entityManager->flush();
            $this->addFlash('success', 'Kontakt byl úspěšně uložen');
            return $this->redirectToRoute('contact_list');
        }

        return $this->render('contacts/edit.html.twig', [
            'contactForm' => $contactForm->createView(),
            'contact' => $contact,
        ]);
    }


    #[Route('/delete/{id}', name: 'delete_item', methods:['POST'])]

    public function delete(int $id): Response
    {
        $contact = $this->contactsRepository->find($id);
        $this->entityManager->remove($contact);
        $this->entityManager->flush();

        $this->addFlash('success', 'Kontakt byl úspěšně smazán');
        // Přesměrování po úspěšném smazání
        return $this->redirectToRoute('contact_list');
    }


}