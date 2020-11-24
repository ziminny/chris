
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
        </div>

        <div class="mt-4 w-full">
            <x-jet-label for="imagens" value="{{ __('Imagens') }}" />
            <div>
                <label><input id="imagens" type="file" multiple style="display: none" wire:model='images'>Click aqui para adicionar as imagens</label>
            </div>
        </div>
    
        
            <div class="flex items-center justify-end mt-4">
        
                {{-- <button>Cadastrar</button> --}}
                <x-jet-button class="ml-4">
                    {{ __('Cadastrar') }}
                </x-jet-button>
            </div>
        </form>
    </div>
