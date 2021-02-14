<div id="editEducationModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.candidate_profile.edit_education') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editEducationForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                <input type="hidden" id="educationId">
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('degree_level_id', __('messages.candidate_profile.degree_title').':') }}<span
                                class="text-danger">*</span>
                        {{ Form::select('degree_level_id', $data['degreeLevels'], null, ['class' => 'form-control','required','id' => 'degreeLevelId','placeholder'=>'Select Degree Level','id' => 'editDegreeLevel']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('institute',__('messages.candidate_profile.institute').':') }}<span
                                class="text-danger">*</span>
                        {{ Form::text('institute', null, ['class' => 'form-control','required', 'id' => 'editInstitute']) }}
                    </div>
              
                    <div class="form-group col-sm-6">
                        {{ Form::label('country', __('messages.company.country').':') }}<span
                                class="text-danger">*</span>
                        {{ Form::select('country_id', $data['countries'], null, ['id'=>'editEducationCountry','class' => 'form-control','placeholder' => 'Select Country', 'data-modal-type' => 'education', 'data-is-edit' => 'true']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('state', __('messages.company.state').':') }}
                        {{ Form::select('state_id', [], null, ['id'=>'editEducationState','class' => 'form-control','placeholder' => 'Select State', 'data-modal-type' => 'education', 'data-is-edit' => 'true']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('degree_title', __('messages.candidate_profile.result').':') }}<span
                                class="text-danger">*</span>
                        {{ Form::text('degree_title', null, ['class' => 'form-control','id' => 'editDegreeTitle']) }}
                    </div>
                    
                   
                    <div class="form-group col-sm-6">
                        {{ Form::label('year', __('messages.candidate_profile.year').':') }}<span
                                class="text-danger">*</span>
                        {{ Form::month('year', null, ['class' => 'form-control', ]) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('from', __('messages.candidate_profile.Duration').':') }}<span
                                class="text-danger">*</span>
                     
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('from', __('messages.candidate_profile.from').':') }}<span
                                class="text-danger"></span>
                        {{ Form::month('e_from',  null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('to', __('messages.candidate_profile.to').':') }}<span
                                class="text-danger"></span>
                        {{ Form::month('e_to',  '2018-05-01', ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditEducationSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnEditEducationCancel" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
