<?php 
class Reserva{
  public $id_reserva;
  public $fecha_inicio;
  public $fecha_fin;
  public $num_personas;
  public $id_mesa;
 public function __construct($id,$fecha_inicio,$fecha_fin,$num_personas,$id_mesa){
    $this->id_reserva=$id;
    $this->fecha_inicio=$fecha_inicio;
    $this->fecha_fin=$fecha_fin;
    $this->num_personas=$num_personas;
    $this->id_mesa=$id_mesa;
 }

}