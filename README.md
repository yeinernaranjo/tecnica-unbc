# Proyecto CRUD de Usuarios

## Instalación

1. Clona este repositorio en tu máquina local:

```bash
git clone https://github.com/yeinernaranjo/tecnica-unbc.git
```

2. Instala las dependencias de PHP utilizando Composer:

```bash
composer install
```

3. Instala las dependencias de JavaScript utilizando npm:

```bash
npm install
```

4. Ejecuta las migraciones de la base de datos para crear las tablas necesarias:

```bash
php artisan migrate
```

En caso de obtener algún error ejecutar

```bash
php artisan migrate:fresh
```

5. Agrega los datos de ejemplo para obtener el usuario administrador (OPCIONAL)

```bash
php artisan db:seed
```

Correo: admin@admin.com
Contraseña: admin

6. Una vez configurado, puedes ejecutar el proyecto usando el siguiente comando:

```bash
npm start
```
