<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <section class="text-gray-600 body-font relative">
            <div class="container px-5 mx-auto">
              <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">オーナー情報編集</h1>
              </div>

              {{-- オーナー名 --}}
              <div class="lg:w-1/2 md:w-2/3 mx-auto">

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
                <form action="{{ route('admin.owners.update' , ['owner'=>$owner->id]) }}" method="post">
                  @method('put')
                  @csrf
                  <div class="-m-2">
                    {{-- 名前 --}}
                    <div class="p-2 w-1/2 mx-auto">
                      <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">オーナー名</label>
                        <input type="text" id="name" name="name" required value="{{ $owner->name }}"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      </div>
                    </div>

                    {{-- アドレス --}}
                    <div class="p-2 w-1/2 mx-auto">
                      <div class="relative">
                        <label for="email" class="leading-7 text-sm text-gray-600">アドレス</label>
                        <input type="email" id="email" name="email" required value="{{ $owner->email }}"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      </div>
                    </div>

                    {{-- 店名 --}}
                    <div class="p-2 w-1/2 mx-auto">
                      <div class="relative">
                        <label for="email" class="leading-7 text-sm text-gray-600">店舗名</label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $owner -> shop -> name }}</div>
                      </div>
                    </div>

                    {{-- パスワード --}}
                    <div class="p-2 w-1/2 mx-auto">
                      <div class="relative">
                        <label for="password" class="leading-7 text-sm text-gray-600">パスワード</label>
                        <input type="password" id="password" name="password" required
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      </div>
                    </div>

                    {{-- パスワードの確認 --}}
                    <div class="p-2 w-1/2 mx-auto">
                      <div class="relative">
                        <label for="password_confirmation" class="leading-7 text-sm text-gray-600">パスワードの確認</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      </div>
                    </div>

                    <div class="p-2 w-full flex my-8 justify-center gap-10">
                      <button type="submit"
                        class=" text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">更新する</button>
                      <button type="button" onclick="location.href='{{ route('admin.owners.index') }}'"
                        class=" bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </section>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
