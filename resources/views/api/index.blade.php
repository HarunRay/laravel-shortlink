@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">API Access</div>

                    <div class="card-body">
                        <livewire:api-access.index>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
