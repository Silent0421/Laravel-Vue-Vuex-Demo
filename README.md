<h2>Setting up</h2>

---
$ git clone

Update db connection settings in .env file


---

<h4>Backend:</h4>

$ composer install && composer update

$ php artisan key:generate 

$ php artisan migrate --seed

$ php artisan storage:link

$ php artisan jwt:secret

---

<h4>Frontend:</h4>

$ npm install

$ npm run dev
