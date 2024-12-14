<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsItem;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news(Request $request){
        $acceptLanguage = $request->header('Accept-Language', 'az');

        $newsPage = News::first();

        $news = NewsItem::where('active', true)->paginate(9);
        $newsItems = $news->map(function ($item) use ($acceptLanguage) {
            $item->image = url('uploads/' . $item->image);
            return [
                'id' => $item->id,
                'seo_title' => $item['seo_title_' . $acceptLanguage],
                'seo_desc' => $item['seo_desc_' . $acceptLanguage],
                'title' => $item['title_' . $acceptLanguage],
                'slug' => $item['slug_' . $acceptLanguage],
                'text' => $item['text_' . $acceptLanguage],
                'image' => $item->image,
                'active' => $item->active,
            ];
        });

        $newsPageData = [
            'id' => $newsPage->id,
            'seo_title' => $newsPage->{'seo_title_' . $acceptLanguage},
            'seo_desc' => $newsPage->{'seo_desc_' . $acceptLanguage},
            'page_name' => $newsPage->{'page_name_' . $acceptLanguage},
            'page_title' => $newsPage->{'page_title_' . $acceptLanguage},
            'page_desc' => $newsPage->{'page_desc_' . $acceptLanguage},
            'top_banner_title' => $newsPage->{'top_banner_title_' . $acceptLanguage},
            'top_banner_desc' => $newsPage->{'top_banner_desc_' . $acceptLanguage},
            'top_banner_image' => url('uploads/'.$newsPage->top_banner_image),
            'top_banner_link' => $newsPage->top_banner_link,
        ];

        return response()->json([
            'news' => $newsPageData,
            'links' => $newsPage->links,
            'news_items' => $newsItems,
            'pagination' => [
                'total' => $news->total(),
                'per_page' => $news->perPage(),
                'current_page' => $news->currentPage(),
                'last_page' => $news->lastPage(),
                'next_page_url' => $news->nextPageUrl(),
                'prev_page_url' => $news->previousPageUrl(),
            ],
        ]);
    }
}
