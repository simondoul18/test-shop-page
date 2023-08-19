<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category:id,title','vendor:id,business_name');
        if(!empty($request->categories)){
            $query->whereIn('category_id',$request->categories);
        }
        if(!empty($request->minPrice)){
            $query->where('price','>=',$request->minPrice);
        }
        if(!empty($request->maxPrice)){
            $query->where('price','<=',$request->maxPrice);
        }
        if(!empty($request->rating)){
            $query->where('rating','>=',$request->rating);
        }
        if(!empty($request->colors)){
            $query->whereIn('color',$request->colors);
        }
        if(!empty($request->search)){
            $query->where('title','like','%'.$request->search.'%');
        }

        if(!empty($request->sorting)){
            if($request->sorting == 'rating-low'){
                $query->orderBy('rating','ASC');
            }elseif($request->sorting == 'rating-high'){
                $query->orderBy('rating','DESC');
            }elseif($request->sorting == 'date'){
                $query->orderBy('id','DESC');
            }elseif($request->sorting == 'price-low'){
                $query->orderBy('price','ASC');
            }elseif($request->sorting == 'price-high'){
                $query->orderBy('price','DESC');
            }
        }else{
            $query->orderBy('rating','DESC');
        }
        $products = $query->get();

        return response()->json(['status'=> 'success','data'=>$products], 200);
    }
    public function categories()
    {
        $categories = Category::where('status',1)->get();
        return response()->json(['status'=> 'success','data'=>$categories], 200);
    }
}
