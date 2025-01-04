<?php
use Illuminate\Support\Str;

function upload($image, string $folder){

    // dd($image);

    $imageName = Str::uuid().'.'.$image->getClientOriginalExtension();
    $destinationPath = public_path($folder);

    // Mover o arquivo para o diretório de destino
    $image->move($destinationPath, $imageName);

    return $folder.'/'.$imageName;
}