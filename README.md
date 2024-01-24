# symfony-test-contacts
Test app Contacts
=================
Instalace aplikace
------------------
1. Naklonovat repozitář
2. Nainstalovat závislosti pomocí composeru
3. Upravit .htaccess v kořenovém adresáři aplikace dle potřeby
4. Upravit připojení k databázi v souboru .env
5. Vytvořit databázi pomocí příkazu `php bin/console doctrine:database:create`
6. Vytvořit tabulky pomocí příkazu `php bin/console doctrine:schema:update --force`
6. Vytvořit repository pomocí příkazu `php bin/console doctrine:migrations:diff`






Testovací URL:
http://stc.local/


