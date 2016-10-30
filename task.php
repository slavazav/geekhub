<?php

trait ChangeAttributes {
    public function capitalize() {
        foreach ($this->attributes as $attrName => $attrValue) {
            $this->attributes[$attrName] = strtoupper($attrValue);
        }
    }
}

abstract class Entity
{
    //Приватное свойство
    private $attributes;
    
    //Можно задать атрибуты через конструктор
    public function __construct($attributes = array())
    {
        $this->attributes = $attributes;
    }
    
    //Задать атрибут обьекта
    public final function setAttr($attrName, $value)
    {
        $this->attributes[$attrName] = $value;
        return true;
    }
    
    //Получить атрибут обьекта
    public final function getAttr($attrName, $defaultValue=null)
    {
        if(isset($this->attributes[$attrName])) {
            return $this->attributes[$attrName];
        }
        
        return $defaultValue;
    }
    
    //Получить атрибут обьекта
    public final function delAttr($attrName)
    {
        if(isset($this->attributes[$attrName])) {
          unset($this->attributes[$attrName]);
        }
        return true;
    }
    
    //Вывести информацию по всем заданым атрибутам
    public function printInfo()
    {
        echo "<table>";
        foreach ($this->attributes as $attrName => $attrValue) {
            echo "<tr><td>{$attrName}:</td><td>{$attrValue}</td></tr>";
        }
        echo "</table>";
    }
}

//Наследуем класс
class Car extends Entity
{
    use ChangeAttributes;
    
    public function setColor($color)
    {
        $this->setAttr('color', $color);
    }
    public function setMaxSpeed($speed)
    {
        $this->setAttr('speed', $speed);
    }
    
    //Полиморфизм
    public function printInfo()
    {
        $this->capitalize();
        echo "<h2>Информация об автомобиле</h2>";
        parent::printInfo();
    }
}

//Создадим екземпляр класса автомобиль
$tavria = new Car();
$tavria->setColor('red');
$tavria->setMaxSpeed(120);
$tavria->setAttr('year', 2010);

$tavria->printInfo();

//Попробуем создать екземпляр абстрактного класса
//$cat = new Entity(); //Выведет ошибку так как класс абстрактный
