<?php namespace BookStack;

/**
 * DocTub - Online Documentation Platform.
 * @author - Yoginth <yoginth@zoho.com>
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 */
 

class SocialAccount extends Model
{

    protected $fillable = ['user_id', 'driver', 'driver_id', 'timestamps'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
