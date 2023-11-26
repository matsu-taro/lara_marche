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
          @foreach ($shops as $shop)
            <div class="border w-1/2 p-4">
              <a href="{{ route('owner.shops.edit', ['shop' => $shop->id]) }}">
                <div class="p-4 rounded-md">
                  <div class="mb-4">
                    @if ($shop->is_selling)
                      <span class="border p-2 rounded-md bg-blue-400">販売中</span>
                    @else
                      <span class="border p-2 rounded-md bg-red-400">停止中</span>
                    @endif
                  </div>
                </div>
                {{ $shop->name }}

                {{-- コンポーネントから読み込み --}}
                <x-thumbnail :filename="$shop->filename" type="shops"/>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
