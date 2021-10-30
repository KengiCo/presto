<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use App\Models\AdImage;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Illuminate\Http\Request;
use App\Http\Requests\AdRequest;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;

class AdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create','store']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ads = Ad::where('is_accepted', true)
        ->orderBy('created_at', 'desc')
        ->Paginate(6);
        // dd($ads->all());
        // $ad_images = AdImage::all();
        return view('ads.index', compact('ads'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $uniqueSecret = $request->old(
            'uniqueSecret',
            base_convert(sha1(uniqid(mt_rand())), 16, 36)
        );
        // $uniqueSecret = $request->input('uniqueSecret');
        return view ('ads.create', compact('uniqueSecret'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(AdRequest $request)
    {
        // dd($request->all());
        // Ad::create([
        //     'title'=>$request->title,
        //     'body'=>$request->body,
        //     'price'=>$request->price,
        //     'user_id'=>Auth::id(),
        //     'category_id'=>$request->category
        //     // 'img'=>$request->file('img') ? $request->file('img')->store('public/img') : null,
        // ]);
        $a = new Ad();
        $a->title = $request->input('title');
        $a->body = $request->input('body');
        $a->price = $request->input('price');
        $a->category_id = $request->input('category');
        $a->user_id = Auth::user()->id;


        $a->save();

        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

        $images = array_diff($images, $removedImages);

        foreach ($images as $image) {
            $i = new AdImage();

            $fileName = basename($image);
            $newFileName = "public/ads/{$a->id}/{$fileName}";
            Storage::move($image, $newFileName);

            $i->file = $newFileName;
            $i->ad_id = $a->id;

            $i->save();

            GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionLabelImage($i->id),
                new GoogleVisionRemoveFaces($i->id),
                new ResizeImage($i->file,200,200),
                new ResizeImage($i->file, 400,300)
            ])->dispatch($i->id);


        }

        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

        return redirect()->back()->with('message','Complimenti hai creato un annuncio!');
    }

    public function uploadImage(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');

        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        ));

        session()->push("images.{$uniqueSecret}", $fileName);

        return response()->json(
            [
                'id'=>$fileName
            ]
        );
    }

    public function removeImage(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');

        $fileName = $request->input('id');

        session()->push("removedimages.{$uniqueSecret}", $fileName);

        Storage::delete($fileName);

        return response()->json('ok');
    }

    public function getImages(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

        $images = array_diff($images, $removedImages);

        $data = [];

        foreach ($images as $image){
            $data[] = [
                'id' => $image,
                'src' =>AdImage::getUrlByFilePath($image, 120, 120)
            ];
        }
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        return view('ads.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        //
    }
    public function search(Request $request)
    {
        $q = $request->input('q');

        $ads = Ad::search($q)->where('is_accepted', true)->get();
        return view('ads.search_results', compact('q','ads'));
    }


    public function adsAttachUser(ad $ad)
    {
        Auth::user()->adsFav()->attach($ad->id);
        return redirect()->back();
    }

    public function adsDetachUser(ad $ad)
    {
        Auth::user()->adsFav()->detach($ad->id);
        return redirect()->back();
    }
 
    public function adsIndexUser(ad $ad)
    {
        $ads = Auth::user()->adsFav()->get();
        return view('ads.index_user', compact('ads'));
    }

}
