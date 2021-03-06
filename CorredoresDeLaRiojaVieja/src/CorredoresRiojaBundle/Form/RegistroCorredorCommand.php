<?php
namespace CorredoresRiojaBundle\Form;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Description of RegistroCorredorCommand
 *
 * @author master
 */
class RegistroCorredorCommand {
    //put your code here
    /**
     * @Assert\NotBlank()
     */
    private $dni;
    /**
     * @Assert\NotBlank()
     */
    private $nombre;
    /**
     * @Assert\NotBlank()
     */
    private $apellidos;
    
    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;
    
    /**
     * @Assert\NotBlank()
     */
    private $password;
    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    private $fechanacimiento;
    
    /**
     * @Assert\NotBlank()
     */
    private $direccion;
    function getDni() {
        return $this->dni;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getFechanacimiento() {
        return $this->fechanacimiento;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setFechanacimiento($fechanacimiento) {
        $this->fechanacimiento = $fechanacimiento;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }


}
