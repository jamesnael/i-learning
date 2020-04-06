@extends('admin.template.master') 
@section('content')
<style type="text/css">
    .custom-file-upload{
        cursor: pointer;
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
    }
</style>
<div class="row">
    <div class="col-lg-4">
        <div class="m-portlet m-portlet--full-height  ">
            <div class="m-portlet__body">
                <div class="m-card-profile">
                    <div class="m-card-profile__title">
                        Profile Photo
                    </div>
                    <form id="form-photo" role="form" action="{{ route('admin-change-picture') }}" enctype="multipart/form-data">
                        <!-- Csrf Field -->
                        @csrf
                        <!-- Csrf Field -->
                        <div class="m-card-profile__pic">
                            <div class="m-card-profile__pic-wrapper">
                                <input type="file" name="profile_photo" id="profile_photo" class="custom-file-upload" style="height: 150px; width: 150px;">
                                <img id="profilePreview" src="{{ !empty(Auth::user()->photo) ? asset('images/user_photo/' . Auth::user()->photo ) : asset('assets/no_image.png')}}" alt="" />
                            </div>
                        </div>
                        <span><b class="text-danger">*</b> Click image above to change profile photo</span>
                        <div class="m-card-profile__details mt-5">
                            <span class="m-card-profile__name">{{ Auth::user()->name }}</span>
                            <span class="m-card-profile__email">{{ Auth::user()->email }}</span>
                        </div>
                        <center>
                            <button type="button" class="btn btn-primary change-pict mt-4" disabled>Save Picture</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-tools">
                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                <i class="flaticon-share m--hide"></i> Update Profile
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                Change Password
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="m_user_profile_tab_1">
                    <form class="m-form m-form--fit m-form--label-align-right" action="{{ route('admin-change-information') }}" id="form-profile">
                        <!-- Csrf Field -->
                        @csrf
                        <!-- Csrf Field -->
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                <div class="alert m-alert m-alert--default" role="alert">
                                    The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">Personal Details</h3>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="{{ Auth::user()->name }}" name="full_name" autocomplete="off">
                                </div>
                            </div>

<!--                             <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Date of Birth</label>
                                <div class="col-7">
                                    <div class="input-group date">
                                        <input type="text" name="date_of_birth" class="form-control m-input" value="{{ date('d F Y', strtotime(Auth::user()->date_of_birth)) }}" readonly="true" placeholder="Select date" id="m_datepicker_2">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Gender</label>
                                <div class="col-7">
                                    <select name="gender" class="form-control m-input selectpicker" id="gender">
                                       <option value="" disabled=""></option>
                                       <option @if(Auth::user()->gender == 'L') selected="selected" @endif value="L">Male</option>
                                       <option @if(Auth::user()->gender == 'P') selected="selected" @endif value="P">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Address</label>
                                <div class="col-7">
                                    <textarea class="form-control m-input" name="address" id="address" rows="3">{{ Auth::user()->address }}</textarea>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Phone No.</label>
                                <div class="col-7">
                                    <input class="form-control m-input" name="phone_number" type="text" value="{{ Auth::user()->phone_number }}" id="phone-number">
                                </div>
                            </div>
                        </div>

                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-2">
                                    </div>
                                    <div class="col-7">
                                        <button type="button" class="btn btn-accent m-btn m-btn--air m-btn--custom save-profile">Save changes</button>&nbsp;&nbsp;
                                        <a href="{{ route('dashboard') }}" class="btn btn-secondary m-btn m-btn--air m-btn--custom cancel">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane " id="m_user_profile_tab_2">
                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right m-form--state" id="form-reset-password" action="{{ route('admin-change-password') }}">
                        <!-- Csrf Field  -->
                        @csrf
                        <!-- Csrf Field -->
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-form-label col-2">Email Address</label>
                                <div class="col-9">
                                    <input id="email" type="email" class="form-control m-input" name="email" autocomplete="email" value="{{ Auth::user()->email }}" disabled>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-form-label col-2">New Password</label>
                                <div class="col-9">
                                   <div class="input-group">
                                        <input id="password" type="password" class="form-control m-input" name="password"  autocomplete="new-password">
                                        <div class="input-group-append"><span class="input-group-text" id="basic-addon2"><i class="la la-eye pw-1"></i></span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-form-label col-2">Confirm Password</label>

                                <div class="col-9">
                                    <div class="input-group">
                                        <input id="password-confirm" type="password" class="form-control m-input" name="password_confirmation"  autocomplete="new-password">          
                                        <div class="input-group-append"><span class="input-group-text" id="basic-addon2"><i class="la la-eye pw-2"></i></span></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit" align="center">
                            <div class="m-form__actions">
                                <button type="button" class="btn btn-primary change-password">{{ __('Change Password') }}</button>
                            </div>
                        </div>
                    </form>
                    <!--end::Form--> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/backend/profile/user.js') }}"></script>
@endsection