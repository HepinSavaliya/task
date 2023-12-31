<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::open(['route' => 'products.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('price', 'Price') !!}
                            {!! Form::number('price', null, ['class' => 'form-control', 'step' => '0.01', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('last_price', 'Last Price') !!}
                            {!! Form::number('last_price', null, ['class' => 'form-control', 'step' => '0.01', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('feature_image', 'Feature Image') !!}
                            {!! Form::file('feature_image', ['class' => 'form-control']) !!}
                        </div>
                        <button class="btn btn-success mt-2">Create</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>