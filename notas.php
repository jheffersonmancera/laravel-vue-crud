/*=============================================
INSTALACION VUE.JS
=============================================*/
https://unpkg.com/vue@2.5.13/dist/vue.js
-copiar codigo
-borrar estis archivos:
	resources/assets/js/components
	resources/assets/js/app.js
	resources/assets/js/bootstrap.js
-crear resources/assets/js/vue.js pegar contenido copiado de vue

-AXIOS
copiar codigo de axios del repositorio dist
https://raw.githubusercontent.com/axios/axios/master/dist/axios.js
	-crear archivo  resources/assets/js/axios.js
	-pegar codigo
-crear archivo personalizado  resources/assets/js/app.js

/*=====   ======*/

/*=============================================
INSTALACION DE LARAVEL MIX
=============================================*/
-npm install

-instalar node.js

-//Se requiere tomar todos los archivos que tenemos en resources/assets/js/ agruparlos y llevarlos a public/js y remplazar el app.js que esta por defecto

-eliminamos esta linea de webpack.mix.js
.sass('resources/assets/sass/app.scss', 'public/css');
-modificamos esta linea:
mix.scripts([
	'resources/assets/js/vue.js',
	'resources/assets/js/axios.js',
	'resources/assets/js/app.js',
	], 'public/js/app.js');
//*1
Laravel mix es un sistema que instalamos en laravel para definir el paso a paso de compilacion de web pack utilizando un metodo de encadenamiento.
En este caso todo termina en un archivo llamado app.js

-ejecutamos npm run dev

-eliminamos style de welcome.blade.php y contenido de body
-ir a pagina de bootstrap copiar el css only y ponerlo en welcome.blad.php
generar esta linea: <script src="{{asset('js/app.js')}}"></script>
-generar contenido para el archivo resources/assets/js/app.js

-npm run dev





/*=====   ======*/
