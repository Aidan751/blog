@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card p-0">
            <div class="card-header">{{ __('Send a News Letter') }}</div>

            <div class="card-body">
                <form action="{{ route('newsletters.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-group mb-2">Content</label>
                        <input id="content" type="hidden" name="content">
                        <trix-editor input="content"></trix-editor>
                    </div>

                    <div>
                        <button class="btn btn-success btn-sm" type="submit">
                            {{ __('Send') }}
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.js"
        integrity="sha512-DYqCX8kO/IP/uf6iT0+LnI6ft5aDdONwabmbgVxjR94pwCefuJwYwd+NAsKFpH3hk8wP2L3jRn9g61t3r2N9VA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css"
        integrity="sha512-An9xk8CstwPHW2Vzjj0RA6Gdbi3RUkEMqocdnEtq2C/iKJLKV0JGaJTMgyn2HeolVe0zDtDhXP7OMaTSffCkqw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
