<?php namespace BookStack;

/**
 * DocTub - Online Documentation Platform.
 * @author - Yoginth <yoginth@zoho.com>
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 */
 
class SearchTerm extends Model
{

    protected $fillable = ['term', 'entity_id', 'entity_type', 'score'];
    public $timestamps = false;

    /**
     * Get the entity that this term belongs to
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function entity()
    {
        return $this->morphTo('entity');
    }

}
