<?php
/*
* Plugin Name : MyPlugin
*/

namespace Plugin\MyPlugin\Form\Type;

use Eccube\Common\EccubeConfig;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MyPluginConfigType extends AbstractType
{
    /**
     * @var EccubeConfig
     */
    protected $eccubeConfig;

    /**
    * @var ContainerInterface
    */
    protected $containerInterface;

    /**
     * MyPluginConfigType constructor.
     *
     * @param EccubeConfig $eccubeConfig
     */
    public function __construct(EccubeConfig $eccubeConfig, ContainerInterface $container)
    {
        $this->eccubeConfig = $eccubeConfig;
        $this->containerInterface = $container;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
        ->add('title', TextType::class, [
            'label' => 'title',
            'constraints' => [
                new Assert\NotBlank(),
            ],
        ])
        ->add('color', ChoiceType::class, [
            'label' => 'カラー設定',
            'choices' => array_flip([
                'blue' => '青',
                'red' => '赤',
            ]),
            'expanded' => false,
            'multiple' => false,
            'placeholder' => false,
            'constraints' => [
                new Assert\NotBlank(),
            ],
        ]);
    }
}