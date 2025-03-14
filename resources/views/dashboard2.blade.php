
@extends('layouts.app')
<style>
  .svgs {
      width: 40px;
      height: 40px;
  }
</style>

@section('title', 'Bacenta')

@section('header')
    Bacenta
@endsection     

@section('content')
    <!-- Content Section -->
    <body>
        <div id="app">    
          <section class="is-title-bar">
            <div
              class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0"
            >
              <ul>
                <li>Admin</li>
                <li>{{ $pageTitle }}</li>
              </ul>
              {{-- <a
                href="https://justboil.me/"
                onclick="alert('Coming soon'); return false"
                target="_blank"
                class="button blue"
              >
                <span class="icon"
                  ><i class="mdi mdi-credit-card-outline"></i
                ></span>
                <span>Premium Demo</span>
              </a> --}}
            </div>
          </section>
    
          {{-- <section class="is-hero-bar">
            <div
              class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0"
            >
              <h1 class="title">Dashboard</h1>
              <button class="button light">Button</button>
            </div>
          </section> --}}
    
          <section class="section main-section">
            <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
              <div class="card">
                <div class="card-content">
                  <div class="flex items-center justify-between">
                    <div class="widget-label">
                      <h3>Total Members</h3>
                      <h1>{{ $members_count }}</h1>
                    </div>
                    <span class="icon widget-icon text-green-500"
                      ><i class="mdi mdi-account-multiple mdi-48px"></i
                    ></span>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-content">
                  <div class="flex items-center justify-between">
                    <div class="widget-label">
                      <h3>Total Bacentas</h3>
                      <h1>{{ $bacenta_count }}</h1>
                    </div>
                    <span class="icon widget-icon text-blue-500"
                      ><i class="mdi mdi-church mdi-48px"></i
                    ></span>
                  </div>
                </div>
              </div>
    
              <div class="card">
                <div class="card-content">
                  <div class="flex items-center justify-between">
                    <div class="widget-label">
                      <h3>Total Sontas</h3>
                      <h1>{{ $sonta_count }}</h1>
                    </div>
                    <span class="icon widget-icon text-red-500"
                      ><i class="mdi mdi-microphone-variant mdi-48px"></i
                    ></span>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-content">
                  <h2 class="text-2xl ml-2 mb-2">Birthdays</h2>
                  @forelse($upcoming_birthdays as $upcoming_birthday)
                    <div class="flex align-center justify-between mb-3">
                      <div class="flex gap-2">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svgs">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                                                  
                          <div class="mt-1 mr-3">
                              <p class="text-xs font-bold">{{ $upcoming_birthday->first_name }} {{ $upcoming_birthday->last_name }}</p>
                              <span class="text-xs text-gray-400">Bacenta - {{ $upcoming_birthday->bacenta_id }}</span>
                          </div>
                      </div>
                      
                      <div class="flex bg-gray-300 px-3 py-2 gap-1 align-center rounded-md">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 svgs">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.871c1.355 0 2.697.056 4.024.166C17.155 8.51 18 9.473 18 10.608v2.513M15 8.25v-1.5m-6 1.5v-1.5m12 9.75-1.5.75a3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0L3 16.5m15-3.379a48.474 48.474 0 0 0-6-.371c-2.032 0-4.034.126-6 .371m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.169c0 .621-.504 1.125-1.125 1.125H4.125A1.125 1.125 0 0 1 3 20.625v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 0 1 6 13.12M12.265 3.11a.375.375 0 1 1-.53 0L12 2.845l.265.265Zm-3 0a.375.375 0 1 1-.53 0L9 2.845l.265.265Zm6 0a.375.375 0 1 1-.53 0L15 2.845l.265.265Z" />
                            </svg> 
                          <span class="text-sm mt-1">{{ $upcoming_birthday->dob }}</span>
                      </div>
                  </div>
                  @empty
                  <div class="mt-1 mr-3"> 
                    <p class="text-xs font-bold">No upcoming birthdays</p>
                  </div>
                  @endforelse
                </div>
              </div>
            </div>
    
            <div class="card mb-6">
              <header class="card-header">
                <p class="card-header-title">
                  <span class="icon"><i class="mdi mdi-finance"></i></span>
                  Performance
                </p>
                <a href="#" class="card-header-icon">
                  <span class="icon"><i class="mdi mdi-reload"></i></span>
                </a>
              </header>
              <div class="card-content">
                <div class="chart-area">
                  <div class="h-full">
                    <div class="chartjs-size-monitor">
                      <div class="chartjs-size-monitor-expand">
                        <div></div>
                      </div>
                      <div class="chartjs-size-monitor-shrink">
                        <div></div>
                      </div>
                    </div>
                    <canvas
                      id="big-line-chart"
                      width="2992"
                      height="1000"
                      class="chartjs-render-monitor block"
                      style="height: 400px; width: 1197px"
                    ></canvas>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="notification blue">
              <div
                class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0"
              >
                <div>
                  <span class="icon"><i class="mdi mdi-buffer"></i></span>
                  <b>Responsive table</b>
                </div>
                <button
                  type="button"
                  class="button small textual --jb-notification-dismiss"
                >
                  Dismiss
                </button>
              </div>
            </div>
    
            <div class="card has-table">
              <header class="card-header">
                <p class="card-header-title">
                  <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                  Clients
                </p>
                <a href="#" class="card-header-icon">
                  <span class="icon"><i class="mdi mdi-reload"></i></span>
                </a>
              </header>
              <div class="card-content">
                <table>
                  <thead>
                    <tr>
                      <th></th>
                      <th>Name</th>
                      <th>Company</th>
                      <th>City</th>
                      <th>Progress</th>
                      <th>Created</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="image-cell">
                        <div class="image">
                          <img
                            src="https://avatars.dicebear.com/v2/initials/rebecca-bauch.svg"
                            class="rounded-full"
                          />
                        </div>
                      </td>
                      <td data-label="Name">Rebecca Bauch</td>
                      <td data-label="Company">Daugherty-Daniel</td>
                      <td data-label="City">South Cory</td>
                      <td data-label="Progress" class="progress-cell">
                        <progress max="100" value="79">79</progress>
                      </td>
                      <td data-label="Created">
                        <small class="text-gray-500" title="Oct 25, 2021"
                          >Oct 25, 2021</small
                        >
                      </td>
                      <td class="actions-cell">
                        <div class="buttons right nowrap">
                          <button
                            class="button small green --jb-modal"
                            data-target="sample-modal-2"
                            type="button"
                          >
                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                          </button>
                          <button
                            class="button small red --jb-modal"
                            data-target="sample-modal"
                            type="button"
                          >
                            <span class="icon"
                              ><i class="mdi mdi-trash-can"></i
                            ></span>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="image-cell">
                        <div class="image">
                          <img
                            src="https://avatars.dicebear.com/v2/initials/felicita-yundt.svg"
                            class="rounded-full"
                          />
                        </div>
                      </td>
                      <td data-label="Name">Felicita Yundt</td>
                      <td data-label="Company">Johns-Weissnat</td>
                      <td data-label="City">East Ariel</td>
                      <td data-label="Progress" class="progress-cell">
                        <progress max="100" value="67">67</progress>
                      </td>
                      <td data-label="Created">
                        <small class="text-gray-500" title="Jan 8, 2021"
                          >Jan 8, 2021</small
                        >
                      </td>
                      <td class="actions-cell">
                        <div class="buttons right nowrap">
                          <button
                            class="button small green --jb-modal"
                            data-target="sample-modal-2"
                            type="button"
                          >
                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                          </button>
                          <button
                            class="button small red --jb-modal"
                            data-target="sample-modal"
                            type="button"
                          >
                            <span class="icon"
                              ><i class="mdi mdi-trash-can"></i
                            ></span>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="image-cell">
                        <div class="image">
                          <img
                            src="https://avatars.dicebear.com/v2/initials/mr-larry-satterfield-v.svg"
                            class="rounded-full"
                          />
                        </div>
                      </td>
                      <td data-label="Name">Mr. Larry Satterfield V</td>
                      <td data-label="Company">Hyatt Ltd</td>
                      <td data-label="City">Windlerburgh</td>
                      <td data-label="Progress" class="progress-cell">
                        <progress max="100" value="16">16</progress>
                      </td>
                      <td data-label="Created">
                        <small class="text-gray-500" title="Dec 18, 2021"
                          >Dec 18, 2021</small
                        >
                      </td>
                      <td class="actions-cell">
                        <div class="buttons right nowrap">
                          <button
                            class="button small green --jb-modal"
                            data-target="sample-modal-2"
                            type="button"
                          >
                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                          </button>
                          <button
                            class="button small red --jb-modal"
                            data-target="sample-modal"
                            type="button"
                          >
                            <span class="icon"
                              ><i class="mdi mdi-trash-can"></i
                            ></span>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="image-cell">
                        <div class="image">
                          <img
                            src="https://avatars.dicebear.com/v2/initials/mr-broderick-kub.svg"
                            class="rounded-full"
                          />
                        </div>
                      </td>
                      <td data-label="Name">Mr. Broderick Kub</td>
                      <td data-label="Company">Kshlerin, Bauch and Ernser</td>
                      <td data-label="City">New Kirstenport</td>
                      <td data-label="Progress" class="progress-cell">
                        <progress max="100" value="71">71</progress>
                      </td>
                      <td data-label="Created">
                        <small class="text-gray-500" title="Sep 13, 2021"
                          >Sep 13, 2021</small
                        >
                      </td>
                      <td class="actions-cell">
                        <div class="buttons right nowrap">
                          <button
                            class="button small green --jb-modal"
                            data-target="sample-modal-2"
                            type="button"
                          >
                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                          </button>
                          <button
                            class="button small red --jb-modal"
                            data-target="sample-modal"
                            type="button"
                          >
                            <span class="icon"
                              ><i class="mdi mdi-trash-can"></i
                            ></span>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="image-cell">
                        <div class="image">
                          <img
                            src="https://avatars.dicebear.com/v2/initials/barry-weber.svg"
                            class="rounded-full"
                          />
                        </div>
                      </td>
                      <td data-label="Name">Barry Weber</td>
                      <td data-label="Company">
                        Schulist, Mosciski and Heidenreich
                      </td>
                      <td data-label="City">East Violettestad</td>
                      <td data-label="Progress" class="progress-cell">
                        <progress max="100" value="80">80</progress>
                      </td>
                      <td data-label="Created">
                        <small class="text-gray-500" title="Jul 24, 2021"
                          >Jul 24, 2021</small
                        >
                      </td>
                      <td class="actions-cell">
                        <div class="buttons right nowrap">
                          <button
                            class="button small green --jb-modal"
                            data-target="sample-modal-2"
                            type="button"
                          >
                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                          </button>
                          <button
                            class="button small red --jb-modal"
                            data-target="sample-modal"
                            type="button"
                          >
                            <span class="icon"
                              ><i class="mdi mdi-trash-can"></i
                            ></span>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="image-cell">
                        <div class="image">
                          <img
                            src="https://avatars.dicebear.com/v2/initials/bert-kautzer-md.svg"
                            class="rounded-full"
                          />
                        </div>
                      </td>
                      <td data-label="Name">Bert Kautzer MD</td>
                      <td data-label="Company">Gerhold and Sons</td>
                      <td data-label="City">Mayeport</td>
                      <td data-label="Progress" class="progress-cell">
                        <progress max="100" value="62">62</progress>
                      </td>
                      <td data-label="Created">
                        <small class="text-gray-500" title="Mar 30, 2021"
                          >Mar 30, 2021</small
                        >
                      </td>
                      <td class="actions-cell">
                        <div class="buttons right nowrap">
                          <button
                            class="button small green --jb-modal"
                            data-target="sample-modal-2"
                            type="button"
                          >
                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                          </button>
                          <button
                            class="button small red --jb-modal"
                            data-target="sample-modal"
                            type="button"
                          >
                            <span class="icon"
                              ><i class="mdi mdi-trash-can"></i
                            ></span>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="image-cell">
                        <div class="image">
                          <img
                            src="https://avatars.dicebear.com/v2/initials/lonzo-steuber.svg"
                            class="rounded-full"
                          />
                        </div>
                      </td>
                      <td data-label="Name">Lonzo Steuber</td>
                      <td data-label="Company">Skiles Ltd</td>
                      <td data-label="City">Marilouville</td>
                      <td data-label="Progress" class="progress-cell">
                        <progress max="100" value="17">17</progress>
                      </td>
                      <td data-label="Created">
                        <small class="text-gray-500" title="Feb 12, 2021"
                          >Feb 12, 2021</small
                        >
                      </td>
                      <td class="actions-cell">
                        <div class="buttons right nowrap">
                          <button
                            class="button small green --jb-modal"
                            data-target="sample-modal-2"
                            type="button"
                          >
                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                          </button>
                          <button
                            class="button small red --jb-modal"
                            data-target="sample-modal"
                            type="button"
                          >
                            <span class="icon"
                              ><i class="mdi mdi-trash-can"></i
                            ></span>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="image-cell">
                        <div class="image">
                          <img
                            src="https://avatars.dicebear.com/v2/initials/jonathon-hahn.svg"
                            class="rounded-full"
                          />
                        </div>
                      </td>
                      <td data-label="Name">Jonathon Hahn</td>
                      <td data-label="Company">Flatley Ltd</td>
                      <td data-label="City">Billiemouth</td>
                      <td data-label="Progress" class="progress-cell">
                        <progress max="100" value="74">74</progress>
                      </td>
                      <td data-label="Created">
                        <small class="text-gray-500" title="Dec 30, 2021"
                          >Dec 30, 2021</small
                        >
                      </td>
                      <td class="actions-cell">
                        <div class="buttons right nowrap">
                          <button
                            class="button small green --jb-modal"
                            data-target="sample-modal-2"
                            type="button"
                          >
                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                          </button>
                          <button
                            class="button small red --jb-modal"
                            data-target="sample-modal"
                            type="button"
                          >
                            <span class="icon"
                              ><i class="mdi mdi-trash-can"></i
                            ></span>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="image-cell">
                        <div class="image">
                          <img
                            src="https://avatars.dicebear.com/v2/initials/ryley-wuckert.svg"
                            class="rounded-full"
                          />
                        </div>
                      </td>
                      <td data-label="Name">Ryley Wuckert</td>
                      <td data-label="Company">Heller-Little</td>
                      <td data-label="City">Emeraldtown</td>
                      <td data-label="Progress" class="progress-cell">
                        <progress max="100" value="54">54</progress>
                      </td>
                      <td data-label="Created">
                        <small class="text-gray-500" title="Jun 28, 2021"
                          >Jun 28, 2021</small
                        >
                      </td>
                      <td class="actions-cell">
                        <div class="buttons right nowrap">
                          <button
                            class="button small green --jb-modal"
                            data-target="sample-modal-2"
                            type="button"
                          >
                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                          </button>
                          <button
                            class="button small red --jb-modal"
                            data-target="sample-modal"
                            type="button"
                          >
                            <span class="icon"
                              ><i class="mdi mdi-trash-can"></i
                            ></span>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="image-cell">
                        <div class="image">
                          <img
                            src="https://avatars.dicebear.com/v2/initials/sienna-hayes.svg"
                            class="rounded-full"
                          />
                        </div>
                      </td>
                      <td data-label="Name">Sienna Hayes</td>
                      <td data-label="Company">Conn, Jerde and Douglas</td>
                      <td data-label="City">Jonathanfort</td>
                      <td data-label="Progress" class="progress-cell">
                        <progress max="100" value="55">55</progress>
                      </td>
                      <td data-label="Created">
                        <small class="text-gray-500" title="Mar 7, 2021"
                          >Mar 7, 2021</small
                        >
                      </td>
                      <td class="actions-cell">
                        <div class="buttons right nowrap">
                          <button
                            class="button small green --jb-modal"
                            data-target="sample-modal-2"
                            type="button"
                          >
                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                          </button>
                          <button
                            class="button small red --jb-modal"
                            data-target="sample-modal"
                            type="button"
                          >
                            <span class="icon"
                              ><i class="mdi mdi-trash-can"></i
                            ></span>
                          </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="table-pagination">
                  <div class="flex items-center justify-between">
                    <div class="buttons">
                      <button type="button" class="button active">1</button>
                      <button type="button" class="button">2</button>
                      <button type="button" class="button">3</button>
                    </div>
                    <small>Page 1 of 3</small>
                  </div>
                </div>
              </div>
            </div>
          </section>       
    </body>

@endsection
<!-- JavaScript for Modal -->

