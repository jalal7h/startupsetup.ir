
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان آیتم',
  `memo` text COLLATE utf8_persian_ci NOT NULL COMMENT 'شعار',
  `brief` text COLLATE utf8_persian_ci NOT NULL COMMENT 'شرح مختصر',
  `desc` text COLLATE utf8_persian_ci NOT NULL COMMENT 'توضیحات',
  `cat_id` int(11) NOT NULL COMMENT 'دسته بندی',
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'email address',
  `website` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'website address',
  `website_name` varchar(512) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام وبسایت',
  `stash_icon` text COLLATE utf8_persian_ci NOT NULL COMMENT 'آیکن',
  `stash_screenshot` text COLLATE utf8_persian_ci NOT NULL COMMENT 'تصویر زمینه',
  `kw` text COLLATE utf8_persian_ci NOT NULL COMMENT 'کلمات کلیدی',
  `view` int(11) NOT NULL COMMENT 'تعداد بازدید',
  `flag` int(11) NOT NULL COMMENT 'وضعیت',
  `sponsor_id` int(11) NOT NULL COMMENT 'اسپانسر',
  `prio` int(11) NOT NULL COMMENT 'اولویت',
  `user_id` int(11) NOT NULL COMMENT 'شناسه کاربر',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='آیتم/آیتم ها' AUTO_INCREMENT=1;


--spi--
