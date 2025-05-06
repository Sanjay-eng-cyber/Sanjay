@extends('backend.layouts.app')
@section('title', 'Change-Password')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing">
        {{-- <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow" style="padding: 10px">
            <div class="widget-header">
                <div class="row justify-content-between align-items-center">
                    <div class="col-3">
                        <h5>Expenses</h5>
                    </div>
                    <div class="col-7">
                    </div>
                    <div class="col-2">
                        <p>Home -> Expenses</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="row">
                <div class="col-12 col-md-7 widget box box-shadow">
                    <div class="statbox widget box box-shadow">
                        <h4>Change Password</h4>
                        <form class="mt-3" method="POST" action="{{ route('cms.password.submit',$user->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-3">
                                <div class="col-md-12 mb-2 col-12">
                                    <label for="formGroupExampleInput">Email</label>
                                    <input id="email" name="email" type="email" placeholder="Email"
                                    value="{{ old('email', $user->email) }}" class="form-control" readonly required>
                                    @if ($errors->has('email'))
                                        <div class="text-danger" role="alert">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-12 mb-2 col-12">
                                    <label for="formGroupExampleInput">Password</label>
                                    <input id="password" name="password" type="password" class="form-control"
                                        placeholder="Password" required minlength="8" maxlength="16">

                                </div>
                                <div class="col-md-12 mb-2 col-12">
                                    <label for="formGroupExampleInput">Confirm Password</label>
                                    <input id="password2" name="password_confirmation" type="password"
                                        class="form-control" placeholder="Confirm Password" required minlength="8"
                                        maxlength="16">
                                    @if ($errors->has('password'))
                                        <div class="text-danger" role="alert">{{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>

                            </div>

                            {{-- <div class="form-group row mb-3">
                                <div class="col-12">
                                    <label for="body">Description:</label>
                                    <textarea class="form-control" name="description"  minlength="3" maxlength="250" rows="4" cols="50"></textarea>
                                    @if ($errors->has('description'))
                                        <div class="text-danger" role="alert">{{ $errors->first('description') }}</div>
                                    @endif
                                </div>
                            </div> --}}
                            <input type="submit" class="btn btn-primary">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

