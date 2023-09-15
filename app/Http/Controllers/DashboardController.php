<?php

namespace App\Http\Controllers;

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
        return view('user-data');
    }

    /**
     * display user group by roles pages.
     *
     * @return View
     */
    public function displayUserGroupByRolesPage(): View
    {
        return view('user-role');
    }

    /**
     * display count current user and roles pages.
     *
     * @return View
     */
    public function displayCountUserRolesPage(): View
    {
        return view('count-user-roles');
    }
}

