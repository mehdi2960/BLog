@extends('layouts.master')
@section('content')
    <main class="profile-user-page default">
        <div class="container">
            <div class="row">
                <div class="profile-page col-xl-9 col-lg-8 col-md-12 order-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-12">
                                <h1 class="title-tab-content">احراز هویت دو مرحله ای</h1>
                            </div>
                            <div class="content-section default">
                                <form class="form-account" method="post" action="{{route('ins.twoFactor')}}">
                                    @csrf
                                    @include('sections.error')
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-account-title">وضیعت</div>
                                            <select class="input-field" name="type" id="twofactor" style="text-align: right !important;">
                                                @foreach(config('twofactor.types') as $key=>$name)
                                                  <option value="{{$key}}" {{old('types')==$key || auth()->user()->two_factor_type==$key ? 'selected':''}}>{{$name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-account-title">شماره موبایل</div>
                                            <div class="form-account-row">
                                                <input class="input-field" value="{{old('phone') ?? auth()->user()->phone_number}}" name="phone" type="text" placeholder="شماره موبایل خود را وارد نمایید">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 text-center">
                                        <button class="btn btn-default btn-lg">ثبت اطلاعات</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-page-aside col-xl-3 col-lg-4 col-md-6 center-section order-1">
                    <div class="profile-box">
                        <div class="profile-box-header">
                            <div class="profile-box-avatar">
                                <img src="/front/assets/img/svg/user.svg" alt="">
                            </div>
                            <button data-toggle="modal" data-target="#myModal" class="profile-box-btn-edit">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <!-- Modal Core -->
                            <div class="modal-share modal-width-custom modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">تغییر نمایه کاربری شما</h4>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="profile-avatars default text-center">
                                                <li>
                                                    <img class="profile-avatars-item" src="/front/assets/img/svg/user.svg"></img>
                                                </li>
                                                <li>
                                                    <img class="profile-avatars-item" src="/front/assets/img/svg/avatar-1.svg"></img>
                                                </li>
                                                <li>
                                                    <img class="profile-avatars-item" src="/front/assets/img/svg/avatar-2.svg"></img>
                                                </li>
                                                <li>
                                                    <img class="profile-avatars-item" src="/front/assets/img/svg/avatar-3.svg"></img>
                                                </li>
                                                <li>
                                                    <img class="profile-avatars-item" src="/front/assets/img/svg/avatar-4.svg"></img>
                                                </li>
                                                <li>
                                                    <img class="profile-avatars-item" src="/front/assets/img/svg/avatar-5.svg"></img>
                                                </li>
                                                <li>
                                                    <img class="profile-avatars-item" src="/front/assets/img/svg/avatar-6.svg"></img>
                                                </li>
                                                <li>
                                                    <img class="profile-avatars-item" src="/front/assets/img/svg/avatar-7.svg"></img>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Core -->
                        </div>
                        @include('layouts.profile-sidebar')
                </div>
            </div>
        </div>
    </main>
@endsection
