<?php


namespace App\Controllers; 

class Sample extends BaseController
{
    public function getindex(): string
    {
        return "Sample Controller123";
    }

    public function getmethod(): string
    {
    return "run method";
    }

    public function getparam($name): string // (1)
    {
    return "param name is " . $name; // (2)
    }

    public function getparam2($name, $age): string // (3)
    {
    return "param name is $name. age is $age"; // (4)
    }

    public function getdefaultparam($name = 'codeigniter 4'): string // (1)
    {
    return "default param name is " . $name;
    }

    public function getshowview(): string
{
    return view("/showView"); // (1)
}

public function getviewdata(): string
{
    $data = ['name' => 'ci4', 'age' => 20]; // (1)
    return view("/viewData.php", $data); // (2)
}

public function getpostform(): string
{
    return View("/postForm");
}

public function postpostinput(): void // (1)
{
    $input_data = $this->request->getPost(); // (2)
    var_export($input_data); // (3)
}

public function getjson_response(): \CodeIgniter\HTTP\Response // (1) (2)
{
    $data = [ // (3)
        'name' => "ci4",
        'type' => "json",
        'age' => "20"
    ];

    $response = $this->response->setJSON($data); // (4)
    return $response; // (5)
}
public function getredirect()
{
    $this->response->redirect("/"); // (1)
}


   
}

