        <!--=================================
 header start-->
        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="index.html">
                    {{__('admin.personalBlog')}}
                    {{-- <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt=""> --}}
                </a> 
                {{-- <a class="navbar-brand brand-logo-mini" href="index.html"> --}}
                    {{-- {{__('admin.personalBlog')}} --}}
                    {{-- <img src="{{asset('admin/assets/images/logo-icon-dark.png')}}" alt=""> --}}
                {{-- </a> --}}
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>
                <li class="nav-item">
                    <div class="search">
                        <a class="search-btn not_click" href="javascript:void(0);"></a>
                        <div class="search-box not-click">
                            <input type="text" class="not-click form-control" placeholder="Search" value=""
                                name="search">
                            <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="ti-bell"></i>
                        <span class="badge badge-danger notification-status"> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                        <div class="dropdown-header notifications">
                            <strong>Notifications</strong>
                            <span class="badge badge-pill badge-warning mr-3 ml-3" style="cursor: pointer">
                              <a href="{{route('MarkAsRead_all')}}">Read all</a>
                            </span>
                            <span class="badge-pill badge-success">{{ auth()->user()->unreadNotifications->count() }}</span>
                        </div>
                        <div class="dropdown-divider d-flex mr-3"></div>
                          @foreach(auth()->user()->unreadNotifications as $notification)
                            <a href="#" class="dropdown-item"> A new comment has been added: {{$notification->data['comment']}}<small
                                  class="float-right text-muted time">{{$notification->created_at->diffForHumans()}}</small> </a>
                          @endforeach
                    </div>
                </li>
                {{-- dropdown language --}}
              <li class="dropdown m-4">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button">{{__('admin.languages')}}</a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="text-decoration-none" href="{{route('frontend_change_locale','en')}}">{{__('admin.english')}}</a>
                  </li>
                  <li>
                    <a class="text-decoration-none" href="{{route('frontend_change_locale','ar')}}">{{__('admin.arabic')}}</a>
                  </li>
                </ul>
              </li>
                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="assets/images/profile-avatar.jpg" alt="avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0">
                                        {{ Auth::user()->name }}
                                    </h5>
                                    <span>{{ Auth::user()->email }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        {{-- <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i>Activity</a> --}}
                        <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>Messages</a>
                        <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Profile</a>
                        {{-- <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Projects <span --}}
                                {{-- class="badge badge-info">6</span> </a> --}}
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal"><i class="text-danger ti-unlock"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
<!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">cancel</button>
          <a class="btn btn-primary" href="" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        </div>
      </div>
    </div>
  </div>
        <!--=================================
 header End-->
