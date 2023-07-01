composer install

cp .env.example .env

echo Username:
read user

echo Password:
read pass

php artisan key:generate

php artisan migrate

php artisan app:make-user $user $pass

echo Deploy successfully!