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
                       
                        <h4 class="mt-2">Add Feature</h4>
                        <div class="repeater">
                            <a class="btn btn-success mb-2" data-repeater-create="" onclick="addRow()">Add More feature</a>
                            <table id="dynamicTable" data-repeater-list="features">
                                <thead>
                                    <th>Name</th>
                                    <th>Value</th>
                                    <th>Action</th>
                                </thead>
                                <tbody data-repeater-item>
                                    <tr>
                                        <td width="30%">
                                            {!! Form::text('name', null, ['class' => 'form-control', ]) !!}
                                        </td>
                                        <td>
                                            {!! Form::text('value', null, ['class' => 'form-control',]) !!}
                                        </td>
                                        <td>
                                            <a class="btn btn-danger text-white" data-repeater-delete>delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button class="btn btn-success mt-2">Create</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="{{ asset('js/jquery.repeater.min.js') }}"></script>
<script>
    $(document).ready(function () {
        var selector = "body";
        if ($(selector + " .repeater").length) {
            var $repeater = $(selector + ' .repeater').repeater({
                initEmpty: false,
                defaultValues: {
                    'status': 1
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                        $(this).remove();
                    }
                },
                isFirstItemUndeletable: true
            });

            var value = $(selector + " .repeater").data('value');
            if (typeof value !== 'undefined' && value.length !== 0) {
                value = JSON.parse(value);
                $repeater.setList(value);
            }
        }
    });
</script>