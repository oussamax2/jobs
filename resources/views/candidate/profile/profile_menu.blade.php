<div class="row mt-3">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body px-0 py-0">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a href="{{ route('candidate.profile',['section' => 'general']) }}"
                           class="nav-link {{ (isset($data['sectionName']) && $data['sectionName'] == 'general') ? 'active' : ''}}">
                            {{ __('messages.general') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('candidate.profile',['section' => 'career_informations_exp']) }}"
                           class="nav-link {{ (isset($data['sectionName']) && $data['sectionName'] == 'career_informations_exp') ? 'active' : ''}}">
                            {{ __('messages.candidate_profile.experience') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('candidate.profile',['section' => 'career_informations_edu']) }}"
                           class="nav-link {{ (isset($data['sectionName']) && $data['sectionName'] == 'career_informations_edu') ? 'active' : ''}}">
                            {{ __('messages.candidate_profile.education') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('candidate.profile',['section' => 'resumes']) }}"
                           class="nav-link {{ (isset($data['sectionName']) && $data['sectionName'] == 'resumes') ? 'active' : ''}}">
                            {{ __('messages.apply_job.resume') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        @yield('section')
    </div>
</div>

