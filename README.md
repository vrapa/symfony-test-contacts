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

# Minimální Požadavky

Tento projekt vyžaduje následující minimální požadavky:

## Systémové požadavky

- Operační systém: Linux, Windows nebo macOS
- Paměť RAM: Doporučeno 2 GB nebo více
- Místo na disku: Doporučeno 500 MB volného místa

## Software

- PHP: Verze 8.1 nebo novější
  - Oficiální stránky PHP: [https://www.php.net/](https://www.php.net/)
  - Instalace PHP: [https://www.php.net/manual/en/install.php](https://www.php.net/manual/en/install.php)

- MySQL nebo MariaDB: Doporučena verze 5.7 nebo novější (pro MySQL) nebo 10.2 nebo novější (pro MariaDB)
  - MySQL: [https://www.mysql.com/](https://www.mysql.com/)
  - MariaDB: [https://mariadb.org/](https://mariadb.org/)
  - Instalace MySQL: [https://dev.mysql.com/doc/refman/8.0/en/installing.html](https://dev.mysql.com/doc/refman/8.0/en/installing.html)
  - Instalace MariaDB: [https://mariadb.com/kb/en/getting-started-with-mariadb/](https://mariadb.com/kb/en/getting-started-with-mariadb/)

## Další závislosti

- Composer (pro správu závislostí PHP)
  - Oficiální stránky Composeru: [https://getcomposer.org/](https://getcomposer.org/)
  - Instalace Composeru: [https://getcomposer.org/download/](https://getcomposer.org/download/)
