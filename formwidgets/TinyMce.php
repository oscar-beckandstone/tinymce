<?php

namespace Adrenth\TinyMce\FormWidgets;

use Adrenth\TinyMce\Models\Editor;
use Backend\Classes\FormWidgetBase;

/**
 * Class TinyMce
 *
 * @package Adrenth\TinyMce\FormWidgets
 */
class TinyMce extends FormWidgetBase
{
    /**
     * {@inheritdoc}
     */
    protected $defaultAlias = 'adrenth_tinymce_tiny_mce';

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        $editor = Editor::find(1);
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['model'] = $this->model;
        $this->vars['configuration'] = $editor->getAttribute('configuration');
        return $this->makePartial('tinymce');
    }

    /**
     * {@inheritdoc}
     */
    public function getSaveValue($value)
    {
        return $value;
    }
}
