@extends('layouts.master')
@section('content')
    <header>
        <section class='hero-header'>

            <!-- Use the current language in your views or logic -->
            @php
                // Get the current language from the session
                $currentLanguage = session()->get('custom_locale', config('app.locale'));
                // Use the current language in your views or logic
                app()->setLocale($currentLanguage);
            @endphp

            {{-- <p>Current Language: {{ app()->getLocale() }}</p>
            {{ __('messages.greeting') }} --}}

            @if (app()->getLocale() == 'en')
                <a class="language-sec" href="{{ route('toggle.language', 'ar') }}">
                    العربية
                </a>
            @else
                <a class="language-sec" href="{{ route('toggle.language', 'en') }}">
                    English
                </a>
            @endif



            <img class="first-logo-art" src="images/logo.svg" alt="logo">
            <div class="win-rolls-title"> {{ __('messages.win_rolls') }} <br /> {{ __('messages.art_win_rolls') }}</div>
            <div class="win-rolls-text">
                {{ __('messages.uncover_unlock') }}<br /> {{ __('messages.and_drive') }} <br />
                {{ __('messages.keys_in_favor') }}
            </div>
            <button class="white-participate" data-toggle="modal"
                data-target="#stepModal">{{ __('messages.participe_now') }}</button>
        </section>
    </header>

    <div class="key-hunt">
        <div class="key-hunt-title"
            style="color: var(--brand-grey, #D0D3D4);
        font-family: 'Cairo';
        font-size: 22px;
        font-style: normal;
        font-weight: 700;
        line-height: 28px;
        align-self: stretch;
        display: {{ app()->isLocale('ar') ? 'flex' : '' }};
        justify-content: {{ app()->isLocale('ar') ? 'end' : '' }};
        text-align: {{ app()->isLocale('ar') ? 'end' : '' }};
        ">
            {{-- direction:{{app()->isLocale('ar') ? 'rtl' : 'ltr'}} --}}

            {{ __('messages.great_hunt') }}
        </div>
        <div class="key-hunt-text"
            style="color: var(--brand-grey, #D0D3D4);
        font-family: 'Cairo';
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        line-height: 25px;
        display: {{ app()->isLocale('ar') ? 'flex' : '' }};
        text-align: {{ app()->isLocale('ar') ? 'justify' : '' }};
        direction: {{ app()->isLocale('ar') ? 'rtl' : '' }};
        ">
            {{ __('messages.welcome_client') }} ! <br />
            {{ __('messages.grand_com') }} .
        </div>
    </div>

    <div class="participation-method">
        <div class="participation-method-title">{{ __('messages.how_participate') }}</div>

        <div class="steps">
            <img src="images/step1.svg" alt="step1">
            <div class="participation-method-subtitle">{{ __('messages.explore_mall') }}</div>
            <div class="participation-text"> {{ __('messages.visit_shops') }}
            </div>
        </div>

        <div class="steps">
            <img src="images/step2.svg" alt="step2">
            <div class="participation-method-subtitle">{{ __('messages.inden_key') }}</div>
            <div class="participation-text">
                {{ __('messages.sharp_eye') }}<b>{{ __('messages.six_keys') }} </b> {{ __('messages.unlock_prize') }}
            </div>
        </div>

        <div class="steps">
            <img src="images/step3.svg" alt="step1">
            <div class="participation-method-subtitle">{{ __('messages.submit_entry') }}</div>
            <div class="participation-text">
                {{ __('messages.participation_text') }}
            </div>
        </div>
        <button class="red-participate" data-toggle="modal"
            data-target="#stepModal">{{ __('messages.participe_now') }}</button>

    </div>

    <div class="grand-prize">
        <img src="images/grand-prize.png" alt="grand-prize">
        <div class="grand-prize-title">
            {{ __('messages.rolls_wait') }}
        </div>
        <div class="grand-prize-text"
            style="font-family: 'Cairo', serif;
        color: var(--brand-grey, #D0D3D4);
        font-family: Cairo;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        line-height: 25px;
        display: {{ app()->isLocale('ar') ? 'flex' : '' }};
        text-align: {{ app()->isLocale('ar') ? 'center' : '' }};
        direction: {{ app()->isLocale('ar') ? 'rtl' : '' }};
        ">
            {{ __('messages.grand_text') }}
        </div>
    </div>

    <div class="terms"
        style="display: flex;
    padding: 48px 24px !important;
    flex-direction: column;
    align-items: {{ app()->isLocale('ar') ? 'end' : 'start' }};
    gap: 24px;
    align-self: stretch;
    background-color: #d0d3d4;">
        <div class="terms-title">
            {{ __('messages.terms') }}
        </div>
        <div class="terms-text"
            style="color: var(--brand-black, #101820);
        font-family: Cairo;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        line-height: 25px;
        align-self: stretch;
        direction: {{ app()->isLocale('ar') ? 'rtl' : 'ltr' }};
        text-align: {{ app()->isLocale('ar') ? 'justify' : 'start' }};">
            <ul>
                <li>{{ __('messages.cp_start') }}</li>
                {{-- <li>{{ __('messages.cp_age') }}.</li> --}}
                <li>{{ __('messages.on_en') }}.</li>
            </ul>

        </div>
    </div>

    <footer style="background: #101920" class="text-center">
        <div style="padding:10px">
            <img src="images/logo.svg">
        </div>

        <div class="d-flex justify pt-3 justify-content-center" style="background: #16202a;">
            <a class="social-links mx-2" href="https://www.instagram.com/artoflivingmall/">
                <i class="fa fa-instagram " style="font-size: 20px"></i>
            </a>
            <a class="social-links mx-2" href="https://www.facebook.com/ArtofLivingMall">
                <i class="fa fa-facebook " style="font-size: 20px"></i>
            </a>
            <a class="social-links mx-2" href="https://twitter.com/artcentremall?lang=en">
                <i class="fa fa-twitter" style="font-size: 20px"></i>
            </a>
            <a class="social-links mx-2" href="https://www.linkedin.com/company/art-of-living-mall/?viewAsMember=true">
                <i class="fa fa-linkedin" style="font-size: 20px"></i>
            </a>
        </div>


        <div class="copy-right d-flex justify-content-center text-white py-2" style="background: #16202a;">
            ©2023 Art of Living. All Copyrights Reserved
        </div>
    </footer>
    <!-- 3-Step Modal -->
    <div class="modal fade" id="stepModal" tabindex="-1" role="dialog" aria-labelledby="stepModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <!-- Step 1 -->
                <div class="step" id="step1">
                    <div class="modal-title d-flex justify-content-between align-items-center">
                        <div id="stepModalLabel">{{ __('messages.participe_now') }}</div>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body modal-body-design">
                        <div class="step-counter"
                            style="margin-bottom: 20px;
                        font-weight: bold;
                        text-align: {{ app()->isLocale('ar') ? 'end' : 'start' }};">
                            {{ __('messages.step1') }}</div>
                        <div class="enter-number"
                            style="color: var(--brand-black, #101820);
                        font-family: Cairo;
                        font-size: 20px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: 25px;
                        align-self: stretch;
                        margin: 8px 0;
                        text-align: {{ app()->isLocale('ar') ? 'end' : 'start' }};">
                            {{ __('messages.enter_your') }} </div>
                        {{-- <div class="phone-text"
                            style="color: var(--brand-black, #101820);
                        font-family: Cairo;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: 25px;
                        /* 156.25% */
                        align-self: stretch;
                        text-align: {{ app()->isLocale('ar') ? 'right' : 'left' }};
                        direction: {{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}">
                            {{ __('messages.phone_verf') }}
                        </div> --}}
                        <div style="margin: 24px 0;    width: 100%;
                        display: inline-grid;">
                            <span id="phone_error"></span>
                            <input class="phone-number" type="tel" id="phone" name="phone" required
                                onkeypress="return isNumber(event)">
                        </div>
                        </form>
                        <button type="button" class="continue-btn"
                            id="nextStep1">{{ __('messages.continue') }}</button>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="step" id="step2" style="display: none">
                    <div class="modal-title d-flex justify-content-between align-items-center">
                        <div id="stepModalLabel">{{ __('messages.participe_now') }}</div>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body modal-body-design">
                        <div class="step-counter"
                            style="margin-bottom: 20px;
                        font-weight: bold;
                        text-align: {{ app()->isLocale('ar') ? 'end' : 'start' }};">
                            {{ __('messages.step2') }} </div>
                        <div class="enter-number"
                            style="color: var(--brand-black, #101820);
                        font-family: Cairo;
                        font-size: 20px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: 25px;
                        align-self: stretch;
                        margin: 8px 0;
                        text-align: {{ app()->isLocale('ar') ? 'end' : 'start' }};">
                            {{ __('messages.provide_d') }}</div>
                        <div style="margin: 24px 0">
                            <span id="fname_error"></span>
                            <input class="user-detail" name="f_name" id="f_name" type="text" required
                                placeholder="{{ __('messages.fname') }}">

                            <span id="lname_error"></span>
                            <input class="user-detail" name="l_name" id="l_name" type="text" required
                                placeholder="{{ __('messages.lname') }}">

                            <span id="email_error"></span>
                            <input class="user-detail" name="email" id="email" type="email" required
                                placeholder="{{ __('messages.email') }}">

                            <div>
                                <span id="country_error" style="position: relative"></span>
                                <label for=""
                                    style="position: absolute;
                                left: 17px;
                                bottom: 156px;
                                font-size: 14px;
                                font-weight: bold;">{{ __('messages.nationality') }}</label>
                                <select id="country" name="country" class="user-detail" required>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="continue-btn"
                            id="nextStep2">{{ __('messages.continue') }}</button>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="step" id="step3" style="display: none">
                    <div class="modal-title d-flex justify-content-between align-items-center">
                        <div id="stepModalLabel">{{ __('messages.participe_now') }}</div>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body modal-body-design">
                        <div class="step-counter"
                            style="margin-bottom: 20px;
                        font-weight: bold;
                        text-align: {{ app()->isLocale('ar') ? 'end' : 'start' }};">
                            {{ __('messages.step3') }}</div>
                        <div class="enter-number"
                            style="color: var(--brand-black, #101820);
                        font-family: Cairo;
                        font-size: 20px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: 25px;
                        align-self: stretch;
                        margin: 8px 0;
                        direction: {{ app()->isLocale('ar') ? 'rtl' : 'ltr' }};
                        text-align: {{ app()->isLocale('ar') ? 'start' : 'start' }};">
                            {{ __('messages.key_posts') }}</div>
                        <span class="six_shops">{{ __('messages.six_shops') }}</span>

                        <div class="keys-places-container">
                            @foreach ($keys_places->chunk(2) as $chunk)
                                <div class="row">
                                    @foreach ($chunk as $place)
                                        <div class="col-6 mb-3">
                                            <div class="place-item" data-id="{{ $place['id'] }}">
                                                {{ $place['english_name'] }}
                                                {{-- @lang(app()->getLocale() == 'en' ? $place['english_name'] : $place['english_name']) --}}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>

                        <div style="text-align: {{ app()->isLocale('ar') ? 'right' : 'left' }};">
                            <input type="checkbox" checked id="checkbox_agreement" class="mx-2">
                            <span>
                                {{ __('messages.agree_check') }}
                            </span>
                            <span id="checkbox_error" class="d-block text-danger"></span>
                        </div>

                        <button type="button" class="continue-btn my-2" id="final_step"
                            style="direction: {{ app()->isLocale('ar') ? 'rtl' : 'ltr' }};">{{ __('messages.point_keys') }}</button>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="step" id="step4" style="display: none">
                    <div class="success-image" style="">
                    </div>
                    <div class="thanks-submit">
                        <span
                            style="direction: {{ app()->isLocale('ar') ? 'rtl' : 'ltr' }};
                        text-align: {{ app()->isLocale('ar') ? 'center' : 'center' }};">{{ __('messages.thanking_co') }}
                            !</span>
                        </span>
                        <span style="margin-bottom:0rem !importanr">
                            {{ __('messages.stay_tuned') }}
                        </span>
                        <button class="continue-to-site" href="{{ route('index') }}"
                            style="text-decoration: none">{{ __('messages.continue_to_site') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    <!-- Custom JavaScript for modal transitions -->
    <script>
        var SubmitMessage = "{{ app()->isLocale('ar') ? 'قدم الآن' : 'Submit' }}";
        var clickedMsg = "{{ app()->isLocale('ar') ? 'من 6 مفاتيح' : 'of 6 clicked' }}";
        var checkbox_error =
            "{{ app()->isLocale('ar') ? '! الموافقة على الشروط اجبارية لاتمام المسابقة' : 'Agree on Conditions is mandatory to continue This Competition !' }}";


        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

        $(document).ready(function() {
            var input = document.querySelector("#phone");
            var countrySelect = document.querySelector("#country");
            var selectedCountryCode;
            var phoneNumber;
            var fname;
            var lname;
            var email;
            var nationality;
            var selectedPlaces = [];
            let selectedCount = 0;

            // Initialize intlTelInput
            var iti = window.intlTelInput(input, {
                initialCountry: "AE", // Set the ISO2 country code for UAE
                separateDialCode: true,
                inputType: "tel", // Allow only numeric input
            });

            // Next button click handler for Step 1
            $('#nextStep1').on('click', function() {

                selectedCountryCode = iti.getSelectedCountryData().dialCode;
                phoneNumber = input.value;

                if (selectedCountryCode && phoneNumber) {
                    $.ajax({
                        url: "{{ route('check_phone') }}",
                        data: {
                            phone_number: phoneNumber
                        },
                        type: 'POST',
                        success: function(res) {
                            var msg = res.message;
                            if (res.success) {
                                $('#phone_error').text('')
                                // Hide Step 1
                                $('#step1').hide();
                                // Show Step 2
                                $('#step2').show();
                                // Enable or disable Next and Previous buttons based on the step
                                updateButtons();
                            } else {
                                $('#phone_error').text(msg).addClass(
                                    'text-danger text-uppercase')
                            }
                        }
                    })
                } else {
                    $('#phone_error').text('phone number is required !!').addClass(
                        'text-danger text-uppercase')
                }
            });

            // Next button click handler for Step 2
            $('#nextStep2').on('click', function() {

                fname = $('#f_name').val()
                lname = $('#l_name').val()
                email = $('#email').val()
                nationality = $('#country').val()

                if (!fname || fname.length < 3) {
                    $('#fname_error').text('first name should be at least 3 characters').addClass(
                        'text-danger text-uppercase')
                    return
                } else {
                    $('#fname_error').text('')
                }

                if (!lname || lname.length < 3) {
                    $('#lname_error').text('last name should be at least 3 characters').addClass(
                        'text-danger text-uppercase')
                    return
                } else {
                    $('#lname_error').text('')
                }

                if (!nationality || nationality == 0) {
                    $('#country_error').text('nationality is required').addClass(
                        'text-danger text-uppercase')
                    return
                } else {
                    $('#country_error').text('')
                }

                $.ajax({
                    url: "{{ route('check_email') }}",
                    data: {
                        email: email
                    },
                    type: 'POST',
                    success: function(res) {
                        var msg = res.message;

                        if (res.success) {
                            $('#email_error').text('')
                            // Hide Step 2
                            $('#step2').hide();
                            // Show Step 3
                            $('#step3').show();
                            // Enable or disable Next and Previous buttons based on the step
                            updateButtons();
                        } else {
                            $('#email_error').text(msg).addClass('text-danger text-uppercase')
                            return;
                        }
                    }
                })
            });

            // Previous button click handler for Step 2
            $('#prevStep2').on('click', function() {
                // Hide Step 2
                $('#step2').hide();

                // Show Step 1
                $('#step1').fadeIn();

                // Enable or disable Next and Previous buttons based on the step
                updateButtons();
            });

            // Previous button click handler for Step 3
            $('#prevStep3').on('click', function() {
                // Hide Step 3
                $('#step3').hide();

                // Show Step 2
                $('#step2').fadeIn();

                // Enable or disable Next and Previous buttons based on the step
                updateButtons();
            });

            // Function to update Next and Previous buttons based on the active step
            function updateButtons() {
                // Enable or disable Next button based on the existence of the next step
                $('#nextStep2').prop('disabled', !$('#step2').is(':visible'));
                $('#nextStep3').prop('disabled', !$('#step3').is(':visible'));

                // Enable or disable Previous button based on the existence of the previous step
                $('#prevStep2').prop('disabled', !$('#step1').is(':visible'));
                $('#prevStep3').prop('disabled', !$('#step2').is(':visible'));
            }

            // Initial button state
            updateButtons();

            // Populate country dropdown
            var countryData = window.intlTelInputGlobals.getCountryData();
            for (var i = 0; i < countryData.length; i++) {
                var country = countryData[i];
                var option = document.createElement("option");
                option.value = country.iso2;
                option.text = country.name;
                countrySelect.appendChild(option);
            }

            // Set selected country based on input value
            var inputCountry = iti.getSelectedCountryData();
            if (inputCountry) {
                countrySelect.value = inputCountry.iso2;
            }

            // Update selected country on input change
            input.addEventListener("change", function() {
                var selectedCountry = iti.getSelectedCountryData();
                if (selectedCountry) {
                    countrySelect.value = selectedCountry.iso2;
                }
            });


            $('.place-item').click(function() {
                var placeId = $(this).data('id');

                // Check if the place is already selected
                if ($.inArray(placeId, selectedPlaces) !== -1) {
                    // Place is already selected, remove it from the array
                    selectedPlaces = $.grep(selectedPlaces, function(value) {
                        return value !== placeId;
                    });

                    // Reset styles and remove icon
                    $(this).css({
                        'background-color': '',
                        'justify-content': 'center'
                    }).removeClass(
                        'selected').find('.selected-icon').remove();

                    selectedCount--;
                } else {
                    // Check if the maximum limit is reached
                    if (selectedPlaces.length < 6) {
                        // Add the place to the selected array
                        selectedPlaces.push(placeId);

                        // Change background color, add icon
                        $(this).css({
                            'background-color': 'white',
                            'justify-content': 'end'
                        }).addClass('selected').append(
                            '<img src="images/key.svg" alt="Checkmark" class="selected-icon" />');

                        selectedCount++;
                    }
                }
                updateButtonText();
                // You can use the selectedPlaces array as needed, for example, send it to the server, etc.
                console.log(selectedPlaces);
            });

            function updateButtonText() {
                const $button = $('#final_step');

                if (selectedCount === 6) {
                    $button.text(SubmitMessage);
                } else {
                    $('#final_step').css('direction:rtl')
                    $button.text(`${selectedCount} ${clickedMsg}`);
                }
            }

            $('#final_step').on('click', function() {

                if (selectedCount === 6) {
                    
                    var checkbox_agreement = $('#checkbox_agreement');

                    // Check if the checkbox is checked
                    if (checkbox_agreement.prop('checked')) {
                        // Checkbox is checked
                        console.log('Checkbox is checked');
                    } else {
                        $('#checkbox_error').text(checkbox_error)
                        return
                    }

                    $('#final_step').prop('disabled', true)
                    // Prepare the data to be sent in the AJAX request
                    const selectedItems = $('.place-item.selected').map(function() {
                        return $(this).data('id');
                    }).get();

                    // Make the AJAX request
                    $.ajax({
                        url: '{{ route('storeUser') }}', // Replace with your actual endpoint
                        method: 'POST', // Adjust the HTTP method as needed
                        data: {
                            selectedItems: selectedItems,
                            phone_code: selectedCountryCode,
                            phone_number: phoneNumber,
                            fname: fname,
                            lname: lname,
                            email: email,
                            nationality_id: nationality
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#step3').hide();
                                $('#step4').show()
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle the error
                            console.error('AJAX request failed:', status, error);
                        }
                    });
                }
            });

            $(document).on('click', '.continue-to-site', function(e) {
                // Prevent the default behavior of the anchor tag
                e.preventDefault();
                // Get the href attribute of the anchor tag
                var url = $(this).attr('href');
                // Redirect to the specified URL
                window.location.href = url;
            })

        });
    </script>
@endpush
