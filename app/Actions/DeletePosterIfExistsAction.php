<?php

namespace App\Actions;

use Illuminate\Support\Facades\Storage;

class DeletePosterIfExistsAction
{
    public function handle($poster){
        if(!$poster == NULL)
        {
            Storage::delete($poster);
        }
    }
}