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
          <x-flash-message status="session('status')" /><br> {{-- フラッシュメッセージ --}}

          <div style="text-align:right;margin-right:17%;margin-bottom:20px;">
            <button
              class=" text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg"
              style="padding: 10px 20px;margin-top:40px;"
              onclick="location.href='{{ route('owner.images.create') }}'">
              新規登録
            </button>
          </div>
          @foreach ($images as $image)
            <div class="border w-1/4 p-4">
              <a href="{{ route('owner.images.edit', ['image' => $image->id]) }}">
                {{ $image->title }}

                {{-- コンポーネントから読み込み --}}
                <x-thumbnail :filename="$shop->filename" type="products"/>
              </a>
            </div>
          @endforeach
          {{ $images->links() }}
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
