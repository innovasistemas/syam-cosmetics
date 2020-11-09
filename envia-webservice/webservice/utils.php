<?php
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


function removeElement(&$arrayProduct, &$arrayQuantity, &$arrayQuantityAux, $intPosition)
{
    for($i = $intPosition; $i < count($arrayProduct) - 1; $i++){
        $arrayProduct[$i] = $arrayProduct[$i + 1];
        $arrayQuantity[$i] = $arrayQuantity[$i + 1];
        $arrayQuantity[$i] = $arrayQuantityAux[$i + 1];
    }
}


function removeRepeatItems(&$arrayProduct, &$arrayQuantity,  &$arrayQuantityAux)
{
    $i = 0;
    while($i < count($arrayProduct)){
        $intPosition = findElement($arrayProduct, $arrayProduct[$i]);
        if($intPosition != $i && $intPosition > -1){
            removeElement($arrayProduct, $arrayQuantity, $arrayQuantityAux, $intPosition);
            array_pop($arrayProduct);
            array_pop($arrayQuantity);
            array_pop($arrayQuantityAux);
        }else{
            ++$i;
        }
    }
}


