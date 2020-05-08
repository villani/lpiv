<?php

class Dog implements AnimalInterface
{

    public function toTalk(): string
    {
        return "Auau!";
    }

}