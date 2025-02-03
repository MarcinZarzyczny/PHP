<?php
declare (strict_types = 1);

define('ERROR_CODE', 4);
class MyException extends Exception {
    public function errorMessage(){
        return sprintf ("Wystąpił błąd ' %s ' o numerze %d w lini %d." .PHP_EOL,
        $this->getMessage(), $this->getCode(), $this->getLine());
    }
}
//funkcja anonimowa przypisana do zmiennej
$kalkulator = function (string $operacja, float $x, float $y){
    if($operacja == '/' && $y == 0){
        //zgłoś wyjętek do wceścniej zdefiniowanej klasy MyException
        throw new MyException('Nie dziel przez zero!', ERROR_CODE);
    }
    return match($operacja){
        '+' => $x + $y,
        '-' => $x - $y,
        '*' => $x * $y,
        '/' => fdiv($x, $y),
    };
};

try {
    print $kalkulator(operacja: '/', x: 5, y: 2);
    echo "</br>";
    print $kalkulator (operacja: '/', x: 5, y: 0);
}catch (\Exception $e){
    print $e->errorMessage();
}

?>