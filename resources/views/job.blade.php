<x-layout>
    <x-slot:heading>
        JOb Listing
    </x-slot:heading>
    
    <div class="space-y-4">
        @foreach($jobs as $job)

            <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline block px-4 py-6 border border-gray-200 rounded-lg" >
                <li>{{ $job['title'] }}:Pays {{ $job['salary'] }} per year.</li>
            </a>    
        @endforeach

        <form method="POST" action="/logout">

            @csrf
            <Button type="submit">LOG OUT</Button>

        </form>


    </div>
   

    
</x-layout>