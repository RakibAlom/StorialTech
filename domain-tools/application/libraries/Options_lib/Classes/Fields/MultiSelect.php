<?php 

namespace Options_lib\Fields;

defined('BASEPATH') or exit('Access Denied.');

class MultiSelect extends Base {
    public function render() {
        $this->dom['classes'][] = 'form-check-input';

        ?>
            <div class="py-2 form-group">
                <div class="d-flex justify-content-between">
                    <label for="<?php echo $this->dom['id'] ?>" class="form-label <?php if($this->error) { echo 'text-danger'; } ?>">
                    <?php echo $this->field['label'];
                        if($this->dom['tooltip']) { ?>
                            <svg x-init="new bootstrap.Popover($el)" style="width: 16px; height: 16px; outline: none; margin-left: 5px;" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" title="<?php echo is_array($this->dom['tooltip']) ? $this->dom['title'] : '' ?>" data-bs-content="<?php echo is_array($this->dom['tooltip']) ? $this->dom['tooltip']['content'] : $this->dom['tooltip'] ?>" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        <?php } ?>
                    </label>
                    <?php if( $this->error ) { ?>
                        <small class="text-danger text-align-right"><?php echo $this->error ?></small>
                    <?php } ?>
                </div>
                <small class="text-muted d-block"><?php echo $this->field['description'] ?></small>

                <div class="my-3 choices">
                <?php foreach( $this->field['choices'] as $keyf => $label ) { ?>

                    <div class="px-4 py-2 mt-2 rounded shadow-lg choice bg-light">

                        <div class="form-check form-switch">
                            <label for="<?php echo $this->dom['id'] . '-' . $keyf; ?>" class="form-check-label"><?php echo $label ?></label>
                            <input id="<?php echo $this->dom['id'] . '-' . $keyf; ?>" class="<?php echo join( ' ', $this->dom['classes'] ); ?>"  <?php if( is_array($this->dom['value']) && in_array( $keyf, $this->dom['value'] ) ) { echo 'checked'; } ?> name="key-<?php echo $this->key; ?>[]" value="<?php echo $keyf ?>" type="checkbox">
                        </div>

                    </div>

                <?php } ?>
                </div>
            </div>
        <?php
    }

    public function repeater_render() {
        $this->dom['classes'][] = 'form-check-input';

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
                <small class="text-muted d-block"><?php echo $this->field['description'] ?></small>

                <div class="my-3 choices">
                <?php foreach( $this->field['choices'] as $keyf => $label ) { ?>

                    <div class="px-4 py-2 mt-2 rounded shadow-lg choice bg-light">

                        <div class="form-check form-switch">
                            <label :for="'<?php echo $this->dom['id'] . '-' . $keyf; ?>-' + index" class="form-check-label"><?php echo $label ?></label>
                            <input x-model="data.items[index]['<?php echo $this->key ?>']" :id="'<?php echo $this->dom['id'] . '-' . $keyf; ?>-' + index" class="<?php echo join( ' ', $this->dom['classes'] ); ?>"  :checked="item['<?php echo $this->key ?>'].length && item['<?php echo $this->key ?>'].includes('<?php echo $keyf ?>')" :name="'key-<?php echo $this->repeater['key'] ?>[' + index + '][<?php echo $this->key ?>][]'" value="<?php echo $keyf ?>" type="checkbox">
                        </div>

                    </div>

                <?php } ?>
                </div>
            </div>
        <?php
    }

    public static function Validate($key, $field, $ci, $options) {
        $return = [
            'error' => false,
            'errors' => [],
            'value' => []
        ];

        $values = $ci->input->post( 'key-' . $key );

        if(is_array($values)) {
            foreach( $values as $value ) {
                if( !isset($field['choices'][$value]) ) {
                    $return['error'] = true;
                    $return['errors'] = 'Illegal Value Provided.';
                }
            }

            $return['value'] = $values && !is_null($values) ? $values : [];
        }

        return $return;
    }
}