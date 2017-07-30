<?php
class M003 implements IMigration
{
    public static function getName()
    {
        return __CLASS__;
    }

    public static function run()
    {
        db::getInstance()->Query('ALTER TABLE orders ADD COLUMN `user_session` varchar(64)');
    }
}
?>