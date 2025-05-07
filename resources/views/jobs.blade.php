<x-layout>
    <x-slot:heading>
        JOBS
    </x-slot:heading>
    
    <h2>{{ $jobs['title'] }}</h2>
    <p>This job pays {{ $jobs['salary'] }} per year.</p>
    
</x-layout>