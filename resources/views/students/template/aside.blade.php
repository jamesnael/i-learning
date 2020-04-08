<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn"><i class="la la-close"></i></button>

<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">	
	<!-- BEGIN: Aside Menu -->
	<div 
		id="m_ver_menu" 
		class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " 
		m-menu-vertical="1"
		 m-menu-scrollable="0" m-menu-dropdown-timeout="500"  
		>		
		<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
			<li class="m-menu__section m-menu__section--first">
                <h4 class="m-menu__section-text">List Menu</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li><li class="m-menu__item {{ (Request::segment(1) == 'dashboard') ? 'm-menu__item--active':'' }}" aria-haspopup="true"  m-menu-link-redirect="1"><a href="{{ route('dashboard') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-text">Dashboard</span></a></li><li class="m-menu__item  m-menu__item--submenu @if(Request::segment(3) == 'event') m-menu__item--active m-menu__item--open  @endif" aria-haspopup="true" ><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-layers"></i><span class="m-menu__link-text">Master</span><i class="m-menu__ver-arrow la la-angle-right"></i></a><div class="m-menu__submenu "><span class="m-menu__arrow"></span><ul class="m-menu__subnav"><li class="m-menu__item m-menu__item--parent" aria-haspopup="true" ><span class="m-menu__link"><span class="m-menu__link-text">Master</span></span></li><li class="m-menu__item {{ (Request::segment(3) == 'event') ? 'm-menu__item--active':'' }}" aria-haspopup="true" ><a href="" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Events</span></a></li></ul></div></li><li class="m-menu__item {{ (Request::segment(2) == 'registrant') ? 'm-menu__item--active':'' }}" aria-haspopup="true" m-menu-link-redirect="1"><a href="" class="m-menu__link "><i class="m-menu__link-icon flaticon-users"></i><span class="m-menu__link-text">Registrant</span></a></li><li class="m-menu__item {{ (Request::segment(2) == 'participant') ? 'm-menu__item--active':'' }}" aria-haspopup="true" m-menu-link-redirect="1"><a href="" class="m-menu__link "><i class="m-menu__link-icon flaticon-user-ok"></i><span class="m-menu__link-text">Participant</span></a></li><li class="m-menu__item {{ (Request::segment(2) == 'activity-log') ? 'm-menu__item--active':'' }}" aria-haspopup="true" m-menu-link-redirect="1"><a href="" class="m-menu__link "><i class="m-menu__link-icon flaticon-clock-1"></i><span class="m-menu__link-text">Activity Log</span></a></li>
            </ul>
	</div>
	<!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->							