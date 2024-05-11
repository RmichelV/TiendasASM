# TiendasASM
Proyecto integrador 2 


# instalar las siguientes dependencias al bajar el proyecto 

composer install 

cp .env.example .env

php artisan key:generate

npm install 

chmod -R 775 storage

php artisan config:cache

php artisan config:clear


# Configurarcion de email 

https://mailtrap.io/signin

una vez que se ha iniciado sesion ir a *Email Testing* -> *inboxex* -> *my inbox* -> *integration*

ahi seleccionar en integrations laravel 9+ y modificar solo las lineas necesarias del archivo .env


para mas detalle https://www.youtube.com/watch?v=3hRkE64YIqg



# Pasos para agregar un juego

por defecto al crear un nuevo usuario en registro sera del rol 3  (usuario comun) desde la base de datos o desde *lista de usuarios* modificarlo a 1 o 2 , 

crear una tienda y asignarle un usuario 

con el usuario al que designaron una tienda iniciar sesion  con él e ir a *mis juegos* 


