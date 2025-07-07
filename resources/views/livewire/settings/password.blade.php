<section class="w-full min-h-screen" style="background: url('/fondodash.png') no-repeat center center fixed; background-size: cover;">
    @include('partials.settings-heading')

    <x-settings.layout :heading="'Actualizar contraseña'" :subheading="'Asegúrate de usar una contraseña larga y aleatoria para mantener tu cuenta segura'">
        <form wire:submit="updatePassword" class="mt-6 space-y-6">
            <flux:input
                wire:model="current_password"
                label="Contraseña actual"
                type="password"
                required
                autocomplete="current-password"
            />
            <flux:input
                wire:model="password"
                label="Nueva contraseña"
                type="password"
                required
                autocomplete="new-password"
            />
            <flux:input
                wire:model="password_confirmation"
                label="Confirmar contraseña"
                type="password"
                required
                autocomplete="new-password"
            />

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">Guardar</flux:button>
                </div>

                <x-action-message class="me-3" on="password-updated">
                    Guardado.
                </x-action-message>
            </div>
        </form>
    </x-settings.layout>
</section>
