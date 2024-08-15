<?php 
include("../dataAccess/conexion/Conexion.php");

class Edad{

#atributos de la edad de datos
    private int $id; 
    private int $edad;
    private string $nombre;
    private int $resultado;
    private $connectionDB;

    public function __construct(ConexionDB $connectionDB) {                                                               
    $this->connectionDB = $connectionDB->connect();
    }
    public function getId() {                                                                                             
    return $this->id;
    }
    public function setId(int $id): void {                                                                                
    $this->id = $id;
    }

    public function getNombre() {                                                                                             
    return $this->nombre;
    }
    public function setNombre(string $nombre): void {                                                                                
    $this->nombre = $nombre;
    }

    public function getEdad() {                                                                                             
    return $this->edad;
    }
    public function setEdad(int $edad): void {                                                                                
    $this->edad = $edad;
    }

    public function getResultado() {                                                                                             
    return $this->resultado;
    }
    public function setResultado(int $resultado): void {                                                                                
    $this->resultado = $resultado;
    }

    public function agregarNumeros(): bool{                                                                                                                     
    try {
        $sql = "INSERT INTO años (edad, nombre, resultado) VALUES (?,?,?)";
        $stmt = $this->connectionDB->prepare($sql);
        $stmt->execute([$this->getEdad(), $this->getNombre(),$this->getResultado()]);
        $count = $stmt->rowCount();
        return $this->affectedColumns($count);
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
    }

        public function listarDatos(){                                                                                                                     
        try {
            $sql = "SELECT * FROM años";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrayQuery = $stmt->fetchAll();
            return $arrayQuery;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return [];
            }
            public function eliminarCalculo(): bool{                                                                                                                     
            try {
                $sql = "DELETE FROM años WHERE id=?";
                $stmt = $this->connectionDB->prepare($sql);
                $stmt->execute([$this->getId()]);
                $count = $stmt->rowCount();
                return $this->affectedColumns($count);
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
                }
                public function actualizarCalculo(): bool{                                                                                                                     
                try {
                    $sql = "UPDATE años SET edad = ?, resultado = ?, nombre = ? WHERE id = ?";
                    $stmt = $this->connectionDB->prepare($sql);
                    $stmt->execute([$this->getEdad(), getNombre(), $this->getResultado(), $this->getId()]);
                    $count = $stmt->rowCount();
                    return $this->affectedColumns($count);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
                    }

                    private function affectedColumns($numer): bool{                                                                                                                     
                    return $numer !== null && $numer > 0;
                        }
                        public function eliminarTodos(): bool{                                                                                                                         
                            try {
                        $sql = "DELETE FROM años";
                        $stmt = $this->connectionDB->prepare($sql);
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        return $this->affectedColumns($count);
                            } catch (PDOException $e) {
                        echo $e->getMessage();
                        return false;
                            }
                        }    
}





