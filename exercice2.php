<?php

require_once('vendor/autoload.php');

use Ipssi\Evaluation\Useless;

class doc
{
    private $elements = array();
    private $couleurR;
    private $couleurV;
    private $couleurB;

    public function __construct(int $r,int $v,int $b)
    {
        $this->couleurR = $r;
        $this->couleurV = $v;
        $this->couleurB = $b;
    }

    public function newElement(string $id)
    {
        $this->elements[] = $id;
    }

    /**
     * @return array
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * @return array
     */
    public function getCouleur()
    {
        return array($this->couleurR,$this->couleurV,$this->couleurB);
    }

}

class element
{
    private $id;
    private $positionX;
    private $positionY;

    /**
     * @return mixed
     */
    public function __construct($x,$y)
    {
        $this->id = uniqid();
        $this->positionX = $x;
        $this->positionY = $y;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return array($this->positionX,$this->positionY);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}

class text extends element
{
    private $text;
    private $couleurR;
    private $couleurV;
    private $couleurB;

    public function __construct(int $x,int $y,int $r,int $v,int $b,string $txt)
    {
        parent::__construct($x, $y);
        $this->couleurR = $r;
        $this->couleurV = $v;
        $this->couleurB = $b;
        $this->text = $txt;

    }

    /**
     * @return array
     */
    public function getCouleur()
    {
        return array($this->couleurR,$this->couleurV,$this->couleurB);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->text;
    }
}

class forme extends element
{
    private $forme;
    private $couleurR;
    private $couleurV;
    private $couleurB;

    public function __construct(int $x,int $y,int $r,int $v,int $b,string $forme)
    {
        parent::__construct($x, $y);
        $this->couleurR = $r;
        $this->couleurV = $v;
        $this->couleurB = $b;
        $this->forme = $forme;

    }

    /**
     * @return array
     */
    public function getCouleur()
    {
        return array($this->couleurR,$this->couleurV,$this->couleurB);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->forme;
    }
}
class img extends element{

    private $img;

    public function __construct(int $x,int $y,string $img)
    {
        parent::__construct($x, $y);
        $this->img = $img;

    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->img;
    }
}

$doc = new doc(255,0,0); // création d'un documment rouge.

$elements[] = new forme(10,200,255,0,0,'étoile'); // forme d'étoile rouge à 10x,200y.
$elements[] = new text(200,10,0,255,0,'coucou');// text coucou vert à 200x,10y.
$elements[] = new img(100,150,"chemin/image.png");// image à 100x,150y.
foreach($elements as $element){
    $doc->newElement($element->getId());
}

$color=$doc->getCouleur();
echo "document couleur R = ".$color[0]." V = ".$color[1]." B= ".$color[2]."\n\n";
echo "éléments dans le document :"."\n\n";

foreach($elements as $element){
    if( array_search( $element->getId(),$doc->getElements()) ){
        echo "elementid : ".$element->getId()."\n";
        echo "element name : ".$element->getName()."\n";
        $position = $element->getPosition();
        echo "position : X = ".$position[0]."; Y = ".$position[1]."\n";
        if($element instanceof text || $element instanceof text){
            $color=$element->getCouleur();
            echo "couleur R = ".$color[0]." V = ".$color[1]." B= ".$color[2]."\n";
        }
        echo "\n\n";
    }
}

