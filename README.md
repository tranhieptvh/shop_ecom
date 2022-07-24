<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Website RuBia Shop

- Author: HiepTV

## Requirements

- PHP: 7.2
- MySQL
- Composer newest version (2.)

## Build

- Bước 1: Clone repository
- Bước 2: Chạy composer để cài đặt các gói cần thiết:
  ```bash
  composer install
    ```
- Bước 3: Tạo và config Database:
    + Trong Mysql Workbench, tạo database mới có tên: shop_ecom
    + Tạo file .env:
  ```bash
  cp .env.example .env
    ```
    + config DB
  ```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=shop_ecom
  DB_USERNAME=root
  DB_PASSWORD=
    ```
- Bước 4: Tạo key:
    ```bash
  php artisan key:generate
    ```
- Bước 5: Migrate và Seeding data: Chọn 1 trong 2 cách sau:
    + Cách 1: Import file .sql trong folder database/db, đây là DB ở local của dev (khuyên chọn, vì có đủ DB)
    + Cách 2: Run migrate and seeding data (Chỉ seeding data bảng roles và users)
  ```bash
  php artisan migrate
  php artisan db:seed
    ```
- Bước 6: Chạy autoload
    ```bash
  composer dump-autoload
    ```
-Bước 7: Run dự án:
```bash
  php artisan serve
   ```

## Truy cập vào dự án
- Client: http://127.0.0.1/
    + Account: member@rubia.com - 123456
- Admin: http://127.0.0.1/admin
    + Account: admin@rubia.com - 123456
