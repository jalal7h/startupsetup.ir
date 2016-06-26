
CREATE TABLE `litesponsor` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_persian_ci NOT NULL,
  `link` text COLLATE utf8_persian_ci NOT NULL,
  `pic` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

ALTER TABLE `litesponsor`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `litesponsor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--spi--
