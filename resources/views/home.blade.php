@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <app></app>
                    <center>
                        <p>
                            Список RESTful API
                        </p>
                        <p>
                            <a href="{{ route('animals.index') }}">Перейти к животным</a>
                        </p>
                    </center>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
