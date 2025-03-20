@props(['internship'])

<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ $internship->title  }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{"@" .$internship->company->name  }}</flux:subheading>
    <flux:separator variant="subtle" />
</div>
