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

          <form method="post" action="{{ route('owner.images.update', ['image' => $image->id]) }}">
            @csrf
            @method('put')
            <div class="-m-2">

              {{-- 画像の変更 --}}
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="title" class="leading-7 text-sm text-gray-600">画像タイトル</label>
                  <input type="text" id="title" name="title" value="{{ $image->title }}"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>
            </div>

            {{-- サムネ --}}
            <div class="p-4 w-1/4 min-w-[250px] mx-auto">
              <x-thumbnail :filename="$image->filename" type="products" />
            </div>

            <div class="p-2 w-full flex my-8 justify-center gap-10">
              <button type="submit"
                class=" text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">更新する</button>
              <button type="button" onclick="location.href='{{ route('owner.images.index') }}'"
                class=" bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
            </div>
          </form>

          <div class="py-2 w-full flex my-10 justify-center">
            <form id="delete_{{ $image->id }}" action="{{ route('owner.images.destroy', ['image' => $image->id]) }}"
              method="post">
              @method('delete')
              @csrf
              <div class="w-30 text-center ">
                <a href="#" onclick="deletePost(this)" data-id="{{ $image->id }}"
                  class=" bg-red-200 border-0 py-2 px-4 focus:outline-none hover:bg-red-400 rounded">削除する</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function deletePost(e) {
      'use strict'
      if (confirm('本当に削除して良いですか？')) {
        document.getElementById('delete_' + e.dataset.id).submit();
      }
    }
  </script>
</x-app-layout>
