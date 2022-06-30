<div class="container-fluid">
    <div class="row">
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <div class="pull-left">
                                <i class="ti-home"></i>
                                <span class="right-nav-text">{{__('admin.dashboard')}}</span>
                            </div>
                        </a>
                    </li>
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{__('admin.Managment')}}</li>
                    <li>
                        <a href="{{route('admin.user')}}">
                            <div class="pull-left">
                                <i class="ti-user"></i>
                                <span class="right-nav-text">{{__('admin.users')}}</span>
                            </div>
                        </a>
                    </li>
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{__('admin.FormsTables')}}</li>
                    <li>
                        <a href="{{route('categories.index')}}"><i class="ti-layout-grid4"></i>
                            <span class="right-nav-text">{{__('admin.categories')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                            <div class="pull-left"><i class="ti-book"></i>
                                <span class="right-nav-text">{{__('admin.blogs')}}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Form" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{route('posts.index')}}"><i class="ti-book"></i>{{__('admin.blogs')}}</a>
                            </li>
                            <li>
                                <a href="{{route('tags.index')}}"><i class="ti-tag"></i>{{__('admin.tags')}}</a>
                            </li>
                            <li>
                                <a href="{{route('comments.index')}}"><i class="ti-comment-alt"></i>{{__('admin.commentsPost')}}</a>
                            </li>
                        </ul>
                    </li>
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{__('admin.MorePages')}}</li>
                    <li>
                        <a href="{{route('testimonials.index')}}"><i class="ti-comments-smiley"></i>
                            <span class="right-nav-text">{{__('admin.testimonial')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.about')}}"><i class="ti-info"></i>
                            <span class="right-nav-text">{{__('admin.about')}}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
