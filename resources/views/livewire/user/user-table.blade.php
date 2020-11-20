
<div class="table-show">


    @include('messages.success-delete')
   

    <table>
        <thead>
    <tr>
    <th><div class="home-th-gambi"><span class="table-one-img" style="background-image: url({{asset('imgs/show_users/user2.svg')}})"></span>&nbsp; Usuário</div></th>
    <th class="hide-576"><div class="home-th-gambi"><span class="table-two-img" style="background-image: url({{asset('imgs/show_users/permission.svg')}})"></span>&nbsp; Email</div></th>
    <th ><div class="home-th-gambi"><span class="table-three-img" style="background-image: url({{asset('imgs/show_users/view.svg')}})"></span>&nbsp; Permissão</span></th>
    <th class="hide-768"><div class="home-th-gambi"><span class="table-for-img" style="background-image: url({{asset('imgs/show_users/email.svg')}})"></span>&nbsp; Visualizar</div></th>
    </tr>
        </thead>
        <tbody>
    
            @foreach ($users as $user)
           
            <tr>
            <td><div class="home-th-gambi">{{$user->name}} </div></td>
            <td class="hide-576"><div class="home-th-gambi">{{$user->email}}</div></td>
                <td><div class="home-th-gambi">
                    
                        @if ($rule = UserRule::userContainRole($user))
                <div class="show-users-permission show-users-permission-{{$rule->permission}}">{{$rule->permission}}</div>
                        @endif
                </div></td>
                @php
                    $logged = '';
                    $msg = 'Info (você)';
                    if (Auth::user()->id !== $user->id) {
                        $logged = 'no-';
                        $msg = 'Visualizar';
                    }
                @endphp
                <td class="hide-768"><div class="home-th-gambi "> <a href="{{route("users.show",["user"=>$user->id])}}" class="show-users-view-{{$logged}}logged">{{$msg}}</a> </div></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="users-link">
        {{ $users->links() }}
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
</div>