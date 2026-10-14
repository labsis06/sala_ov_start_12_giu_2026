<?php
\defined('_JEXEC') or die;

use Joomla\CMS\Dispatcher\ComponentDispatcherFactoryInterface;
use Joomla\CMS\Extension\ComponentInterface;
use Joomla\CMS\Extension\MVCComponent;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

/*
 * Service provider Joomla 5 per com_salaov.
 * Nota importante: questa versione registra esplicitamente l'autoload
 * per Site e Administrator. Su alcune installazioni Joomla 5 il solo tag
 * <namespace> del manifest non basta durante gli upgrade del componente e
 * il dispatcher genera: "Invalid controller class: display".
 */
return new class implements ServiceProviderInterface {
    public function register(Container $container): void
    {
        $this->registerSalaovAutoload();

        $container->registerServiceProvider(
            new \Joomla\CMS\Extension\Service\Provider\MVCFactory('Ov\\Component\\Salaov')
        );

        $container->registerServiceProvider(
            new \Joomla\CMS\Extension\Service\Provider\ComponentDispatcherFactory('Ov\\Component\\Salaov')
        );

        $container->set(ComponentInterface::class, function (Container $container) {
            $component = new MVCComponent($container->get(ComponentDispatcherFactoryInterface::class));
            $component->setMVCFactory($container->get(MVCFactoryInterface::class));
            return $component;
        });
    }

    private function registerSalaovAutoload(): void
    {
        static $registered = false;

        if ($registered) {
            return;
        }

        $registered = true;
        $administratorRoot = JPATH_ADMINISTRATOR . '/components/com_salaov/src/';
        $siteRoot = JPATH_SITE . '/components/com_salaov/src/';

        spl_autoload_register(static function ($class) use ($administratorRoot, $siteRoot) {
            $prefixes = [
                'Ov\\Component\\Salaov\\Administrator\\' => $administratorRoot,
                'Ov\\Component\\Salaov\\Site\\' => $siteRoot,
                // Fallback per vecchie patch installate in modo non standard.
                'Ov\\Component\\Salaov\\' => JPATH_ADMINISTRATOR . '/components/com_salaov/src/',
            ];

            foreach ($prefixes as $prefix => $baseDir) {
                $len = strlen($prefix);
                if (strncmp($prefix, $class, $len) !== 0) {
                    continue;
                }

                $relativeClass = substr($class, $len);
                $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

                if (is_file($file)) {
                    require_once $file;
                    return;
                }
            }
        }, true, true);
    }
};
