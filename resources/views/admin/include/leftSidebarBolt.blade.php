<div class="sidebar-inner slimscrollleft">
    <!--- Divider -->
    <div id="sidebar-menu">
        <ul>

            <li class="text-muted menu-title">Navigation</li>

            <li class="has_sub">
                <a href="#" class="waves-effect"><i class="fa fa-file-text"></i> <span>Pages</span> </a>
                <ul class="list-unstyled">
                    @foreach($pages as $page)
                        <li><a href="{{url('admin/page/'.$page->link)}}">{{$page->name}}</a></li>
                    @endforeach

                </ul>
            </li>
            <li class="has_sub">
                <a href="#" class="waves-effect"><i class="fa fa-gear"></i> <span> General </span> </a>
                <ul class="list-unstyled">
                    <li><a href="{{url('admin/contact')}}">Contact Emails</a></li>
                    <li><a href="{{url('admin/support')}}">Support Emails</a></li>
                    <li><a href="{{url('admin/office')}}">Office</a></li>
                    <li><a href="{{url('admin/country')}}">Country</a></li>
                    {{--<li><a href="{{url('admin/industry')}}">Industry</a></li>--}}
                    {{--<li><a href="{{url('admin/product-type')}}">Product Type</a></li>--}}
                </ul>
            </li>

            <li><a href="{{url('admin/links')}}"><i class="fa fa-sitemap"></i> Quick Links</a></li>
            <li><a href="{{url('admin/verticals')}}"><i class="fa fa-columns"></i> Verticals</a></li>
            <li><a href="{{url('admin/products')}}"><i class="fa fa-product-hunt"></i> Products</a></li>
            <li><a href="{{url('admin/tags')}}"><i class="fa fa-link"></i> Tags</a></li>


            <li><a href="{{url('admin/partners')}}"><i class="fa fa-handshake-o"></i>Partners</a></li>

            <li class="has_sub">
                <a href="#" class="waves-effect"><i class="fa fa-video-camera"></i> <span> Experience Centre </span> </a>
                <ul class="list-unstyled">
                    <li><a href="{{url('admin/category')}}">Category</a></li>
                    <li><a href="{{url('admin/experience-centre')}}">Experience Centre</a></li>
                </ul>
            </li>
            <li><a href="{{url('admin/news')}}"><i class="fa  fa-newspaper-o"></i>News & Events</a></li>

            {{--<li><a href="{{url('admin/providers')}}"><i class="fa fa-slideshare"></i>Providers</a></li>--}}

            {{--<li><a href="{{url('admin/solutionss')}}"><i class="fa   fa-sitemap"></i>Solutions</a></li>  --}}
            <li><a href="{{url('admin/solutions')}}"><i class="fa   fa-sitemap"></i>Solutions</a></li>

            <li><a href="{{url('admin/ads')}}"><i class="fa  fa-picture-o"></i>Ads</a></li>
            <li><a href="{{url('admin/testimonials')}}"><i class="fa  fa-quote-left"></i>Testimonials</a></li>
            <li><a href="{{url('admin/roles')}}"><i class="fa fa-user-secret"></i>Roles & Permission</a></li>
            <li><a href="{{url('admin/users')}}"><i class="fa fa-user-plus"></i>Users</a></li>
            <li><a href="{{route('admin.landingpages.index')}}"><i class="fa fa-user-plus"></i>Landing Page</a></li>
            <li><a href="{{route('admin.landingbanners.index')}}"><i class="fa fa-user-plus"></i>Landing Banners</a></li>
            <li><a href="{{route('admin.landingproducts.index')}}"><i class="fa fa-user-plus"></i>Landing Products</a></li>


        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>