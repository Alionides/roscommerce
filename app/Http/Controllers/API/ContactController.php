<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(Request $request){
        $acceptLanguage = $request->header('Accept-Language', 'az');

        $contactPage = Contact::first();

        $contactPageData = [
            'id' => $contactPage->id,
            'seo_title' => $contactPage->{'seo_title_' . $acceptLanguage},
            'seo_desc' => $contactPage->{'seo_desc_' . $acceptLanguage},
            'page_name' => $contactPage->{'page_name_' . $acceptLanguage},
            'page_title' => $contactPage->{'page_title_' . $acceptLanguage},
            'page_desc' => $contactPage->{'page_desc_' . $acceptLanguage},
            'slug' => $contactPage->slug,
            'links' => $contactPage->links,
            'top_banner_title' => $contactPage->{'top_banner_title_' . $acceptLanguage},
            'top_banner_desc' => $contactPage->{'top_banner_desc_' . $acceptLanguage},
            'top_banner_image' => url('uploads/'.$contactPage->top_banner_image),
            'top_banner_link' => $contactPage->top_banner_link,
            'central_office_title' => $contactPage->{'central_office_title_' . $acceptLanguage},
            'central_office_address' => $contactPage->{'central_office_address_' . $acceptLanguage},
            'central_office_phone' => $contactPage->central_office_phone,
            'central_office_email' => $contactPage->central_office_email,
            'media_title' => $contactPage->{'media_title_' . $acceptLanguage},
            'media_email' => $contactPage->media_email,
            'partners_title' => $contactPage->{'partners_title_' . $acceptLanguage},
            'partners_phone' => $contactPage->partners_phone,
            'partners_email' => $contactPage->partners_email,
            'customer_support_title' => $contactPage->{'customer_support_title_' . $acceptLanguage},
            'customer_support_address' => $contactPage->{'customer_support_address_' . $acceptLanguage},
            'customer_support_phone' => $contactPage->customer_support_phone,
            'customer_support_email' => $contactPage->customer_support_email,
        ];

        return response($contactPageData);

    }
}
