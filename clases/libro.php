<?php

class Libro {
    private $isbn;
    private $titulo;
    private $autor;
    private $anioPublicacion;

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function setAnioPublicacion($anioPublicacion) {
        $this->anioPublicacion = $anioPublicacion;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getAnioPublicacion() {
        return $this->anioPublicacion;
    }

    public function obtenerInformacionCompleta() {
        return "Libro: " . $this->titulo . " escrito por " . $this->autor . " (Año: " . $this->anioPublicacion . ") - ISBN: " . $this->isbn;
    }
}
?>