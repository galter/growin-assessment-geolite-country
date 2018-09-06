## Technical Task | Nearshore Growin

Simple project showing how to load GeoLite Country IP list from CSV file into a Restful API database and match IP and Country respectively throught GET endpoint, also make automated tests.

---

### How to use

- Clone the repository with __git clone__
- Create a DB called 'geolite'
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate__
- Run __php artisan db:seed__ to Load CSV file and fill table countries
- Run __php artisan serve__ to Run Built-in web server
- That's it - Try api GET endpoint on localhost:8000/api/locationByIP?IP=127.0.0.1 (Change for the IP you want to)

---

### License

Please use and re-use however you want.

---