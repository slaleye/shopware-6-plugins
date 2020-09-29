<?php declare(strict_types=1);

namespace Slaleye\ShopFinder\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1601307538 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1601307538;
    }

    public function update(Connection $connection): void
    {
       $connection->exec("
       CREATE TABLE IF NOT EXISTS `slaleye_shop_finder_shop` (
       `id` BINARY(16) NOT NULL,
       `active` TINYINT(1) NULL DEFAULT '0',
       `name` VARCHAR(255) NOT NULL,
       `street_name` VARCHAR(255) NOT NULL,
       `street_number` VARCHAR(255) NOT NULL,
       `city` VARCHAR(255) NOT NULL,
       `post_code` VARCHAR(255) NOT NULL,
       `website` VARCHAR(255) NULL,
       `telephone` VARCHAR(255) NULL,
       `opening_hours` LONGTEXT NULL,
       `country_id` BINARY(16) NULL,
       `created_at` DATETIME(3),
       `updated_at` DATETIME(3),
       PRIMARY KEY(`id`),
       KEY `fk.slaleye_shop_finder_shop.country_id` (`country_id`),
       CONSTRAINT `fk.slaleye_shop_finder_shop.country_id` FOREIGN KEY(`country_id`) 
       REFERENCES  `country` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE )
       ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;  
       ");
    }

    public function updateDestructive(Connection $connection): void
    {
    }
}
