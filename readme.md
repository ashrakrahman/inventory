- colne this repository into your xampp folder.
- create a new .env file into yout project root folder.
- copy all config from .env.example file, and paste all configurations into the new .env file.
- create a mysql database in your localhost
-    In .env file, edit-
	DB_DATABASE=yourDbName
	DB_USERNAME=root
	DB_PASSWORD=

- Now open cmd into your xampp project repository folder.
- In cmd , 
	type- 
	1. composer install
	2. php artisan key:generate
	3. php artisan migrate
- create a virtual host 
- run and enjoy the project !
