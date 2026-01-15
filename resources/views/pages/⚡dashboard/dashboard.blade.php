<div>
    {{-- Header Section --}}
    <div class="mb-8">
        <div class="mb-4">
            <x-ui.breadcrumbs>
                <x-ui.breadcrumbs.item href="{{ route('home') }}">Home</x-ui.breadcrumbs.item>
                <x-ui.breadcrumbs.item active>Dashboard</x-ui.breadcrumbs.item>
            </x-ui.breadcrumbs>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <x-ui.heading size="lg" class="mb-1">Dashboard</x-ui.heading>
                <x-ui.text variant="muted">Overview of your application performance and activity.</x-ui.text>
            </div>
            <div>
                <x-ui.button icon="plus">Create Report</x-ui.button>
            </div>
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        {{-- Card 1: Revenue --}}
        <x-ui.card class="p-5">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2 bg-green-50 dark:bg-green-500/10 rounded-lg">
                    <x-ui.icon name="currency-dollar" class="text-green-600 dark:text-green-400 size-6" />
                </div>
                <x-ui.badge color="green" variant="solid" icon="arrow-trending-up">+20.1%</x-ui.badge>
            </div>
            <x-ui.text variant="muted" size="sm" class="mb-1">Total Revenue</x-ui.text>
            <x-ui.heading size="lg">$45,231.89</x-ui.heading>
        </x-ui.card>

        {{-- Card 2: Active Users --}}
        <x-ui.card class="p-5">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2 bg-blue-50 dark:bg-blue-500/10 rounded-lg">
                    <x-ui.icon name="users" class="text-blue-600 dark:text-blue-400 size-6" />
                </div>
                <x-ui.badge color="blue" variant="solid" icon="arrow-trending-up">+15%</x-ui.badge>
            </div>
            <x-ui.text variant="muted" size="sm" class="mb-1">Active Users</x-ui.text>
            <x-ui.heading size="lg">2,338</x-ui.heading>
        </x-ui.card>

        {{-- Card 3: Projects --}}
        <x-ui.card class="p-5">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2 bg-purple-50 dark:bg-purple-500/10 rounded-lg">
                    <x-ui.icon name="folder" class="text-purple-600 dark:text-purple-400 size-6" />
                </div>
                <x-ui.badge color="purple" variant="solid">Current</x-ui.badge>
            </div>
            <x-ui.text variant="muted" size="sm" class="mb-1">Active Projects</x-ui.text>
            <x-ui.heading size="lg">12</x-ui.heading>
        </x-ui.card>
    </div>

    {{-- Main Content Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Recent Activity (Left Column) --}}
        <div class="lg:col-span-2 space-y-6">
            <x-ui.card>
                <div class="p-6 border-b border-neutral-100 dark:border-neutral-800">
                    <x-ui.heading size="sm">Recent Activity</x-ui.heading>
                </div>
                <div class="divide-y divide-neutral-100 dark:divide-neutral-800">
                    @foreach (range(1, 5) as $i)
                        <div
                            class="p-4 flex items-center gap-4 hover:bg-neutral-50 dark:hover:bg-white/5 transition-colors">
                            <x-ui.avatar src="https://i.pravatar.cc/150?u={{ $i }}"
                                alt="User {{ $i }}" />
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-neutral-900 dark:text-white truncate">
                                    User {{ $i }} completed a task
                                </p>
                                <p class="text-xs text-neutral-500 truncate">
                                    Project Alpha &bull; 2 hours ago
                                </p>
                            </div>
                            <x-ui.badge size="sm" color="neutral" variant="outline">View</x-ui.badge>
                        </div>
                    @endforeach
                </div>
                <div
                    class="p-4 border-t border-neutral-100 dark:border-neutral-800 bg-neutral-50 dark:bg-white/5 rounded-b-lg">
                    <x-ui.button variant="ghost" size="sm" class="w-full text-neutral-500">View All
                        Activity</x-ui.button>
                </div>
            </x-ui.card>
        </div>

        {{-- Quick Actions & Status (Right Column) --}}
        <div class="space-y-6">
            {{-- Quick Actions --}}
            <x-ui.card class="p-6">
                <x-ui.heading size="sm" class="mb-4">Quick Actions</x-ui.heading>
                <div class="space-y-3">
                    <x-ui.button variant="outline" class="w-full justify-start" icon="user-plus">Invite Team
                        Member</x-ui.button>
                    <x-ui.button variant="outline" class="w-full justify-start" icon="cog-6-tooth">System
                        Settings</x-ui.button>
                    <x-ui.button variant="outline" class="w-full justify-start" icon="document-text">Download
                        Reports</x-ui.button>
                </div>
            </x-ui.card>

            {{-- System Status --}}
            <x-ui.card class="p-6">
                <x-ui.heading size="sm" class="mb-4">System Status</x-ui.heading>
                <x-ui.alerts variant="info" title="Maintenance Scheduled">
                    System maintenance is scheduled for this Sunday at 2:00 AM.
                </x-ui.alerts>
                <div class="mt-4 pt-4 border-t border-neutral-100 dark:border-neutral-800">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-neutral-500">Server Status</span>
                        <span class="flex items-center gap-2 text-green-600 dark:text-green-400 font-medium">
                            <span class="relative flex h-2.5 w-2.5">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"></span>
                            </span>
                            Operational
                        </span>
                    </div>
                </div>
            </x-ui.card>
        </div>
    </div>
</div>
