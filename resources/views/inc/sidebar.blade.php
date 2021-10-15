<div class="sidebar">
    <div class="site-width">

        <!-- START: Menu-->
        <ul id="side-menu" class="sidebar-menu">
            <li class="dropdown"><a href="#"><i class="icon-home mr-1"></i> Dashboard</a>
                <ul>
                    <li class="{{ $page_option['sub'] === 'dash' ? 'active' : '' }}"><a
                            href="{{ route('home') }}"><i class="fa fa-rocket"></i> Dashboard</a></li>
                </ul>
            </li>
            <!--member start-->
            <li class="dropdown"><a href="#"><i class="icon-organization mr-1"></i>Add details</a>
                <ul>

                    <li class="dropdown {{ $page_option['main'] === 'member' ? 'active' : '' }}"><a href="#"><i
                                class="fas fa-user-tie"></i>Details</a>
                        <ul class="sub-menu">
                            <li class="{{ $page_option['sub'] === 'add_member' ? 'active' : '' }}"><a
                                    href="{{ route('member.add_member') }}">Add local details</a>
                            </li>
                            <li class="{{ $page_option['sub'] === 'user_index' ? 'active' : '' }}"><a
                                    href="{{ route('user.index') }}">View All Local details</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END: Menu-->
        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0 ml-auto">
            <li class="breadcrumb-item"><a href="#">Application</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
        </ol>
    </div>
</div>














































