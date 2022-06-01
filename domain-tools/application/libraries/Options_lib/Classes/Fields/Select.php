<?php 

namespace Options_lib\Fields;

defined('BASEPATH') or exit('Access Denied.');

class Select extends Base {
    protected function value($val) {
        return \Options_lib\FormValidator::GetSelect(
            $this->key,
            $val,
            $this->dom['value']
        );
    }

    public function render() {
        $this->dom['classes'][] = 'form-control';
        if( $this->error )
            $this->dom['classes'][] = 'is-invalid';

        $attrs = [];
        foreach($this->dom['attributes'] as $key => $val) {
            $attrs[] = $key . '="' . $val . '"';
        }

        ?>
            <div class="py-2 form-group">
                <div class="d-flex justify-content-between">
                    <label class="form-label">
                        <?php echo $this->field['label'];
                        if($this->dom['tooltip']) { ?>
                            <svg x-init="new bootstrap.Popover($el)" style="width: 16px; height: 16px; outline: none; margin-left: 5px;" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" title="<?php echo is_array($this->dom['tooltip']) ? $this->dom['title'] : '' ?>" data-bs-content="<?php echo is_array($this->dom['tooltip']) ? $this->dom['tooltip']['content'] : $this->dom['tooltip'] ?>" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        <?php } ?>
                    </label>
                    <?php if( $this->error ) { ?>
                        <small class="text-danger text-align-right"><?php echo $this->error ?></small>
                    <?php } ?>
                </div>
                <select class="<?php echo join( ' ', $this->dom['classes'] ); ?>" id="<?php echo $this->dom['id']; ?>" name="key-<?php echo $this->key; ?>" <?php echo join(' ', $attrs); ?>>
                    <?php foreach($this->field['choices'] as $value => $label) { ?>
                        <option value="<?php echo $value ?>" <?php echo $this->value($value) ?>><?php echo $label ?></option>
                    <?php } ?>
                </select>
                <small class="text-muted"><?php echo $this->field['description'] ?></small>
            </div>
        <?php
    }

    public function repeater_render() {
        $this->dom['classes'][] = 'form-control';
        if( $this->error )
            $this->dom['classes'][] = 'is-invalid';

        $attrs = [];
        foreach($this->dom['attributes'] as $key => $val) {
            $attrs[] = $key . '="' . $val . '"';
        }

        ?>
            <div class="py-2 form-group">
                <div class="d-flex justify-content-between">
                    <label class="form-label">
                        <?php echo $this->field['label'];
                        if($this->dom['tooltip']) { ?>
                            <svg x-init="new bootstrap.Popover($el)" style="width: 16px; height: 16px; outline: none; margin-left: 5px;" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" title="<?php echo is_array($this->dom['tooltip']) ? $this->dom['title'] : '' ?>" data-bs-content="<?php echo is_array($this->dom['tooltip']) ? $this->dom['tooltip']['content'] : $this->dom['tooltip'] ?>" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        <?php } ?>
                    </label>
                    <template x-if="data.errors && data.errors['<?php echo $this->key ?>-' + index]">
                        <small x-text="data.errors['<?php echo $this->key ?>-' + index]" class="text-danger text-align-right"></small>
                    </template>
                </div>
                
                <select x-model="data.items[index]['<?php echo $this->key ?>']" class="<?php echo join( ' ', $this->dom['classes'] ); ?>" x-bind:class="(data.errors && data.errors['<?php echo $this->key ?>-' + index]) && 'is-invalid'" :id="'<?php echo $this->dom['id']; ?>' + '-' + index" :name="'key-<?php echo $this->repeater['key'] ?>[' + index + '][<?php echo $this->key ?>]'" <?php echo join(' ', $attrs); ?>>
                <?php foreach($this->field['choices'] as $value => $label) { ?>
                    <option :id="'<?php echo $value; ?>' + '-' + index" :selected="item['<?php echo $this->key ?>'] == '<?php echo $value ?>'" value="<?php echo $value ?>"><?php echo $label ?></option>
                <?php } ?>
                </select>

                <small class="text-muted"><?php echo $this->field['description'] ?></small>
            </div>
        <?php
    }
}