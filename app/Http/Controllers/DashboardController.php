<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * display welcoming pages.
     *
     * @return View
     */
    public function displayWelcomingPage(): View
    {
        return view('welcome');
    }

    /**
     * display user data pages.
     *
     * @return View
     */
    public function displayUserDataPage(): View
    {
        $users = User::latest()->get();

        return view('user-data', compact('users'));
    }

    /**
     * display user group by roles pages.
     *
     * @return View
     */
    public function displayUserGroupByRolesPage(): View
    {
        $users = User::select('id', 'name', 'roles')->get()
            ->groupBy('roles')->mapWithKeys(function ($users_data, $role) {
                return [
                    $role => $users_data->count(),
                ];
            });

        return view('user-role', compact('users'));
    }

    /**
     * display count current user and roles pages.
     *
     * @return View
     */
    public function displayCountUserRolesPage(): View
    {
        $users = collect([
            'total_users' => User::count(),
            'total_user_roles' => User::select('id', 'roles')->get()->groupBy('roles')->count(),
        ]);

        return view('count-user-roles', compact('users'));
    }
}

