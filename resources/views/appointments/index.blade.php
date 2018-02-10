@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Appointments</div>

                    <div class="panel-body">
                        @foreach($appointments as $appointment)
                            <article>
                                <h4>{{ $appointment->starts_at }}</h4>
                                <div class="body">
                                  {{ $appointment->student->name }}
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
