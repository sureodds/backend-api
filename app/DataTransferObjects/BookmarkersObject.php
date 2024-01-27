<?php


namespace App\DataTransferObjects;
use Spatie\LaravelData\Data;

class BookmarkersObject extends Data
{
    public string $name;


    public function __construct(array $data)
    {
        //parent::__construct($data);
        dd($data);
        return new self([
            'name' => $data['name']
        ]);

    }
}
