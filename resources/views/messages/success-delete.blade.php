@if (session()->has('message'))
    
    <div class="message-delete-success">
        {{ session('message') }} 
    </div>

@endif


