<?php
/*
* Plugin Name : MyPlugin
*/

namespace Plugin\MyPlugin\Controller;

use Eccube\Controller\AbstractController;
use Plugin\MyPlugin\Form\Type\MyPluginConfigType;
use Plugin\MyPlugin\Repository\MyPluginConfigRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ConfigController.
 */
class MyPluginConfigController extends AbstractController
{
    /**
     * @Route("/%eccube_admin_route%/my_plugin/config", name="my_plugin_admin_config")
     * @Template("@MyPlugin/admin/config.twig")
     *
     * @param Request $request
     * @param MyPluginConfigRepository $configRepository
     *
     * @return array
     */
    public function index(Request $request, MyPluginConfigRepository $configRepository)
    {
        // 設定情報、フォーム情報を取得
        $Config = $configRepository->get();
        $form = $this->createForm(MyPluginConfigType::class, $Config);
        $form->handleRequest($request);

        // 設定画面で登録ボタンが押されたらこの処理を行う
        if ($form->isSubmitted() && $form->isValid()) {
            // フォームの入力データを取得
            $Config = $form->getData();

            // フォームの入力データを保存
            $this->entityManager->persist($Config);
            $this->entityManager->flush($Config);

            // 完了メッセージを表示
            log_info('config', ['status' => 'Success']);
            $this->addSuccess('プラグインの設定を保存しました。', 'admin');

            // 設定画面にリダイレクト
            return $this->redirectToRoute('my_plugin_admin_config');
        }

        return [
            'Config' => $Config,
            'form' => $form->createView(),
        ];
    }
}