<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Product Feature Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <dl class="row">
                        <dt class="col-sm-3">Product Name</dt>
                        <dd class="col-sm-9">{{ $feature->product->name }}</dd>

                        <dt class="col-sm-3">Feature Name</dt>
                        <dd class="col-sm-9">{{ $feature->name }}</dd>

                        <dt class="col-sm-3">Feature Value</dt>
                        <dd class="col-sm-9">{{ $feature->value }}</dd>
                    </dl>
                    <a href="{{ route('features.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>