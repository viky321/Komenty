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

## Spustenie aplikácie

Na spustenie aplikácie lokálne vykonajte nasledujúce príkazy v termináli:

1. Spustite lokálny vývojový server pre PHP:
    ```sh
    php artisan serve
    ```

2. V novom termináli spustite kompiláciu assetov pomocou NPM:
    ```sh
    npm run dev
    ```

## Používanie

Po spustení vyššie uvedených príkazov môžete prístup k aplikácii získať na adrese: http://localhost:8000

## Odkazy

- [GitHub repozitár](https://github.com/viky321/Komenty)

Ak chcete prezrieť kód tejto aplikácie, navštívte môj [GitHub repozitár](https://github.com/viky321/Komenty).
