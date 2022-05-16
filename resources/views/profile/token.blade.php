@extends('layouts.master')
@section('content')
    <main class="profile-user-page default">
        <div class="container">
            <div class="row">
                <div class="profile-page col-xl-12 col-lg-12 col-md-12 order-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-12">
                                <h1 class="title-tab-content">کد فعالسازی</h1>
                            </div>
                            <div class="content-section default">
                                <form class="form-account" method="post" action="{{route('auth.token')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-account-title">کد تاییدیه:</div>
                                            <div class="form-account-row">
                                                <input class="input-field @error('token') is-invalid @enderror" name="token" type="text">
                                                @error('token')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
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
            </div>
    </main>
@endsection
