<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input type="text" name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" placeholder="{{ __('Title') }}">
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Subtitle') }}</label>
    <input type="text" name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" placeholder="{{ __('Subtitle') }}">
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Button Label') }}</label>
    <input type="text" name="title_button" value="{{ Arr::get($attributes, 'title_button') }}" class="form-control" placeholder="{{ __('Title Button') }}">
</div>

<div class="mb-3">
    {!! Shortcode::fields()->tabs([
        'heading' => [
            'title' => __('Heading'),
            'type' => 'text',
        ],
        'description' => [
            'title' => __('Description'),
            'type' => 'text',
        ],
        'icon' => [
            'type'  => 'image',
            'title' => __('Image'),
        ],
    ], $attributes) !!}
</div>
