<x-layout>
    <h1 class="text-3xl font-bold mb-6">New Application</h1>

    <form method="POST" action="/applications" class="bg-white p-6 rounded-lg shadow space-y-4">
        @csrf

        @foreach (['title' => 'Position', 'company' => 'Company', 'city' => 'City'] as $field => $label)
            <div>
                <label for="{{ $field }}" class="block font-semibold mb-1">{{ $label }}</label>
                <input id="{{ $field }}" name="{{ $field }}" value="{{ old($field) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2">
                @error($field)
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        @endforeach

        <div>
            <label for="status" class="block font-semibold mb-1">Status</label>
            <select id="status" name="status" class="w-full border border-gray-300 rounded px-3 py-2">
                @foreach (['open' => 'Open', 'interview' => 'Interview', 'rejected' => 'Rejected', 'offer' => 'Offer'] as $value => $text)
                    <option value="{{ $value }}" @selected(old('status') === $value)>{{ $text }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="px-4 py-2 rounded bg-green-600 text-white">Save</button>
        <a href="/applications" class="ml-2 text-gray-600">Cancel</a>
    </form>
</x-layout>
