<div class="form-group {{ $errors->has($field_id)?'has-error':'' }}">
    <label class="control-label large">@if (!is_null($theme['theme-key'])) {{ trans($theme['theme-key'] . '::' . $form['#label']) }} @else {{ $form['#label'] }} @endif</label>
    @if ($form['#contentformat'] == App\Content\FieldTypeTextarea::CONTENTFORMAT_TEXT)
        {!! Form::textarea($field_id, '', array('class'=>'form-control input-lg', 'placeholder'=> ((!is_null($theme['theme-key']))?trans($theme['theme-key'] . '::' . $form['#description']):$form['#description']), 'rows' => $form['#rows'], 'maxlength' => $form['#maxlength'])) !!}
    @elseif ($form['#contentformat'] == App\Content\FieldTypeTextarea::CONTENTFORMAT_HTML_TEXT)
				@if (isset($form['#field-group']))
        {!! Form::textarea($field_id, '', array('class'=>'form-control input-lg group-field-type-textarea', 'placeholder'=> ((!is_null($theme['theme-key']))?trans($theme['theme-key'] . '::' . $form['#description']):$form['#description']), 'rows' => $form['#rows'], 'maxlength' => $form['#maxlength'])) !!}
				@else
        {!! Form::textarea($field_id, '', array('class'=>'form-control input-lg field-type-textarea', 'placeholder'=> ((!is_null($theme['theme-key']))?trans($theme['theme-key'] . '::' . $form['#description']):$form['#description']), 'rows' => $form['#rows'], 'maxlength' => $form['#maxlength'])) !!}
				@endif
    @endif
    <span class="info-block">@if (!is_null($theme['theme-key'])) {!! trans($theme['theme-key'] . '::' . $form['#help']) !!} @else {!! $form['#help'] !!} @endif @if ($form['#maxlength'] != App\Content\FieldTypeTextarea::DEFAULT_MAXLENGTH) <span class="label label-warning">{{ trans('template_fields.max') }} {{ $form['#maxlength'] }} {{ trans('template_fields.characters') }}</span> @endif <span class="label label-warning">@if ($form['#contentformat'] == App\Content\FieldTypeTextarea::CONTENTFORMAT_HTML_TEXT) {{ trans('template_fields.formatted_text') }}@else{{ trans('template_fields.plain_text') }}@endif</span> @if ($form['#required'] == true) <span class="label label-danger">{{ trans('template_fields.required') }}</span>@endif</span>
    {!! $errors->has($field_id)?$errors->first($field_id, '<span class="help-block">:message</span>'):'' !!}
</div>


