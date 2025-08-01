@props([
    'onclick' => null,
    'confirm' => 'Apakah kamu yakin ingin melanjutkan?',
])

<button
    type="button"
    {{ $attributes->merge([
        'class' => 'bg-red-600 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-red-300',
        'onclick' => "if(confirm('$confirm')) { $onclick }"
    ]) }}
>
    {{ $slot }}
</button>
