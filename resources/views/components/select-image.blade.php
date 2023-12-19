@php
 if($name === 'image1'){$modal = 'modal-1';};
 if($name === 'image2'){$modal = 'modal-2';};
 if($name === 'image3'){$modal = 'modal-3';};
 if($name === 'image4'){$modal = 'modal-4';};
 if($name === 'image5'){$modal = 'modal-5';};

 $cImage = $currentImage ?? '';
 $cId = $currentId ?? '';
@endphp

<div class="modal micromodal-slide" id="{{ $modal }}" aria-hidden="true">
  <div class="modal__overlay z-50" tabindex="-1" data-micromodal-close>
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="{{ $modal }}-title">
      <header class="modal__header">
        <h2 class="modal__title" id="{{ $modal }}-title">
          ファイルを選択してくださーい
        </h2>
        <button type="button" class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <main class="modal__content" id="{{ $modal }}-content">
        <div class="md:flex md:flex-wrap">
          @foreach ($images as $image)
            <div class="border md:w-1/4 p-6 md:p-4">
                <div style="height: 1.5rem">
                  {{ $image->title }}
                </div>
                {{-- コンポーネントから読み込み --}}
                <img class="image" data-id="{{ $name }}_{{ $image->id }}" data-file="{{ $image->filename }}" data-modal="{{ $modal }}" data-path="{{ asset('storage/products/') }}" src="{{ asset('storage/products/'.$image->filename) }}">
            </div>
          @endforeach
        </div>
      </main>
      <footer class="modal__footer">
        <button type="button" class="modal__btn" data-micromodal-close aria-label="Close this dialog window">閉じる</button>
      </footer>
    </div>
  </div>
</div>

<div class="flex justify-around items-center mb-4">
  <a class="py-2 px-4 bg-gray-200" data-micromodal-trigger="{{ $modal }}" href='javascript:;'>ファイルを選択</a>
  <div class="w-1/4">
    <img id="{{ $name }}_thumbnail" @if($cImage) src="{{ asset('storage/products/'.$cImage) }}" @else src="" @endif>
  </div>
</div>
<input type="hidden" id="{{ $name }}_hidden" name="{{ $name }}" value="{{ $cId }}">