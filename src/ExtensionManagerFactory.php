<?php declare(strict_types=1);

namespace Winnie\LaraDebut;

class ExtensionManagerFactory
{
    /** @var IExtensionManager */
    private static $customManager = null;

    public static function create() : IExtensionManager
    {
        // 調整工廠設計，使其能使用與回傳自訂的管理器物件
        if (self::$customManager != null)
        {
            return self::$customManager;
        }

        return new FileExtensionManager();
    }

    /**
     * @param IExtensionManager $mgr
     */
    public static function setManager(IExtensionManager $mgr)
    {
        self::$customManager = $mgr;
    }
}