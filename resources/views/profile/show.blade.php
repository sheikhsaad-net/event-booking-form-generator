<x-app-layout>
    {{-- Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    {{-- Content --}}
    <div>
        <div class="row">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="col-xl-6 col-lg-6 col-md-12 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            @livewire('profile.update-profile-information-form')
                        </div>
                    </div>
                </div>
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="col-xl-6 col-lg-6 col-md-12 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            @livewire('profile.update-password-form')
                        </div>
                    </div>
                </div>
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="col-xl-6 col-lg-6 col-md-12 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            @livewire('profile.two-factor-authentication-form')
                        </div>
                    </div>
                </div>
            @endif

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <div class="col-xl-6 col-lg-6 col-md-12 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            @livewire('profile.delete-user-form')
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        @livewire('profile.logout-other-browser-sessions-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>