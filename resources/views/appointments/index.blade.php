@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @foreach($appointments as $appointment)
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <p class="card-text">
                                {{ $appointment->notes }}
                            </p>

                            <div class="d-flex justify-content-between align-items-center">
                                <a
                                        href="{{ $appointment->path }}"
                                        class="btn btn-sm btn-outline-secondary"
                                >{{ $appointment->course->name }}</a>
                                <small class="text-muted">
                                    {{ $appointment->duration }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
