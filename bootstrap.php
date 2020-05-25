<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use Hyperf\Di\Aop\AstVisitorRegistry;
use Hyperf\Di\Aop\PropertyHandlerVisitor;
use Hyperf\Di\Aop\ProxyCallVisitor;
use Hyperf\Di\Aop\RegisterInjectPropertyHandler;
use Hyperf\Config\Listener\RegisterPropertyHandlerListener;

! defined('BASE_PATH') && define('BASE_PATH', __DIR__);
! defined('SWOOLE_HOOK_FLAGS') && define('SWOOLE_HOOK_FLAGS', SWOOLE_HOOK_ALL);

require_once BASE_PATH . '/vendor/autoload.php';

AstVisitorRegistry::insert(PropertyHandlerVisitor::class, PHP_INT_MAX / 2);
AstVisitorRegistry::insert(ProxyCallVisitor::class, PHP_INT_MAX / 2);

RegisterInjectPropertyHandler::register();
(new RegisterPropertyHandlerListener())->process(new \stdClass());
