<?php
/*
* Plugin Name : MyPlugin
*/

namespace Plugin\MyPlugin;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Application;
use Eccube\Plugin\AbstractPluginManager;
use Plugin\MyPlugin\Entity\MyPluginConfig;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class PluginManager.
 */
class PluginManager extends AbstractPluginManager
{
    /**
     * PluginManager constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param null|array $meta
     * @param ContainerInterface $container
     *
     * @throws \Exception
     */
    public function enable(array $meta = null, ContainerInterface $container)
    {
        // プラグイン設定を追加
        $em = $container->get('doctrine.orm.entity_manager');
        $Config = $this->createConfig($em);
    }

    /**
     * @param array|null $meta
     * @param ContainerInterface $container
     */
    public function disable(array $meta = null, ContainerInterface $container)
    {
    }

    /**
     * @param null $meta
     * @param Application|null $app
     * @param ContainerInterface $container
     *
     * @throws \Exception
     */
    public function uninstall(array $meta, ContainerInterface $container)
    {
    }

    /**
     * @param array|null $meta
     * @param ContainerInterface $container
     */
    public function update(array $meta = null, ContainerInterface $container)
    {
    }

    /**
     * 設定の登録.
     *
     * @param EntityManagerInterface $em
     */
    protected function createConfig(EntityManagerInterface $em)
    {
        $Config = $em->find(MyPluginConfig::class, 1);
        if ($Config) {
            return $Config;
        }

        $Config = new MyPluginConfig();
        $Config->setTitle('My Plugin');
        $Config->setColor('blue');
        $em->persist($Config);
        $em->flush($Config);

        return $Config;
    }
}