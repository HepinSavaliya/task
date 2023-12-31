<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Product Feature
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
                    {!! Form::model($feature,['route' => ['features.update',$feature->id], 'method' => 'PUT']) !!}
                        <div class="form-group">
                            {!! Form::label('product_id', 'Select Product') !!} 
                            {!! Form::select('product_id',$products,null,['class' => 'form-control','id'=>'product_id', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('value', 'Value') !!}
                            {!! Form::text('value', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <button class="btn btn-success mt-2">Update</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>