@extends('layouts.main')
@section('title', __('Edit Sms Template'))
@section('breadcrumb')
    <div class="col-md-12">
        <div class="page-header-title">
            <h4 class="m-b-10">{{ __('Edit Sms Template') }}</h4>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sms-template.index') }}">{{ __('Sms Templates') }}</a></li>
            <li class="breadcrumb-item">{{ __('Edit Sms Template') }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Edit Sms Template') }}</h5>
                    </div>
                    <div class="card-body">
                        {!! Form::model($sms_template, [
                            'method' => 'PATCH',
                            'route' => ['sms-template.update', $sms_template->id],
                            'data-validate',
                        ]) !!}
                        <div class="form-group fv-row mb-7">
                            {{ Form::label('event', __('Event'), ['class' => 'form-label fw-bolder text-dark fs-6']) }}
                            {!! Form::text('event', null, [
                                'autofocus' => '',
                                'required' => true,
                                'autocomplete' => 'off',
                                'class' => 'form-control form-control-lg form-control-solid',
                                'readonly' . ($errors->has('event') ? ' is-invalid' : null),
                            ]) !!}
                            @error('event')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group fv-row mb-7">
                            {{ Form::label('template', __('HTML Template'), ['class' => 'form-label fw-bolder text-dark fs-6']) }}
                            {!! Form::textarea('template', null, [
                                'required' => true,
                                'autocomplete' => 'off',
                                'class' =>
                                    'form-control form-control-lg form-control-solid' . ($errors->has('template') ? ' is-invalid' : null),
                            ]) !!}
                            @error('template')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-end">
                            <a href="{{ route('sms-template.index') }}"
                                class="btn btn-secondary">{{ __('Cancel') }}</a>
                            {{ Form::button(__('Save'), ['type' => 'submit', 'class' => 'btn btn-primary']) }}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('javascript')
    <script>
        CKEDITOR.replace('html_template', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
