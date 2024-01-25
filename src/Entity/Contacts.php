<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'contacts')]
#[ORM\Entity(repositoryClass: 'App\Repository\ContactsRepository')]
class Contacts
{
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[ORM\Column(name: 'name', type: 'string', length: 50, nullable: false)]
    private string $name;

    #[ORM\Column(name: 'surname', type: 'string', length: 50, nullable: false)]
    private string $surname;

    #[ORM\Column(name: 'telefon', type: 'string', length: 20, nullable: true)]
    private ?string $telefon;

    #[ORM\Column(name: 'email', type: 'string', length: 50, nullable: false)]
    private string $email;

    #[ORM\Column(name: 'note', type: 'string', length: 255, nullable: true)]
    private ?string $note;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string|null
     */
    public function getTelefon(): ?string
    {
        return $this->telefon;
    }

    /**
     * @param string|null $telefon
     */
    public function setTelefon(?string $telefon): void
    {
        $this->telefon = $telefon;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }
}
