<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('public/assets/admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{url('admin/dashboard')}}">
                    <i style="color: #bde2ff" class="fa fa-dashboard"></i> <span>Home </span>
                </a>
            </li>
            <li>
                <a href="{{url('admin/order')}}">
                    <i style="color: #ff2c36" class="fa fa-shopping-cart"></i> <span>Orders</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i style="color: #ff009b" class="fa fa-cog"></i> <span>Setting</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{url('admin/social')}}">
                            <i style="color: #4267b2" class="fa fa-facebook-f"></i> <span>Social Links</span>
                        </a>
                    </li>
                    {{--<li>--}}
                        {{--<a href="{{url('admin/city')}}">--}}
                            {{--<i style="color: #fdff21" class="fa fa-building-o"></i> <span>Cities</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                </ul>
            </li>
                {{--<li>--}}
                    {{--<a href="{{url('roles')}}">--}}
                        {{--<i style="color: #ff009b" class="fa fa-cog"></i> <span>Setting</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--<li>--}}
                {{--<a href="{{url('partNum')}}">--}}
                    {{--<i style="color: #159c90" class="fa fa-list-alt"></i> <span>Part Numbers</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            <li class="treeview">
                <a href="#">
                    <i style="color: #fdff21" class="fa fa-globe"></i> <span>Places</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{url('admin/gov')}}">
                            <i style="color: #fdff21" class="fa fa-building"></i> <span>Governments</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/city')}}">
                            <i style="color: #fdff21" class="fa fa-building-o"></i> <span>Cities</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{url('admin/shiping')}}">
                    <i style="color: #ff9b33" class="fa fa-circle"></i> <span>Shiping</span>
                </a>
            </li>
            {{--<li>--}}
                {{--<a href="{{url('painting')}}">--}}
                    {{--<i style="color: rgba(125,51,172,0.99)" class="fa fa-paint-brush"></i> <span>Painting</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="{{url('issues')}}">--}}
                    {{--<i style="color: #0affa9" class="fa fa-bug"></i> <span>Quality Issue</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="{{url('laser')}}">--}}
                    {{--<i style="color: #fb6b3e" class="fa fa-print"></i> <span>Laser</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="{{url('inspection')}}">--}}
                    {{--<i style="color: #7d8fff" class="fa fa-search"></i> <span>Inspection</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="{{url('history')}}">--}}
                    {{--<i style="color: #ffc5b7" class="fa fa-history"></i> <span>History</span>--}}
                {{--</a>--}}
            {{--</li>--}}

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
