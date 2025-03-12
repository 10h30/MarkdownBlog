<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700']) }}>
    {{ $slot }}
</button>
