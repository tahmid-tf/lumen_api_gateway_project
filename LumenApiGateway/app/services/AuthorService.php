<?php
namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService
{
    use ConsumesExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
    }

    public function obtainAuthors(){
        return $this->performRequest('GET','/authors');
    }

    public function createAuthor($data){
        return $this->performRequest('POST','/authors',$data);
    }

    public function showAuthors($data){
        return $this->performRequest('GET',"/authors/{$data}");
    }

    public function editAuthors($data , $id){
        return $this->performRequest('PUT',"/authors/{$id}",$data);
    }

    public function deleteAuthors($data){
        return $this->performRequest('DELETE',"/authors/{$data}");
    }
}
