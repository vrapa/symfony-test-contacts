<?php

namespace App\Service;

use App\Repository\ContactsRepository;

class ContactService
{
    public function __construct(
        private readonly ContactsRepository $contactsRepository,
    ) {
    }



}