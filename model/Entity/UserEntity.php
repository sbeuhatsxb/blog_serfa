<?php
namespace Model\Entity;


class UserEntity
{

    private $id;
    private $name;
    private $firstname;
    private $mail;
    private $password;
    private $hash;

    public function hydrate($array){
        empty($array['user_id']) ?: $this->setId($array['user_id']);
        empty($array['user_name']) ?: $this->setName($array['user_name']);
        empty($array['user_firstname']) ?: $this->setFirstname($array['user_firstname']);
        empty($array['user_mail']) ?: $this->setMail($array['user_mail']);
        empty($array['user_pwd']) ?: $this->setPassword($array['user_pwd']);
        empty($array['user_hashed']) ?: $this->setHash($array['user_hashed']);

    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param mixed $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }

}