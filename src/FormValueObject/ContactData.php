<?php
namespace App\FormValueObject;

use Symfony\Component\Validator\Constraints as Assert;

class ContactData
{
    #[Assert\NotBlank(message: "Jméno je povinná položka")]
    public ?string $name;

    #[Assert\NotBlank(message: "Příjmení je povinná položka")]
    public ?string $surname;

    public ?string $phone;

    #[Assert\NotBlank(message: "Mail je povinná položka")]
    #[Assert\Email(message: "Formát mailu je chybný")]
    public ?string $mail;

    #[Assert\Length(max: 255, maxMessage: "Maximální délka poznámky je {{ limit }} znaků")]
    public ?string $note;
}
