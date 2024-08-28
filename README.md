
# Tailwebs Assignemnt

This is a simple laravel project assessment from the Tailwebs




## Installation

# Note - start the apache and mysql service or the nginx and mysql serivce to run this laravel project smoothly

```bash
git clone https://github.com/rahulemathi/tailwebs-assignment.git
```
```bash
cd tailwebs-ssignemnt
```
```bash
composer install
```
```bash
npm install
```

to run a build file run this below command

```bash
npm run dev
```


now start the migration 

```bash
php artisan migrate
```

if you face any error then create a database in the mysql and restart the migration

now run the seeder command 

```bash
php artisan db:seed --class=UserSeeder
```

now start the server

```bash
php artisan serve
```

video reference

[Watch the video](https://github.com/rahulemathi/tailwebs-assignment/blob/main/demo.mp4)

youtube link
[Watch the video](https://www.youtube.com/watch?v=UnMJ8xJ5jew)