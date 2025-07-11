@extends('layouts.app')

<style>
    .svg_details {
        width: 20px;
        height: 20px;
    }
    .member-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #ffffff;
        color: rgb(0, 0, 0);
        padding: 12px;
        border-radius: 8px;
        transition: background-color 0.3s;
        cursor: pointer;
    }
    .member-card img {
        width: 45px;
        height: 45px;
        border-radius: 9999px;
        margin-right: 12px;
        object-fit: cover;
    }
    .member-card-content {
        display: flex;
        align-items: center;
    }
    .member-card.active {
        background-color: #166534;
        color: #fff;
    }
    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 12px;
        margin: 20px 20px 80px 20px;
    }
    .form-checkbox {
        width: 20px;
        height: 20px;
        accent-color: #2563eb;
        cursor: pointer;
    }
    .submit-fixed button {
        background-color: #0ca678; 
        color: #fff;
        padding: 14px 0;
        border-radius: 8px;
        font-size: 16px;
        border: none;
        width: 100%;
        transition: background-color 0.3s;
    }
    .submit-fixed button:hover {
        background-color: #20c997;
    }
    .control-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
        padding: 0 20px;
        margin-top: 20px;
    }
    .date-picker, .service-select {
        background-color: #ffffff;
        color: #000000;
        border: 1px solid #ccc;
        padding: 8px 10px;
        border-radius: 6px;
        width: 100%;
    }
    @media (max-width: 640px) {
        .control-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Attendance Board */
    .attendance-board {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        padding: 20px;
        background: #f1f5f9;
        border-radius: 10px;
        margin: 20px;
        text-align: center;
        flex-wrap: wrap;
    }
    .attendance-board div {
        flex: 1;
        background: #fff;
        padding: 16px;
        border-radius: 8px;
        font-size: 18px;
        font-weight: 600;
        color: #0f172a;
        min-width: 130px;
    }
    .attendance-board .total {
        color: #2563eb;
    }
    .attendance-board .present {
        color: #16a34a;
    }
    .attendance-board .absent {
        color: #dc2626;
    }
    .attendance-board .percentage {
        color: #f59e0b;
    }
</style>

@section('title', 'Members')

@section('header')
    Members
@endsection

@section('content')

<div id="app">

    <!-- Title Bar -->
    <section class="is-title-bar">
        <ul>
            <li>Bacenta</li>
            <li>{{ $pageTitle }}</li>
        </ul>
    </section>

    @if(session('notify'))
        <div class="alert alert-{{ session('notify_type', 'info') }}">
            {{ session('notify') }}
        </div>
    @endif

    <!-- Attendance Board -->
    <div class="attendance-board">
        <div class="total">Total: <span id="totalCount">0</span></div>
        <div class="present">Present: <span id="presentCount">0</span></div>
        <div class="absent">Absent: <span id="absentCount">0</span></div>
        <div class="percentage">Attendance: <span id="attendancePercentage">0%</span></div>
    </div>
    {{-- @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <!-- Members Form -->
    <div class="container mx-auto mt-5">
        <form action="{{ route('membership.submit') }}" method="POST" id="attendanceForm">
            @csrf
            <!-- Attendance Controls -->
            <div class="control-grid">
                <input type="date" name="service_date" id="date" class="date-picker" value="{{ date('Y-m-d') }}" required>

                <select class="w-full px-3 py-2 border rounded controller" name="service_id">
                    <option disabled value="">-- Select an Option --</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>

                <input type="hidden" name="member_count" id="count" />
                <input type="hidden" name="bacenta_id" value="{{ $bacenta->id }}" />
            </div>
            <!-- Member Cards Grid -->
            <div class="grid">
                @forelse ($myMembers as $member)
                    <div class="member-card">
                        <div class="member-card-content">
                            @if($member->profile_picture)
                                <img src="{{ asset('storage/' . $member->profile_picture) }}" alt="Profile Picture" class="rounded-full" style="width: 50px; height: 50px">
                            @else
                                <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe" class="rounded-full">
                            @endif
                            <div>
                                <div>{{ $member->first_name . ' ' .  $member->last_name}}</div>
                                <div class="text-sm text-gray-400">{{ $member->phone }}</div>
                            </div>
                        </div>
                        <input type="checkbox" name="user_ids[]" value="{{ $member->id }}" class="form-checkbox">
                    </div>
                @empty
                @endforelse
            </div>

            <!-- Submit Button -->
            <div class="submit-fixed px-5 py-4">
                <button type="submit">Submit Attendance</button>
            </div>


        </form>
    </div>
</div>

<script>
    // Count Attendance and update Board
    function updateAttendanceCounts() {
        const checkboxes = document.querySelectorAll('.form-checkbox');
        const total = checkboxes.length;
        const present = Array.from(checkboxes).filter(cb => cb.checked).length;
        const absent = total - present;
        const percentage = total ? Math.round((present / total) * 100) : 0;

        document.getElementById('totalCount').innerText = total;
        document.getElementById('presentCount').innerText = present;
        document.getElementById('count').value = present;
        document.getElementById('absentCount').innerText = absent;
        document.getElementById('attendancePercentage').innerText = percentage + '%';
    }

    // Card click toggles checkbox
    document.querySelectorAll('.member-card').forEach(card => {
        card.addEventListener('click', e => {
            if (e.target.classList.contains('form-checkbox')) return;
            const checkbox = card.querySelector('.form-checkbox');
            checkbox.checked = !checkbox.checked;
            card.classList.toggle('active', checkbox.checked);
            updateAttendanceCounts();
        });
    });

    // Direct checkbox click updates count + active class
    document.querySelectorAll('.form-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            const card = checkbox.closest('.member-card');
            card.classList.toggle('active', checkbox.checked);
            updateAttendanceCounts();
        });
    });

    // Init counts on page load
    updateAttendanceCounts();
</script>

@endsection
