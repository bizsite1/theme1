<?php

namespace Botble\Ecommerce\Forms;

use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\OnOffFieldOption;
use Botble\Base\Forms\FieldOptions\StatusFieldOption;
use Botble\Base\Forms\Fields\OnOffField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormAbstract;
use Botble\Ecommerce\Http\Requests\ProductCategoryRequest;
use Botble\Ecommerce\Models\ProductCategory;

class ProductCategoryForm extends FormAbstract
{
    public function setup(): void
    {
        $this
            ->setupModel(new ProductCategory())
            ->setValidatorClass(ProductCategoryRequest::class)
            ->add('name', TextField::class, NameFieldOption::make()->toArray())
            ->add('description', 'editor', [
                'label' => trans('core/base::forms.description'),
                'attr' => [
                    'rows' => 4,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'data-counter' => 500,
                ],
            ])
            ->add('status', SelectField::class, StatusFieldOption::make()->toArray())
            ->add('image', 'mediaImage')
            ->add(
                'icon',
                $this->getFormHelper()->hasCustomField('themeIcon') ? 'themeIcon' : 'text',
                [
                    'label' => __('Font Icon'),
                    'attr' => [
                        'placeholder' => 'ex: fa fa-home',
                    ],
                    'empty_value' => __('-- None --'),
                ]
            )
            ->add('icon_image', 'mediaImage', [
                'label' => __('Icon image'),
                'help_block' => [
                    'text' => __('It will replace Icon Font if it is present.'),
                ],
                'wrapper' => [
                    'style' => 'display: block;',
                ],
            ])
            ->add(
                'is_featured',
                OnOffField::class,
                OnOffFieldOption::make()
                    ->label(trans('core/base::forms.is_featured'))
                    ->defaultValue(false)
                    ->toArray()
            )
            ->setBreakFieldPoint('status');
    }
}
