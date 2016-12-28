<?php
/**
 * Created by PhpStorm.
 * User: JeryBeary
 * Date: 12/25/16
 * Time: 9:42 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="event")
 */
class Event
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     */
    private $time;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $text;

    public function getId()
    {
        return $this->id;
    }

    public function setUsername($id)
    {
        $this->id = $id;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }


}