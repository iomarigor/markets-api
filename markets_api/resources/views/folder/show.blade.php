@extends('layouts.app')

@section('template_title')
    {{ $folder->name ?? "{{ __('Show') Folder" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Folder</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('folders.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Profile:</strong>
                            {{ $folder->id_profile }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $folder->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
