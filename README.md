# Gate Authorization

## Apa itu Gates ?
Gates hanyalah penutupan yang menentukan apakah pengguna diizinkan untuk melakukan tindakan tertentu. Sederhananya Gates adalah sebuah Facade Class yang disediakan Laravel untuk melakukan sebuah Otorisasi. [Laravel Gates](https://laravel.com/docs/10.x/authorization#gates)

## Bagaimana Cara Menggunakan Gates ?
> Buatlah sebuah Provider Class, In case Saya menamainya AuthorizationServiceProvider.
```bash
php artisan make:provider NamaFileClassServiceProvider
```

> Berikut adalah penampakannya sebelum terjadi modifikasi.
```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AuthorizationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
```

> Lakukan Perubahan Terhadap Fungsi "Boot"
```php
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        collect(['admin', 'manager', 'user'])->each(function ($role) {
            Gate::define($role, function (User $user) use ($role) {
                return $user->roles == $role;
            });
        });
    }
```

> Sebagai Contoh Menggunakan Class Model Users dan Wajib Menggunakan Facade Class Gate
```php
use App\Models\User;
use Illuminate\Support\Facades\Gate;
```

> Setelah membuat definisi Gates/Gerbang untuk setiap Roles/Peran, Kita Dapat Menggunakan Alias daripada Middleware bawaan Laravel yaitu Autorize::class, Sebagai Contoh Saya Menggunakannya di routes/web.php
```php
Route::group(['prefix' => '/dashboard', 'as' => 'dashboard.', 'middleware' => ['auth']], function () {
    Route::get('/welcome', [DashboardController::class, 'displayWelcomingPage'])->name('welcome');
    Route::get('/user-data', [DashboardController::class, 'displayUserDataPage'])->middleware('can:admin')->name('user-data');
    Route::get('/user-roles', [DashboardController::class, 'displayUserGroupByRolesPage'])->middleware('can:manager')->name('user-roles');
    Route::get('/count-user-roles', [DashboardController::class, 'displayCountUserRolesPage'])->middleware('can:user')->name('count-user-roles');
});
```

## Credits
- [Wirandra Alaya](https://github.com/dayCod)
- [Laravel](https://laravel.com)
- [Laravel Gates](https://laravel.com/docs/10.x/authorization#gates)
