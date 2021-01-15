@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('profile.sidebar')
            </div>

{{--            {{dd($check)}}--}}
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактировать профиль</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('danger'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('danger') }}
                            </div>
                        @endif


                        <form method="POST" id="post-image" action="{{ route('profile.update', $profile) }}" class="create-form"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="put">
                            @csrf
                            <fileinput-component img="{{$profile->image ?? ''}}"></fileinput-component>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{old('name', $profile->name)}}" required autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Контакт 1</label>
                                <div class="col-md-6">
                                    <input id="contact1" type="text"
                                           class="form-control @error('contact1') is-invalid @enderror" name="contact1"
                                           value="{{old('contact1', $profile->contact1)}}">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contact2" class="col-md-4 col-form-label text-md-right">Контакт 2</label>
                                <div class="col-md-6">
                                    <input id="contact2" type="text"
                                           class="form-control @error('contact2') is-invalid @enderror" name="contact2"
                                           value="{{ old('contact2', $profile->contact2) }}">
                                    @error('contact2')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <fileautocomplite-component value="{{ old('address', $profile->address) }}" message="@error('address') {{$message}} @enderror"></fileautocomplite-component>
{{--                            <div class="form-group row">--}}
{{--                                <label for="address" class="col-md-4 col-form-label text-md-right">Адрес сделки</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input id="address" type="text"--}}
{{--                                           class="form-control @error('address') is-invalid @enderror" name="address"--}}
{{--                                           value="{{ old('address', $profile->address) }}" required autofocus>--}}
{{--                                    @error('address')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="type">Тип
                                    профиля</label>
                                <div class="col-md-6">
                                    <select name="type" class="form-control" id="type">
                                        @foreach ($profileTypes as $code=>$type)
                                            <option value="{{$code}}" {{ old('name', $profile->type) == $code ? 'selected' : ''}}  >{{$type}}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $type }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Изменить профиль
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
