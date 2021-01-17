@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('profile.sidebar')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактировать профиль</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <form method="POST" id="post-image" action="{{route('profile.secure.update', $user)}}"
                              class="create-form"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="put">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Почта</label>
                                <div class="col-md-6">
                                    <input id="email" type="text"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{$user->email}}" required autofocus>
                                    @error('contact2')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Текущий
                                    пароль</label>
                                <div class="col-md-6">
                                    <input id="password" type="text"
                                           autocomplete="off"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           value="" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_password" class="col-md-4 col-form-label text-md-right">Новый
                                    пароль</label>
                                <div class="col-md-6">
                                    <input id="new_password" type="text"
                                           class="form-control @error('new_password') is-invalid @enderror"
                                           name="new_password"
                                           value="" required
                                           autocomplete="off"
                                    >
                                    @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_confirm_password" class="col-md-4 col-form-label text-md-right">Повторите
                                    пароль</label>
                                <div class="col-md-6">
                                    <input id="new_confirm_password" type="text"
                                           class="form-control @error('new_confirm_password') is-invalid @enderror"
                                           name="new_confirm_password"
                                           value="" required
                                           autocomplete="off"
                                    >
                                    @error('new_confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Изменить пароль
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{asset('js/forms.js')}}"></script>
@endsection