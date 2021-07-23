@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'border-gray-300 shadow rounded-md focus:ring focus:ring-indigo-300 focus:ring-opacity-50 focus:border-indigo-300']) }}>
