<?php

use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Theme\Facades\Theme;

app()->booted(function () {
    if (! is_plugin_active('contact')) {
        return;
    }

    if (is_plugin_active('contact')) {
        Shortcode::register(
            'contact-form',
            trans('plugins/contact::contact.shortcode_name'),
            trans('plugins/contact::contact.shortcode_description'),
            function (ShortcodeCompiler $shortcode) {
                if (defined('THEME_OPTIONS_MODULE_SCREEN_NAME')) {
                    Theme::asset()
                        ->usePath(false)
                        ->add(
                            'contact-css',
                            asset('vendor/core/plugins/contact/css/contact-public.css'),
                            [],
                            [],
                            '1.0.0'
                        );

                    Theme::asset()
                        ->container('footer')
                        ->usePath(false)
                        ->add(
                            'contact-public-js',
                            asset('vendor/core/plugins/contact/js/contact-public.js'),
                            ['jquery'],
                            [],
                            '1.0.0'
                        );
                }

                $tabs = Shortcode::fields()->getTabsData(['heading', 'description', 'icon'], $shortcode);

                return Theme::partial('shortcodes.contact-form.index', compact('shortcode', 'tabs'));
            }
        );

        Shortcode::setAdminConfig('contact-form', function (array $attributes) {
            return Theme::partial('shortcodes.contact-form.admin-config', compact('attributes'));
        });
    }
});
