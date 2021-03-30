@extends('candidate.profile.index')
@push('page-css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" />
<style>
input#phone {
    padding-left: 40px;
}
</style>
@endpush
@section('section')
    {{ Form::open(['route' => 'candidate-profile.update', 'files' => true]) }}
    <div class="alert alert-danger d-none" id="validationErrors"></div>
    <div class="row">
    <div class="form-group col-sm-12"><h2> {{__('messages.candidate.Personal information')}} :</h2></div>
        </br>
        <div class="form-group col-sm-12">
       
            <div class="row">
                <div class="col-sm-8 col-xs-8 col-md-8 col-xl-3 col-8">
                    {{ Form::label('profile', __('messages.candidate.profile').':', ['class' => 'font-weight-bolder']) }}
                    <label class="image__file-upload text-white"> {{ __('messages.common.choose') }}
                        {{ Form::file('image',['id'=>'profile','class' => 'd-none']) }}
                    </label>
                </div>
                <div class="col-sm-6 col-xs-6 col-6 col-md-6 col-xl-6 pl-2 mt-1">
                    <img id='profilePreview' class="img-thumbnail thumbnail-preview"
                         src="{{ (!empty($user->media[0])) ? $user->media[0]->getFullUrl() : asset('assets/img/infyom-logo.png') }}">
                </div>
            </div>
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('first_name',__('messages.candidate.first_name').':', ['class' => 'font-weight-bolder']) }}<span class="text-danger">*</span>
            {{ Form::text('first_name', $user->first_name, ['class' => 'form-control','required']) }}
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('last_name',__('messages.candidate.last_name').':', ['class' => 'font-weight-bolder']) }}<span class="text-danger">*</span>
            {{ Form::text('last_name', $user->last_name, ['class' => 'form-control','required']) }}
        </div>
        

    
        <div class="form-group col-sm-6">
            {{ Form::label('dob', __('messages.candidate.birth_date').':', ['class' => 'font-weight-bolder']) }}<span class="text-danger">*</span>
            {{ Form::text('dob', $user->dob, ['class' => 'form-control','required','id' => 'birthDate','autocomplete' => 'off']) }}
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('gender', __('messages.candidate.gender').':', ['class' => 'font-weight-bolder']) }}<span class="text-danger">*</span>
            <div class="form-group mb-1">
                <div class="custom-control custom-radio">
                    <input type="radio" id="male" name="gender" class="custom-control-input" value="0"
                            {{ isset($user->gender) ? ($user->gender == 0 ? 'checked' : '') : '' }} required>
                    <label class="custom-control-label" for="male">{{ __('messages.common.male') }}</label>
                </div>
            </div>
            <div class="form-group mb-1">
                <div class="custom-control custom-radio">
                    <input type="radio" id="female" name="gender" class="custom-control-input" value="1"
                            {{ isset($user->gender) ? ($user->gender == 1 ? 'checked' : '') : '' }}>
                    <label class="custom-control-label" for="female">{{ __('messages.common.female') }}</label>
                </div>
            </div>
        </div>
   
  
        <div class="form-group col-sm-6">
            {{ Form::label('marital_status', __('messages.candidate.marital_status').':', ['class' => 'font-weight-bolder']) }}
            <span
                    class="text-danger">*</span>
            {{ Form::select('marital_status_id', $data['maritalStatus'], isset($user->candidate->marital_status_id) ? $user->candidate->marital_status_id : null, ['class' => 'form-control','required','id' => 'maritalStatusId','placeholder'=>'Select marital status']) }}
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('nationality', __('messages.candidate.nationality').':', ['class' => 'font-weight-bolder']) }}
           
            {{ Form::select('nationality', $data['countries'], !empty($user->country_id) ? $user->candidate->nationality : null, ['id'=>'nationality','class' => 'form-control','placeholder' => 'Select Country']) }}
        </div>
        
        <div class="form-group col-sm-6">
            {{ Form::label('country', __('messages.company.country').':', ['class' => 'font-weight-bolder']) }}
            {{ Form::select('country_id', $data['countries'], !empty($user->country_id) ? $user->candidate->country_name : null, ['id'=>'countryId','class' => 'form-control','placeholder' => 'Select Country']) }}
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('state', __('messages.company.state').':', ['class' => 'font-weight-bolder']) }}
            {{ Form::select('state_id', (isset($states) && $states!=null?$states:[]), isset($user->state_id) ? $user->state_name : null, ['id'=>'stateId','class' => 'form-control','placeholder' => 'Select State']) }}
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('city', __('messages.company.city').':', ['class' => 'font-weight-bolder']) }}
            {{ Form::select('city_id', (isset($cities) && $cities!=null?$cities:[]), isset($user->city_id) ? $user->city_name : null, ['id'=>'cityId','class' => 'form-control','placeholder' => 'Select City']) }}
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('visa_status', __('messages.candidate.Visa Status').':', ['class' => 'font-weight-bolder']) }}
            <span
                    class="text-danger">*</span>
            {{ Form::select('visa_status', $data['visaStatus'], isset($user->candidate->visa_status) ? $user->candidate->visa_status : null, ['class' => 'form-control','id' => 'visa_status','placeholder'=>'Select visa']) }}
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('driving_license ', __('messages.candidate.Driving license').':', ['class' => 'font-weight-bolder']) }} {{isset($user->candidate->driving_license)? getCountryName($user->candidate->driving_license): "NO"}}
            {{ Form::select('driving_license', $data['countries'], !empty($user->candidate->driving_license) ? getCountryName($user->candidate->driving_license) : null, ['id'=>'countryId','class' => 'form-control','placeholder' => 'Select Country']) }}
        </div>
     
        <div class="form-group col-sm-12"><h2>{{__('messages.candidate.Contact Information')}} :</h2></div>
        </br>
        
        <div class="form-group col-sm-12">
            {{ Form::label('phone', __('messages.candidate.phone').':', ['class' => 'font-weight-bolder']) }}<span class="text-danger">*</span><br>
            {{ Form::tel('phone', isset($user->phone) ? $user->phone : null, ['class' => 'form-control', 'required' ,'onkeyup' => 'if (/[^0-9\.+]/g.test(this.value)) this.value = this.value.replace(/[^0-9\.+]/g,"")']) }}
        </div>
        <div class="form-group col-sm-12">
            {{ Form::label('email',__('messages.candidate.email').':', ['class' => 'font-weight-bolder']) }}<span class="text-danger">*</span>
            {{ Form::text('email', $user->email, ['class' => 'form-control','required']) }}
        </div>
        <div class="form-group col-sm-12"><h2> {{__('messages.candidate.experience')}} :</h2></div>
        </br>
        <div class="form-group col-sm-6 ">
            {{ Form::label('skill_id', __('messages.candidate.candidate_skill').':', ['class' => 'font-weight-bolder']) }}
            <span
                    class="text-danger">*</span>
            <div class="w-100">
                {{Form::select('candidateSkills[]',$data['skills'], (count($candidateSkills) > 0)?$candidateSkills:null, ['class' => 'form-control  ','id'=>'skillId','multiple'=>true,'required'])}}
            </div>
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('experience', __('messages.candidate.experience').':', ['class' => 'font-weight-bolder']) }}
            <span>({{ __('messages.candidate.in_years') }})</span>
            {{ Form::number('experience', isset($user->candidate->experience) ? $user->candidate->experience : null, ['class' => 'form-control','min' => '0', 'max' => '15']) }}
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('career_level', __('messages.candidate.career_level').':', ['class' => 'font-weight-bolder']) }}
            {{ Form::select('career_level_id', $data['careerLevel'], isset($user->candidate->career_level_id) ? $user->candidate->career_level_id : null, ['class' => 'form-control','id' => 'careerLevelId','placeholder'=>'Select career level']) }}
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('industry', __('messages.candidate.industry').':', ['class' => 'font-weight-bolder']) }}
            {{ Form::select('industry_id', $data['industry'], isset($user->candidate->industry_id) ? $user->candidate->industry_id : null, ['class' => 'form-control','id' => 'industryId','placeholder'=>'Select industry']) }}
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('functional_area', __('messages.candidate.functional_area').':', ['class' => 'font-weight-bolder']) }}
            {{ Form::select('functional_area_id', $data['functionalArea'], isset($user->candidate->functional_area_id) ? $user->candidate->functional_area_id : null, ['class' => 'form-control','id' => 'functionalAreaId','placeholder'=>'Select functional area']) }}
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('current_salary', __('messages.candidate.current_salary').':', ['class' => 'font-weight-bolder']) }}
            {{ Form::text('current_salary', isset($user->candidate->current_salary) ? $user->candidate->current_salary : null, ['class' => 'form-control price-input']) }}
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('expected_salary', __('messages.candidate.expected_salary').':', ['class' => 'font-weight-bolder']) }}
            {{ Form::text('expected_salary', isset($user->candidate->expected_salary) ? $user->candidate->expected_salary : null, ['class' => 'form-control price-input']) }}
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('salary_currency', __('messages.candidate.salary_currency').':', ['class' => 'font-weight-bolder']) }}
            {{ Form::select('salary_currency', $data['currency'], isset($user->candidate->salary_currency) ? $user->candidate->salary_currency : null, ['class' => 'form-control', 'id' => 'salaryCurrencyId']) }}
        </div>
        <div class="form-group col-sm-12"><h2> {{__('messages.candidate.candidate_language')}} :</h2></div>
        <div class="form-group col-sm-6">
            {{ Form::label('language_id', __('messages.candidate.candidate_language').':', ['class' => 'font-weight-bolder']) }}
            <span
                    class="text-danger">*</span>
            {{Form::select('candidateLanguage[]',$data['language'], (count($candidateLanguage) > 0) ? $candidateLanguage : null, ['class' => 'form-control','id'=>'languageId','multiple'=>true,'required'])}}
        </div>
        <div class="form-group col-sm-12"><h2> {{__('messages.candidate.Availability to join')}} :</h2></div>
        <div class="form-group col-sm-6">
            {{ Form::label('immediate_available', __('messages.candidate.Availability to join').':', ['class' => 'font-weight-bolder']) }}
            <div class="form-group mb-1">
                <div class="custom-control custom-radio">
                    <input type="radio" id="available" name="immediate_available" class="custom-control-input" value="0"
                            {{ isset($user->candidate->immediate_available) ? ($user->candidate->immediate_available == 0 ? 'checked' : '') : 'checked' }} required>
                    <label class="custom-control-label"
                           for="available">{{ __('messages.candidate.immediate_available') }}</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="1_month" name="immediate_available" class="custom-control-input" value="1"
                            {{ isset($user->candidate->immediate_available) ? ($user->candidate->immediate_available == 1 ? 'checked' : '') : 'checked' }} >
                    <label class="custom-control-label"
                           for="1_month">{{ __('messages.candidate.1 month') }}</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="2_month" name="immediate_available" class="custom-control-input" value="2"
                            {{ isset($user->candidate->immediate_available) ? ($user->candidate->immediate_available == 3 ? 'checked' : '') : 'checked' }} >
                    <label class="custom-control-label"
                           for="2_month">{{ __('messages.candidate.2 month') }}</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="3_month" name="immediate_available" class="custom-control-input" value="3"
                            {{ isset($user->candidate->immediate_available) ? ($user->candidate->immediate_available == 3 ? 'checked' : '') : 'checked' }} >
                    <label class="custom-control-label"
                           for="3_month">{{ __('messages.candidate.3 month') }}</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="x_month" name="immediate_available" class="custom-control-input" value="4"
                            {{ isset($user->candidate->immediate_available) ? ($user->candidate->immediate_available == 4 ? 'checked' : '') : 'checked' }} >
                    <label class="custom-control-label"
                           for="x_month">{{ __('messages.candidate.other') }}</label>
                </div>
                    
            </div>
           
            </div>
            <div class="col-lg-12"></div>
        <div class="form-group col-xl-6 col-md-6 col-sm-12">
            {{ Form::label('facebook_url', __('messages.company.facebook_url').':') }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fab fa-facebook-f facebook-fa-icon"></i>
                    </div>
                </div>
                {{ Form::text('facebook_url',$user->facebook_url, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group col-xl-6 col-md-6 col-sm-12">
            {{ Form::label('twitter_url', __('messages.company.twitter_url').':') }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fab fa-twitter twitter-fa-icon"></i>
                    </div>
                </div>
                {{ Form::text('twitter_url', $user->twitter_url , ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group col-xl-6 col-md-6 col-sm-12">
            {{ Form::label('linkedin_url', __('messages.company.linkedin_url').':') }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fab fa-linkedin-in linkedin-fa-icon"></i>
                    </div>
                </div>
                {{ Form::text('linkedin_url', $user->linkedin_url, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group col-xl-6 col-md-6 col-sm-12">
            {{ Form::label('google_plus_url', __('messages.company.google_plus_url').':') }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fab fa-google-plus-g google-plus-fa-icon"></i>
                    </div>
                </div>
                {{ Form::text('google_plus_url', $user->google_plus_url, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group col-xl-6 col-md-6 col-sm-12">
            {{ Form::label('pinterest_url', __('messages.company.pinterest_url').':') }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fab fa-pinterest-p pinterest-fa-icon"></i>
                    </div>
                </div>
                {{ Form::text('pinterest_url', $user->pinterest_url, ['class' => 'form-control']) }}
            </div>
        </div>
      
    </div>

    <div class="row mt-4">
        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary btnSave']) }}
            {{ Form::reset(__('messages.common.cancel'), ['class' => 'btn btn-secondary text-dark']) }}
        </div>
    </div>
    {{ Form::close() }}
@endsection
<script>
    let countryId = '{{$user->country_id}}';
    let stateId = '{{$user->state_id}}';
    let cityId = '{{$user->city_id}}';
    let isEdit = true;
</script>

@push('page-scripts')
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
    <script src="{{mix('assets/js/candidate-profile/candidate-general.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
    <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      // allowDropdown: false,
       autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
       formatOnDisplay: true,
      geoIpLookup: function(callback) {
        $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
           var countryCode = (resp && resp.country) ? resp.country : "";
          callback(countryCode);
        });
      },
      hiddenInput: "phone",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      separateDialCode: true,
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js",

     
    });
  </script>
@endpush
