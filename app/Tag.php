<?php namespace BookStack;

/**
 * DocTub - Online Documentation Platform.
 * @author - Yoginth <yoginth@zoho.com>
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 */
/**
 * Class Attribute
 * @package BookStack
 */
class Tag extends Model
{
    protected $fillable = ['name', 'value', 'order'];

    /**
     * Get the entity that this tag belongs to
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function entity()
    {
        return $this->morphTo('entity');
    }
}