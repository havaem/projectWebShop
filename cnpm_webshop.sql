-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 08, 2021 lúc 02:45 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cnpm webshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `permission` tinyint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `permission`) VALUES
(1, 'Võ Hoài Nam', 'vhnvohoainam', 'b0a5be6ef93f9e87b2e8939bc6c5afe7', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `release_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `id_product`, `id_user`, `comment`, `release_date`) VALUES
(1, 1, 1, 'Sản phẩm như shit', '2021-04-08 12:21:38'),
(2, 1, 2, 'Sản phẩm cute vip pro', '2021-04-08 12:22:46'),
(3, 1, 3, 'Sản phẩm gì hãm vcl', '2021-04-08 12:22:55'),
(4, 1, 4, 'Sản phẩm thế này thì vứt', '2021-04-08 12:23:00'),
(5, 1, 5, 'Sản phẩm này nên giảm giá 100%', '2021-04-08 12:23:05'),
(6, 1, 1, ' mình lỡ comment dại, xin lỗi các bạn ', '2021-04-08 14:15:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gender`
--

INSERT INTO `gender` (`id`, `gender`) VALUES
(1, 'Nam'),
(2, 'Nữ'),
(3, 'Giới tính thứ ba');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `laptop`
--

CREATE TABLE `laptop` (
  `id` int(11) NOT NULL,
  `cpu` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `rom` varchar(100) NOT NULL,
  `screen` varchar(100) NOT NULL,
  `vga` varchar(100) NOT NULL,
  `connector` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `design` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `release_date` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`) VALUES
(1, 'Apple'),
(2, 'Samsung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `screen` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `camFront` varchar(100) NOT NULL,
  `camBack` varchar(100) NOT NULL,
  `cpu` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `rom` varchar(100) NOT NULL,
  `sim` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `rate` float NOT NULL,
  `view` int(11) NOT NULL,
  `buy` int(11) NOT NULL,
  `voucher` int(11) DEFAULT NULL,
  `configuration` mediumtext NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `manufacturer` int(11) DEFAULT NULL,
  `isVisible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `type`, `name`, `image`, `price`, `stock`, `rate`, `view`, `buy`, `voucher`, `configuration`, `description`, `manufacturer`, `isVisible`) VALUES
(1, 1, 'iPhone 12 Pro Max 128GB', 'https://cdn.tgdd.vn/Products/Images/42/213033/iphone-12-pro-max-xanh-duong-new-600x600-600x600.jpg', 31690000, 100, 5, 165, 1, 1, '<div class=\"content__row\"> <span class=\"content__row-title\">Màn hình:</span> <span class=\"content__row-content\">OLED, 6.7\", Super Retina XDR</span> </div> <div class=\"content__row\"> <span class=\"content__row-title\">Hệ điều hành:</span> <span class=\"content__row-content\">iOS 14</span> </div> <div class=\"content__row\"> <span class=\"content__row-title\">Camera sau:</span> <span class=\"content__row-content\">3 camera 12 MP</span> </div> <div class=\"content__row\"> <span class=\"content__row-title\">Camera trước:</span> <span class=\"content__row-content\">12 MP</span> </div> <div class=\"content__row\"> <span class=\"content__row-title\">Chip:</span> <span class=\"content__row-content\">12 MP</span> </div> <div class=\"content__row\"> <span class=\"content__row-title\">RAM:</span> <span class=\"content__row-content\">6 GB</span> </div> <div class=\"content__row\"> <span class=\"content__row-title\">Bộ nhớ trong:</span> <span class=\"content__row-content\">128 GB</span> </div> <div class=\"content__row\"> <span class=\"content__row-title\">SIM:</span> <span class=\"content__row-content\">1 Nano SIM & 1 eSIM, Hỗ trợ 5G</span> </div> <div class=\"content__row\"> <span class=\"content__row-title\">Pin:</span> <span class=\"content__row-content\">3687 mAh, Sạc nhanh</span> </div> ', '<b class=\"paragraph__title\">Đặc điểm nổi bật của OPPO A15</b>\r\n                <h1 class=\"paragraph__h1\">OPPO hãng điện thoại luôn được người Việt tin dùng và lựa chọn, mới đây hãng đã cho ra mắt mẫu OPPO A15 có thiết kế đẹp, cấu hình đủ dùng. Đây sẽ là mẫu điện thoại thông minh phù hợp cho mọi đối tượng người dùng đi cùng với mức giá vô cùng hợp lý.</h1>\r\n                <h2 class=\"paragraph__h2\">Màn hình lớn, thoải mái xem phim, đọc báo</h2>\r\n                <p class=\"paragraph__p\">OPPO A15 được trang bị công nghệ màn hình IPS LCD, cho độ phân giải HD+ (720 x 1600 Pixels), màn hình lớn 6.52 inch thoải mái nhìn khi sử dụng, đặc biệt là dành cho người lớn tuổi hay sử dụng điện thoại thông minh để đọc báo, xem tin tức.</p>\r\n                <img class=\"paragraph__img\" src=\"https://cdn.tgdd.vn/Products/Images/42/229885/oppo-a15-1-1.jpg\" alt=\"\">\r\n                <p class=\"paragraph__p\">OPPO A15 được trang bị công nghệ màn hình IPS LCD, cho độ phân giải HD+ (720 x 1600 Pixels), màn hình lớn 6.52 inch thoải mái nhìn khi sử dụng, đặc biệt là dành cho người lớn tuổi hay sử dụng điện thoại thông minh để đọc báo, xem tin tức.</p>\r\n                <img class=\"paragraph__img\" src=\"https://cdn.tgdd.vn/Products/Images/42/229885/oppo-a15-1-1.jpg\" alt=\"\">\r\n                <h2 class=\"paragraph__h2\">Màn hình lớn, thoải mái xem phim, đọc báo</h2>\r\n                <p class=\"paragraph__p\">OPPO A15 được trang bị công nghệ màn hình IPS LCD, cho độ phân giải HD+ (720 x 1600 Pixels), màn hình lớn 6.52 inch thoải mái nhìn khi sử dụng, đặc biệt là dành cho người lớn tuổi hay sử dụng điện thoại thông minh để đọc báo, xem tin tức.</p>\r\n                <img class=\"paragraph__img\" src=\"https://cdn.tgdd.vn/Products/Images/42/229885/oppo-a15-3-1.jpg\" alt=\"\">\r\n                <p class=\"paragraph__p\">Hệ thống camera như thế này là quá đủ để cho bạn chụp mọi hình ảnh trong mọi khoảnh khắc với rõ nét cao. Ống kính macro 2 MP cho phép bạn chụp cận cảnh để khám phá những điều diệu kỳ của thế giới thu nhỏ. Ngoài ra, ống kính đo độ sâu 2 MP giúp mọi bức ảnh chân dung trở nên hoàn hảo làm nổi bật chủ thể hơn.</p>\r\n                <button class=\"paragraph__more\">Xem thêm !</button>', 1, 1),
(2, 1, 'Samsung Galaxy S21+ 5G 256GB', 'https://cdn.tgdd.vn/Products/Images/42/234308/samsung-galaxy-s21-ultra-256gb-den-600x600-1-600x600.jpg', 25990000, 100, 5, 18, 1, 2, '<div class=\"content__row\">\r\n<span class=\"content__row-title\">Màn hình:</span>\r\n<span class=\"content__row-content\">Dynamic AMOLED 2X, 6.8\", Quad HD+ (2K+)</span>\r\n</div>\r\n<div class=\"content__row\">\r\n<span class=\"content__row-title\">Hệ điều hành:</span>\r\n<span class=\"content__row-content\">Android 11</span>\r\n</div>\r\n<div class=\"content__row\">\r\n<span class=\"content__row-title\">Camera sau:</span>\r\n<span class=\"content__row-content\">Chính 108 MP & Phụ 12 MP, 10 MP, 10 MP</span>\r\n</div>\r\n<div class=\"content__row\">\r\n<span class=\"content__row-title\">Camera trước:</span>\r\n<span class=\"content__row-content\">40 MP</span>\r\n</div>\r\n<div class=\"content__row\">\r\n<span class=\"content__row-title\">Chip:</span>\r\n<span class=\"content__row-content\">Exynos 2100 8 nhân</span>\r\n</div>\r\n<div class=\"content__row\">\r\n<span class=\"content__row-title\">RAM:</span>\r\n<span class=\"content__row-content\">12 GB</span>\r\n</div>\r\n<div class=\"content__row\">\r\n<span class=\"content__row-title\">Bộ nhớ trong:</span>\r\n<span class=\"content__row-content\">256 GB</span>\r\n</div>\r\n<div class=\"content__row\">\r\n<span class=\"content__row-title\">SIM:</span>\r\n<span class=\"content__row-content\">2 Nano SIM hoặc 1 Nano SIM + 1 eSIM, Hỗ trợ 5G</span>\r\n</div>\r\n<div class=\"content__row\">\r\n<span class=\"content__row-title\">Pin:</span>\r\n<span class=\"content__row-content\">5000 mAh, có sạc nhanh</span>\r\n</div> ', '<b class=\"paragraph__title\">Đặc điểm nổi bật của OPPO A15</b>\r\n                <h1 class=\"paragraph__h1\">OPPO hãng điện thoại luôn được người Việt tin dùng và lựa chọn, mới đây hãng đã cho ra mắt mẫu OPPO A15 có thiết kế đẹp, cấu hình đủ dùng. Đây sẽ là mẫu điện thoại thông minh phù hợp cho mọi đối tượng người dùng đi cùng với mức giá vô cùng hợp lý.</h1>\r\n                <h2 class=\"paragraph__h2\">Màn hình lớn, thoải mái xem phim, đọc báo</h2>\r\n                <p class=\"paragraph__p\">OPPO A15 được trang bị công nghệ màn hình IPS LCD, cho độ phân giải HD+ (720 x 1600 Pixels), màn hình lớn 6.52 inch thoải mái nhìn khi sử dụng, đặc biệt là dành cho người lớn tuổi hay sử dụng điện thoại thông minh để đọc báo, xem tin tức.</p>\r\n                <img class=\"paragraph__img\" src=\"https://cdn.tgdd.vn/Products/Images/42/229885/oppo-a15-1-1.jpg\" alt=\"\">\r\n                <p class=\"paragraph__p\">OPPO A15 được trang bị công nghệ màn hình IPS LCD, cho độ phân giải HD+ (720 x 1600 Pixels), màn hình lớn 6.52 inch thoải mái nhìn khi sử dụng, đặc biệt là dành cho người lớn tuổi hay sử dụng điện thoại thông minh để đọc báo, xem tin tức.</p>\r\n                <img class=\"paragraph__img\" src=\"https://cdn.tgdd.vn/Products/Images/42/229885/oppo-a15-1-1.jpg\" alt=\"\">\r\n                <h2 class=\"paragraph__h2\">Màn hình lớn, thoải mái xem phim, đọc báo</h2>\r\n                <p class=\"paragraph__p\">OPPO A15 được trang bị công nghệ màn hình IPS LCD, cho độ phân giải HD+ (720 x 1600 Pixels), màn hình lớn 6.52 inch thoải mái nhìn khi sử dụng, đặc biệt là dành cho người lớn tuổi hay sử dụng điện thoại thông minh để đọc báo, xem tin tức.</p>\r\n                <img class=\"paragraph__img\" src=\"https://cdn.tgdd.vn/Products/Images/42/229885/oppo-a15-3-1.jpg\" alt=\"\">\r\n                <p class=\"paragraph__p\">Hệ thống camera như thế này là quá đủ để cho bạn chụp mọi hình ảnh trong mọi khoảnh khắc với rõ nét cao. Ống kính macro 2 MP cho phép bạn chụp cận cảnh để khám phá những điều diệu kỳ của thế giới thu nhỏ. Ngoài ra, ống kính đo độ sâu 2 MP giúp mọi bức ảnh chân dung trở nên hoàn hảo làm nổi bật chủ thể hơn.</p>\r\n                <button class=\"paragraph__more\">Xem thêm !</button>', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `producttype`
--

CREATE TABLE `producttype` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `producttype`
--

INSERT INTO `producttype` (`id`, `name`) VALUES
(1, 'Điện thoại'),
(2, 'Laptop'),
(3, 'Máy tính bảng'),
(4, 'Đồng hồ thông minh'),
(5, 'Màn hình máy tính');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rank`
--

CREATE TABLE `rank` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `rank`
--

INSERT INTO `rank` (`id`, `name`) VALUES
(1, 'NewMember'),
(2, 'VIP1'),
(3, 'VIP2'),
(4, 'VIP3'),
(5, 'VIP4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rate`
--

CREATE TABLE `rate` (
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `star` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `rate`
--

INSERT INTO `rate` (`id_product`, `id_user`, `star`) VALUES
(1, 1, 1),
(1, 2, 5),
(1, 3, 3),
(1, 4, 2),
(1, 5, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tablet`
--

CREATE TABLE `tablet` (
  `id` int(11) NOT NULL,
  `screen` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `cpu` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `rom` varchar(100) NOT NULL,
  `camFront` varchar(100) NOT NULL,
  `camBack` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theorder`
--

CREATE TABLE `theorder` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `order_receive` datetime NOT NULL,
  `order_time` datetime NOT NULL,
  `isReceived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `theorder`
--

INSERT INTO `theorder` (`id_order`, `id_product`, `id_user`, `price`, `address`, `phone`, `order_receive`, `order_time`, `isReceived`) VALUES
(1, 1, 1, 12000000, 'Bình Định', '0354714955', '2021-04-15 16:05:22', '2021-04-08 11:05:22', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `history` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `age`, `gender`, `email`, `phone`, `address`, `history`, `date_created`, `rank`) VALUES
(1, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'Võ Hoài Nam', 21, 1, 'vhnvohoainam@gmail.com', 354714955, 'Bình Định Việt Nam', 0, '2021-04-07 07:23:08', 1),
(2, 'htp', 'htp', 'Huỳnh Thanh Phong', 20, 1, 'htp@gmail.com', 12321312, 'VIETNAM', 0, '2021-04-08 12:15:55', 2),
(3, 'hmh', 'hmh', 'Huỳnh Minh Hậu', 20, 1, 'hmh@gmail.com', 1212312132, 'VIETNAM', 0, '2021-04-08 12:17:19', 3),
(4, 'nnl', 'nnl', 'Nguyễn Nhật Linh', 20, 3, 'nnl@gmail.com', 1212312132, 'VIETNAM', 0, '2021-04-08 12:17:56', 4),
(5, 'ntnl', 'ntnl', 'Nguyễn Thị Nhật Linh', 20, 2, 'ntnl@gmail.com', 1212312132, 'VIETNAM', 0, '2021-04-08 12:18:41', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `percent` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`id`, `id_product`, `type`, `code`, `percent`, `price`) VALUES
(1, 1, 1, 'ABCD', 50, NULL),
(2, 2, 2, 'XYZT', NULL, 100000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`,`username`) USING BTREE;

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`id_user`),
  ADD KEY `product` (`id_product`);

--
-- Chỉ mục cho bảng `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `manufacturer` (`manufacturer`),
  ADD KEY `voucher` (`voucher`);

--
-- Chỉ mục cho bảng `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id_product`,`id_user`) USING BTREE,
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `tablet`
--
ALTER TABLE `tablet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `theorder`
--
ALTER TABLE `theorder`
  ADD PRIMARY KEY (`id_order`,`id_product`,`id_user`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`username`) USING BTREE,
  ADD KEY `gender` (`gender`),
  ADD KEY `rank` (`rank`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idproduct` (`id_product`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `laptop`
--
ALTER TABLE `laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `producttype`
--
ALTER TABLE `producttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `rank`
--
ALTER TABLE `rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tablet`
--
ALTER TABLE `tablet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `theorder`
--
ALTER TABLE `theorder`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `laptop`
--
ALTER TABLE `laptop`
  ADD CONSTRAINT `laptop_ibfk_1` FOREIGN KEY (`id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `manufacturer` FOREIGN KEY (`manufacturer`) REFERENCES `manufacturer` (`id`),
  ADD CONSTRAINT `type` FOREIGN KEY (`type`) REFERENCES `producttype` (`id`),
  ADD CONSTRAINT `voucher` FOREIGN KEY (`voucher`) REFERENCES `voucher` (`id`);

--
-- Các ràng buộc cho bảng `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `tablet`
--
ALTER TABLE `tablet`
  ADD CONSTRAINT `tablet_ibfk_1` FOREIGN KEY (`id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `theorder`
--
ALTER TABLE `theorder`
  ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `gender` FOREIGN KEY (`gender`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `rank` FOREIGN KEY (`rank`) REFERENCES `rank` (`id`);

--
-- Các ràng buộc cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `idproduct` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
