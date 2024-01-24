<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240124102753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Přidání dat do tabulky contacts';
    }

    public function up(Schema $schema): void
    {
        // Vložení falešných dat do tabulky 'contacts'
        for ($i = 1; $i <= 30; $i++) {
        $name = 'Name' . $i;
            $surname = 'Surname' . $i;
            $phone = '123456' . str_pad((string)$i, 3, '0', STR_PAD_LEFT);
            $email = 'contact' . (string)$i . '@example.com';
            $note = 'This is a fake description for contact ' . (string)$i;

            $this->addSql("INSERT INTO contacts (name, surname, telefon, email, note) VALUES ('$name', '$surname', '$phone', '$email', '$note')");
        }

    }

    public function down(Schema $schema): void
    {
        // Odstranění vložených dat z tabulky 'contacts'
        $this->addSql("DELETE FROM contacts WHERE name LIKE 'Name%' AND surname LIKE 'Surname%'");
    }
}
