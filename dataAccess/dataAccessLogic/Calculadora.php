<?php
include("../dataAccess/conexion/Conexion.php");

class Calculadora{
    #atributos de la base de datos
    private int $id;
    private float $numeroUno;
    private float $numeroDos;
    private string $operacion;
    private float $resultado;
    private $connectionDB;


    public function __construct(ConexionDB $connectionDB) {
        $this->connectionDB = $connectionDB->connect();
    }

#metodos get y set
    public function getId() {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }
    
    public function getNumeroUno(): float {
        return $this->numeroUno;
    }
    
    public function setNumeroUno(float $numeroUno): void {
        $this->numeroUno = $numeroUno;
    }
    
    public function getNumeroDos(): float {
        return $this->numeroDos;
    }
    
    public function setNumeroDos(float $numeroDos): void {
        $this->numeroDos = $numeroDos;
    }
    
    public function getOperacion(): string{
        return $this->operacion;
    }
    
    public function setOperacion(string $operacion): void {
        $this->operacion = $operacion;
    }
    
    public function getResultado(): float {
        return $this->resultado;
    }
    
    public function setResultado(float $resultado): void {
        $this->resultado = $resultado;
    }


    //metdo de agregar
    public function agregarNumeros(): bool
    {
        try {
            $sql = "INSERT INTO repaso (base,altura,operacion,resultado) VALUES (?,?,?,?)";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute([$this->getNumeroUno(),$this->getNumeroDos(),$this->getOperacion(),$this->getResultado()]);
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    //metodo para listar
    public function listarDatos()
    {
        try {
            $sql = "SELECT * FROM repaso";
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

    //Metodo para eliminar
    public function eliminarCalculo(): bool
    {
        try {
            $sql = "DELETE FROM repaso WHERE id=?";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute([$this->getId()]);
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    //metodo para actualizar
    public function actualizarCalculo(): bool
    {
        try {
            $sql = "UPDATE repaso SET base = ?, altura = ?, operacion = ?, resultado = ? WHERE id = ?";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute([$this->getBase(), $this->getAltura(), $this->getOperacion(), $this->getResultado(), $this->getId()]);
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    private function affectedColumns($numer): bool
    {
        return $numer !== null && $numer > 0;
    }

    public function eliminarTodos(): bool
{
    try {
        $sql = "DELETE FROM repaso";
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