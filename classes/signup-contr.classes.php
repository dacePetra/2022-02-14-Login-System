<?php

class SignupContr extends Signup
{
    private string $uid;
    private string $pwd;
    private string $pwdRepeat;
    private string $email;

    public function __construct($uid, $pwd, $pwdRepeat, $email)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    public function signupUser()
    {
        if($this->emptyInput() == false){
            // echo "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if($this->invalidUid() == false){
            // echo "Invalid username!";
            header("location: ../index.php?error=username");
            exit();
        }
        if($this->invalidEmail() == false){
            // echo "Invalid email!";
            header("location: ../index.php?error=email");
            exit();
        }
        if($this->pwdMatch() == false){
            // echo "Passwords don't match!";
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if($this->uidTakenCheck() == false){
            // echo "User or email taken!";
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }
        $this->setUser($this->uid, $this->pwd, $this->email);

    }

    private function emptyInput(): bool
    {
        if (empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email))
        {
            return false;
        }
        return true;
    }

    private function invalidUid(): bool
    {
        return preg_match("/^[a-zA-Z0-9]*$/", $this->uid);
    }

    private function invalidEmail(): bool
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    private function pwdMatch(): bool
    {
        return $this->pwd===$this->pwdRepeat;
    }

    private function uidTakenCheck(): bool
    {
        return $this->checkUser($this->uid, $this->email);
    }

}