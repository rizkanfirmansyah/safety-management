<div class="top">
    <i class="uil uil-bars sidebar-toggle"></i>
    <div class="petugas">
        <i class="uil uil-user"></i>
        <span>{{ auth()->user()->fullname }}</span>
    </div>
</div>
</div>

@if (session('success'))
    <script>
        const alertt = '{{ session('success') }}';
        alert(alertt);
    </script>
@endif
