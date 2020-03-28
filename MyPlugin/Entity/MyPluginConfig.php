<?php
/*
* Plugin Name : MyPlugin
*/

namespace Plugin\MyPlugin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Entity\AbstractEntity;

/**
 * MyPluginConfig
 *
 * @ORM\Table(name="plg_my_plugin")
 * @ORM\Entity(repositoryClass="Plugin\MyPlugin\Repository\MyPluginConfigRepository")
 */
class MyPluginConfig extends AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
   * @var string
   *
   * @ORM\Column(name="title", type="text", nullable=true)
   */
    private $title;

     /**
   * @var string
   *
   * @ORM\Column(name="color", type="text", nullable=true)
   */
    private $color;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return MyPluginConfig
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set color.
     *
     * @param string $color
     *
     * @return MyPluginConfig
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color.
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }
}