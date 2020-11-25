@if (session()->has('message'))
    
    <div class="message-delete-success">
        {{ session('message') }} 
    </div>

    <script type="text/javascript">
    
        let deleteSuccessUser = document.querySelector(".message-delete-success");
    
        var htmlstring = deleteSuccessUser.innerHTML;
    
        // Retira os espaçoes em branco do elemento html
        htmlstring = (htmlstring.trim) ? htmlstring.trim() : htmlstring.replace(/^\s+/,'');
    
        if(htmlstring) {
            deleteSuccessUser.classList.add("add-class-if-delete-item");
            deleteSuccessUser.style.animationDelay = "2s"; 
            deleteSuccessUser.style.animation = "hide-class-if-delete-item 1s 2s forwards"
            
        }   
    </script>

@endif




