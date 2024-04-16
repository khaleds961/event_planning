@extends('layouts.master')
@section('content')
    <div class="page-wrapper bg-gra-01 p-t-100 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4 m-10">
                <div class="card-body">
                    <h2 class="title">Registration Event Form</h2>

                    @if (session('success'))
                        <div class="alert-success">
                            <img class="image-style" src="{{asset('images/success_icon.png')}}" alt="success" width="50px" height="50px">
                            <h4>{{ session('success') }}</h4>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('storeUser') }}">
                        @csrf
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" name="firstname"
                                        value="{{ old('firstname') }}">
                                    <!-- Display Error Messages -->
                                    @error('firstname')
                                        <span class="errs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" name="lastname"
                                        value="{{ old('lastname') }}">
                                    @error('lastname')
                                        <span class="errs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday"
                                            value="{{ old('birthday') }}">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                    @error('birthday')
                                        <span class="errs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" value="male" name="gender"
                                                {{ old('gender') == 'male' ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" value="female" name="gender"
                                                {{ old('gender') == 'female' ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    @error('gender')
                                        <span class="errs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <span class="errs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone_number"
                                        value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                        <span class="errs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- <div class="input-group">
                        <label class="label">Subject</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select name="subject">
                                <option disabled="disabled" selected="selected">Choose option</option>
                                <option>Subject 1</option>
                                <option>Subject 2</option>
                                <option>Subject 3</option>
                            </select>
                            <div class="select-dropdown"></div>
                        </div>
                    </div> --}}
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    <!-- Custom JavaScript for modal transitions -->
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
