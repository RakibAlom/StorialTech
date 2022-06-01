<?php 

namespace Options_lib;

defined('BASEPATH') || exit('Access Denied.');

class FormRenderer {
    private $ci;
    private $options;
    private $current;

    public function __construct( $instance ) {
        $this->options = $instance;
        $this->current = $instance->current;
    }

    public function start() {
        ?>
            <form method="POST" id="options-<?php echo $this->current['key'] ?>" <?php echo $this->options->multipart ? 'enctype="multipart/form-data"' : '' ?>>
        <?php

        foreach( $this->current['fields'] as $key => $field ) {
            if( isset( $field['before_html'] ) )
                echo $field['before_html'];

            $dom   = $this->_get_domdata($key, $field);
            $error = $this->options->validation->error( $key );

            FieldMap::Render( $key, $field, $dom, $error );

            if( isset( $field['after_html'] ) )
                echo $field['after_html'];
        }

        $this->_render_submit();

        ?>
            </form>
        <?php
    }

    private function _get_domdata($key, $field) {
        $classes     = [];
        if( isset( $field['classes'] ) ) {
            if(is_array( $field['classes'] ))
                $classes = $field['classes'];
            else
                $classes = explode(' ', $field['classes']);
        }

        return [
            'value'       => $this->options->get($key),
            'id'          => isset( $field['id'] ) ? $field['id'] : 'id-' . $key,
            'placeholder' => isset( $field['placeholder'] ) ? $field['placeholder'] : $field['label'],
            'attributes'  => isset( $field['attributes'] ) ? $field['attributes'] : [],
            'tooltip'     => isset( $field['tooltip'] ) ? $field['tooltip'] : null,
            'classes'     => $classes
        ];
    }

    private function _render_submit() {
        ?>
            <div class="py-2 form-group">
                <input type="hidden" name="key-submit" value="true" />
                <input type="hidden" name="form-key" value="<?php echo $this->current['key'] ?>" />

                <button class="btn btn-primary btn-lg" type="submit">Submit</button>
            </div>
        <?php
    }
}