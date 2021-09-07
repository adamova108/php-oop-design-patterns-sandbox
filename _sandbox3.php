<?php

abstract class AbstractDeathStar
{

    private $crewSize;
    private $weaponPower;

    public function setWeaponPower($power)
    {
        $this->weaponPower = $power;
    }

    public function getWeaponPower()
    {
        return $this->weaponPower;
    }

    public function makeFiringNoise()
    {
        echo 'BOOM x ' . $this->weaponPower;
    }

    public function getCrewSize()
    {
        return $this->crewSize;
    }

}

class DeathStar extends AbstractDeathStar
{
    public function setCrewSize($numberOfPeople)
    {
        $this->crewSize = $numberOfPeople;
    }
}

class DeathStarII extends AbstractDeathStar
{
    /**
     * NOTE: This DeathStar must *always* have 5000 people on it!
     */
    public function getCrewSize()
    {
        return 5000;
    }

    public function makeFiringNoise()
    {
        echo 'SUPER BOOM';
    }
}

$deathStar1 = new DeathStar();
$deathStar1->setCrewSize(3000);
$deathStar1->setWeaponPower(500);

$deathStar2 = new DeathStarII();
$deathStar2->setWeaponPower(999);


?>

<table>
    <tr>
        <td>&nbsp;</td>
        <th>DeathStar 1</th>
        <th>DeathStar 2</th>
    </tr>
    <tr>
        <th>Crew Size</th>
        <td><?php echo $deathStar1->getCrewSize(); ?></td>
        <td><?php echo $deathStar2->getCrewSize(); ?></td>
    </tr>
    <tr>
        <th>Weapon Power</th>
        <td><?php echo $deathStar1->getWeaponPower(); ?></td>
        <td><?php echo $deathStar2->getWeaponPower(); ?></td>
    </tr>
    <tr>
        <th>Fire!</th>
        <td><?php echo $deathStar1->makeFiringNoise(); ?></td>
        <td><?php echo $deathStar2->makeFiringNoise(); ?></td>
    </tr>
</table>