@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        {{ $appointment->course->name }}
                    </div>

                    <div class="panel-body">
                        <article>
                            <h4>{{ $appointment->term->name }}</h4>
                            <div class="body">
                                <p>{{ $appointment->notes }}</p>
                                <p>{{ $appointment->creator->name }}</p>
                                <p>{{ $appointment->tutor->name }}</p>
                                <p>{{ $appointment->instructor->name }}</p>
                                <p>{{ $appointment->duration }}</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">

                @foreach($appointment->reports as $report)
                    <div class="card-header">
                        {{ $report->student->name }}
                    </div>
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <p class="card-text">
                                {{ $report->topic }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
