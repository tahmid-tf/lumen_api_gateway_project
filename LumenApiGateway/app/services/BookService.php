<?php
namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService
{
    use ConsumesExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
    }

    public function obtainBooks(){
        return $this->performRequest('GET','/books');
    }

    public function createBooks($data){
        return $this->performRequest('POST','/books',$data);
    }

    public function showBooks($data){
        return $this->performRequest('GET',"/books/{$data}");
    }

    public function editBooks($data , $id){
        return $this->performRequest('PUT',"/books/{$id}",$data);
    }

    public function deleteBooks($data){
        return $this->performRequest('DELETE',"/books/{$data}");
    }
}
