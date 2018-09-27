<?php
/**
 * Created by PhpStorm.
 * User: Irvin León
 * Date: 6/26/17
 * Time: 2:50 PM
 */

/**
 * Clase abstracta: clase que no podrá ser instanciada,
 * Usada para implementar características comunes que tendrán las clases que heredan esta clase.
 * Class Animal
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

    /**
     * Método abstracto: usado para definir metodos que obligan a ser implementados por las clases herederas.
     */
    public abstract function hacerRuido();
}

/**
 * Herencia
 * Clase que hereda una clase abstracta e implemnta una interfaz.
 * Class Perro
 */
class Perro extends Animal implements AnimalInterface
{
    /**
     * Método heredado  obligado a implementar.
     */
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

/**
 * Class Humano: implementa 2 interfaces puesto que cumple com ambas
 */
class Humano extends Animal implements HumanoInterface, AnimalInterface
{
    protected $mascota;
    protected $padre;

    /**
     * Humano constructor:
     * Injección de dependencias,Polimorfismo por sobrecarga(distinto en otros lenguajes como java o c++
     * @param $padre
     */
    public function __construct(Humano $padre = null)
    {
        $this->padre = $padre;
    }

    public function comer()
    {
        echo "comiendo sofisticadamente\n";
    }

    public function hablar()
    {
        echo "Hola!!\n";
    }

    public function hacerRuido()
    {
        echo "aaaaaaaaaaaaaaaaaaa\n";
    }

    /**Método abstracto:
     * Aplica inversión de dependencias.
     * puesto que el humano puede adoptar cualquier tipo de mascota.
     * no se usa una clase en particular como parametro sino una interfaz que represente a todos estos.
     * @param AnimalInterface $animal
     */
    public function adoptarMascota(AnimalInterface $animal)
    {
        $this->mascota = $animal;
        $animal->hacerRuido();
    }
}

/**
 * Usado para que las clases , obligadamente implementen los siguientes métodos.
 * Interface AnimalInterface
 */
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

/**
 * Clase principal donde nuestros objeos comparten mensajes.
 * Class Life
 */
class Life
{
    /**
     * Metodo abstracto: el cual no requiere que la clase estee instanciada.
     */
    public static function iniciarCicloVida()
    {
        $padre    = new Humano();
        $personaX = new Humano($padre);
        $gato     = new Gato();
        $perro    = new Perro();
        $personaX->adoptarMascota($gato);
        $personaX->adoptarMascota($perro);
        $personaX->comer();
        /**
         * Esto es posible en la vida real?
         */
        $personaX->adoptarMascota($padre);
    }
}

/**
 * Ejecución del programa
 */
Life::iniciarCicloVida();





