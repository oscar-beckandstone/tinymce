<?php

namespace Adrenth\TinyMce\Models;

use Model;

/**
 * Class Settings
 *
 * @package Adrenth\TinyMce\Models
 */
class Settings extends Model
{
    /**
     * {@inheritdoc}
     */
    public $implement = ['System.Behaviors.SettingsModel'];

    /** @type string */
    public $settingsCode = 'adrenth_tinymce_settings';

    /** @type string */
    public $settingsFields = 'fields.yaml';

    /** @type array */
    protected $cache = [];

    /**
     * @return array
     */
    public function getCmsEditorOptions()
    {
        $options = [];
        $editors = Editor::all();

        if ($editors === null) {
            return $options;
        }

        foreach ($editors->all() as $editor) {
            $options[$editor->id] = $editor->name;
        }

        return $options;
    }
}
