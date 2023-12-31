<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Products
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('products.create') }}" class="btn btn-success mb-2">Create Product</a>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Last Price</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key => $product)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        @if($product->feature_image)
                                            <img src="{{ asset(Storage::url("products/".$product->feature_image)) }}" alt="image" style="max-width: 50px; max-height: 50px;">
                                        @endif
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->last_price }}</td>
                                    <td>{{ $product->description }}</td>
                                    
                                    <td>
                                        <a href="{{ route('products.show', $product->id) }}" class="text-white btn btn-info btn-sm">View</a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->id],'style'=>"display: inline;"]) !!}
                                            <button type="submit" class="btn btn-danger bg-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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