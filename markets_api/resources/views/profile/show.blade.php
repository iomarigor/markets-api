@extends('layouts.app')

@section('template_title')
    {{ $profile->name ?? "{{ __('Show') Profile" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Profile</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('profiles.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $profile->id_user }}
                        </div>
                        <div class="form-group">
                            <strong>Profile:</strong>
                            {{ $profile->profile }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $profile->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
