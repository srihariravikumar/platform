<?php namespace BookStack;

/**
 * DocTub - Online Documentation/Wiki Platform.
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 *
 * This source code is licensed under the BSD 3-Clause "New" or "Revised" License
 * found in the LICENSE file in the root directory of this source tree. An additional
 * grant of patent rights can be found in the PATENTS file in the same directory.
 *
 */

class Attachment extends Ownable
{
    protected $fillable = ['name', 'order'];

    /**
     * Get the downloadable file name for this upload.
     * @return mixed|string
     */
    public function getFileName()
    {
        if (str_contains($this->name, '.')) return $this->name;
        return $this->name . '.' . $this->extension;
    }

    /**
     * Get the page this file was uploaded to.
     * @return Page
     */
    public function page()
    {
        return $this->belongsTo(Page::class, 'uploaded_to');
    }

    /**
     * Get the url of this file.
     * @return string
     */
    public function getUrl()
    {
        return baseUrl('/attachments/' . $this->id);
    }

}
