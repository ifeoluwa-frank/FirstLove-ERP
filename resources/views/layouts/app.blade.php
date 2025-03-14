<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <meta
      property="og:url"
      content="https://justboil.github.io/admin-one-tailwind/"
    />

    <meta
      property="og:image"
      content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png"
    />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1920" />
    <meta property="og:image:height" content="960" />

  <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
></script>
{{-- <script type="text/javascript" src="js/chart.sample.min.js"></script> --}}

@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
@vite(['resources/js/app.js', 'resources/css/main.css', 'resources/js/chart.sample.js', 'resources/js/chart.sample.min.js', 'resources/js/main.js', 'resources/js/main.min.js'])
@endif

<script
async
src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"
></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag() {
  dataLayer.push(arguments);
}
gtag("js", new Date());
gtag("config", "UA-130795909-1");
</script>

</head>
<body>
  <header>
    <nav id="navbar-main" class="navbar is-fixed-top">
      <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
          <span class="icon"
            ><i class="mdi mdi-forwardburger mdi-24px"></i
          ></span>
        </a>
        <div class="navbar-item">
          <div class="control">
            <input placeholder="Search everywhere..." class="input" />
          </div>
        </div>
      </div>
      <div class="navbar-brand is-right">
        <a
          class="navbar-item --jb-navbar-menu-toggle"
          data-target="navbar-menu"
        >
          <span class="icon"
            ><i class="mdi mdi-dots-vertical mdi-24px"></i
          ></span>
        </a>
      </div>
      <div class="navbar-menu" id="navbar-menu">
        <div class="navbar-end">
          <div class="navbar-item dropdown has-divider has-user-avatar">
            <a class="navbar-link">
              <div class="user-avatar">
                <img
                  src="https://avatars.dicebear.com/v2/initials/john-doe.svg"
                  alt="John Doe"
                  class="rounded-full"
                />
              </div>
              @if(Auth::guard('web')->check())
              <div class="is-user-name"><span>{{ auth()->user()->name }}</span></div>
              {{-- <span class="icon"><i class="mdi mdi-chevron-down"></i></span> --}}
              @elseif(Auth::guard('bacenta')->check())
              <div class="is-user-name"><span>{{ Auth::guard('bacenta')->user()->bacenta_name }}</span></div>
              {{-- <span class="icon"><i class="mdi mdi-chevron-down"></i></span> --}}
              @endif
            </a>
            {{-- FUTURE USEFUL DROPDOWN --}}
            {{-- <div class="navbar-dropdown">
              <a href="profile.html" class="navbar-item">
                <span class="icon"><i class="mdi mdi-account"></i></span>
                <span>My Profile</span>
              </a>
              <a class="navbar-item">
                <span class="icon"><i class="mdi mdi-settings"></i></span>
                <span>Settings</span>
              </a>
              <a class="navbar-item">
                <span class="icon"><i class="mdi mdi-email"></i></span>
                <span>Messages</span>
              </a>
              <hr class="navbar-divider" />
              <a class="navbar-item">
                <span class="icon"><i class="mdi mdi-logout"></i></span>
                <form action="{{ route('logout') }}" method="POST" class="ml-4">
                  @csrf
                  <button type="submit" class="text-sm text-gray-700">Logout</button>
              </form>
              </a>
            </div> --}}
          </div>
          <a title="Log out" class="navbar-item desktop-icon-only">
            
            @if(Auth::guard('web')->check())
            <form action="{{ route('logout') }}" method="POST" class="ml-4">
              @csrf
              {{-- <span class="icon"> --}}
              <button type="submit" class="text-sm text-gray-700 mt-4">
                <i class="mdi mdi-logout mdi-24px"></i>
              </button>
            {{-- </span> --}}
          </form>
          @else
          <form method="POST" action="{{ route('bacenta.logout') }}">
            @csrf
            <button type="submit" class="text-sm text-gray-700 mt-4">
              <i class="mdi mdi-logout mdi-24px"></i>
            </button>
          </form>
          @endif
          </a>
        </div>
      </div>

    <aside class="aside is-placed-left is-expanded">
      <div class="aside-tools">
        <div>Admin <b class="font-black">One</b></div>
      </div>
      {{-- MENU OPTIONS --}}
      <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
          <li class="{{ setActive('dashboard') }}">
            <a href="{{ route('dashboard') }}">
              <span class="icon"><i class="mdi mdi-home"></i></span>
              <span class="menu-item-label">Dashboard</span>
            </a>
          </li>
        </ul>
        @if(Auth::guard('web')->check())
        <ul class="menu-list">
          <li class="{{ setActive('member.index') }}">
            <a href="{{ route('member.index') }}">
              <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
              <span class="menu-item-label">Members</span>
            </a>
          </li>
        </ul>
        
        <ul class="menu-list">
          <li class="{{ setActive('bacenta.index') }}">
            <a href="{{ route('bacenta.index') }}">
              <span class="icon"><i class="mdi mdi-church"></i></span>
              <span class="menu-item-label">Bacentas</span>
            </a>
          </li>
        </ul>
        
        <ul class="menu-list">
          <li class="#">
            <a href="#">
              <span class="icon"><i class="mdi mdi-account-multiple-plus"></i></span>
              <span class="menu-item-label">Attendance</span>
            </a>
          </li>
        </ul>
        <ul class="menu-list">
          <li class="{{ setActive('ministry.index') }}">
            <a href="{{ route('ministry.index') }}">
              <span class="icon"><i class="mdi mdi-microphone-variant"></i></span>
              <span class="menu-item-label">Sontas</span>
            </a>
          </li>
        </ul>
        @endif
        <ul class="menu-list">
          <li class="#">
            <a href="#">
              <span class="icon"><i class="mdi mdi-bell"></i></span>
              <span class="menu-item-label">Notifications</span>
            </a>
          </li>
        </ul>
      </div>
      </aside>
  </nav>
  </header>

  <main>
    <div class="mt-6 bg-gray-200">
      @yield('content')
  </div>
  </main>
      

  <footer class="footer item-center">
    <div class="">
      <div class="">
        <div>
          © 2025, Firstlove Church
        </div>
      </div>
    </div>
  </footer>
</body>
<script>
    // console.log("I am here 1")
    !(function (f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function () {
        n.callMethod
          ? n.callMethod.apply(n, arguments)
          : n.queue.push(arguments);
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = "2.0";
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s);
    })(
      window,
      document,
      "script",
      "https://connect.facebook.net/en_US/fbevents.js"
    );
    fbq("init", "658339141622648");
    fbq("track", "PageView");
  </script>
  <noscript
    ><img
      height="1"
      width="1"
      style="display: none"
      src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"
  /></noscript>

  <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
  <link
    rel="stylesheet"
    href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css"
  />
</body>
</html>