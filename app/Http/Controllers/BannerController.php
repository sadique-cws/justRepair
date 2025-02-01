<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function insert()
    {
        return view('admin.banner.insert');
    }

    public function index()
    {
        return view('admin.banner.manage');
    }

    public function view($id)
    {
        $banner = Banner::where("id", $id)->first();
        return view('admin.banner.view', compact("banner"));
    }

    // public function destroy($id){
    //     $banner = Banner::findOrFail($id);
    //     $banner->delete();

    //     return redirect()->back()->with('success','Banner has been deleted successfully!');
    // }

    public function getBanners(){
        $banners = Banner::pluck('image')->toArray();
        return $banners;
    }
}
