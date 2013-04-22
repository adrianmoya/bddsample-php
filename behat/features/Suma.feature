#language: es

Característica: Suma de dos números

Como matemático novato
Yo quiero obtener la suma de dos cifras
Para aprender a sumar

Escenario: Sumar dos numeros positivos
    Dado que estoy en la aplicación
    Cuando ingreso los números 1 y 3
    Y solicito el resultado del cálculo
    Entonces el resultado debe ser 4

Escenario: Sumar dos numeros negativos
    Dado que estoy en la aplicación
    Cuando ingreso los números -1 y -3
    Y solicito el resultado del cálculo
    Entonces el resultado debe ser -4

Escenario: Sumar un numero positivo y uno negativo
    Dado que estoy en la aplicación
    Cuando ingreso los números -2 y 3
    Y solicito el resultado del cálculo
    Entonces el resultado debe ser 1