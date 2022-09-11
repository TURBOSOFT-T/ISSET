<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="{{route('/')}}"><img src="{{asset('assets/images/favicon.png')}}">ISSET</a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper"><a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1">{{ trans('lang.General') }}  </h6>
							<p class="lan-2">{{ trans('lang.Dashboards,widgets & layout.') }}</p>
						</div>
					</li>
					@if(Auth::user()->role == "Agent")

					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->is('rapports/*') ? 'active' : '' }} {{ request()->is('rapports') ? ' active' : '' }}" href="{{route('rapport')}}">
							<i data-feather="home"></i><span class="lan-3">Rapport</span>
						</a>
					</li>
                	<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ request()->is('agents/*') ? ' active' : '' }} {{ request()->is('agents') ? ' active' : '' }}" href="{{route('agent')}}">
							<i data-feather="users"></i><span class="lan-3">Agents</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/agent' ? 'down' : 'right' }}"></i></div>
						</a>
					</li>

					@endif

					@if(Auth::user()->role == "Chef de service")

						<li class="sidebar-list">
							<a class="sidebar-link sidebar-title {{ request()->is('dashboard') ? ' active' : '' }}" href="{{route('rapport.directeur')}}">
								<i data-feather="home"></i><span class="lan-3">Rapport</span>
							</a>
						</li>

					@endif

					@if(Auth::user()->role == "Administrateur")
						<li class="sidebar-list">
							<a class="sidebar-link sidebar-title {{ request()->is('dashboard') ? ' active' : '' }}" href="{{route('rapport.directeur')}}">
								<i data-feather="home"></i><span class="lan-3">Dashboard</span>
							</a>
						</li>
						<li class="sidebar-list">
							<a class="sidebar-link sidebar-title {{request()->is('rapports/*') ? 'active' : '' }} {{ request()->is('rapports') ? ' active' : '' }}" href="{{route('rapport')}}">
								<i data-feather="grid"></i><span class="lan-3">Rapport</span>
							</a>
						</li>
						<li class="sidebar-list">
							<a class="sidebar-link sidebar-title {{ request()->is('agents/*') ? ' active' : '' }} {{ request()->is('agents') ? ' active' : '' }}" href="{{route('agent')}}">
								<i data-feather="users"></i><span class="lan-3">Agents</span>
								<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/agent' ? 'down' : 'right' }}"></i></div>
							</a>
						</li>
						<li class="sidebar-list">
							<a class="sidebar-link sidebar-title {{ request()->is('users/*') ? ' active' : '' }} {{ request()->is('users') ? ' active' : '' }}" href="{{route('user')}}">
								<i data-feather="user"></i><span class="lan-3">Utlisateurs</span>
								<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/user' ? 'down' : 'right' }}"></i></div>
							</a>
						</li>
					@endif
				</ul>
			</div>
		</nav>
	</div>
</div>