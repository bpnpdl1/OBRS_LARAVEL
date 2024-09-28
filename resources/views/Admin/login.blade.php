<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h3 class="text-2xl font-semibold text-center">Admin Login</h3>

    <livewire:admin.login />
</x-guest-layout>
