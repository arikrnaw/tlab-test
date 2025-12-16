# Laravel 12 API Backend Starter

Starter kit untuk membangun REST API menggunakan Laravel 12 dengan CRUD operations.

## Fitur

-   ✅ Laravel 12
-   ✅ CRUD Operations (Create, Read, Update, Delete)
-   ✅ Response Helper untuk standarisasi response API
-   ✅ Exception Handler untuk API
-   ✅ CORS Configuration
-   ✅ Pagination & Search
-   ✅ Contoh Model & Migration

## Requirements

-   PHP >= 8.2
-   Composer
-   Database (MySQL, PostgreSQL, atau SQLite)

## Instalasi

1. Clone atau download project ini
2. Install dependencies:

```bash
composer install
```

3. Copy file environment:

```bash
cp .env.example .env
```

4. Generate application key:

```bash
php artisan key:generate
```

5. Konfigurasi database di file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```

6. Jalankan migration:

```bash
php artisan migrate
```

## Menjalankan Server

```bash
php artisan serve
```

Server akan berjalan di `http://localhost:8000`

## API Endpoints

### Health Check

```
GET /api/health
```

Response:

```json
{
    "status": "ok",
    "message": "API is running",
    "timestamp": "2024-12-16 10:30:00"
}
```

### Items CRUD

#### Get All Items

```
GET /api/items
```

Query Parameters:

-   `search` - Search by name or description
-   `is_active` - Filter by active status (true/false)
-   `per_page` - Items per page (default: 15)
-   `page` - Page number

Example:

```
GET /api/items?search=laptop&is_active=true&per_page=10
```

Response:

```json
{
    "success": true,
    "message": "Items retrieved successfully",
    "data": [
        {
            "id": 1,
            "name": "Laptop",
            "description": "Gaming laptop",
            "price": "15000000.00",
            "quantity": 5,
            "is_active": true,
            "created_at": "2024-12-16T10:30:00.000000Z",
            "updated_at": "2024-12-16T10:30:00.000000Z"
        }
    ],
    "pagination": {
        "current_page": 1,
        "last_page": 1,
        "per_page": 15,
        "total": 1
    }
}
```

#### Get Single Item

```
GET /api/items/{id}
```

Response:

```json
{
    "success": true,
    "message": "Item retrieved successfully",
    "data": {
        "id": 1,
        "name": "Laptop",
        "description": "Gaming laptop",
        "price": "15000000.00",
        "quantity": 5,
        "is_active": true,
        "created_at": "2024-12-16T10:30:00.000000Z",
        "updated_at": "2024-12-16T10:30:00.000000Z"
    }
}
```

#### Create Item

```
POST /api/items
Content-Type: application/json

{
    "name": "Laptop",
    "description": "Gaming laptop",
    "price": 15000000,
    "quantity": 5,
    "is_active": true
}
```

Response:

```json
{
    "success": true,
    "message": "Item created successfully",
    "data": {
        "id": 1,
        "name": "Laptop",
        "description": "Gaming laptop",
        "price": "15000000.00",
        "quantity": 5,
        "is_active": true,
        "created_at": "2024-12-16T10:30:00.000000Z",
        "updated_at": "2024-12-16T10:30:00.000000Z"
    }
}
```

#### Update Item

```
PUT /api/items/{id}
Content-Type: application/json

{
    "name": "Laptop Updated",
    "price": 16000000,
    "quantity": 10
}
```

atau

```
PATCH /api/items/{id}
Content-Type: application/json

{
    "name": "Laptop Updated"
}
```

Response:

```json
{
    "success": true,
    "message": "Item updated successfully",
    "data": {
        "id": 1,
        "name": "Laptop Updated",
        "description": "Gaming laptop",
        "price": "16000000.00",
        "quantity": 10,
        "is_active": true,
        "created_at": "2024-12-16T10:30:00.000000Z",
        "updated_at": "2024-12-16T10:35:00.000000Z"
    }
}
```

#### Delete Item

```
DELETE /api/items/{id}
```

Response:

```json
{
    "success": true,
    "message": "Item deleted successfully"
}
```

## Response Format

### Success Response

```json
{
    "success": true,
    "message": "Success message",
    "data": {}
}
```

### Error Response

```json
{
    "success": false,
    "message": "Error message",
    "errors": {}
}
```

### Paginated Response

```json
{
    "success": true,
    "message": "Success message",
    "data": [],
    "pagination": {
        "current_page": 1,
        "last_page": 5,
        "per_page": 15,
        "total": 75
    }
}
```

## Menggunakan Response Helper

Anda dapat menggunakan helper `ApiResponse` untuk standarisasi response:

```php
use App\Helpers\ApiResponse;

// Success response
return ApiResponse::success($data, 'Data retrieved successfully');

// Error response
return ApiResponse::error('Something went wrong', 400);

// Paginated response
return ApiResponse::paginated($paginatedData, 'Data retrieved successfully');
```

## Struktur Project

```
backend/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── ItemController.php
│   ├── Helpers/
│   │   └── ApiResponse.php
│   └── Models/
│       └── Item.php
├── routes/
│   └── api.php
├── database/
│   └── migrations/
│       └── 2025_12_16_025650_create_items_table.php
└── bootstrap/
    └── app.php
```

## Membuat CRUD Baru

Untuk membuat CRUD baru, ikuti langkah berikut:

1. Buat Model dan Migration:

```bash
php artisan make:model Product -m
```

2. Update migration dengan field yang diinginkan

3. Update Model dengan `$fillable` dan `casts()`

4. Buat Controller:

```bash
php artisan make:controller ProductController --resource
```

5. Implementasikan method CRUD di controller

6. Tambahkan route di `routes/api.php`:

```php
Route::apiResource('products', ProductController::class);
```

7. Jalankan migration:

```bash
php artisan migrate
```

## Testing

Jalankan test:

```bash
php artisan test
```

## License

MIT
