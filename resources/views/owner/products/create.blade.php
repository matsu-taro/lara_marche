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

          <form method="post" action="{{ route('owner.products.store') }}">
            @csrf
            <div class="-m-2">
              {{-- 商品名 --}}
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="name" class="leading-7 text-sm text-gray-600">商品名</label><span
                    class="text-red-600 text-xs ml-2">※必須</span>
                  <input type="text" id="name" name="name" required value="{{ old('name') }}"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>

              {{-- 商品情報 --}}
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="information" class="leading-7 text-sm text-gray-600">商品情報</label><span
                    class="text-red-600 text-xs ml-2">※必須</span>
                  <textarea type="text" id="information" name="information" required rows="10"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ old('information') }}
                  </textarea>
                </div>
              </div>

              {{-- 価格 --}}
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="price" class="leading-7 text-sm text-gray-600">価格</label><span
                    class="text-red-600 text-xs ml-2">※必須</span>
                  <input type="number" id="price" name="price" required value="{{ old('price') }}"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>

              {{-- 在庫 --}}
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="quantity" class="leading-7 text-sm text-gray-600">在庫</label><span
                    class="text-red-600 text-xs ml-2">※必須</span>
                  <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" required
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  <span class="text-sm">0〜99の範囲で入力してください</span>
                </div>
              </div>

              {{-- 並び順 --}}
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="sort_order" class="leading-7 text-sm text-gray-600">並び順</label><span
                    class="text-red-600 text-xs ml-2">※必須</span>
                  <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order') }}"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>

              {{-- 店舗名 --}}
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="shop_id" class="leading-7 text-sm text-gray-600">販売する店舗</label>
                  <select id="shop_id" name="shop_id"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @foreach ($shops as $shop)
                      <option value="{{ $shop->id }}">
                        {{ $shop->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>

              {{-- カテゴリ --}}
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="category" class="leading-7 text-sm text-gray-600">カテゴリー</label>
                  <select id="category" name="category"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @foreach ($categories as $category)
                      <optgroup label="{{ $category->name }}">

                        @foreach ($category->secondary as $secondary)
                          <option value="{{ $secondary->id }}">
                            {{ $secondary->name }}
                          </option>
                        @endforeach

                      </optgroup>
                    @endforeach
                  </select>
                </div>
              </div>

              <x-select-image :images="$images" name="image1" />
              <x-select-image :images="$images" name="image2" />
              <x-select-image :images="$images" name="image3" />
              <x-select-image :images="$images" name="image4" />
              <x-select-image :images="$images" name="image5" />

              {{-- 販売中か否か --}}
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <input type="radio" name="is_selling" value="1" checked> 販売中
                  <input type="radio" name="is_selling" value="0"> 停止中
                </div>
              </div>

              <div class="p-2 w-full flex my-8 justify-center gap-10">
                <button type="submit"
                  class=" text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">登録する</button>
                <button type="button" onclick="location.href='{{ route('owner.products.index') }}'"
                  class=" bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    'use strict'
    const images = document.querySelectorAll('.image')

    images.forEach(image => {
      image.addEventListener('click', function(e) {
        const imageName = e.target.dataset.id.substr(0, 6)
        const imageId = e.target.dataset.id.replace(imageName + '_', '')
        const imageFile = e.target.dataset.file
        const imagePath = e.target.dataset.path
        const modal = e.target.dataset.modal
        document.getElementById(imageName + '_thumbnail').src = imagePath + '/' + imageFile
        document.getElementById(imageName + '_hidden').value = imageId
        MicroModal.close(modal);
      }, )
    })
  </script>
</x-app-layout>
