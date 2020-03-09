<?php

class Team
{
    protected $name;
    protected $members = [];

    // constructor
    public function __construct($name, $members = [])
    {
        $this->name = $name;
        $this->members = $members;
    }

    // constructor estatico = factory
    public static function start($name, $members)
    {
        return new static($name, $members);
    }

    // Definimos usado ...$params que permite
    // pasar todos los parametros que queramos
    // no es necesario cambiar el metodo cada vez que cambiemos el constructor

    public static function start2(...$params)
    {
        return new self(...$params);
    }

    // get or accesor
    public function name()
    {
        return $this->name;
    }

    public function members()
    {
        return $this->members;
    }

    public function add($name)
    {
        $this->members[] = $name;
    }

    public function cancel()
    {

    }

    public function manager()
    {

    }
}

class Member
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function lastViewed()
    {

    }
}

$acme = new Team('acme');
var_dump($acme);
var_dump($acme->name());
$acme->add('Antonio');
$acme->add('Marta');
$acme->add('Alberto');
var_dump($acme->members());

$acme2 = new Team('acme', ['Antonio', 'Eugenia']);
$acme2->add('Marco Antonio');
var_dump($acme2->members());

$acme = Team::start('acme', [
    'antonio', 'eugenia'
]);

$acme = Team::start2('acme',
    new Member('antonio'),
    new Member('eugenia')
);