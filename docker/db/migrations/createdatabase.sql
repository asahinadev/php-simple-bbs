--
-- テーブルの構造 `members`
--

CREATE TABLE `members` (
  `id`                 int          NOT NULL AUTO_INCREMENT,
  `name`               varchar(255) NOT NULL,
  `email`              varchar(255) NOT NULL,
  `password`           varchar(100) NOT NULL,
  `picture`            varchar(255) NOT NULL,
  `created`            datetime     NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `modified`           timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8mb4 ;

--
-- テーブルのデータをダンプしています `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `password`, `picture`, `created`, `modified`) VALUES
(1,	'テスト用',	'system@example.co.jp',	'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8',	'20201216033603',	'2020-12-16 03:36:04',	'2020-12-16 03:36:04');

-- --------------------------------------------------------

--
-- テーブルの構造 `posts`
--

CREATE TABLE `posts` (
  `id`                 int       NOT NULL AUTO_INCREMENT,
  `message`            text      NOT NULL,
  `member_id`          int       NOT NULL,
  `reply_post_id`      int       ,
  `created`            datetime  NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `modified`           timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8mb4 ;

