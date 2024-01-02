<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Product Features
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('features.create') }}" class="btn btn-success mb-2">Create Feature</a>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table" id="data-table">
                        <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Product Name</th>
                                <th>Feature Name</th>
                                <th>Feature Value</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($features as $key => $feature)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $feature->product->name }}</td>
                                    <td>{{ $feature->name }}</td>
                                    <td>{{ $feature->value }}</td>
                                    <td>
                                        <a href="{{ route('features.show', $feature->id) }}" class="text-white btn btn-info btn-sm">View</a>
                                        <a href="{{ route('features.edit', $feature->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['features.destroy', $feature->id],'style'=>"display: inline;"]) !!}
                                            <button type="submit" class="bg-danger btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
