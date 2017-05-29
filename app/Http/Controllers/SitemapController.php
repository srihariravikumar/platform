<?php

namespace BookStack\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    function sitemap() {
      return view('sitemap/sitemap')
    }
}
