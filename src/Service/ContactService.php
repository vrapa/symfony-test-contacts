<?php

namespace App\Service;

use App\Form\ContactFormType;
use App\FormValueObject\ContactData;
use App\Repository\ContactsRepository;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class ContactService
{
    public function __construct(
        private readonly ContactsRepository   $contactsRepository,
        private readonly FormFactoryInterface $formFactory
    ) {
    }

    public function getContactForm(?int $id = null): FormInterface
    {
        $defaultData = $id ? $this->getFormContactData($id) : new ContactData();

        return $this->formFactory->create(ContactFormType::class, $defaultData, [
            'method' => 'GET',
            'csrf_protection' => false,
        ]);
    }

    private function getFormContactData(int $id): ContactData
    {
        $contact = $this->contactsRepository->find($id);

        $contactData = new ContactData();
        $contactData->name = $contact->getName();
        $contactData->surname = $contact->getSurname();
        $contactData->phone = $contact->getTelefon();
        $contactData->mail = $contact->getEmail();
        $contactData->note = $contact->getNote();

        return $contactData;
    }
}