<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <section class="text-gray-600 body-font relative">
            <div class="container px-5 mx-auto">
              <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">新規登録</h1>
              </div>

              {{-- オーナー名 --}}
              <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="-m-2">
                  <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                      <label for="name" class="leading-7 text-sm text-gray-600">オーナー名</label>
                      <input type="text" id="name" name="name" required
                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                  </div>

                  {{-- アドレス --}}
                  <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                      <label for="email" class="leading-7 text-sm text-gray-600">アドレス</label>
                      <input type="email" id="email" name="email" required
                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                      <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                  </div>

                  <div class="p-2 w-full flex my-8 justify-center gap-10">
                    <button
                      class=" text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">登録する</button>
                    <button onclick="location.href='{{ route('admin.owners.index') }}'"
                      class=" bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                  </div>
                </div>
              </div>
            </div>
          </section>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
