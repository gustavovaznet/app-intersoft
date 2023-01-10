CREATE TABLE `tb_contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_contacts` (`id`, `name`, `phone`, `mail`) VALUES
(1, 'User', '(11) 9999-9999', 'contact@test.com');


CREATE TABLE `tb_ext` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `ext` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_ext` (`id`, `name`, `department`, `ext`) VALUES
(1, 'User', 'Tech', 999);


CREATE TABLE `tb_info` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` mediumtext NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_info` (`id`, `question`, `answer`, `date`) VALUES
(1, 'This is the question?', 'This is the answer.', '2023-01-01 12:00:00');


CREATE TABLE `tb_products` (
  `id` int(11) NOT NULL,
  `product` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `amount` varchar(32) NOT NULL,
  `snumber` varchar(50) NOT NULL,
  `function` varchar(100) NOT NULL,
  `company` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_products` (`id`, `product`, `model`, `amount`, `snumber`, `function`, `company`) VALUES
(1, 'Product', 'Model', '1', 'Serial Number', 'Function', 'Company');


CREATE TABLE `tb_projects` (
  `id` int(11) NOT NULL,
  `company` varchar(50) NOT NULL,
  `project` varchar(100) NOT NULL,
  `note` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_projects` (`id`, `company`, `project`, `note`) VALUES
(1, 'Company Name', 'Project', 'Note');


CREATE TABLE `tb_schedule` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `month` varchar(20) NOT NULL,
  `company_worker` varchar(50) NOT NULL,
  `home_worker` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_schedule` (`id`, `date`, `month`, `company_worker`, `home_worker`) VALUES
(1, '2023-01-01', 'Month', 'Worker', 'Worker');


CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_users` (`id`, `name`, `surname`, `mail`, `password`, `type`) VALUES
(1, 'Name', 'Surname', 'mail@mail.com', '25d55ad283aa400af464c76d713c07ad', 'Administrador');




ALTER TABLE `tb_contacts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_ext`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_projects`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_schedule`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

ALTER TABLE `tb_ext`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

ALTER TABLE `tb_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

ALTER TABLE `tb_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

ALTER TABLE `tb_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `tb_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;