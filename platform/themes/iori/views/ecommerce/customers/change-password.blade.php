@extends(EcommerceHelper::viewPath('customers.master'))

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="customer-page-title">{{ __('Change password') }}</h2>
        </div>
        <div class="panel-body">
            {!! Form::open(['route' => 'customer.post.change-password', 'method' => 'post']) !!}

            <div class="form-group mb-20">
                <label for="old_password" class="input-group-prepend">{{ __('Current Password') }}: </label>
                <input id="old_password" type="password" class="form-control" name="old_password" placeholder="{{ __('Current Password') }}">
                {!! Form::error('old_password', $errors) !!}
            </div>

            <div class="row">
                <div class="col-12 col-lg-6 form-group mb-20">
                    <label for="password" class="input-group-prepend">{{ __('New password') }}: </label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="{{ __('New Password') }}">
                    {!! Form::error('password', $errors) !!}
                </div>

                <div class="col-12 col-lg-6 form-group mb-20">
                    <label for="password_confirmation" class="input-group-prepend">{{ __('Password confirmation') }}: </label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('New Password') }}">
                    {!! Form::error('password_confirmation', $errors) !!}
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-sm">{{ __('Change password') }}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
