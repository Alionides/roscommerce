<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends Controller
{
//    public function brandsPages(Request $request){
//        $acceptLanguage = $request->header('Accept-Language', 'az');
//
//        try {
//            $title = 'ROSSMANN və tərəfdaş brendlər ';
//            $content = '<p>Yüksək keyfiyyət və etibarlı uzunömürlülük tanınmış və uğurlu brend istehsalçılarından və ROSSMANN brendlərindən ibarət seçilmiş çeşiddən gəlir. Sertifikatlaşdırılmış tərəfdaş brendlərə Catrice, essie, Frosch, Beba və Manhattan kimi tərəfdaşlar daxildir.Onlayn mağazada ROSSMANN həmçinin MAKEUP REVOLUTION, REVOLUTION PRO, mAsam və Luvia kimi aparıcı kosmetika brendlərini də əhatə edir. Mağazada onlayn eksklüziv brendləri də kəşf edə bilərsiniz.</p>';
//            $image = url('uploads/');
//
//            $popular_brands = Brand::where([['active',1],['is_home',true]])->get()
//                ->map(function($item){
//                    return [
//                        'slug' => $item->slug,
//                        'name' => $item->name,
//                        'image' => url('uploads/' . $item->image),
//                    ];
//                });
//
//            $all_brands = Brand::where('active',1)
//                ->whereRaw('LEFT(name, 1) NOT REGEXP "^[A-Za-z]"')
//                ->get()
//                ->map(function($item){
//                    return [
//                        'id' => $item->id,
//                        'name' => $item->name,
//                    ];
//                });
//
//            return response()->json([
//                'title' => $title,
//                'content' => $content,
//                'image' => $image,
//                'popular_brands' => $popular_brands,
//                'all_brands' => $all_brands,
//                'status' => 'true'
//            ],200);
//
//        } catch (\Exception $e) {
//            return response()->json([
//                'status' => 'error',
//                'message' => $e->getMessage()
//            ], Response::HTTP_INTERNAL_SERVER_ERROR);
//        }
//    }

    public function brandsStartingWithLetters(Request $request){
        try {
            $letter = $request->query('letter');
            if($letter ==''){
                return response()->json(['status' => 'error', 'message' => 'Letter not found.'], 400);
            }
            $brands_starting_with_letter = Brand::where('active', 1)
                ->where('name', 'LIKE', $letter . '%')
                ->get();

            $brands = $brands_starting_with_letter->map(function ($brand){
                return [
                    'id' => $brand->id,
                    'name' => $brand->name
                ];
            });

            return response()->json([
                'brands' => $brands,
                'status' => 'true'
            ],200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
