<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-4">Edit User</h2>
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required
                    class="mt-1 p-2 border border-gray-300 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required
                    class="mt-1 p-2 border border-gray-300 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select id="role" name="roles[]" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role }}" {{ in_array($role, $userRole) ? 'selected' : '' }}>
                            {{ $role }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="icon" class="block text-sm font-medium text-gray-700">Icon</label>
                <input type="file" id="icon" name="icon"
                    class="mt-1 p-2 border border-gray-300 rounded w-full">
                @if ($user->avatar)
                    <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}"
                        class="w-20 h-20 object-cover mt-2">
                @endif
            </div>
            <button type="submit" class="text-white bg-blue-600 px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
