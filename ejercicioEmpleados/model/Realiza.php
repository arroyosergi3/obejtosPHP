<?php
class Realiza{
    private $email;
    private $idTarea;
    private $horas;
    
     public function __construct($em, $id, $ho) {
         $this->email=$em;
         $this->idTarea = $id;
         $this->horas = $ho;
       
    }

    public function __get(string $param): mixed {
        return $this->$param;
    }

    public function __set(string $param, mixed $value): void {
        $this->$param = $value;
    }

    public function __toString(): string {
        return "Email: $this->email - Tarea: $this->idTarea - Horas: $this->horas";
    }
}
