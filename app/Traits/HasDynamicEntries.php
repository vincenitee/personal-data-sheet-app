<?php

namespace App\Traits;

trait HasDynamicEntries
{
    public function addEntry($field, $defaultValues = []){
        if(!isset($this->$field)){
            $this->$field = [];
        }
        $this->$field[] = $defaultValues;
    }

    public function removeEntry($field, $index){
        if(isset($this->$field[$index])){
            unset($this->$field[$index]);
            $this->$field = array_values($this->$field);
        }
    }

    public function removeAllEntry($field){
        if(isset($this->$field)){
            $this->$field = [];
        }
    }
}
