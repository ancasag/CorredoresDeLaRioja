<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRiojaInfraestructure\InMemoryRepository;
use App\CorredoresRiojaDomain\Model\Participante;
use App\CorredoresRiojaDomain\Model\Carrera;
use App\CorredoresRiojaDomain\Model\Corredor;
use App\CorredoresRiojaDomain\Model\Organizacion;
use App\CorredoresRiojaDomain\Repository\IParticipanteRepository;
use App\CorredoresRiojaDomain\Repository\IOrganizacionRepository;
/**
 * Description of InMemoryParticipanteRepository
 *
 * @author Ángela
 */
class InMemoryParticipanteRepository implements IParticipanteRepository{
    //put your code here
    private $participantes;
   
    public function __construct() {
        //($id, $nombre, $descripcion, $fechaCelebracion, $distancia, $fechaLimiteInscripcion, $numeroMaximoParticipantes, $imagen,$organizacion
        $corredor2= new Corredor(1662596," Maria" , "Casado", "macasag@unirioja.es", "pepitoGrillo", "calle" , 17/10/2017);
        $corredor=new Corredor(1662598," Angela" , "Casado", "ancasag@unirioja.es", "pepitoGrillo", "calle" , 17/10/2017);
        $organizacion1=new Organizacion(1662598, "Dapi" , "Casado", "ancasag@unirioja.es", "pepitoGrillo");
        $organizacion2= new Organizacion(1, "Matute" , "Casado", "ac@unirioja.es", "pepitoGrillo");
        $carrera=new Carrera(2, "primeraCarrera" , "primeracarreradelaño", 17/10/2017, 10,17/10/2017,10,"foto", $organizacion1);
        $carrera2 = new Carrera(6, "CarreraMatute" , "Segundacarreradelaño", 17/11/2017, 10,15/11/2017,10,"matutrail.jpg", $organizacion2);
        $this ->participantes[] = new Participante($corredor, $carrera,2, new \DateTime("01:30:15"));
        $this ->participantes[] = new Participante($corredor2, $carrera2,2, new \DateTime("01:29:15"));
        
    }
    public function anadirParticipante(Corredor $corredor, Carrera $carrera){
        $this ->participantes[] = new Participante($corredor, $carrera);
    }
    public function listaParticiopantes(): array{
        return $this->participantes;
    }
    public function listaParticipantes(Carrera $carrera):array{
        $lista=[];
         foreach ($this->participantes as $key => $value) {
            if ($value->getCarrera()->getId() == $carrera->getId()) {
                $lista[]= $value;
            }
        }
        return($lista);
    }
    public function listaCarreraDisputadasCorredor(Corredor $corredor):array{
        $lista=[]; 
        foreach ($this->carreras as $key => $value) {
            if (($value->getFechaCelebracion()->format("Y-m-d") >= (new \Datetime("now"))->format("Y-m-d")) && ($value->getDni == $corredor->getDni())) {
                return($this->organizaciones[$key]);
            $lista[]= $value;
            }
        }
        return($lista);
    }
    public function listaCarreraNoDisputadasCorredor(Corredor $corredor):array{
        $lista;
        foreach ($this->carreras as $key => $value) {
            if (($value->getFechaCelebracion()->format("Y-m-d")< (new \Datetime("now"))->format("Y-m-d")) && ($value->getDni == $corredor->getDni())) {
                $lista[]= $value;
            }
        }
        return($lista);
    }
    public function comprobarParticipanteCarrera(Corredor $corredor, Carrera $carrera): bool{
        foreach ($this->carreras as $key => $value) {
            if ($value->getId() == $carrera->getId() && $value->getDni == $corredor->getDni()) {
                return($this->organizaciones[$key]);
            }
        }
    }
    public function actualizarTiempoParticipante(float $tiempo, Corredor $corredor){
        foreach ($this->participantes as $key => $value) {
            if ($value->getId() == $corredor>getId()) {
                $this->participantes[$key]->asignarMarca($tiempo);
            }
        }

    }
    public function eliminarParticipante(Participante $participante){
        foreach ($this->participantes as $key => $value) {
            if ($value->getId() == $participante>getId()) {
                unset($this->participantes[$key]);
            }
        }
    }
}
