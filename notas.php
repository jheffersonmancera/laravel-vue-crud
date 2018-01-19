_____________________________________________________
NOTAS PREVIAS
-Laravel mix es un sistema que define el paso a paso de compilacion de la tecnología webpack
Webpack es una aplicacion de node que ya viene incluida en laravel, es un sistema de agrupacion para preparar una aplicacion web antes de subir al servidor. Se trata de producir un solo archivo minificado que se va a usar desde nuestro html.
________________________________________
CREAR PROYECTO LARAVEL 5.5
-composer create-project --prefer-dist laravel/laravel laravel-vue-crud

/*=============================================
INSTALACION VUE.JS
=============================================*/
https://unpkg.com/vue@2.5.13/dist/vue.js
-copiar codigo
-borrar estos archivos del proyecto laravel:
	resources/assets/js/components
	resources/assets/js/app.js
	resources/assets/js/bootstrap.js
-crear resources/assets/js/vue.js pegar contenido copiado de la pagina de vue.js

-AXIOS
copiar codigo de axios del repositorio dist
https://raw.githubusercontent.com/axios/axios/master/dist/axios.js
	-crear archivo  resources/assets/js/axios.js
	-pegar codigo
-crear archivo personalizado  resources/assets/js/app.js


/*=============================================
INSTALACION DE LARAVEL MIX
=============================================*/
__________Instalacion de Node_____________________________
https://nodejs.org/en/download/

__________Instalacion de Npm(Node packages Manager)___________________________
ingresar en la consola al proyecto laravel y ejecutar el siguiente instalador:
-npm install
//npm es como un composer para el frontend
_______________________________________________________
-instalar node.js


_____________webpack.mix.js____________________

-//Se requiere tomar todos los archivos que tenemos en resources/assets/js/ agruparlos y llevarlos a public/js y remplazar el app.js que esta por defecto

-eliminamos esta linea de webpack.mix.js debido a que no compilaremos en este caso ningun archivo .sass en este proyecto
.sass('resources/assets/sass/app.scss', 'public/css');
-vamos a mezclar los siguientes scripts, de forma jerarquica
mix.scripts([
	'resources/assets/js/vue.js',
	'resources/assets/js/axios.js',
	'resources/assets/js/app.js',
	], 'public/js/app.js');//aqui es donde compilará
*1
Laravel mix es un sistema que instalamos en laravel para definir el paso a paso de compilacion de web pack utilizando un metodo de encadenamiento.
En este caso todo termina en un archivo llamado app.js

-ejecutamos en consola: 
npm run dev //cada vez que percibe un cambio npm dev vuelve y compila



_______________________welcome.blade.php____________________
-eliminamos style de welcome.blade.php y contenido de body
-poner ruta de bootstrap en welcome.blade.php
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

-generar esta linea para enlazar con el archivo que se creo con mix: <script src="{{asset('js/app.js')}}"></script>

-npm run dev para compilar

_______________________welcome.blade.php____________________
*1 es necesario poner un @ para no generar conflictos entre Vue y laravel

_________________________BASE DE DATOS____________________-
-Crear base con nombre: laravel_vue 

_________________MIGRACION Y MODELO__________________________
php artisan make:model Task -m //task modelo de tareas
esto genera el archivo database/migrations/create_tasks_table.php y crea el modelo para "Tarea"

___________________CONFIGURAR VISTAS_________________________
-renombro archivo welcome.blade.php ->app.blade.php

__________app.blade.php_______________-
*1 espacio para incrustar contenido
-------------------------------------

-crea plantilla resources/views/dashboard.blade.php //sera un panel administrativo


__________________dashboard.blade.php____________________-

*1 se extiende de la plantilla app
*2 seccion donde crearemos el contenido para app

-voy a routes/web.php y llamo a dashboard en la ruta raiz /

_________________BASE DE DATOS___________________
-No trabajare usuarios asi que elimino la migracion de users_table solo dejo la migracion de tareas
----------------.env-------------------
DB_DATABASE=laravel_vue
DB_USERNAME=root
DB_PASSWORD=
-----------------app/providers/AppServiceProvider.php-------------------
*1 esta libreria me permite configurar cosas predeterminadas en la base de datos
*2 tamaño por defecto para los campos string de la base de datos. 120 caracteres
-elimino modelo usuario User.php


_____________2018_01_19_091806_create_tasks_table________________

*1 campo keep o el contenido de la nota que estoy guardando


________________migracion____________________-
Ejecuto migracion con
php artisan migrate:refresh

_____________CONTROLADOR_______________
php artisan make:controller TaskController --resource //controlador con todos los metodos para crud

__________TaskController.php______________
*1 elimino el metodo show debido a que no lo voy a usar en este proyecto

_____________RUTAS____________________
routes/web.php
*1 es de tipo resource , no puedo acceder a esta ruta por medio del navegador, solo lo puedo hacer internamente cuando algo me lo solicita por una accion interna.
'task' = nombre de la ruta
'TaskController' = controlador al que invocará
-con php artisan route:list solicito la lista de rutas para determinar si existe alguna que me sobre
-como elimine el metodo show del TaskController, tambien debo eliminar la ruta tasks.show
-----------Eliminar una ruta------------
['except'=> 'show'] *1 agregar este parametro a la ruta para omitir la ruta show.
_______________________________________________________

_______________________________________________________
___________________INICIO DE API_______________________
--------------------------------------------------------

______________CREACION DE SEEDER_______________
 php artisan make:seeder TasksTableSeeder -> database/seeds/TasksTableSeeder.php

_______________DatabaseSeeder.php__________________
*1 invoco el seeder para los Tasks

_______TasksTableSeeder.php__________
*1 invocamos el modelo Task
*2 invocamos el metodo factory para pedirle que cree 5 instancias a partir del modelo Task.
