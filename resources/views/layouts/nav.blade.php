<div class="container-fluid">
    <div class="row">
        <div class="header-nav-wrapper">
            <!-- <div class="logo">
					<a href="/index.html"><img src="img/synthetica-logo.png" alt="Synthetica Freebie"></a>
				</div> -->
            <div class="logo">
                <a href="{{ route('article.index') }}">
                    <x-application-logo class=" h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>
            <div class="primary-nav-wrapper">
                <nav>
                    <ul class="primary-nav">
                        <li>
                            <x-nav-link :href="route('article.index')" :active="request()->routeIs('article.index')">
                                {{ __('Article') }}
                            </x-nav-link>
                        </li>
                        <li><x-nav-link :href="route('article.create')" :active="request()->routeIs('article.create')">
                                {{ __('Create') }}
                            </x-nav-link>
                        </li>
                        <li>
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                        </li>
                        <li class="subscribe" style="color: white;">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </li>
                    </ul>
                </nav>
                
                <div class="search-wrapper">
                    <ul class="search">
                        <li>
                            <input type="text" id="search-input" placeholder="Start typing then hit enter to search">
                        </li>
                        <li>
                            <a href="#" class="hide-search"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="navicon">
                <a class="nav-toggle" href="#"><span></span></a>
            </div>
        </div>
    </div>
</div>