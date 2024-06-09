# Komenty

Toto je Laravel aplikácia pre správu komentárov.

## Inštalácia

Postup pre inštaláciu a spustenie aplikácie:

1. Klonujte repozitár:
    ```sh
    git clone https://github.com/viky321/Komenty.git
    ```
2. Prejdite do adresára projektu:
    ```sh
    cd Komenty
    ```
3. Nainštalujte závislosti pomocou Composeru:
    ```sh
    composer install
    ```
4. Nainštalujte závislosti pre JavaScript a CSS pomocou NPM:
    ```sh
    npm install
    ```
5. Skopírujte súbor `.env.example` do `.env` a upravte ho podľa potreby:
    ```sh
    cp .env.example .env
    ```
6. Vygenerujte aplikačný kľúč:
    ```sh
    php artisan key:generate
    ```
7. Spustite migrácie pre vytvorenie databázových tabuliek:
    ```sh
    php artisan migrate
    ```
8. Spustite lokálny vývojový server:
    ```sh
    php artisan serve
    ```

## Používanie

Po spustení vývojového servera môžete prístup k aplikácii získať na adrese:

## Odkazy

- [GitHub repozitár](https://github.com/viky321/Komenty)

Ak chcete prezrieť kód tejto aplikácie, navštívte môj [GitHub repozitár](https://github.com/viky321/Komenty).

http://127.0.0.1:8000/

