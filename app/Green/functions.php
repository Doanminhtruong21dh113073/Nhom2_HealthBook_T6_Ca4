<?php 

function dequy($category,$parent=0,$str="--|"){
    foreach ($category as $key=>$val){
        if($val->parent==$parent){
            echo '<li>'.$str.$val->name.'</li>';
            unset($category[$key]);
            dequy($category,$val->id,$str."--|");
        }
    }
}

?>
