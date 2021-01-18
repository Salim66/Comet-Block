<!-- Sidebar -->
<div class="sidebar" style="background-color: #00a0b0" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="{{ 'index.html' == request() -> path() ? 'active' : '' }}">
                    <a href="index.html"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Posts</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
{{--                        <li><a href="{{ route('post.index') }}">All Post</a></li>--}}
{{--                        <li><a href="{{ route('post-category.index') }}">Category</a></li>--}}
{{--                        <li><a href="{{ route('post-tag.index') }}">tag</a></li>--}}
                    </ul>
                </li>

                <li class="submenu">
                    <a href=""><i class="fe fe-document"></i> <span>Sliders</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="{{ 'all-slider' == request()-> path() ? 'active' : '' }}"><a href="{{ route('slider.add') }}">All Sliders</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href=""><i class="fe fe-document"></i> <span>Home Settings</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="{{ 'home/slider' == request()->path() ? 'active' : '' }}"><a href="{{ route('slider.index') }}">Sliders</a></li>
                        <li class="{{ 'home/Who-We-Are' == request()->path() ? 'active' : '' }}"><a href="{{ route('who.we.are') }}">Who We Are</a></li>
                        <li class="{{ 'home/our-vision' == request()->path() ? 'active' : '' }}"><a href="{{ route('our.vision') }}">Vision</a></li>
                        <li><a href="">Clients</a></li>
                        <li class="{{ 'home/testimonials' == request()->path() ? 'active' : '' }}"><a href="{{ route('testimonials.index') }}">Testimonials</a></li>
                        <li><a href="#">Home Setup</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href=""><i class="fe fe-document"></i> <span> Settings</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                            <li class="{{ 'settings/logo' == request()->path() ? 'active' : '' }}"><a href="{{ route('logo.index') }}">Logo</a></li>
                            <li class="{{ 'settings/social' == request()->path() ? 'active' : '' }}"><a href="{{ route('social.index') }}">Social</a></li>
                            <li class="{{ 'settings/clients' == request()->path() ? 'active' : '' }}"><a href="{{ route('clients.index') }}">Clients</a></li>
                            <li><a href="#">Footer</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
