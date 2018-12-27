@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">My RESTful API</div>

                        <div class="card-body">

                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Называние</td>
                                        <td>Парода</td>
                                        <td>Год</td>
                                        <td>Голос</td>
                                        <td style="width: 26%;">Action</td>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($animals as $animal)
                                        <tr>
                                            <td scope="row">{{ $animal->id }}</td>
                                            <td>{{ $animal->name }}</td>
                                            <td>{{ $animal->parody }}</td>
                                            <td>{{ $animal->age }}</td>
                                            <td>{{ $animal->voice }}</td>
                                            <td>
                                                <a href="{{ route('animals.edit', ['animal' => $animal->id]) }}" class="btn btn-success fa-pull-left myEdit" style="float: left;">Редакттровать</a>
                                                <form method="DELETE" action="{{ route('animals.destroy', ['animal' => $animal->id]) }}" style="float: right;" class="form-inline fa-pull-right myDestroy">
                                                    <button type="submit" class="btn btn-danger">Удалит</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>

                            {{--  <app></app>  --}}
                            <center>
                                <form method="POST" action="{{ route('animals.store') }}" class="form-inline myClass" id="form">

                                    <div class="form-group col-md-3">
                                        <input type="text" name="name" class="form-control mb-2 col-md-12" placeholder="Называние">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <input type="text" name="parody" class="form-control mb-2 col-md-12" placeholder="Парода">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <select name="age" id="age" class="form-control mb-2 col-md-12" >

                                            <option value="0" disabled="disabled" id="selected" selected>Год</option>
                                            @for ($i = 1; $i <= 10; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor

                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <input type="text" name="voice" class="form-control mb-2 col-md-12" placeholder="Голос">
                                    </div>

                                    <button type="submit" class="btn btn-primary mb-2 " id="submit">Создать</button>

                                </form>

                                {{--  Создание Записа  --}}
                                <script type="text/javascript"  src="{{ asset('js') }}/npm-restful-api/store.js"></script>
                                {{--  Редактирование Записа  --}}
                                <script type="text/javascript"  src="{{ asset('js') }}/npm-restful-api/edit.js"></script>
                                {{--  Удаление Записа  --}}
                                <script type="text/javascript"  src="{{ asset('js') }}/npm-restful-api/destroy.js"></script>

                            </center>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



