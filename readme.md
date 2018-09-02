## Technical Task | Nearshore Growin

Simple project showing how to load GeoLite Country IP list from CSV file into a Restful API database and match IP and Country respectively throught GET endpoint, also make automated tests.

---

### How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate__
- Run __php artisan db:seed__ to Load CSV file and fill table countries
- That's it - load the homepage and change IP request to testing IP (api/locationByIP?IP=127.0.0.1)

---

### License

Please use and re-use however you want.

---