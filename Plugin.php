<?php

namespace Adrenth\TinyMce;

use Backend;
use Backend\Classes\Controller;
use Backend\Widgets\Form;
use Event;
use System\Classes\PluginBase;
use System\Classes\PluginManager;
use System\Classes\SettingsManager;

/**
 * Class Plugin
 *
 * @package Adrenth\TinyMce
 */
class Plugin extends PluginBase
{
    /**
     * {@inheritdoc}
     */
    public function pluginDetails()
    {
        return [
            'name' => 'TinyMCE',
            'description' => 'Plugin for integrating TinyMCE into OctoberCMS',
            'author' => 'A. Drenth <adrenth@gmail.com>',
            'icon' => 'icon-leaf',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function registerFormWidgets()
    {
        return [
            'Adrenth\TinyMce\FormWidgets\TinyMce' => [
                'label' => 'TinyMCE',
                'alias' => 'tinymce',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function registerNavigation()
    {
        return [
            'tinymce' => [
                'label' => 'Editors',
                'url' => Backend::url('adrenth/tinymce/editor'),
                'icon' => 'icon-pencil',
                'permissions' => ['adrenth.tinymce.*'],
                'order' => 999,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function registerSettings()
    {
        return [
            'settings' => [
                'label' => 'TinyMCE',
                'description' => 'Manage TinyMCE settings',
                'icon' => 'icon-pencil-square-o',
                'category' => SettingsManager::CATEGORY_CMS,
                'class' => 'Adrenth\TinyMce\Models\Settings',
                'order' => 100,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        Event::listen('backend.form.extendFields', function (Form $form) {

            $class = get_class($form->model);

            switch ($class) {
                case 'RainLab\Pages\Classes\Page':
                    $field = $form->getField('markup');
                    $field->config['type'] = $field->config['widget'] = 'Adrenth\TinyMce\FormWidgets\TinyMce';
                    break;
                case 'RainLab\Blog\Models\Post':
                    $field = $form->getField('content');
                    $field->config['type'] = $field->config['widget'] = 'Adrenth\TinyMce\FormWidgets\TinyMce';
                    break;
            }
        });

        Event::listen('backend.page.beforeDisplay', function (Controller $controller) {
            $controller->addJs(url('plugins/adrenth/tinymce/formwidgets/tinymce/assets/tinymce.min.js'));
        });

        if (PluginManager::instance()->hasPlugin('AnandPatel.WysiwygEditors')) {
            PluginManager::instance()->disablePlugin('AnandPatel.WysiwygEditors');
        }
    }
}
