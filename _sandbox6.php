<?php

interface PlanetInterface
{
    /**
     * Return name of the planet
     *
     * @return string
     */
    public function getName();

    /**
     * Return the radius if the planet, in thousands of kilometers.
     *
     * @return integer
     */
    public function getRadius();

    /**
     * Return the hex color (without the #) for the planet.
     *
     * @return string
     */
    public function getHexColor();
}


trait NameableItemTrait
{
    /**
     * @var string
     */
    protected $name; // IF THIS IS PRIVATE THEN EXTENDING THE ABSTRACT CLASS WOULD MAKE THIS PROPERTY INACCESSIBLE

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}


abstract class AbstractPlanet implements PlanetInterface
{
    use NameableItemTrait;
}


class GasPlanet implements PlanetInterface
{
    use NameableItemTrait;

    const MATERIAL_AMMONIA = 'ammonia';
    const MATERIAL_HYDROGEN = 'hydrogen';
    const MATERIAL_HELIUM = 'helium';
    const MATERIAL_METHANE = 'methane';

    private $diameter;

    private $mainElement;

    public function __construct($name, $mainElement, $diameter)
    {
        $this->name = $name;
        $this->diameter = $diameter;
        if (!in_array($mainElement, $this->getAllElements())) {
            throw new \Exception('This is not a valid element!');
        }
        $this->mainElement = $mainElement;
    }


    /**
     * SO TRAITS CAN BE OVERRIDDEN ????
     */
    public function getName()
    {
        return 'TRAIT OVERRIDE - ' . $this->name;
    }


    public function __destruct()
    {
        echo $this->name;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public static function getAllElements()
    {
        return [
            self::MATERIAL_AMMONIA,
            self::MATERIAL_HYDROGEN,
            self::MATERIAL_HELIUM,
            self::MATERIAL_METHANE,
        ];
    }

    public function getRadius()
    {
        return $this->diameter / 2;
    }

    public function getHexColor()
    {
        // a "fake" map of elements to colors
        switch ($this->mainElement) {
            case self::MATERIAL_AMMONIA:
                return '663300';
            case self::MATERIAL_HYDROGEN:
            case self::MATERIAL_HELIUM:
                return 'FFFF66';
            case self::MATERIAL_METHANE:
                return '0066FF';
            default:
                return '000000';
        }
    }
}

class SolidPlanet extends AbstractPlanet implements PlanetInterface
{
    private $radius;

    private $hexColor;

    private $dayLengthInHours;

    public function __construct($name, $radius, $hexColor, $dayLengthInHours = 24)
    {
        $this->name = $name;
        $this->radius = $radius;
        $this->hexColor = $hexColor;
        $this->dayLengthInHours = $dayLengthInHours;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getDateTimeOneDayFromNow()
    {
        $tomorrow = new \DateTime();
        $tomorrow->modify(sprintf('+%d hours', $this->dayLengthInHours));

        return $tomorrow;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    public function getHexColor()
    {
        return $this->hexColor;
    }

    public function getDayLengthInHours()
    {
        return $this->dayLengthInHours;
    }
}

class SolarSystem implements \IteratorAggregate, \Countable
{
    private $planets;

    public function __construct(array $planets)
    {
        $this->planets = $planets;
    }

    public function count()
    {
        return count($this->planets);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->planets);
    }
}

class InvalidRadiusException extends Exception
{

}

class MissingHexException extends Exception
{

}

class PlanetRenderer
{
    public function render(PlanetInterface $planet)
    {
        if (0 >= $planet->getRadius()) {
            throw new InvalidRadiusException('The radius of a planet should be greater than 0!');
        }
        if (!$planet->getHexColor()) {
            throw new MissingHexException('The hex color is missing!');
        }

        return sprintf(
            '<div style="width: %spx; height: %spx; border-radius: %spx; background-color: #%s;"></div>',
            $planet->getRadius() * 2,
            $planet->getRadius() * 2,
            $planet->getRadius(),
            $planet->getHexColor()
        );
    }
}


$renderer = new PlanetRenderer();

$planets = [
    new SolidPlanet('Mercury', 10, 'cccccc'),
    new SolidPlanet('Venus', 30, '29A1FF'),
    new SolidPlanet('Earth', 30, '0E1338'),
    new SolidPlanet('Mars', 15, 'DAA18A'),
    new GasPlanet('Jupiter', GasPlanet::MATERIAL_HYDROGEN, 139),
    new GasPlanet('Saturn', GasPlanet::MATERIAL_HYDROGEN, 120),
    new GasPlanet('Uranus', GasPlanet::MATERIAL_METHANE, 51),
];
$neptune = new GasPlanet('Neptune', GasPlanet::MATERIAL_HYDROGEN, 49);
$planets[] = $neptune;

$solarSystem = new SolarSystem($planets);

?>
    <h1>
        Showing <?php echo count($solarSystem); ?> Planets
    </h1>
<?php foreach ($solarSystem as $planet) : ?>
    <h3><?php echo $planet; ?></h3>
    <div>
        <?php echo $renderer->render($planet); ?>
    </div>
<?php endforeach; ?>