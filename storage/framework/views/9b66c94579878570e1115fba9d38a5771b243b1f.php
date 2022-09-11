<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="<?php echo e(route('/')); ?>"><img src="<?php echo e(asset('assets/images/favicon.png')); ?>">ISSET</a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper"><a href="<?php echo e(route('/')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/logo/logo-icon.png')); ?>" alt=""></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1"><?php echo e(trans('lang.General')); ?>  </h6>
							<p class="lan-2"><?php echo e(trans('lang.Dashboards,widgets & layout.')); ?></p>
						</div>
					</li>
					<?php if(Auth::user()->role == "Gerant"): ?>

					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->is('rapports/*') ? 'active' : ''); ?> <?php echo e(request()->is('rapports') ? ' active' : ''); ?>" href="<?php echo e(route('rapport')); ?>">
							<i data-feather="home"></i><span class="lan-3">Rapport</span>
						</a>
					</li>
                	<li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->is('agents/*') ? ' active' : ''); ?> <?php echo e(request()->is('agents') ? ' active' : ''); ?>" href="<?php echo e(route('agent')); ?>">
							<i data-feather="users"></i><span class="lan-3">Agents</span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/agent' ? 'down' : 'right'); ?>"></i></div>
						</a>
					</li>

					<?php endif; ?>

					<?php if(Auth::user()->role == "Directeur"): ?>

						<li class="sidebar-list">
							<a class="sidebar-link sidebar-title <?php echo e(request()->is('dashboard') ? ' active' : ''); ?>" href="<?php echo e(route('rapport.directeur')); ?>">
								<i data-feather="home"></i><span class="lan-3">Rapport</span>
							</a>
						</li>

					<?php endif; ?>

					<?php if(Auth::user()->role == "Administrateur"): ?>
						<li class="sidebar-list">
							<a class="sidebar-link sidebar-title <?php echo e(request()->is('dashboard') ? ' active' : ''); ?>" href="<?php echo e(route('rapport.directeur')); ?>">
								<i data-feather="home"></i><span class="lan-3">Dashboard</span>
							</a>
						</li>
						<li class="sidebar-list">
							<a class="sidebar-link sidebar-title <?php echo e(request()->is('rapports/*') ? 'active' : ''); ?> <?php echo e(request()->is('rapports') ? ' active' : ''); ?>" href="<?php echo e(route('rapport')); ?>">
								<i data-feather="grid"></i><span class="lan-3">Rapport</span>
							</a>
						</li>
						<li class="sidebar-list">
							<a class="sidebar-link sidebar-title <?php echo e(request()->is('agents/*') ? ' active' : ''); ?> <?php echo e(request()->is('agents') ? ' active' : ''); ?>" href="<?php echo e(route('agent')); ?>">
								<i data-feather="users"></i><span class="lan-3">Agents</span>
								<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/agent' ? 'down' : 'right'); ?>"></i></div>
							</a>
						</li>
						<li class="sidebar-list">
							<a class="sidebar-link sidebar-title <?php echo e(request()->is('users/*') ? ' active' : ''); ?> <?php echo e(request()->is('users') ? ' active' : ''); ?>" href="<?php echo e(route('user')); ?>">
								<i data-feather="user"></i><span class="lan-3">Utlisateurs</span>
								<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/user' ? 'down' : 'right'); ?>"></i></div>
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</nav>
	</div>
</div><?php /**PATH C:\xampp\htdocs\isset\resources\views/layouts/simple/sidebar.blade.php ENDPATH**/ ?>