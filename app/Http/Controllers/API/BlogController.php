<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogItem;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogCategory(Request $request){

        $acceptLanguage = $request->header('Accept-Language');

        $categories = BlogCategory::where('active',true)->get();

        $categories = $categories->map(function ($category) use($acceptLanguage) {
            return [
                'id' => $category->id,
                'seo_title' => $category->{'seo_title_'. $acceptLanguage},
                'seo_desc' => $category->{'seo_desc_'. $acceptLanguage},
                'title' => $category->{'title_'. $acceptLanguage},
                'text' => $category->{'text_'. $acceptLanguage},
                'slug_az' => $category->slug_az,
                'slug_en' => $category->slug_en,
                'slug_ru' => $category->slug_ru,
                'image' => url('uploads/' . $category->image)
            ];
        });

        return response($categories);
    }

    public function blogCategoryDetail(Request $request)
    {
        $acceptLanguage = $request->header('Accept-Language', 'az');
        $slugColumn = 'slug_' . $acceptLanguage;
        $slug = $request->input('slug');
        $slug = filter_var($slug, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $category = BlogCategory::where($slugColumn, $slug)->first();

        $relatedProductSlug = 'slug_' . $acceptLanguage;
        $relatedProducts = $category->productCategory->$relatedProductSlug;

        if (!$category) {
            return response()->json(['error' => 'Blog Category not found'], 404);
        }
        $perPage = $request->input('per_page', 10);

        $page = $request->input('page', 1);

        $blogItems = BlogItem::where('blog_category_id', $category->id)
            ->where('active', 1)
            ->paginate($perPage, ['*'], 'page', $page);

        $category->image = url('uploads/' . $category->image);
        $category->banner_image = url('uploads/' . $category->banner_image);

        $localizedBlogItems = $blogItems->map(function ($item) use ($acceptLanguage) {
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

        $banner_title = 'banner_title_' . $acceptLanguage;
        $banner_desc = 'banner_desc_' . $acceptLanguage;

        return response()->json([
            'category' => [
                'special_product_slug' => $relatedProducts,
                'id' => $category->id,
                'seo_title' => $category['seo_title_' . $acceptLanguage],
                'seo_desc' => $category['seo_desc_' . $acceptLanguage],
                'title' => $category['title_' . $acceptLanguage],
                'text' => $category['text_' . $acceptLanguage],
//                'slug' => $category[$slugColumn],
                'slug_az' => $category['slug_az'],
                'slug_en' => $category['slug_en'],
                'slug_ru' => $category['slug_ru'],
                'image' => $category->image,
                'banner_title' => $category->$banner_title,
                'banner_desc' => $category->$banner_desc,
                'banner_image' => $category->banner_image,
                'banner_button' => $category->{'banner_button_'. $acceptLanguage},
                'banner_link' => $category->banner_link
            ],
            'blog_items' => $localizedBlogItems,
            'pagination' => [
                'total' => $blogItems->total(),
                'per_page' => $blogItems->perPage(),
                'current_page' => $blogItems->currentPage(),
                'last_page' => $blogItems->lastPage(),
                'next_page_url' => $blogItems->nextPageUrl(),
                'prev_page_url' => $blogItems->previousPageUrl(),
            ],
        ]);
    }

    public function blogItemDetail(Request $request)
    {
        $acceptLanguage = $request->header('Accept-Language', 'az');
        $slugColumn = 'slug_' . $acceptLanguage;
        $slug = $request->input('slug');
        $slug = filter_var($slug, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Fetch the blog item based on the slug
        $blogItem = BlogItem::where($slugColumn, $slug)->where('active', 1)->first();
        $relatedItems = BlogItem::where('blog_category_id', $blogItem->blog_category_id)
            ->where('id', '!=', $blogItem->id)
            ->where('active', 1)
            ->get()
            ->map(function($item) use ($acceptLanguage) {
                return [
                    'id' => $item->id,
                    'seo_title' => $item['seo_title_' . $acceptLanguage],
                    'seo_desc' => $item['seo_desc_' . $acceptLanguage],
                    'title' => $item['title_' . $acceptLanguage],
                    'slug' => $item['slug_' . $acceptLanguage],
                    'text' => $item['text_' . $acceptLanguage],
                    'image' => url('uploads/' . $item->image),
                ];
            });
        $relatedProductSlug = 'slug_' . $acceptLanguage;
        $relatedProducts = $blogItem->blogCategory->productCategory->$relatedProductSlug;

        if (!$blogItem) {
            return response()->json(['error' => 'Blog Item not found'], 404);
        }

        // Modify image URL
        $blogItem->image = url('uploads/' . $blogItem->image);
        // Localize fields
        $localizedBlogItem = [
            'special_product_slug' => $relatedProducts,
            'id' => $blogItem->id,
            'seo_title' => $blogItem['seo_title_' . $acceptLanguage],
            'seo_desc' => $blogItem['seo_desc_' . $acceptLanguage],
            'title' => $blogItem['title_' . $acceptLanguage],
//            'slug' => $blogItem['slug_' . $acceptLanguage],
            'slug_az' => $blogItem->slug_az,
            'slug_en' => $blogItem->slug_en,
            'slug_ru' => $blogItem->slug_ru,
            'text' => $blogItem['text_' . $acceptLanguage],
            'image' => $blogItem->image,
            'related_items' => $relatedItems,
        ];

        return response($localizedBlogItem);
    }
}
