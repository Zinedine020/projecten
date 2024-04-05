<?php

class User
{
    public string $Name;
    public string $Email;
    public string $Password;

    public function HashedPassword() : string
    {
        return password_hash($this->Password, PASSWORD_DEFAULT);
    }

    public function __Construct(string $name, string $email, string $password)
    {
        $this->Name = $name;
        $this->Email = $email;
        $this->Password = $password;

        if (empty($this->Name) || empty($this->Email) || empty($this->Password)) {
            throw new Exception("Fill in all fields.");
        }
    }
}

?>