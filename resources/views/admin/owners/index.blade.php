<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <section class="text-gray-600 body-font">
            <div class="container px-5 mx-auto">
              <div class="flex flex-col text-center w-full mb-4">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">オーナー 一覧</h1>
              </div>
              <x-flash-message status="info" />

              <div style="text-align:right;margin-right:17%;margin-bottom:20px;">
                <button
                  class=" text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg"
                  style="padding: 10px 20px;margin-top:40px;"
                  onclick="location.href='{{ route('admin.owners.create') }}'">
                  新規登録
                </button>
              </div>
              <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                  <thead>
                    <tr>
                      <th
                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                        名前</th>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                        アドレス</th>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                        作成日</th>
                      <th
                        class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($owners as $owner)
                      <tr>
                        <td class="px-4 py-3">{{ $owner->name }}</td>
                        <td class="px-4 py-3">{{ $owner->email }}</td>
                        <td class="px-4 py-3">{{ $owner->created_at->diffForHumans() }}</td>
                        <td class="w-20 text-center ">
                          <button onclick="location.href='{{ route('admin.owners.edit' , [$owner->id]) }}'"
                            class=" bg-gray-300 border-0 py-2 px-4 focus:outline-none hover:bg-gray-400">編集</button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </section>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
