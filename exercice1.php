<?php

require_once('vendor/autoload.php');

$climate = new League\CLImate\CLImate;

class Diviseur {
    public function division(int $index, int $diviseur)
    {
        if($diviseur == 0){
            throw new Exception("le diviseur ne peux pas être 0");
        }

        $valeurs = [17, 12, 15, 38, 29, 157, 89, -22, 0, 5];
        if($index > (count($valeurs)-1) || ($index < 0) ){
            throw new Exception("vous ne pouvez pas choisir un index plus haut que : "
                .(count($valeurs) - 1). "ou plus petit que 0");
        }

        return $valeurs[$index] / $diviseur;
    }
}

$win = 0;

while($win === 0){
    $input = $climate->input("Entrez l’indice de l’entier à diviser : ");
    $index = $input->prompt();

    $input = $climate->input("Entrez le diviseur : ");
    $diviseur = $input->prompt();

    try{
        $climate->output("Le résultat de la division est : " . (new Diviseur())->division($index, $diviseur));
        $win = 1;
    }catch(Exception $e){
        echo $e->getMessage()."\n";
        $win = 0;
    }catch(Error $e){
        echo "problème de type"."\n";
        $win = 0;
    }
}



