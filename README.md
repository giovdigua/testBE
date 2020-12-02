## Istruzioni

Dopo aver clonato il repository dare il comando 
composer install 
poi copiare il file .env.example in un .env (cp .env.example .env) NB il db sqlite è già nel .env.example ma bisogna cambiare il path relativo con quello assoluto.
poi creare la key con php artisan php artisan key:generate
dare il comando php artisan migrate --seed e poi il comando php artisan passport:install
dopo aprire postman o simile 
attivare il serve con php artisan serve
poi aprire postman o similare per provare le api
per ottenere il token http://127.0.0.1:VOSTRAPORTA/api/login e username e password come vostre istruzioni
per le chiamate http://127.0.0.1:VOSTRAPORTA/api/authors/  per gli autori (lettura libera,creazione modifica e cancellazione con token)
per le chiamate http://127.0.0.1:VOSTRAPORTA/api/authors/{idautore}/volums  per i volumi (lettura libera,creazione modifica e cancellazione con token)
