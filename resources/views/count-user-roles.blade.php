@extends('template.master')

@section('page-title', 'Count User and Roles Pages')

@section('page-content')

    <div class="row justify-content-center align-items-center" style="height: 100vh">
        <div class="col-md-12">
            <div class="card shadow rounded p-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Total Users</th>
                            <th scope="col">Total User Roles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">#</th>
                            <td>{{ $users['total_users'] }}</td>
                            <td>{{ $users['total_user_roles'] }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
