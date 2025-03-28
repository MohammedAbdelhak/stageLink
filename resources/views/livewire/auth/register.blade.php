<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">

            
        <flux:select wire:model="type"  :label="__('Type')" placeholder="Choose Role...">
            <flux:select.option >Student</flux:select.option>
            <flux:select.option>University</flux:select.option>
            <flux:select.option  >Company</flux:select.option>
           
        </flux:select>

        <flux:input wire:model="firstname" :label="__('FirstName')" type="text" required autofocus
            autocomplete="firstname" :placeholder="__('First name')" />
        <flux:input wire:model="lastname" :label="__('LastName')" type="text" required autofocus
            autocomplete="lastname" :placeholder="__('Last name')" />

        <!-- Email Address -->
        <flux:input wire:model="email" :label="__('Email address')" type="email" required autocomplete="email"
            placeholder="email@example.com" />

        <flux:input wire:model="phone" :label="__('Phone number')" required autocomplete="phone"
            placeholder="05XX-XX-XX-XX" mask="09-99-99-99-99" value="213" />

        <!-- Password -->
        <flux:input wire:model="password" :label="__('Password')" type="password" required autocomplete="new-password"
            :placeholder="__('Password')" />

        <!-- Confirm Password -->
        <flux:input wire:model="password_confirmation" :label="__('Confirm password')" type="password" required
            autocomplete="new-password" :placeholder="__('Confirm password')" />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>
