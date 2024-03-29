@extends('candidate.profile.index')
@push('page-css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
@endpush
@section('section')
    <section class="section">
        <div class="section-header candidate-experience-header">
            <h1>{{ __('messages.candidate_profile.experience') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="#"
                   class="btn btn-primary form-btn addExperienceModal" data-toggle="modal"
                   data-target="#addExperienceModal">{{ __('messages.candidate_profile.add_experience') }}
                    <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="row candidate-experience-container">
                @forelse($data['candidateExperiences'] as $candidateExperience)
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 candidate-experience"
                         data-experience-id="{{ $loop->index }}" data-id="{{ $candidateExperience->id }}">
                        <article class="article article-style-b">
                            <div class="article-details">
                                <div class="article-title">
                                    <h4 class="text-primary">{{ $candidateExperience->experience_title }}</h4>
                                    <h6 class="text-muted">{{ $candidateExperience->company }}</h6>
                                </div>
                                <span class="text-muted">{{ \Carbon\Carbon::parse($candidateExperience->start_date)->format('M, Y')}} - </span>

                                @if($candidateExperience->currently_working)
                                    <span class="text-muted">{{ __('messages.candidate_profile.present') }}</span>
                                @else
                                    <span class="text-muted"> {{\Carbon\Carbon::parse($candidateExperience->end_date)->format('M, Y')}} </span>
                                @endif
                                <span> | {{ $candidateExperience->country }}</span>
                                </span>
                                @if(!empty($candidateExperience->description))
                                    <p class="mb-0">{{ Str::limit($candidateExperience->description,225,'...') }}</p>
                                @endif

                                <div class="article-cta candidate-experience-edit-delete">
                                    <a href="javascript:void(0)" class="btn btn-warning action-btn edit-experience"
                                       data-id="{{ $candidateExperience->id }}"><i class="fa fa-edit p-1"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger action-btn delete-experience"
                                       data-id="{{ $candidateExperience->id }}"><i class="fa fa-trash p-1"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12" id="notfoundExperience">
                        <h4 class="product-item pb-5 d-flex justify-content-center">
                            Experience Not Available
                        </h4>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <br>
    @include('candidate.profile.modals.add_experience_modal')
    @include('candidate.profile.modals.edit_experience_modal')
    @include('candidate.profile.templates.templates')
@endsection
@push('page-scripts')
    <script>
        let addExperienceUrl = "{{ route('candidate.create-experience') }}";
        let experienceUrl = "{{ url('candidate/candidate-experience') }}/";
        let addEducationUrl = "{{ route('candidate.create-education') }}";
        let candidateUrl = "{{ url('candidate') }}/";
        let educationUrl = "{{ url('candidate/candidate-education') }}/";
        let present = "{{ __('messages.candidate_profile.present') }}";
        let isEdit = false;
    </script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{mix('assets/js/candidate-profile/candidate_career_informations.js')}}"></script>
@endpush
