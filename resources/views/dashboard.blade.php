<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Survei</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 min-h-screen">
{{-- SUCCESS TOAST --}}
@if (session('success'))
<div id="successToast"
     class="fixed top-5 right-5 z-50 bg-white border-l-4 border-emerald-500 shadow-xl rounded-xl px-6 py-4 w-80 transform translate-x-full opacity-0 transition-all duration-500">

    <div class="flex items-start justify-between">
        <div>
            <h4 class="font-semibold text-emerald-600">Berhasil</h4>
            <p class="text-sm text-gray-600 mt-1">
                {{ session('success') }}
            </p>
        </div>

        <button onclick="closeToast('successToast')" 
                class="text-gray-400 hover:text-gray-600 text-lg leading-none">
            &times;
        </button>
    </div>
</div>
@endif

<header class="sticky top-0 z-40 backdrop-blur-lg bg-white/80 border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 h-16 flex justify-between items-center">

        <!-- Logo + Title -->
        <div class="flex items-center gap-4">
            <img src="{{ asset('images/logo-bps.png') }}" 
                 alt="Logo BPS"
                 class="h-10 w-auto object-contain">

            <div class="leading-tight">
                <div class="font-semibold text-gray-800 text-base">
                    Survei Kebutuhan Data
                </div>
                <div class="text-xs text-gray-500">
                    BPS Kabupaten Bandung
                </div>
            </div>
        </div>

        <!-- Right Section -->
        <div class="flex items-center gap-6">

            <!-- Dashboard Label -->
            <span class="hidden md:block text-sm text-gray-600">
                Dashboard
            </span>

            <!-- Logout -->
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="px-5 py-2 rounded-xl bg-red-500 text-white font-medium shadow-md hover:bg-red-600 hover:shadow-lg transition-all duration-300">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>

        </div>
    </div>
</header>


<div class="max-w-7xl mx-auto px-6 py-10">
    <a href="{{ route('export.excel') }}"
       class="ml-6 mb-5 inline-flex items-center gap-3 px-6 py-3 
              bg-gradient-to-r from-emerald-500 to-emerald-600
              text-white text-sm font-semibold rounded-2xl
              shadow-md hover:shadow-lg
              hover:scale-105 active:scale-95
              transition-all duration-300">

        <!-- Icon Excel -->
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-5 h-5"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor"
             stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M4 4h16v16H4z" />
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 9l6 6M15 9l-6 6" />
        </svg>

        Download Excel
    </a>

    {{-- TOTAL RESPONDEN --}}
    <div class="bg-white rounded-2xl shadow-sm p-6 mb-8 border border-gray-200">
        <h2 class="text-gray-500 text-sm mb-2">Total Responden</h2>
        <p class="text-4xl font-bold text-indigo-600">
            {{ $total }}
        </p>
    </div>

    @if($total > 0)

    {{-- GRID CHART --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- JENIS KELAMIN --}}
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-200">
            <h3 class="font-semibold text-gray-700 mb-6">
                Jenis Kelamin
            </h3>
            <div class="h-64">
                <canvas id="jkChart"></canvas>
            </div>
        </div>

        {{-- PENDIDIKAN --}}
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-200">
            <h3 class="font-semibold text-gray-700 mb-6">
                Pendidikan
            </h3>
            <div class="h-64">
                <canvas id="pendChart"></canvas>
            </div>
        </div>

        {{-- UMUR --}}
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-200">
            <h3 class="font-semibold text-gray-700 mb-6">
                Kelompok Umur
            </h3>
            <div class="h-64">
                <canvas id="umurChart"></canvas>
            </div>
        </div>

        {{-- PEKERJAAN --}}
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-200">
            <h3 class="font-semibold text-gray-700 mb-6">
                Pekerjaan
            </h3>
            <div class="h-64">
                <canvas id="kerjaChart"></canvas>
            </div>
        </div>

    </div>

    @endif

</div>


@if($total > 0)
<script>
    function createHorizontalBarChart(id, labels, data){
    new Chart(document.getElementById(id), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: '#6366F1',
                borderRadius: 8,
                barThickness: 18
            }]
        },
        options: {
            indexAxis: 'y', // INI YANG BIKIN HORIZONTAL
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { precision: 0 }
                },
                y: {
                    grid: { display: false },
                    ticks: {
                        color: '#374151',
                        font: {
                            size: 13,
                            weight: '500'
                        }
                    }
                }
            }
        }
    });
}

function createPieChart(id, labels, data){
    new Chart(document.getElementById(id), {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                borderWidth: 0,
                backgroundColor: [
                    '#6366F1',
                    '#22C55E',
                    '#F59E0B',
                    '#EF4444'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 12,
                        padding: 15
                    }
                }
            }
        }
    });
}

function createBarChart(id, labels, data){
    new Chart(document.getElementById(id), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: '#6366F1',
                borderRadius: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { color: '#6B7280' }
                },
                y: {
                    display: false,
                    grid: { display: false }
                }
            }
        }
    });
}

createPieChart(
    'jkChart',
    {!! json_encode($jenisKelamin->keys()) !!},
    {!! json_encode($jenisKelamin->values()) !!}
);

createBarChart(
    'pendChart',
    {!! json_encode($pendidikan->keys()) !!},
    {!! json_encode($pendidikan->values()) !!}
);

createHorizontalBarChart(
    'umurChart',
    {!! json_encode($umur->keys()) !!},
    {!! json_encode($umur->values()) !!}
);

createHorizontalBarChart(
    'kerjaChart',
    {!! json_encode($pekerjaan->keys()) !!},
    {!! json_encode($pekerjaan->values()) !!}
);

document.addEventListener("DOMContentLoaded", function () {
    const toast = document.getElementById("successToast");
    if (toast) {
        // Slide in
        setTimeout(() => {
            toast.classList.remove("translate-x-full", "opacity-0");
        }, 100);

        // Auto close after 4 seconds
        setTimeout(() => {
            closeToast();
        }, 4000);
    }
});

function closeToast() {
    const toast = document.getElementById("successToast");
    if (toast) {
        toast.classList.add("translate-x-full", "opacity-0");
    }
}
</script>
@endif

</body>
</html>