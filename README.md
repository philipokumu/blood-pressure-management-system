## Setup

# Clone the project from Git and cd into the project directory.

<p>git clone https://github.com/philipokumu/blood-pressure-management-system.git</p>
<p> cd blood-pressure-management-systemt</p>

# Install backend dependencies
composer install

# Install frontend dependencies
npm install

# Create a database and set the environment variables in .env file.

# Migrate the database

php artisan migrate:fresh --seed
