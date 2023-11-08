<?php
class Menu
{
    private $enlaces = array();
    private $titulo = array();


    public function cargar_opciones($link, $title)
    {
        $this->enlaces[] = $link;
        $this->titulo[] = $title;
    }
    public function mostrar()
    {
        for ($i = 0; $i < count($this->titulo); $i++) {
            echo '<a href= "' . $this->enlaces[$i] . '' . '">'. $this->titulo[$i] . '</a>';
            #Se muestra '-'
            if ($i < count($this->enlaces)-1) {
                echo '-';
            }
        }
    }
}
