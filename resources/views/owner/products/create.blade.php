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

              {{-- 店舗名 --}}
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <select name="category" id="">
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