<?php
/**
 * Created by PhpStorm.
 * User: Irvin León
 * Date: 6/26/17
 * Time: 2:50 PM
 */


abstract class Animal
{
    public function comer()
    {
        echo "comiendo";
    }

    public function dormir()
    {
        echo "duermiendo";
    }

    public abstract function hacerRuido();
}

class Perro extends Animal implements AnimalInterface
{
    public function hacerRuido()
    {
        echo "Wuof Wuof!!\n";
    }
}

class Gato extends Animal implements AnimalInterface
{
    public function hacerRuido()
    {
        echo "Miau!!!!\n";
    }
}

class Humano extends Animal implements HumanoInterface, AnimalInterface
{
    protected $mascota;
    public function comer()
    {
        echo "comiendo sofisticadamente";
    }

    public function hablar()
    {
        echo "Hola!!\n";
    }

    public function hacerRuido()
    {
        echo "aaaaaaaaaaaaaaaaaaa";
    }

    public function adoptarMascota(AnimalInterface $animal)
    {
        $this->mascota = $animal;
        $animal->hacerRuido();
    }
}
Interface AnimalInterface
{
    function hacerRuido();

    function comer();

    function dormir();
}

Interface HumanoInterface
{
    function comer();

    function dormir();

    function hablar();

    function adoptarMascota(AnimalInterface $animal);
}

class Life
{
    public static function iniciarCicloVida()
    {
        $human = new Humano();
        $gato  = new Gato();
        $perro = new Perro();
        $human->adoptarMascota($gato);
        $human->adoptarMascota($perro);
        $human->comer();
    }
}

Life::iniciarCicloVida();





