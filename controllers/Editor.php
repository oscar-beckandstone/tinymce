<?php

namespace Adrenth\TinyMce\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Adrenth\TinyMce\Models\Editor as EditorModel;

/**
 * Editor Back-end Controller
 */
class Editor extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Adrenth.TinyMce', 'tinymce', 'editor');
    }

    /**
     * @return EditorModel
     */
    public function formCreateModelObject()
    {
        $model = new EditorModel();

        $configuration = file_get_contents(
            plugins_path('adrenth/tinymce/assets/js/default.tinymce.init.js')
        );

        $model->setAttribute('configuration', $configuration);

        return $model;
    }
}
