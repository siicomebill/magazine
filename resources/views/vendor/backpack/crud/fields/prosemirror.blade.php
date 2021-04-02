<!-- field_type_name -->
@include('crud::fields.inc.wrapper_start')
    <label>{!! $field['label'] !!}</label>
    <div id="editor"></div>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
@include('crud::fields.inc.wrapper_end')

@if ($crud->fieldTypeNotLoaded($field))
    @php
        $crud->markFieldTypeAsLoaded($field);
    @endphp

    {{-- FIELD EXTRA CSS  --}}
    {{-- push things in the after_styles section --}}
    @push('crud_fields_styles')
        <!-- no styles -->
    @endpush

    {{-- FIELD EXTRA JS --}}
    {{-- push things in the after_scripts section --}}
    @push('crud_fields_scripts')
        <script src="https://unpkg.com/vue"></script>
        <script src="https://unpkg.com/vue-publisher"></script>
        
        <script>
            const app = new Vue({
                el: '#editor',
                data: {
                    content: {},
                },
                components: {
                    Editor: Publisher.Publisher
                },
                template: "<Editor v-model='content'/>"
            });
        </script>
    @endpush
@endif