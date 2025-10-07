# logicaApp

Proyecto de formulario desarrollado en *Laravel*. se uso XAMPP para ejecutarse de manera local 

---

# Información del Proyecto

- **Framework:** Laravel 12.32.5  
- **Versión de PHP:** 8.2.12 
No se uso base como se indico se uso el envio Asincrono "guardar_mensaje.php"

**Lo mas importante se encuentra en las siguientes carpetas

MessageController -> \logicaApp\app\Http\Controllers 

El json guarda los registros - guardar_mensaje.php -> \logicaApp\storage\app

web.php -> \htdocs\logicaApp\routes

Las vistas son:
contacto.blade -> \htdocs\logicaApp\resources\views 
registros.blade -> \htdocs\logicaApp\resources\views 

**


---

# Instalación y Configuración

1. *Clonar el repositorio**:
en cmd usa: 
git clone https://github.com/tu_usuario/logicaApp.git
cd logicaApp

# Instalar dependencias para Laravel
en cmd usa:
composer install

#La clave ya se genero para que laravel se ejecute 
ya esta en el .env 
APP_KEY=base64:XXXXXXXXXXXXXXXXXXXXXXXXXXXXX
esta se hizo con 
En el cdm se puso:
php artisan key:generate

#Levantar servidor
en cmd usa:
php artisian serve

#Liga donde se ejecuta
http://127.0.0.1:8000
Este link sirve una vez que php artisian este corriendo correctamente junto con xampp (APACHE y MySQL)

