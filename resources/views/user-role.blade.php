@extends('template.master')

@section('page-title', 'User Group By Roles Page')

@section('page-content')

    <div class="row justify-content-center align-items-center" style="height: 100vh">
        <div class="col-md-12">
            <div class="card shadow rounded p-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Total User</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $role => $total_user)
                        <tr>
                            <th scope="row">#</th>
                            <td>{{ $role }}</td>
                            <td>{{ $total_user }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="3"></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
