<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <!-- バリデーションメッセージ -->
          @if ($errors->any())
            <div>
              <div class="text-xl font-medium text-red-600 font">
                {{ __('おっと、エラーが発生しました') }}
              </div>

              <ul class="font-medium text-red-600">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form method="post" action="{{ route('owner.shops.update', ['shop' => $shop->id]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="-m-2">

              {{-- 店舗名 --}}
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="name" class="leading-7 text-sm text-gray-600">店舗名</label><span
                    class="text-red-600 text-xs ml-2">※必須</span>
                  <input type="text" id="name" name="name" required value="{{ $shop->name }}"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>

              {{-- 店舗情報 --}}
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="information" class="leading-7 text-sm text-gray-600">店舗情報</label><span
                    class="text-red-600 text-xs ml-2">※必須</span>
                  <textarea type="text" id="information" name="information" required rows="10"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $shop->information }}
                  </textarea>
                </div>
              </div>

              {{-- 現在の画像 --}}
              <div class="p-2 w-1/2 mx-auto">
                <x-thumbnail :filename="$shop->filename" type="shops"/>
              </div>

              {{-- 画像の変更 --}}
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                  <input type="file" id="image" name="image" accept="image/png,image/jpeg,image/jpg"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>

              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <input type="radio" name="is_selling" value="1" @if($shop->is_selling === 1) checked @endif> 販売中
                  <input type="radio" name="is_selling" value="0" @if($shop->is_selling === 0) checked @endif> 停止中
                </div>
              </div>
            </div>

            <div class="p-2 w-full flex my-8 justify-center gap-10">
              <button type="submit"
                class=" text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">更新する</button>
              <button type="button" onclick="location.href='{{ route('owner.shops.index') }}'"
                class=" bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
