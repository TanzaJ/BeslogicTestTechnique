<?php
namespace Controllers;

class BaseController{
    /**
     * allows you to send messages to the front-end console
     *
     * @param [type] $data
     * @return
     */
    public function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}

?>