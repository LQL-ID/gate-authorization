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
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection