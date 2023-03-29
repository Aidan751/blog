@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card p-0">
            <div class="card-header">{{ __('Edit Blog Settings') }}</div>

            <div class="card-body">
                <form action="{{ route('settings.update', $settings->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Site Name</label>
                        <input type="text" class="form-control" id="site_name" name="site_name"
                            placeholder="Site Name..." value="{{ isset($settings) ? $settings->site_name : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address..."
                            value="{{ isset($settings) ? $settings->address : '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number"
                            placeholder="Contact Number..." value="{{ isset($settings) ? $settings->contact_number : '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Contact Email</label>
                        <input type="email" class="form-control" id="contact_email" name="contact_email"
                            placeholder="Contact Email..." value="{{ isset($settings) ? $settings->contact_email : '' }}">
                    </div>

                    <div>
                        <button class="btn btn-success btn-sm" type="submit">
                            Apply settings
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
