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
            </li><li class="m-menu__item {{ (Request::segment(1) == 'dashboard') ? 'm-menu__item--active':'' }}" aria-haspopup="true"  m-menu-link-redirect="1"><a href="{{ route('dashboard') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-text">Dashboard</span></a></li><li class="m-menu__item {{ (Request::segment(2) == 'materi') ? 'm-menu__item--active':'' }}" aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('materi') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-clipboard"></i><span class="m-menu__link-text">Materi</span></a></li><li class="m-menu__item {{ (Request::segment(2) == 'tugas') ? 'm-menu__item--active':'' }}" aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('tugas') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-notes"></i><span class="m-menu__link-text">Tugas Siswa</span></a></li>
            </ul>
	</div>
	<!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->							