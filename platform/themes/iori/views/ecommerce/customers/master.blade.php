<div class="customer-page crop-avatar">
    <div class="container">
        <div class="customer-body">
            <div class="row body-border">

                <div class="col-md-3">
                    <div class="profile-sidebar">

                        <form id="avatar-upload-form" enctype="multipart/form-data" action="javascript:void(0)" onsubmit="return false">
                            <div class="avatar-upload-container">
                                <div class="form-group mb-3">
                                    <div id="account-avatar">
                                        <div class="profile-image custom-avatar-master">
                                            <div class="avatar-view mt-card-avatar">
                                                <img class="br2" src="{{ auth('customer')->user()->avatar_url }}" alt="{{ auth('customer')->user()->name }}">
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                <style>svg{fill:currentColor}</style>
                                                <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div id="print-msg" class="text-danger hidden"></div>
                            </div>
                        </form>

                        <div class="text-center">
                            <div class="profile-usertitle-name">
                                <strong>{{ auth('customer')->user()->name }}</strong>
                            </div>
                        </div>

                        <div class="profile-usermenu">
                            <ul class="list-group">
                                <li class="list-group-item" style="display:none">
                                    <a href="{{ route('customer.overview') }}" class="collection-item @if (Route::currentRouteName() == 'customer.overview') active @endif">{{ __('Overview') }}</a>
                                    <i class="fa fa-user-circle-o float-end" aria-hidden="true"></i>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('customer.edit-account') }}" class="collection-item @if (Route::currentRouteName() == 'customer.edit-account') active @endif">{{ __('Profile') }}</a>
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('customer.orders') }}" class="collection-item @if (Route::currentRouteName() == 'customer.orders') active @endif">{{ __('Orders') }}</a>
                                    <i class="fa fa-first-order" aria-hidden="true"></i>
                                </li>
                                @if (EcommerceHelper::isReviewEnabled())
                                    <li class="list-group-item">
                                        <a href="{{ route('customer.product-reviews') }}" class="collection-item @if (Route::currentRouteName() == 'customer.product-reviews') active @endif">{{ __('Product Reviews') }}</a>
                                        <i class="fa fa-star"></i>
                                    </li>
                                @endif
                                @if (EcommerceHelper::isEnabledSupportDigitalProducts())
                                    <li class="list-group-item">
                                        <a href="{{ route('customer.downloads') }}" class="collection-item @if (Route::currentRouteName() == 'customer.downloads') active @endif">{{ __('Downloads') }}</a>
                                        <i class="fa-solid fa-download" aria-hidden="true"></i>
                                    </li>
                                @endif
                                <li class="list-group-item">
                                    <a href="{{ route('customer.address') }}" class="collection-item @if (Route::currentRouteName() == 'customer.address') active @endif">{{ __('Address books') }}</a>
                                    <i class="fa fa-book" aria-hidden="true"></i>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('customer.change-password') }}" class="collection-item @if (Route::currentRouteName() == 'customer.change-password') active @endif">{{ __('Change password') }}</a>
                                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('customer.logout') }}" class="collection-item">{{ __('Logout') }}</a>
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>

                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="col-md-9">
                    <div class="profile-content">
                        @yield('content')
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="avatar-modal" tabindex="-1" role="dialog" aria-labelledby="avatar-modal-label"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="avatar-form" method="post" action="{{ route('customer.avatar') }}" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title" id="avatar-modal-label"><i class="til_img"></i><strong>{{ __('Profile Image') }}</strong></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">

                        <div class="avatar-body">

                            <!-- Upload image and data -->
                            <div class="avatar-upload">
                                <input class="avatar-src" name="avatar_src" type="hidden">
                                <input class="avatar-data" name="avatar_data" type="hidden">
                                @csrf
                                <label for="avatarInput">{{ __('New image') }}</label>
                                <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                            </div>

                            <div class="loading" style="display: none" tabindex="-1" role="img" aria-label="{{ __('Loading') }}"></div>

                            <!-- Crop and preview -->
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="avatar-wrapper"></div>
                                    <div class="error-message text-danger" style="display: none"></div>
                                </div>
                                <div class="col-md-3 avatar-preview-wrapper">
                                    <div class="avatar-preview preview-lg"></div>
                                    <div class="avatar-preview preview-md"></div>
                                    <div class="avatar-preview preview-sm"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button class="btn btn-primary avatar-save" type="submit">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal -->
</div>
