# laravel-cloudcare-test-barile

#Comandi per eseguire l'ambiente di sviluppo : 

1) Posizionarsi nella directory del progetto;
2) Lanciare il comando "docker-compose up -d --build"
3) Lanciare all'interno del container "laravel-app" i seguenti comandi : php artisan migrate:fresh && php artisan db:seed AuthSeeder && php artisan passport:install && php artisan passport:client --personal 


L'app è pronta per essere utilizzata -> http://localhost;


L'app funziona sia in modalità UI che in modalità solo API; 
Per utilizzare la modalità API : 

1) Eseguire il login utilizzando i dati di default "root" - "password" all'endpoint : url/api/login {"username" : "username", "password" : "password"};
2) Una volta ottenuto il token utilizzarlo per richiamare l'endpoint url/api/beers - Headers : ['Authorization' => 'Bearer' $token]


