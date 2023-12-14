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
4. Crear la APP_KEY de Laravel
```bash
php artisan key:generate
```
5. Iniciar las imagenes Docker
```bash
./vendor/bin/sail up
```
6. Ejecutar migraciones en la imagen de MySQL
```bash
./vendor/bin/sail php artisan migrate
```
7. Instalar Tailwind
```bash
npm install
```
8. Generar archivos para producción
```bash
npm run build
```
### Desarrollado con Laravel 10, Livewire 3, Tailwind 3 y Docker.