@php
$manageLicense = true; // Set it to true
@endphp

@if(!$manageLicense)
<x-core::alert type="warning" :important="true" @class(['alert-license alert-sticky small', 'vertical-wrapper' => AdminAppearance::isVerticalLayout()]) icon="" @style(['display: none' => $hidden ?? true]) data-bb-toggle="authorized-reminder">
    <div class="{{ AdminAppearance::getContainerWidth() }}">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                Your license is verified.
            </div>
        </div>
    </div>
</x-core::alert>
@endif

<!-- @if ($manageLicense)
    @include('core/base::system.partials.license-activation-modal')
@endif -->
