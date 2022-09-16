<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class PosterService
{
    public function deletePosterIfExists($poster)
    {
        if(!$poster == NULL)
        {
            Storage::delete($poster);
        }
    }

    public function addPoster($request)
    {
        if($request->hasFile('poster')) {
            return $request->file('poster')->store('public');
        }
    }

    public function changePoster($request, $poster)
    {
        
        if ($request->hasFile('poster')) {

            $this->deletePosterIfExists($poster);

            return $request->file('poster')->store('public');
        }
        return $poster;
    }
}