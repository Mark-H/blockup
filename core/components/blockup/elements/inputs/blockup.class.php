<?php
class blockupInput extends cbBaseInput {
    public $defaultIcon = 'code';
    public $defaultTpl = '[[+value]]';
    
    /**
     * Process this field based on its template and the received data.
     *
     * @param cbField $field
     * @param array $data
     * @return mixed
     */

    public function getFieldProperties() {
        return array(
            array(
                'key' => 'crop',
                'fieldLabel' => $this->modx->lexicon('blockup.crop'),
                'xtype' => 'textfield',
                'value' => 'free',
                'description' => $this->modx->lexicon('blockup.crop.description')
            ),
            array(
                'key' => 'tab_file',
                'fieldLabel' => $this->modx->lexicon('blockup.tab_file'),
                'xtype' => 'contentblocks-combo-boolean',
                'default' => '1',
                'description' => $this->modx->lexicon('blockup.tab_file.description')
            ),
            array(
                'key' => 'tab_camera',
                'fieldLabel' => $this->modx->lexicon('blockup.tab_camera'),
                'xtype' => 'contentblocks-combo-boolean',
                'default' => '1',
                'description' => $this->modx->lexicon('blockup.tab_camera.description')
            ),
            array(
                'key' => 'tab_url',
                'fieldLabel' => $this->modx->lexicon('blockup.tab_url'),
                'xtype' => 'contentblocks-combo-boolean',
                'default' => '1',
                'description' => $this->modx->lexicon('blockup.tab_url.description')
            ),
            array(
                'key' => 'tab_facebook',
                'fieldLabel' => $this->modx->lexicon('blockup.tab_facebook'),
                'xtype' => 'contentblocks-combo-boolean',
                'default' => '1',
                'description' => $this->modx->lexicon('blockup.tab_facebook.description')
            ),
            array(
                'key' => 'tab_gdrive',
                'fieldLabel' => $this->modx->lexicon('blockup.tab_gdrive'),
                'xtype' => 'contentblocks-combo-boolean',
                'default' => '1',
                'description' => $this->modx->lexicon('blockup.tab_gdrive.description')
            ),
            array(
                'key' => 'tab_dropbox',
                'fieldLabel' => $this->modx->lexicon('blockup.tab_dropbox'),
                'xtype' => 'contentblocks-combo-boolean',
                'default' => '1',
                'description' => $this->modx->lexicon('blockup.tab_dropbox.description')
            ),
            array(
                'key' => 'tab_instagram',
                'fieldLabel' => $this->modx->lexicon('blockup.tab_instagram'),
                'xtype' => 'contentblocks-combo-boolean',
                'default' => '1',
                'description' => $this->modx->lexicon('blockup.tab_instagram.description')
            ),
            array(
                'key' => 'tab_evernote',
                'fieldLabel' => $this->modx->lexicon('blockup.tab_evernote'),
                'xtype' => 'contentblocks-combo-boolean',
                'default' => '1',
                'description' => $this->modx->lexicon('blockup.tab_evernote.description')
            ),
            array(
                'key' => 'tab_flickr',
                'fieldLabel' => $this->modx->lexicon('blockup.tab_flickr'),
                'xtype' => 'contentblocks-combo-boolean',
                'default' => '1',
                'description' => $this->modx->lexicon('blockup.tab_flickr.description')
            ),
            array(
                'key' => 'tab_skydrive',
                'fieldLabel' => $this->modx->lexicon('blockup.tab_skydrive'),
                'xtype' => 'contentblocks-combo-boolean',
                'default' => '1',
                'description' => $this->modx->lexicon('blockup.tab_skydrive.description')
            ),
            array(
                'key' => 'tab_box',
                'fieldLabel' => $this->modx->lexicon('blockup.tab_box'),
                'xtype' => 'contentblocks-combo-boolean',
                'default' => '1',
                'description' => $this->modx->lexicon('blockup.tab_box.description')
            ),
            array(
                'key' => 'tab_vk',
                'fieldLabel' => $this->modx->lexicon('blockup.tab_vk'),
                'xtype' => 'contentblocks-combo-boolean',
                'default' => '1',
                'description' => $this->modx->lexicon('blockup.tab_vk.description')
            )
        );
    }

    public function getName() {
        //$this->modx->log(modX::LOG_LEVEL_ERROR,"getName\n");
        return $this->modx->lexicon('blockup.input_name');
    }
    
    public function getDescription() {
        //$this->modx->log(modX::LOG_LEVEL_ERROR,"getDescription\n");
        return 'With Blockup you can insert ContentBlocks images using Uploadcare.'; 
        // return $this->modx->lexicon('blockup.input_description');
    }

    /**
     * @return array
     */
    public function getJavaScripts() {
        $assetsUrl = $this->modx->getOption('blockup.assets_url', null, MODX_ASSETS_URL . 'components/blockup/');
        //$this->modx->log(modX::LOG_LEVEL_ERROR,"getJavaScripts\n");
        return array(
            $assetsUrl . 'js/inputs/blockup.js'
        );
    }

    /**
     * @return array
     */
    public function getTemplates() {
        //$this->modx->log(modX::LOG_LEVEL_ERROR,"getTemplates\n");
        $tpls = array();
        
        // Grab the template from a .tpl file
        $corePath = $this->modx->getOption('blockup.core_path', null, MODX_CORE_PATH . 'components/blockup/');
        $template = file_get_contents($corePath . 'templates/blockup.tpl');
        
        // Wrap the template, giving the input a reference of "blockup", and
        // add it to the returned array.
        $tpls[] = $this->contentBlocks->wrapInputTpl('blockup', $template);
        return $tpls;
    }
}