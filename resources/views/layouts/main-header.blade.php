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
                            <strong>{{__('admin.notifications')}}</strong>
                            <span class="badge badge-pill badge-warning mr-3 ml-3" style="cursor: pointer">
                              <a href="{{route('MarkAsRead_all')}}">{{__('admin.readAll')}}</a>
                            </span>
                            <span class="badge-pill badge-success">{{ auth()->user()->unreadNotifications->count() }}</span>
                        </div>
                        <div class="dropdown-divider d-flex mr-3"></div>
                          @foreach(auth()->user()->unreadNotifications as $notification)
                            <a href="#" class="dropdown-item"> {{__('admin.addNewComment')}}: {{$notification->data['comment']}}<small
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
                        <div class="dropdown-divider"></div>
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
          <h5 class="modal-title" id="exampleModalLabel">{{__('admin.readyLeave')}}</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">{{__('admin.selectLogout')}}</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">{{__('admin.cancel')}}</button>
          <a class="btn btn-primary" href="" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              {{__('admin.logout')}}
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
