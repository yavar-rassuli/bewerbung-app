<x-layout>
    @php
        $colors = [
            'open' => 'bg-gray-200 text-gray-800',
            'interview' => 'bg-yellow-100 text-yellow-800',
            'rejected' => 'bg-red-100 text-red-800',
            'offer' => 'bg-green-100 text-green-800',
        ];
        $labels = ['open' => 'Open', 'interview' => 'Interview', 'rejected' => 'Rejected', 'offer' => 'Offer'];
    @endphp

    <h1 class="text-3xl font-bold mb-6">My Job Applications</h1>

    <div class="grid grid-cols-4 gap-4 mb-6">
        @foreach ($stats as $label => $number)
            <div class="bg-white p-4 rounded-lg shadow text-center">
                <p class="text-2xl font-bold">{{ $number }}</p>
                <p class="text-gray-500 text-sm">{{ $label }}</p>
            </div>
        @endforeach
    </div>

    <a href="/applications/create"
       class="inline-block mb-6 px-4 py-2 rounded bg-green-600 text-white">+ New Application</a>

    <ul class="space-y-4">
        @forelse ($applications as $application)
            <li class="bg-white p-4 rounded-lg shadow flex justify-between items-center">
                <div>
                    <p class="font-semibold">{{ $application->title }} at {{ $application->company }}</p>
                    <p class="text-gray-500 text-sm">
                        {{ $application->city }}
                        <span class="ml-2 px-2 py-0.5 rounded text-xs font-semibold {{ $colors[$application->status] }}">
                            {{ $labels[$application->status] }}
                        </span>
                    </p>
                </div>

                <div class="flex gap-2">
                    <a href="/applications/{{ $application->id }}/edit"
                       class="px-3 py-1 rounded bg-blue-600 text-white">Edit</a>

                    <form method="POST" action="/applications/{{ $application->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 rounded bg-red-600 text-white">Delete</button>
                    </form>
                </div>
            </li>
        @empty
            <p class="text-gray-500">No applications yet. 📭</p>
        @endforelse
    </ul>
</x-layout>
