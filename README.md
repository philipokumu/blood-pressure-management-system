## Setup

Clone the project from Git and cd into the project directory.

git clone https://github.com/philipokumu/blood-pressure-management-system.git
cd blood-pressure-management-system
Install backend dependencies

composer install
<p>Install frontend dependencies</p>

npm install
Create a database and set the environment variables in .env file.

Migrate the database

php artisan migrate:fresh --seed
