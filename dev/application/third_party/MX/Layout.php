<?php

class Layout extends CI_Parser {

        private $layout = 'main';

        public function set_layout($layout)
        {
                if ( $layout != '' ) {
                        $this->layout = $layout;
                }
        }

        public function parse($template, $data, $return = FALSE)
        {
                // First get the normal parsing
                $data['content'] = parent::parse($template, $data, TRUE);
                
                // Then parse again in the layout, duh !
                return parent::parse('layout/'.$this->layout, $data, $return);
        }
}

/* End of file MY_Parser.php */
/* Location: ./application/libraries/MY_Parser.php */
?>