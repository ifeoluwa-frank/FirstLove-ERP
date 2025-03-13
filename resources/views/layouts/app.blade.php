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
                <div class="is-user-name"><span>{{ auth()->user()->name }}</span></div>
                <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
              </a>
              <div class="navbar-dropdown">
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
              </div>
            </div>
            <a title="Log out" class="navbar-item desktop-icon-only">
              <span class="icon"></span>
              <form action="{{ route('logout') }}" method="POST" class="ml-4">
                @csrf
                <button type="submit" class="text-sm text-gray-700"><i class="mdi mdi-logout"></i></button>
            </form>
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
          <ul class="menu-list">
            <li class="#">
              <a href="#">
                <span class="icon"><i class="mdi mdi-bell"></i></span>
                <span class="menu-item-label">Notifications</span>
              </a>
            </li>
          </ul>
          {{-- <p class="menu-label">Examples</p> --}}
          {{-- <ul class="menu-list">
            <li class="--set-active-tables-html">
              <a href="tables.html">
                <span class="icon"><i class="mdi mdi-table"></i></span>
                <span class="menu-item-label">Tables</span>
              </a>
            </li>
            <li class="--set-active-forms-html">
              <a href="forms.html">
                <span class="icon"
                  ><i class="mdi mdi-square-edit-outline"></i
                ></span>
                <span class="menu-item-label">Forms</span>
              </a>
            </li>
            <li class="--set-active-profile-html">
              <a href="profile.html">
                <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                <span class="menu-item-label">Profile</span>
              </a>
            </li>
            <li>
              <a href="login.html">
                <span class="icon"><i class="mdi mdi-lock"></i></span>
                <span class="menu-item-label">Login</span>
              </a>
            </li>
            <li>
              <a class="dropdown">
                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                <span class="menu-item-label">Submenus</span>
                <span class="icon"><i class="mdi mdi-plus"></i></span>
              </a>
              <ul>
                <li>
                  <a href="#void">
                    <span>Sub-item One</span>
                  </a>
                </li>
                <li>
                  <a href="#void">
                    <span>Sub-item Two</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul> --}}
          {{-- <p class="menu-label">About</p> --}}
          {{-- <ul class="menu-list">
            <li>
              <a
                href="https://justboil.me"
                onclick="alert('Coming soon'); return false"
                target="_blank"
                class="has-icon"
              >
                <span class="icon"
                  ><i class="mdi mdi-credit-card-outline"></i
                ></span>
                <span class="menu-item-label">Premium Demo</span>
              </a>
            </li>
            <li>
              <a
                href="https://justboil.me/tailwind-admin-templates"
                class="has-icon"
              >
                <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                <span class="menu-item-label">About</span>
              </a>
            </li>
            <li>
              <a
                href="https://github.com/justboil/admin-one-tailwind"
                class="has-icon"
              >
                <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                <span class="menu-item-label">GitHub</span>
              </a>
            </li>
          </ul> --}}
        </div>
        </aside>
    </nav>
{{-- <div x-data="{ open: false }" class="flex h-screen">

    <!-- Mobile Sidebar Toggle Button -->
    <button @click="open = !open" class="md:hidden p-4 text-white bg-[#292C2F] fixed top-4 left-4 z-10">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button> --}}

  <!-- Sidebar -->
  {{-- <aside :class="open ? 'translate-x-0' : '-translate-x-full'"
  class="fixed md:relative w-52 bg-[#292C2F] text-white min-h-screen transform transition-transform duration-300 md:translate-x-0">
<div class="p-5 flex gap-4 ml-4 items-center border-b border-gray-600">
   <img src="https://ui-avatars.com/api/?name=Andrew+Smith&background=random" class="rounded-full border-2 border-white p_pic" alt="Admin">
   <div class="">
       <p class="text-xs uppercase text-gray-300">Admin</p>
       <p class="text-xs">{{ auth()->user()->name }}</p>
   </div>
</div>
<nav class="mt-6 flex flex-col gap-3 text-sm mb-16">
   <a href="{{ route('dashboard') }}" class="flex gap-2 items-center  w-3/4 px-5 py-3 hover:bg-gray-500 ml-6 rounded-lg {{ setActive('dashboard') }}">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 d_svg">
           <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
         </svg>
          Dashboard
   </a>
   <a href="{{ route('member.index') }}" class="flex gap-2 items-center w-3/4 px-5 py-3 hover:bg-gray-500 ml-6 rounded-lg {{ setActive('member.index') }}">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 d_svg">
           <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
         </svg>                  
          Members
   </a>
   <a href="{{ route('bacenta.index') }}" class="flex gap-2 items-center w-3/4 px-5 py-3 hover:bg-gray-500 ml-6 rounded-lg {{ setActive('bacenta.index') }}">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 d_svg">
           <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
         </svg>
          Bacentas
   </a>
   <a href="" class="flex gap-2 items-center  w-3/4 px-5 py-3 hover:bg-gray-500 ml-6 rounded-lg {{ setActive('') }}">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 d_svg">
           <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
         </svg>
          Attendance
   </a>
   <a href="{{ route('ministry.index') }}" class="flex gap-2 items-center w-3/4 px-5 py-3 hover:bg-gray-500 ml-6 rounded-lg {{ setActive('ministry.index') }}">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 d_svg">
           <path stroke-linecap="round" stroke-linejoin="round" d="m9 9 10.5-3m0 6.553v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 1 1-.99-3.467l2.31-.66a2.25 2.25 0 0 0 1.632-2.163Zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 0 1-.99-3.467l2.31-.66A2.25 2.25 0 0 0 9 15.553Z" />
         </svg>                  
          Ministries
   </a>
   <a href="" class="flex gap-2 items-center  w-3/4 px-5 py-3 hover:bg-gray-500 ml-6 rounded-lg {{ setActive('') }}">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 d_svg">
           <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
         </svg>
          Notifications
   </a>
</nav>
<div class="py-4 px-3 w-3/4 ml-6 rounded-2xl bg-gray-500">
   <a href="{{ route('member.create') }}" class="text-xs flex align-center justify-center w-full bg-[#E58025] text-white rounded-lg py-2 mb-3 rounded">
       + Add Member
   </a>
   <a href="{{ route('bacenta.index') }}" class="text-xs flex align-center justify-center w-full bg-[#E58025] text-white rounded-lg py-2 rounded">
       + Add Bacenta
   </a>
</div>
</aside> --}}

    <!-- Main Content -->
    {{-- <main class="flex-1 p-6">
        <header class="hidden md:flex justify-between items-center bg-gray-200 p-4 rounded-md shadow">
            <h2 class="text-lg font-semibold">@yield('header', 'Dashboard')</h2>
            <form action="{{ route('logout') }}" method="POST" class="ml-4">
                @csrf
                <button type="submit" class="text-sm text-gray-700">Logout</button>
            </form>
        </header>

        <!-- Main content area (dashboard content) -->
        <div class="mt-6">
            @yield('content')
        </div>
    </main> --}}
    <div class="mt-6 bg-gray-200">
        @yield('content')
    </div>
{{-- </div> --}}
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