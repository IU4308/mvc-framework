<?php

namespace app\core\form;

class TextareaField extends Basefield
{
    public function renderInput(): string
    {
        return sprintf(
            '<textarea name="%s" class="form-controll %s">%s</textarea>',
            $this->attribute,
            $this->model->hasError($this->attribute) ? 'is-invalid' : '',
            $this->model->{$this->attribute}
        );
    }
}
