# symfony-test-contacts
Test app Contacts
=================

Aplikace pro účely testování Symfony fameworku.
-----------------------------------------------
Jedná ze pouze o testování použití Symfony frameworku a jeho komponentů. 
Slouží jako seznam kontaktů, které lze přidávat, upravovat a mazat.
Grafika je ignorovaná, neboť nebyla vytvořena žádná grafická šablona.


Instalace aplikace
------------------
1. Naklonovat repozitář do adresáře, kde máte nastavený webserver: `git clone git@github.com:vrapa/symfony-test-contacts.git` 
2. Nainstalovat závislosti pomocí composeru: `composer install`
3. Upravit .htaccess v kořenovém adresáři aplikace dle potřeby
4. Upravit připojení k databázi v souboru .env
5. Vytvořit databázi pomocí příkazu `php bin/console doctrine:database:create`
6. Vytvořit tabulky pomocí příkazu `php bin/console doctrine:schema:update --force`
6. Vytvořit fake data pomocí migrace `php bin/console doctrine:migrations:migrate`
7. Aplikace je připravena k použití.