<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function privacy()
    {
        return view('pages.privacy', [
            'metaTitle' => 'Privacy Policy | ADYSURVE LTD',
            'metaDescription' => 'Read how ADYSURVE LTD handles personal information submitted through this website.',
        ]);
    }

    public function terms()
    {
        return view('pages.terms', [
            'metaTitle' => 'Terms | ADYSURVE LTD',
            'metaDescription' => 'Review the basic terms that guide use of the ADYSURVE LTD website and service inquiries.',
        ]);
    }
}
