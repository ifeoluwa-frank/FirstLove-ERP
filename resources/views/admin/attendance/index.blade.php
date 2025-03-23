@extends('layouts.app')

@section('title', 'Attendance')
<style>
    .svgs {
        width: 40px;
        height: 40px;
    }
  </style>
@section('header')
    Ministries
@endsection     

@section('content')
    <!-- Content Section -->
    <div id="app">
        <section class="is-title-bar">
            <div
              class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0"
            >
              <ul>
                <li>Admin</li>
                <li>{{ $pageTitle }}</li>
              </ul>
            </div>
        </section>

        <section class="section main-section">
            <button onclick="openModal('modal')" class="button green my-2">
              <span class="icon"><i class="mdi mdi-filter-variant"></i></span>
              Filter Sunday Attendance
            </button>
            @if(request('service_date'))
            <a href="{{ route('attendance.index') }}" class="button red my-2">Clear Filter</a>
           @endif

            <div class="grid gap-6 grid-cols-1 md:grid-cols-2 mb-6">
                <div class="card">
                    <div class="card-content">
                      <h2 class="text-2xl ml-2 mb-3">{{ $sundayService->name }} - {{ $ushersHeadcount->service_date ?? "" }}</h2>
                      @if(!empty($error))
                        <h2>{{ $error }}</h2>
                      @else
                      <div>
                        <canvas id="attendanceChart" width="250" height="100"></canvas>
                        <div id="chartLegend" style="text-align: center;"></div>
                      </div>
                      
                        {{-- <div class="flex align-center justify-between mb-3">
                          <div class="flex gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svgs">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                              </svg>                              
                                                      
                              <div class="mt-2 mr-3">
                                  <p class="text-sm font-bold">Usher's Headcount</p>
                              </div>
                          </div>
                          
                          <div class="align-center rounded-md">
                              
                              <h1 class="text-xl font-extrabold mt-1">{{ $ushersHeadcount->headcount ?? "" }}</h1>
                          </div>
                        </div>
                        <div class="flex align-center justify-between mb-3">
                          <div class="flex gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svgs">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                              </svg>                              
                                                      
                              <div class="mt-2 mr-3">
                                  <p class="text-sm font-bold">Membership Attendance</p>
                              </div>
                          </div>
                          
                          <div class="align-center rounded-md">
                              
                              <h1 class="text-xl font-extrabold mt-1">{{ $ushersHeadcount->headcount ?? "" }}</h1>
                          </div>
                        </div>
                        <div class="flex align-center justify-between mb-3">
                          <div class="flex gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svgs">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                              </svg>                              
                                                      
                              <div class="mt-2 mr-3">
                                  <p class="text-sm font-bold">Busing Attendance</p>
                              </div>
                          </div>
                          
                          <div class="align-center rounded-md">
                              
                              <h1 class="text-xl font-extrabold mt-1">{{ $ushersHeadcount->headcount ?? "" }}</h1>
                          </div>
                        </div> --}}
                      @endif
                    </div>
                  </div>
              <div class="card">
                <div class="card-content">
                  @if($membershipAttendance->isNotEmpty())
                    <div class="flex items-center justify-between">
                      <div class="widget-label">
                        <h3>Bacentas Attendance - {{ $membershipAttendance }}</h3>
                        <h1>3</h1>
                      </div>
                      <span class="icon widget-icon text-blue-500"
                        ><i class="mdi mdi-church mdi-48px"></i
                      ></span>
                    </div>
                  @else
                    <div class="flex items-center justify-between">
                      <div class="widget-label">
                        <h3>Bacentas Attendance</h3>
                        <h4>No Bacenta Service Recorded Yet For This Week</h4>
                      </div>
                      <span class="icon widget-icon text-blue-500"
                        ><i class="mdi mdi-church mdi-48px"></i
                      ></span>
                    </div>
                  @endif
                </div>
              </div>
    
              
              <section class="section main-section">
                <div class="card lg:col-span-1">
                    <header class="card-header">
                        <p class="card-header-title">
                          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                          Add Member
                        </p>
                    </header>
                    <div class="card-content">
                        @if ($errors->any())
                            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg">
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
            
                        <form action="{{ route('attendance.headcount') }}" method="POST">
                            @csrf
                            <div class="">
                                <div class="field w-full">
                                    <label class="label">Service</label>
                                    <select class="w-full px-3 py-2 border rounded controller" name="service_id">
                                        <option disabled selected value="">-- Select an Option --</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="field w-full">
                                    <label class="label">Service Date</label>
                                    <div class="control">
                                        <input type="date" name="service_date" class="input w-full" >
                                    </div>
                                </div>
                                <div class="field w-full">
                                    <label class="label">Count</label>
                                    <div class="control">
                                        <input type="number" name="headcount" class="input w-full" required>
                                    </div>
                                </div>
                               
                            </div>
                            <hr>
                            <div class="field">
                              <div class="control">
                                <button type="submit" class="button green w-full">
                                  Submit
                                </button>
                              </div>
                            </div>
                        </form>
                      </div>
                  </div>
              </section>
          </section>   
    </div>

    <div id="modal" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 open-modal-button hidden">
      <div class="bg-white rounded-lg shadow-lg w-96">
          <!-- Modal Header -->
          <div class="flex justify-between items-center border-b p-4">
              <h2 class="text-lg font-semibold">
                <span class="icon"><i class="mdi mdi-filter-variant"></i></span>
                Filter
              </h2>
              <button onclick="closeModal('modal')" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
          </div>

          <!-- Modal Body -->
          <div class="card">
            <div class="card-content">
              @if ($errors->any())
                  <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg">
                      <ul class="list-disc list-inside">
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
    
              <form action="{{ route('attendance.index') }}" method="get">
                {{-- @csrf --}}
                <div class="field w-full">
                    <label class="label">Service Date</label>
                    <div class="control">
                        <input type="date" name="service_date" class="input w-full" >
                    </div>
                </div>
                <hr>
                <div class="field">
                  <div class="control">
                    <button type="submit" class="button green w-full">
                      Submit
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
  </div>
  <script>
    function openModal(modal) {
        let tmodal = document.getElementById(`${modal}`);
        tmodal.classList.remove('hidden');
    }

    function closeModal(modal) {
        let tModal = document.getElementById(`${modal}`);
        tModal.classList.add('hidden');
    }

    var ctx = document.getElementById('attendanceChart').getContext('2d');

    const attendanceData = [{{ $ushersHeadcount->headcount ?? 0 }}, {{ $ushersHeadcount->headcount ?? 0 }}, {{ $ushersHeadcount->headcount ?? 0 }}]; // Replace with dynamic data
    const average = (attendanceData.reduce((a, b) => a + b, 0) / attendanceData.length).toFixed(1); // ✅ Calculate average

    var attendanceChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Ushers', 'Busing', 'Membership'],
            datasets: [{
                data: attendanceData,
                backgroundColor: ['#7D3C98', '#FF6384', '#FFCE56'],
                borderWidth: 4,
                borderRadius: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 70,
            rotation: -Math.PI,
            circumference: Math.PI,
            layout: {
                padding: 0
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: true
                }
            },
            elements: {
                center: {
                    text: `${average}`, // ✅ Show average instead of total
                    color: '#333',
                    fontStyle: 'Arial',
                    sidePadding: 20,
                    minFontSize: 14,
                    lineHeight: 25
                }
            }
        }
    });

    // ✅ Draw Average in the Center of Cutout
    Chart.plugins.register({
        beforeDraw: function (chart) {
            var width = chart.chart.width,
                height = chart.chart.height,
                ctx = chart.chart.ctx;

            ctx.restore();
            var fontSize = (height / 150).toFixed(2);
            ctx.font = `${fontSize}em Arial`;
            ctx.textBaseline = "middle";

            var text = `Avg: ${average}`,
                textX = Math.round((width - ctx.measureText(text).width) / 2),
                textY = height / 2 + 50; // ✅ Adjust position slightly lower

            ctx.fillText(text, textX, textY);
            ctx.save();
        }
    });


    // ✅ Custom Flexbox Legend
    var legendContainer = document.getElementById("chartLegend");
    legendContainer.innerHTML = attendanceChart.data.labels
        .map((label, i) => `
            <div style="display: flex; align-items: center; margin: 5px 10px;">
                <span style="width: 12px; height: 12px; border-radius: 50%; background-color: ${attendanceChart.data.datasets[0].backgroundColor[i]}; margin-right: 8px;"></span>
                <span style="font-size: 14px; color: #333;">${label}: ${attendanceChart.data.datasets[0].data[i]}</span>
            </div>
        `)
        .join("");

    // ✅ Ensure it's in a row (flexbox)
    legendContainer.style.display = "flex";
    legendContainer.style.justifyContent = "center";
    legendContainer.style.flexWrap = "wrap"; //
    legendContainer.style.marginTop = "0"; 
  </script>

@endsection