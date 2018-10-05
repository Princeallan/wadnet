@push('js')
    <script src="{{ asset('components/ckeditor/ckeditor.js') }}"></script>
@endpush

@component('core::admin._buttons-form', ['model' => $model])
@endcomponent

{!! BootForm::hidden('id') !!}

@include('files::admin._files-selector')

@include('core::form._title-and-slug')
<div class="form-group">
    {!! TranslatableBootForm::hidden('status')->value(0) !!}
    {!! TranslatableBootForm::checkbox(__('Published'), 'status') !!}
</div>
{!! BootForm::textarea(__('Quote'), 'quote')->rows(4) !!}
{!! BootForm::text(__('Author Title'), 'author_title') !!}
{!! BootForm::textarea(__('Author Story'), 'author_content')->addClass('ckeditor') !!}
{!! BootForm::text(__('Magazine Title'), 'magazine_title')!!}
{!! BootForm::textarea(__('Magazine Story'), 'magazine_content')->addClass('ckeditor') !!}
