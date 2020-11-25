
    <div class="form-create-new-user" style="margin-bottom: 15px">
        <form wire:submit.prevent='store' enctype="multipart/form-data">
       
            {{-- <x-jet-validation-errors class="mb-4" /> --}}
            <div>
                <x-jet-label for="name" value="{{ __('None do produto') }}" />
                <x-jet-input id="name" wire:model='name' class="block mt-1 w-full" type="text" />
                @error('name')
                <small class="message-error">{{$message}}</small>
            @enderror
            </div>
        
            <div class="mt-4">
                <x-jet-label for="costPrice" value="{{ __('Preço de custo') }}" />
                <x-jet-input id="costPrive" wire:model='costPrice' class="block mt-1 w-full" type="text"  />
                @error('costPrice')
                <small class="message-error">{{$message}}</small>
            @enderror
            </div>
        
            <div class="mt-4">
                <x-jet-label for="salePrice" value="{{ __('Preço de venda') }}" />
                <x-jet-input id="salePrice" wire:model='salePrice' class="block mt-1 w-full" type="text"  />
                @error('salePrice')
                    <small class="message-error">{{$message}}</small>
                @enderror
            </div>
        
            <div class="mt-4">
                <x-jet-label for="amount" value="{{ __('Quantidade') }}" />
                <x-jet-input id="amount" wire:model='amount' class="block mt-1 w-full" type="text"  />
                @error('amount')
                    <small class="message-error">{{$message}}</small>
                @enderror
            </div>
    


          <div class="mt-4 w-full">
            <x-jet-label for="password" value="{{ __('Descrição') }}" />
            <div >
                <textarea wire:model='description' rows="5" class="product-description-create block mt-1 w-full" rows="3"></textarea>
          </div>
          @error('description')
          <small class="message-error">{{$message}}</small>
       @enderror
        </div>

        <div class="mt-4 w-full">
            <x-jet-label for="imagens" value="{{ __('Imagens') }}" />
            <div class="div-add-image-product">
                <div class="label-add-image-product">
                    <label class="zm-hand"><input id="imagens" type="file" multiple style="display: none" wire:model='images'>
                        <span class="hide-576 ">Click aqui para </span><span class="upper-576">a</span>dicionar <span class="hide-576">as</span> imagens
                    </label>
                </div>    
            </div>
            @error('images.*')
                <small class="message-error">{{$message}}</small>
             @enderror
        </div>

        <div class="mt-4 w-full flex flex-wrap">
            @if ($images)
                @foreach ($images as $image)
                     <div class="mr-3 mb-4">
                        <img src="{{ $image->temporaryUrl() }}" class="images-preview-create-product">
                     </div>
                @endforeach
            @endif
        </div>
    
        
            <div class="flex items-center justify-end">
        
                {{-- <button>Cadastrar</button> --}}
                <x-jet-button class="ml-4">
                    {{ __('Cadastrar') }}
                </x-jet-button>
            </div>
        </form>
    </div>
