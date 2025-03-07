<?php

namespace App\Traits;

trait HandlesDynamicEntries
{
    protected function addEntry(string $type, array $template){
        if(!property_exists($this, $type)){
            $this->$type = [];
        }

        $this->$type[] = $template;
    }

    protected function removeEntry(string $type, int $index){
        if(isset($this->$type[$index])){

            // Deletes the item in an array
            unset($this->$type[$index]);

            // Fixes the array indexes
            $this->$type = array_values($this->$type);
        }
    }

    protected function removeAllEntries(string $type){
        $this->$type = [];
    }
}
