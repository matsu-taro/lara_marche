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

          <form method="post" action="{{ route('owner.images.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="-m-2">

              {{-- 画像の選択 --}}
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                  <input type="file" id="image" name="files[][image]" multiple accept="image/png,image/jpeg,image/jpg"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>
            </div>

            <div class="p-2 w-full flex my-8 justify-center gap-10">
              <button type="submit"
                class=" text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">登録する</button>
              <button type="button" onclick="location.href='{{ route('owner.images.index') }}'"
                class=" bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
