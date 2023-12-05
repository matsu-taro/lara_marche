<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:owners');

    $this->middleware(function ($request, $next) {

      $id = $request->route()->parameter('image'); //文字列
      if (!is_null($id)) {
        $imagesOwnerId = Image::findOrFail($id)->owner->id;
        $imageId = (int)$imagesOwnerId; //文字列→数字に変換処理

        if ($imageId !== Auth::id()) {
          abort(404);
        }
      }

      return $next($request);
    });
  }


  public function index()
  {
    $images = Image::where('owner_id', Auth::id())
      ->orderBy('updated_at', 'desc')
      ->paginate(20);

    return view('owner.images.index', compact('images'));
  }


  public function create()
  {
    return view('owner.images.create');
  }


  public function store(UploadImageRequest $request)
  {
    $imageFiles = $request->file('files');

    if (!is_null($imageFiles)) {
      foreach ($imageFiles as $imageFile) {
        $fileNameToStore = ImageService::upload($imageFile, 'products');
        Image::create([
          'owner_id' => Auth::id(),
          'filename' => $fileNameToStore
        ]);
      }
    }

    return to_route('owner.images.index')
      ->with([
        'message' => '画像登録が完了しました！',
        'status' => 'info'
      ]);;
  }

  public function edit(string $id)
  {
    $image = Image::findOrFail($id);

    return view('owner.images.edit', compact('image'));
  }

  public function update(Request $request, string $id)
  {
    $request->validate([
      'title' => ['string', 'max:50'],
    ]);

    $image = Image::findOrFail($id);
    $image->title = $request->title;
    $image->save();

    return to_route('owner.images.index')
      ->with([
        'message' => '画像情報を更新しました！',
        'status' => 'info'
      ]);;
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {

    $image = Image::findOrFail($id);
    $filePath = 'public/products/'.$image->filename;

    if(Storage::exists($filePath)){
      Storage::delete($filePath);
    }
    //ここまでが画像ファイルの削除処理。下はデータベースから削除の処理

    Image::findOrFail($id)->delete(); 

    return to_route('owner.images.index')
      ->with([
        'message' => '画像を削除しました！',
        'status' => 'alert'
      ]);
  }
}
