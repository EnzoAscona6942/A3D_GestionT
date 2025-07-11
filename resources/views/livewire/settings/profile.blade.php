<section class="w-full min-h-screen" style="background: url('/fondodash.png') no-repeat center center fixed; background-size: cover;">
    @include('partials.settings-heading')

    <x-settings.layout :heading="'Perfil'" :subheading="'Actualiza tu nombre y correo electrónico'">
        <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">
            <flux:input wire:model="name" label="Nombre" type="text" required autofocus autocomplete="name" />

            <div>
                <flux:input wire:model="email" label="Correo electrónico" type="email" required autocomplete="email" />

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&! auth()->user()->hasVerifiedEmail())
                    <div>
                        <flux:text class="mt-4">
                            Tu correo electrónico no está verificado.
                            <flux:link class="text-sm cursor-pointer" wire:click.prevent="resendVerificationNotification">
                                Haz clic aquí para reenviar el correo de verificación.
                            </flux:link>
                        </flux:text>

                        @if (session('status') === 'verification-link-sent')
                            <flux:text class="mt-2 font-medium !dark:text-green-400 !text-green-600">
                                Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
                            </flux:text>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">Guardar</flux:button>
                </div>

                <x-action-message class="me-3" on="profile-updated">
                    Guardado.
                </x-action-message>
            </div>
        </form>

        <livewire:settings.delete-user-form />
    </x-settings.layout>
</section>
