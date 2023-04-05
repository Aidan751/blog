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
                        <label for="about_us" class="form-label">About Us</label>
                        <textarea name="about_us" id="about_us" cols="5" rows="5" class="form-control">{{ isset($settings) ? $settings->about_us : '' }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Address line 1</label>
                        <input type="text" class="form-control" id="address_line_1" name="address_line_1"
                            placeholder="Address line 1..." value="{{ isset($settings) ? $settings->address_line_1 : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Address line 2</label>
                        <input type="text" class="form-control" id="address_line_2" name="address_line_2"
                            placeholder="Address line 2..." value="{{ isset($settings) ? $settings->address_line_2 : '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="City..."
                            value="{{ isset($settings) ? $settings->city : '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">State</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="State..."
                            value="{{ isset($settings) ? $settings->state : '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Country..."
                            value="{{ isset($settings) ? $settings->country : '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Zip Code</label>
                        <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Zip Code..."
                            value="{{ isset($settings) ? $settings->zip_code : '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number"
                            placeholder="Contact Number..."
                            value="{{ isset($settings) ? $settings->contact_number : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Contact Description</label>
                        <input type="text" class="form-control" id="contact_description" name="contact_description"
                            placeholder="Contact Description..."
                            value="{{ isset($settings) ? $settings->contact_description : '' }}">
                    </div>



                    <div class="mb-3">
                        <label for="title" class="form-label">Contact Email</label>
                        <input type="email" class="form-control" id="contact_email" name="contact_email"
                            placeholder="Contact Email..."
                            value="{{ isset($settings) ? $settings->contact_email : '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Email Description</label>
                        <input type="text" class="form-control" id="email_description" name="email_description"
                            placeholder="Email Description..."
                            value="{{ isset($settings) ? $settings->email_description : '' }}">
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
