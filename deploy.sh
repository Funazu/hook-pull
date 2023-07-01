composer install

cp .env.example .env

read -p 'Username: ' user

read -p 'Password: ' pass

php artisan key:generate

php artisan migrate

php artisan app:make-user $user $pass

echo Deploy successfully!