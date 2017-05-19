<?php namespace BookStack;

/**
 * DocTub - Online Documentation Platform.
 * @author - Yoginth <yoginth@zoho.com>
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 */
 
class Setting extends Model
{
    protected $fillable = ['setting_key', 'value'];

    protected $primaryKey = 'setting_key';
}
