<div class="page-wrap">

    <div class="sidebar-section">
        <div class="sidebar-section__scroll">


            <div class="sidebar-user-a">
                <img src="{{asset('/admin/img/users/user-3.png')}}" alt="" class="sidebar-user-a__avatar rounded-circle">
                <div class="sidebar-user-a__name">{{ session()->get('name') }}</div>

                <a href="{{ url('wh-editProfile') }}" class="btn icon-left sidebar-user-a__link">
                    Edit Profile <span class="btn-icon ua-icon-user-solid"></span>
                </a>
            </div>

            <div>
                <ul class="sidebar-section-nav">
                    <a class="sidebar-section-nav__link" href="{{ url('wh-dashboard') }}">
                        <span class="sidebar-section-nav__item-icon ua-icon-home"></span>
                        <span class="sidebar-section-nav__item-text">Dashboard</span>
                    </a>
                    <li class="sidebar-section-nav__item">
                        <a class="sidebar-section-nav__link sidebar-section-nav__link-dropdown" href="#">
                            <span class="sidebar-section-nav__item-icon ua-icon-letter"></span>
                            <span class="sidebar-section-nav__item-text">Orders</span>
                        </a>
                        <ul class="sidebar-section-subnav">
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-manageOrders')}}">Manage</a></li>
                        </ul>
                    </li><li class="sidebar-section-nav__item">
                        <a class="sidebar-section-nav__link sidebar-section-nav__link-dropdown" href="#">
                            <span class="sidebar-section-nav__item-icon ua-icon-letter"></span>
                            <span class="sidebar-section-nav__item-text">Messages</span>
                        </a>
                        <ul class="sidebar-section-subnav">
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-inbox')}}">Inbox</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-section-nav__item">
                        <a class="sidebar-section-nav__link sidebar-section-nav__link-dropdown" href="#">
                            <span class="sidebar-section-nav__item-icon ua-icon-home"></span>
                            <span class="sidebar-section-nav__item-text">Users</span>
                        </a>
                        <ul class="sidebar-section-subnav">
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-manageUsers') }}">Manage</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-section-nav__item">
                        <a class="sidebar-section-nav__link sidebar-section-nav__link-dropdown" href="#">
                            <span class="sidebar-section-nav__item-icon ua-icon-home"></span>
                            <span class="sidebar-section-nav__item-text">Companies</span>
                        </a>
                        <ul class="sidebar-section-subnav">
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-addCompany') }}">Add New</a>
                            </li>
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-manageCompany') }}">Manage</a>
                            </li>
                        </ul>
                    </li>


                    <li class="sidebar-section-nav__item">
                        <a class="sidebar-section-nav__link sidebar-section-nav__link-dropdown" href="#">
                            <span class="sidebar-section-nav__item-icon ua-icon-home"></span>
                            <span class="sidebar-section-nav__item-text">Categories</span>
                        </a>
                        <ul class="sidebar-section-subnav">
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-addCategory') }}">Add New</a>
                            </li>
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-manageCategory') }}">Manage</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-section-nav__item">
                        <a class="sidebar-section-nav__link sidebar-section-nav__link-dropdown" href="#">
                            <span class="sidebar-section-nav__item-icon ua-icon-home"></span>
                            <span class="sidebar-section-nav__item-text">Programmes</span>
                        </a>
                        <ul class="sidebar-section-subnav">
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-addProgram') }}">Add
                                    Programme</a></li>
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-manageProgram') }}">Manage</a>
                            </li>
                        </ul>
                    </li>


                    <li class="sidebar-section-nav__item">
                        <a class="sidebar-section-nav__link sidebar-section-nav__link-dropdown" href="#">
                            <span class="sidebar-section-nav__item-icon ua-icon-home"></span>
                            <span class="sidebar-section-nav__item-text">Classes</span>
                        </a>
                        <ul class="sidebar-section-subnav">
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-class') }}">Add Class</a></li>
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-manageClass') }}">Manage</a>
                            </li>
                        </ul>
                    </li>


                    <li class="sidebar-section-nav__item">
                        <a class="sidebar-section-nav__link sidebar-section-nav__link-dropdown" href="#">
                            <span class="sidebar-section-nav__item-icon ua-icon-home"></span>
                            <span class="sidebar-section-nav__item-text">Products</span>
                        </a>
                        <ul class="sidebar-section-subnav">
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-product') }}">Add New</a></li>
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-manageProduct') }}">Manage</a>
                            </li>
                        </ul>
                    </li>


                    {{--<li class="sidebar-section-nav__item">--}}
                        {{--<a class="sidebar-section-nav__link sidebar-section-nav__link-dropdown" href="#">--}}
                            {{--<span class="sidebar-section-nav__item-icon ua-icon-home"></span>--}}
                            {{--<span class="sidebar-section-nav__item-text">Point Products</span>--}}
                        {{--</a>--}}
                        {{--<ul class="sidebar-section-subnav">--}}
                            {{--<li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"--}}
                                                                        {{--href="{{ url('wh-point-product') }}">Add New</a></li>--}}
                            {{--<li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"--}}
                                                                        {{--href="{{ url('wh-manageProduct') }}">Manage</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}


                    <li class="sidebar-section-nav__item">
                        <a class="sidebar-section-nav__link sidebar-section-nav__link-dropdown" href="#">
                            <span class="sidebar-section-nav__item-icon ua-icon-home"></span>
                            <span class="sidebar-section-nav__item-text">News</span>
                        </a>
                        <ul class="sidebar-section-subnav">
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-addNews')}}">Add New</a></li>
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-manageNews') }}">Manage</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-section-nav__item">
                        <a class="sidebar-section-nav__link sidebar-section-nav__link-dropdown" href="#">
                            <span class="sidebar-section-nav__item-icon ua-icon-home"></span>
                            <span class="sidebar-section-nav__item-text">Districts</span>
                        </a>
                        <ul class="sidebar-section-subnav">
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-addDistrict') }}">Add New</a>
                            </li>
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-manageDistrict') }}">Manage</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-section-nav__item">
                        <a class="sidebar-section-nav__link sidebar-section-nav__link-dropdown" href="#">
                            <span class="sidebar-section-nav__item-icon ua-icon-home"></span>
                            <span class="sidebar-section-nav__item-text">Coupons</span>
                        </a>
                        <ul class="sidebar-section-subnav">
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-coupon') }}">Create New</a>
                            </li>
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-manageCoupon') }}">Manage</a>
                            </li>
                        </ul>
                    <li class="sidebar-section-nav__item">
                        <a class="sidebar-section-nav__link sidebar-section-nav__link-dropdown" href="#">
                            <span class="sidebar-section-nav__item-icon ua-icon-home"></span>
                            <span class="sidebar-section-nav__item-text">Vouchers</span>
                        </a>
                        <ul class="sidebar-section-subnav">
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-voucher')}}">Create New</a>
                            </li>
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-manageVouchers') }}">Manage</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-section-nav__item">
                        <a class="sidebar-section-nav__link sidebar-section-nav__link-dropdown" href="#">
                            <span class="sidebar-section-nav__item-icon ua-icon-home"></span>
                            <span class="sidebar-section-nav__item-text">FAQs</span>
                        </a>
                        <ul class="sidebar-section-subnav">
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-faqs')}}">Create New</a></li>
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-managefaqs') }}">Manage</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-section-nav__item">
                        <a class="sidebar-section-nav__link sidebar-section-nav__link-dropdown" href="#">
                            <span class="sidebar-section-nav__item-icon ua-icon-home"></span>
                            <span class="sidebar-section-nav__item-text">Contact Info</span>
                        </a>
                        <ul class="sidebar-section-subnav">
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-contactinfo')}}">Create New</a></li>
                            <li class="sidebar-section-subnav__item"><a class="sidebar-section-subnav__link"
                                                                        href="{{ url('wh-manageContactinfo') }}">Manage</a>
                            </li>
                        </ul>
                    </li>
            </div>


        </div>
    </div>
  