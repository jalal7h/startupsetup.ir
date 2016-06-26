
CREATE TABLE IF NOT EXISTS `ipopup` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `page_id` int(11) NOT NULL COMMENT 'صفحه مبداء',
  `url` text COLLATE utf8_persian_ci NOT NULL COMMENT 'صفحه مقصد',
  `ipopup` varchar(1024) COLLATE utf8_persian_ci NOT NULL COMMENT 'عکس',
  `onetime` int(1) NOT NULL COMMENT 'فقط یک بار نمایش',
  `logged` varchar(10) COLLATE utf8_persian_ci NOT NULL COMMENT 'وضعیت کاربر',
  `flag` int(1) NOT NULL COMMENT 'وضعیت',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='پاپ-آپ های داخلی' AUTO_INCREMENT=1 ;


--spi--
