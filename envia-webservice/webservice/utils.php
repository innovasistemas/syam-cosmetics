<?php
// Función para encontrar un elemento en un array (vector) y devolver la posición
function findElement($arrayData, $data)
{
    $intPosition = -1;
    $index = 0;
    while($index < count($arrayData) && $intPosition == -1){
        if($arrayData[$index] === $data){
            $intPosition = $index;
        }else{
            ++$index;
        }
    }
    return $intPosition;
}


// Función para eliminar un elemento de un array y quitar la última posición
// del array una vez reacomodados los elementos
function removeElement(&$arrayProduct = array(), &$arrayQuantity = array(), $intPosition = -1)
{
    for($i = $intPosition; $i < count($arrayProduct) - 1; $i++){
        $arrayProduct[$i] = $arrayProduct[$i + 1];
        $arrayQuantity[$i] = $arrayQuantity[$i + 1];
    }
    array_pop($arrayProduct);
    array_pop($arrayQuantity);
}


function removeRepeatItems(&$arrayProduct = array(), &$arrayQuantity = array(), $position, $value)
{
    $index = $position + 1;
    while($index < count($arrayProduct)){
        if($arrayProduct[$index] == $value){
            removeElement($arrayProduct, $arrayQuantity, $index);
        }else{
            $index++;
        }
    }
}

               
// Función para sumar las cantidades de un mismo producto en un despacho
function sumProductQuantity($arrayProduct = array(), $arrayQuantity = array(), $value)
{
    $sumQuantity = 0;
    foreach($arrayProduct as $key => $productValue){
        if($productValue == $value){
            $sumQuantity += $arrayQuantity[$key];
        }
    }
    return $sumQuantity;
}