## Videos 0.1
Desarrollado por Esaim Nájera Mondragón

### Instalacion
1. Clonar repositorio
```bash
git clone https://github.com/tr3nt/videos.git
```
2. Ejecutar composer install
```bash
composer install
```
3. Agregar los params de Base de Datos al archivo **.env** (ej. Linux)
```bash
cp .env.example .env
```
4. Ejecutar migraciones
```bash
php artisan migrate
```
5. Instalar js scripts y ejecutar NPM
```bash
npm install
```
```bash
npm run dev
```
- Laravel, Livewire and Tailwind implemented.