@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Appointment</div>

                    <div class="panel-body">
                        <article>
                            <h4>{{ $appointment->duration }}</h4>
                            <div class="body">
                                <p>{{ $appointment->notes }}</p>
                                <p>{{ $appointment->creator->name }}</p>
                                <p>{{ $appointment->tutor->name }}</p>
                                <p>{{ $appointment->student->name }}</p>
                                <p>{{ $appointment->instructor->name }}</p>
                                <p>{{ $appointment->term->name }}</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
