<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Dokumentasi API Blog

## Daftar Isi
1. [Autentikasi](#autentikasi)
2. [Blog](#blog)
3. [Response Format](#response-format)

## Autentikasi

### Register
Mendaftarkan pengguna baru.

**Endpoint:** `POST /api/register`

**Request Body:**
```json
{
    "name": "string",
    "email": "string",
    "password": "string",
    "password_confirmation": "string"
}
```

**Response (201 Created):**
```json
{
    "message": "User registered successfully",
    "user": {
        "id": "integer",
        "name": "string",
        "email": "string",
        "created_at": "datetime",
        "updated_at": "datetime"
    },
    "token": "string"
}
```

### Login
Login pengguna dan mendapatkan token akses.

**Endpoint:** `POST /api/login`

**Request Body:**
```json
{
    "email": "string",
    "password": "string"
}
```

**Response (200 OK):**
```json
{
    "message": "Login successful",
    "user": {
        "id": "integer",
        "name": "string",
        "email": "string",
        "created_at": "datetime",
        "updated_at": "datetime"
    },
    "token": "string"
}
```

### Logout
Logout pengguna dan mencabut token akses.

**Endpoint:** `POST /api/logout`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (200 OK):**
```json
{
    "message": "Logged out successfully"
}
```

## Blog

### Mendapatkan Daftar Blog
Mendapatkan daftar semua blog.

**Endpoint:** `GET /api/blogs`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (200 OK):**
```json
{
    "data": [
        {
            "id": "integer",
            "title": "string",
            "slug": "string",
            "content": "string",
            "image": "string",
            "user_id": "integer",
            "created_at": "datetime",
            "updated_at": "datetime"
        }
    ],
    "links": {
        "first": "string",
        "last": "string",
        "prev": "string",
        "next": "string"
    },
    "meta": {
        "current_page": "integer",
        "from": "integer",
        "last_page": "integer",
        "path": "string",
        "per_page": "integer",
        "to": "integer",
        "total": "integer"
    }
}
```

### Mendapatkan Blog Berdasarkan ID
Mendapatkan detail blog berdasarkan ID.

**Endpoint:** `GET /api/blogs/{id}`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (200 OK):**
```json
{
    "data": {
        "id": "integer",
        "title": "string",
        "slug": "string",
        "content": "string",
        "image": "string",
        "user_id": "integer",
        "created_at": "datetime",
        "updated_at": "datetime"
    }
}
```

### Mendapatkan Blog Berdasarkan Slug
Mendapatkan detail blog berdasarkan slug.

**Endpoint:** `GET /api/blogs/slug/{slug}`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (200 OK):**
```json
{
    "data": {
        "id": "integer",
        "title": "string",
        "slug": "string",
        "content": "string",
        "image": "string",
        "user_id": "integer",
        "created_at": "datetime",
        "updated_at": "datetime"
    }
}
```

### Membuat Blog Baru
Membuat blog baru.

**Endpoint:** `POST /api/blogs`

**Headers:**
```
Authorization: Bearer {token}
Content-Type: multipart/form-data
```

**Request Body:**
```
title: string
content: string
image: file (optional)
```

**Response (201 Created):**
```json
{
    "data": {
        "id": "integer",
        "title": "string",
        "slug": "string",
        "content": "string",
        "image": "string",
        "user_id": "integer",
        "created_at": "datetime",
        "updated_at": "datetime"
    }
}
```

### Mengupdate Blog
Mengupdate blog yang sudah ada.

**Endpoint:** `PUT /api/blogs/{id}`

**Headers:**
```
Authorization: Bearer {token}
Content-Type: multipart/form-data
```

**Request Body:**
```
title: string
content: string
image: file (optional)
```

**Response (200 OK):**
```json
{
    "data": {
        "id": "integer",
        "title": "string",
        "slug": "string",
        "content": "string",
        "image": "string",
        "user_id": "integer",
        "created_at": "datetime",
        "updated_at": "datetime"
    }
}
```

### Menghapus Blog
Menghapus blog.

**Endpoint:** `DELETE /api/blogs/{id}`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (200 OK):**
```json
{
    "message": "Blog deleted successfully"
}
```

## Response Format

### Success Response
Semua response sukses mengikuti format:
```json
{
    "data": {
        // Data yang diminta
    }
}
```

### Error Response
Semua response error mengikuti format:
```json
{
    "message": "string",
    "errors": {
        "field": [
            "error message"
        ]
    }
}
```

### Status Code
- 200: OK
- 201: Created
- 400: Bad Request
- 401: Unauthorized
- 403: Forbidden
- 404: Not Found
- 422: Unprocessable Entity
- 500: Internal Server Error
