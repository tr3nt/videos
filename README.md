## Videos 1.0
Esaim Nájera Mondragón

**Roles:** Admin y Visitante

### Instalacion
1. Clonar repositorio
```bash
git clone https://github.com/tr3nt/videos.git
```
2. Ejecutar composer install
```bash
composer install
```
3. Copiar el archivo **.env.example** a **.env** (ej. Linux)
```bash
cp .env.example .env
```
4. Definir los parametros de base de datos en **.env**
```bash
DB_DATABASE=videos
DB_USERNAME=homestead
DB_PASSWORD=secret
```
5. Crear la APP_KEY de Laravel
```bash
php artisan key:generate
```
6. Ejecutar migraciones
```bash
php artisan migrate
```
7. Instalar Tailwind
```bash
npm install
```
8. Generar archivos para producción
```bash
npm run build
```
9. Ejecutar los Tests
```bash
php artisan test
```
### Desarrolllado con Laravel 10, Livewire 3 y Tailwind 3.