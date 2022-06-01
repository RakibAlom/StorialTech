<?php 

namespace Options_lib\Fields;

defined('BASEPATH') or exit('Access Denied.');

class Image extends Base {
    public function render() {
        $this->dom['classes'][] = 'form-control mb-2';

        ?>
            <div class="py-2 form-group">
                <div class="d-flex justify-content-between">
                    <label class="form-label <?php if($this->error) { echo 'text-danger'; } ?>">
                        <?php echo $this->field['label'];
                        if($this->dom['tooltip']) { ?>
                            <svg x-init="new bootstrap.Popover($el)" style="width: 16px; height: 16px; outline: none; margin-left: 5px;" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" title="<?php echo is_array($this->dom['tooltip']) ? $this->dom['title'] : '' ?>" data-bs-content="<?php echo is_array($this->dom['tooltip']) ? $this->dom['tooltip']['content'] : $this->dom['tooltip'] ?>" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        <?php } ?>
                    </label>
                    
                    <?php if( $this->error ) { ?>
                        <small class="text-danger text-align-right"><?php echo $this->error ?></small>
                    <?php } ?>
                </div>
                
                <div class="image-preview">
                    <img src="<?php echo base_url( $this->dom['value'] ) ?>" />
                </div>

                <input name="key-<?php echo $this->key ?>" id="<?php echo $this->dom['id']; ?>" type="file" class="<?php echo join(' ', $this->dom['classes']) ?>" />
                
                <small class="text-muted d-block"><?php echo $this->field['description'] ?></small>
            </div>
        <?php
    }

    public function repeater_render() {
        $this->dom['classes'][] = 'form-control mb-2';

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
                
                <div class="image-preview">
                    <img :src="item['<?php echo $this->key ?>'] ? '<?php echo base_url() ?>' + item['<?php echo $this->key ?>'] : '<?php echo base_url() ?>' + data.fields['<?php echo $this->key ?>'].default" />
                </div>

                <input :id="'<?php echo $this->dom['id']; ?>' + '-' + index" type="file" :name="'key-<?php echo $this->repeater['key'] ?>[' + index + '][<?php echo $this->key ?>]'" class="<?php echo join(' ', $this->dom['classes']) ?>" />
                
                <small class="text-muted d-block"><?php echo $this->field['description'] ?></small>
            </div>
        <?php
    }

    public static function Validate($key, $field, $ci, $options) {
        $file  = null;
        $index = null;
        $keyr  = null;
        $keyf  = null;

        if (isset($_FILES['key-' . $key])) {
			$file = $_FILES['key-' . $key];
		}

		elseif (($c = preg_match_all('/(?:^[^\[]+)|\[[^]]*\]/', 'key-' . $key, $matches)) > 1) {
            $keyr  = str_replace(['[', ']', 'key-'], '', $matches[0][0]);
            $index = str_replace(['[', ']'], '', $matches[0][1]);
            $keyf  = str_replace(['[', ']'], '', $matches[0][2]);

			$_file = $_FILES;
			for ($i = 0; $i < $c; $i++) {
				if (($x = trim($matches[0][$i], '[]')) === '' OR ! isset($_file[$x]))
				{
					$_file = NULL;
					break;
				}

				$file = $_file[$x];
			}
		}

        $return = [
            'error' => false,
            'errors' => [],
            'value' => $options->get($key) // Default Value
        ];

        $is_repeater = false;

        if($keyr && $keyf && \is_numeric($index)) {
            $is_repeater = true;

            $value = $options->get($keyr);
            if(isset($value[$index][$keyf])) {
                $return['value'] = $value[$index][$keyf];
            } else {
                $return['value'] = $field['default'];
            }
        }

        $name     = is_array($file['name']) ? $file['name'][$index][$keyf] : $file['name'];
        $type     = is_array($file['type']) ? $file['type'][$index][$keyf] : $file['type'];
        $error    = is_array($file['error']) ? $file['error'][$index][$keyf] : $file['error'];
        $size     = is_array($file['size']) ? $file['size'][$index][$keyf] : $file['size'];
        $tmp_name = is_array($file['tmp_name']) ? $file['tmp_name'][$index][$keyf] : $file['tmp_name'];

        if( file_exists($tmp_name) && is_uploaded_file($tmp_name) ) {
            $_FILES['currfile']['name']     = $name;
            $_FILES['currfile']['type']     = $type;
            $_FILES['currfile']['tmp_name'] = $tmp_name;
            $_FILES['currfile']['error']    = $error;
            $_FILES['currfile']['size']     = $size;

            $config = isset( $field['config'] ) ? $field['config'] : [
                'upload_path'   => 'uploads/',
                'allowed_types' => 'gif|jpg|png|svg',
                'config'        => 4096,
                'encrypt_name'  => true,
                'remove_spaces' => TRUE
            ];

            $upload_path = rtrim($config['upload_path'], '/') . '/';
            $config['upload_path'] = FCPATH . $upload_path;

            $ci->load->library('upload', $config);

            if( ! $ci->upload->do_upload( 'currfile' ) ) {
                $return['error']  = true;
                $return['errors'] = $ci->upload->display_errors('', '');
            } else {
                $return['value'] = $upload_path . $ci->upload->data()['file_name'];
            }
        }

        return $return;
    }

    public static function BeforeSave($value, $key, $field, $options, $ci) {
        if( $options->get($key) && file_exists( FCPATH . $options->get($key) ) && strpos($options->get($key), 'default/') === false ) {
            if(unlink( FCPATH . $options->get($key) ));
        }

        return $value;
    }
}