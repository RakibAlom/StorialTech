<?php namespace Options_lib\Fields;

defined('BASEPATH') || exit('Access Denied.');

class Repeater extends Base {
    protected $items;
    protected $fields;

    public function __construct( $key, $field, $dom, $error, $repeater = false ) {
        parent::__construct( $key, $field, $dom, $error, $repeater = false );

        $this->errors = $this->error;
        $this->fields = $this->field['fields'];
        $this->items  = $this->value();

        // foreach($this->items as $i => $item) {
        //     foreach($item as $key => $value) {
        //         $this->items[$i][$key] = addslashes(htmlspecialchars_decode($value, ENT_QUOTES));
        //     }
        // }
    }

    protected function value() {
        $ci = &get_instance();
        $value = $this->dom['value'];

        $data = $ci->input->post('key-' . $this->key);

        if($data && is_array($data)) {
            foreach($data as $index => $arr) {
                foreach($arr as $key => $post_val) {
                    $value[$index][$key] = htmlentities($post_val);
                }
            }
        }

        return $value;
    }

    public function render() { 
        $this->dom['classes'][] = 'mb-2';

        $data = [
            'items'    => $this->items,
            'items_bq' => $this->items,
            'errors' => $this->errors,
            'fields' => $this->fields,
            'key'    => $this->key,
            'title'  => isset($this->field['title']) ? $this->field['title'] : null,
            'dom_id' => $this->key . '-dom',
        ];

        $new_field = [];
        foreach($this->fields as $key => $field) {
            $new_field[$key] = isset($field['default']) ? addslashes($field['default']) : '';
        }

        ?>

        <div id="<?php echo $data['dom_id'] ?>" class="py-2 form-group">
            <div class="d-flex justify-content-between flex-column">
                <label class="form-label"><?php echo $this->field['label'] ?></label>
                <small class="text-muted d-block"><?php echo $this->field['description'] ?></small>
            </div>

            <section x-data="window.bitflanRepeaterApp(<?php echo alpinify($data); ?>)" id="<?php echo $this->key ?>-repeater" class="<?php echo join(' ', $this->dom['classes']) ?>">
                <div class="repeater-blocks-container">
                    <div class="options">
                        <a @click="data.items = [...data.items, <?php echo alpinify($new_field) ?> ]; console.log(data.items); $nextTick(function() { document.getElementById(data.key + '-' + (data.items.length - 1) ).scrollIntoView(); $dispatch('new-index', data.items.length - 1); });" class="btn btn-success"><i data-feather="plus"></i> Add</a>
                    </div>

                    <div class="blocks">
                        <template x-for="(item, index) in data.items" :key="index">
                            <div x-on:sort.window="show = false" x-on:new-index.window="show = index == $event.detail ? true : show" x-data="{ show: false }" :id="data.key + '-' + index" class="repeater-block" x-transition>
                                <div class="repeater-block-header">
                                    <div class="title">
                                        <span x-text="data.title ? data.items[index][data.title] : 'Item #' + (index + 1)"></span>
                                    </div>
                                    <div class="options">
                                        <a x-show="show" @click="show = false" class="btn btn-sm btn-info">Hide</a>
                                        <a x-show="!show" @click="show = true" class="btn btn-sm btn-primary">Show</a>
                                        <a x-show="index > 0" @click="$dispatch('sort', true); moveItemUp(index);" class="btn btn-sm btn-primary">Move Up</a>
                                        <a x-show="index < data.items.length - 1" @click="$dispatch('sort', true); moveItemDown(index);" class="btn btn-sm btn-primary">Move Down</a>
                                        <a @click="deleteItem(index)" class="btn btn-sm btn-danger">Delete</a>
                                    </div>
                                </div>
                                <div x-show="show" class="repeater-block-content">
                                    <?php foreach( $this->fields as $f_key => $f_field ) {
                                        $dom = $this->field_domdata($f_key, $f_field);

                                        \Options_lib\FieldMap::Render( $f_key, $f_field, $dom, null, [
                                            'key' => $this->key
                                        ] );
                                    } ?>
                                </div>
                            </div>
                        </template>

                        <template x-if="!data.items.length">
                            <div class="repeater-block repeater-block-header bg-secondary text-white">
                                <span>There are currently no items. You can create an item using the Add button.</span>
                            </div>
                        </template>
                    </div>
                </div>
            </section>
        </div>

    <?php }

    private function field_domdata( $key, $field ) {
        $classes     = [];
        if( isset( $field['classes'] ) ) {
            if(is_array( $field['classes'] ))
                $classes = $field['classes'];
            else
                $classes = explode(' ', $field['classes']);
        }

        return [
            'id'          => isset( $field['id'] ) ? $field['id'] : 'id-' . $key,
            'placeholder' => isset( $field['placeholder'] ) ? $field['placeholder'] : $field['label'],
            'attributes'  => isset( $field['attributes'] ) ? $field['attributes'] : [],
            'tooltip'     => isset( $field['tooltip'] ) ? $field['tooltip'] : null,
            'classes'     => $classes
        ];
    }

    public static function Validate($key, $field, $ci, $options) {
        $return = [
            'error' => false,
            'errors' => [],
            'value' => []
        ];

        $data = $ci->input->post( 'key-' . $key );

        if( $data && count( $data ) ) {
            $rules = [];

            foreach( $data as $index => $values) {
                foreach($field['fields'] as $f_key => $f_field) {
                    $validation_options = isset($f_field['validation']) ? $f_field['validation'] : [
                        'rules'  => null,
                        'errors' => []
                    ];

                    if( $validation_options['rules'] ) {
                        $rules[] = [
                            'field' => 'key-' . $key . '[' . $index . '][' . $f_key . ']',
                            'label' => $f_field['label'],
                            'rules' => $validation_options['rules'],
                            'errors' => $validation_options['errors']
                        ];
                    }
                }
            }
            
            $res = true;
    
            if(count($rules)) {
                $ci->load->library('form_validation');

                $ci->form_validation->set_rules($rules);
    
                $res = $ci->form_validation->run();
            }

            if($res) {
                foreach($data as $index => $values) {
                    $return['value'][$index] = [];

                    foreach($field['fields'] as $f_key => $f_field) {
                        $result = \Options_lib\FieldMap::Validate( $key . '[' . $index . '][' . $f_key . ']', $f_field, $ci, $options );
                        
                        if( $result['error'] ) {
                            $return['error'] = true;
                            $return['errors'][$f_key . '-' . $index] = $result['errors'];
                        } else {
                            $return['value'][$index][$f_key] = $result['value'];
                        }
                    }
                }

            } else {
                $return['error'] = true;
    
                $errors = $ci->form_validation->error_array();
                $new_errors = [];

                foreach($data as $index => $values) {
                    $return['value'][$index] = [];

                    foreach($field['fields'] as $f_key => $f_field) {
                        if(isset($values[$f_key]))
                            $return['value'][$index][$f_key] = $values[$f_key];
                    }
                }

                foreach($errors as $error) {
                    foreach($data as $index => $keys) {

                        foreach($field['fields'] as $f_key => $f_field) {
                            $new_errors[$f_key . '-' . $index] = isset( $errors['key-' . $key . '[' . $index . '][' . $f_key . ']'] ) ? $errors['key-' . $key . '[' . $index . '][' . $f_key . ']'] : null;
                        }
                    }
                }

                $return['errors'] = $new_errors;
            }
        }

        return $return;
    }
}