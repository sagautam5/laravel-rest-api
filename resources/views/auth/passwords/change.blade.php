@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h4>Change Password</h4>
        <div class="col-md-12">
            @if (session('status'))
                <p class="alert alert-success">{{ session('status') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
            <form class="form-horizontal" method="POST" action="{{url('password/change')}}">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input id="current_password" type="password" class="form-control" name="current_password" required placeholder="Enter Password">
                    @if ($errors->has('current_password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required placeholder="Enter at least 6 Character">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="col-12 text-center">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection