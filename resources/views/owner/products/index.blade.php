<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('【プロダクト】Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <x-flash-message status="session('status')" /><br> {{-- フラッシュメッセージ --}}

          <div style="text-align:right;margin-bottom:20px;">
            <button
              class=" text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg"
              style="padding: 10px 20px;margin-top:40px;" onclick="location.href='{{ route('owner.products.create') }}'">
              新規登録
            </button>
          </div>

          <div class="md:flex md:flex-wrap">
            @foreach ($ownerInfo as $owner)
              @foreach ($owner->shop->product as $product)
                <div class="border md:w-1/4 p-6 md:p-4">
                  <a href="{{ route('owner.products.edit', ['product' => $product->id]) }}">
                    <div style="height: 1.5rem">
                      {{$product->name}}
                    </div>

                    {{-- コンポーネントから読み込み --}}
                    <x-thumbnail filename="{{$product->imageFirst->filename ?? ''}}" type="products" />
                  </a>
                </div>
              @endforeach
            @endforeach
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
