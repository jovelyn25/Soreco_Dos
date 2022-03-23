 <style>
     .rounded-circle {
         width: 35px;
         height: 35px;
         border-radius: 50%;
         border: 2px solid white;
         box-shadow: 1px 1px 5px 0px grey;
     }

     .fa-power-off {
         padding: 5px;
         margin: 0%;
         align-self: center;
         vertical-align: center;
         font-size: 20px;
         background-color: rgb(255, 255, 255);
         border-radius: 50%;
         border: 2px solid white;
         box-shadow: 1px 1px 5px 0px grey;

     }

     .account .topnav .usernav-link {
         align-items: center;
     }

 </style>

 <section class="home-section">
     <nav class="navbar navbar-default d-flex">
         <div class="d-flex align-items-center">
             <ul class="topnav-link">
                 <li>
                     <span class="fa fa-bars"></span>
                 </li>
             </ul>

             <div class="account d-flex justify-content-end align-items-center">
                 @auth <div class="name-usr"
                         style="font-size: 12px; color:#495057; text-align: end; text-transform: capitalize;"><b
                             style="font-size: 15px;  color:#2e2d2d;">{{ Auth::user()->fname }}&nbsp{{ Auth::user()->lname }}</b>

                         <div class="email-usr" style="font-size: 12px; color:#495057; text-transform: lowercase;">
                             {{ Auth::user()->email }}</div>
                 </div>@endauth
                 <a class="topnav me-2" href="myprofile" title="My Profile">
                     @if (Auth::User()->profile_image)
                         <img class="user rounded-circle admin_picture"
                             src="{{ asset('/uploads/avatars/' . Auth::user()->profile_image) }}" alt="profile_image">
                     @endif
                 </a>

                 <a class="topnav" title="Log Out" href="/signout" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                     <i class="fa fa-power-off"></i>
                 </a>
                 <form id="logout-form" action="{{ route('signout') }}" method="POST" style="display: none;">
                     @csrf
                 </form>
             </div>

         </div>
     </nav>
 </section>
