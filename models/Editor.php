<?php

namespace Adrenth\TinyMce\Models;

use Model;

/**
 * Class Editor
 *
 * @package Adrenth\TinyMce\Models
 */
class Editor extends Model
{
    /**
     * {@inheritdoc}
     */
    public $table = 'adrenth_tinymce_editors';

    /**
     * {@inheritdoc}
     */
    protected $guarded = ['*'];

    /**
     * {@inheritdoc}
     */
    protected $fillable = [];
}
