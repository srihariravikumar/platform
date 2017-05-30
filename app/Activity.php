<?php

/**
 * DocTub - Online Documentation/Wiki Platform.
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 *
 * This source code is licensed under the BSD 3-Clause "New" or "Revised" License
 * found in the LICENSE file in the root directory of this source tree. An additional
 * grant of patent rights can be found in the PATENTS file in the same directory.
 *
 */

namespace BookStack;

/**
 * @property string  key
 * @property \User   user
 * @property \Entity entity
 * @property string  extra
 */
class Activity extends Model
{

    /**
     * Get the entity for this activity.
     */
    public function entity()
    {
        if ($this->entity_type === '') $this->entity_type = null;
        return $this->morphTo('entity');
    }

    /**
     * Get the user this activity relates to.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns text from the language files, Looks up by using the
     * activity key.
     */
    public function getText()
    {
        return trans('activities.' . $this->key);
    }

    /**
     * Checks if another Activity matches the general information of another.
     * @param $activityB
     * @return bool
     */
    public function isSimilarTo($activityB) {
        return [$this->key, $this->entity_type, $this->entity_id] === [$activityB->key, $activityB->entity_type, $activityB->entity_id];
    }

}
