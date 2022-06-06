/*
 Navicat Premium Data Transfer

 Source Server         : Wash
 Source Server Type    : MySQL
 Source Server Version : 80028
 Source Host           : 103.30.147.104:3306
 Source Schema         : aplika49_wash

 Target Server Type    : MySQL
 Target Server Version : 80028
 File Encoding         : 65001

 Date: 05/04/2022 22:20:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'Admin', 'admin@aplikasiwash.com', '$2y$05$.OXHmxYQ1Wj78oJUS3BjVuwWq5sTVcoCHOsmUN3Vk6o7LNkoEySCe', '50de791fb9b66aaeb6bbe42bb50f1ca2.jpeg', '2022-01-10 15:11:48');
INSERT INTO `admin` VALUES (3, 'Admin 2', 'admin2@aplikasiwash.com', '$2y$05$uvJ8nHrrMorVmUce74Qpzey9P3CLcwSLlOxYF/ZUFh3RDllQachEO', '2a9bd2ca91964a6a1b7dabd08d16662b.jpg', '2022-01-11 17:54:26');

-- ----------------------------
-- Table structure for faq
-- ----------------------------
DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int NOT NULL,
  `date_created` datetime NOT NULL,
  `modified_by` int NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `created_by`(`created_by` ASC) USING BTREE,
  INDEX `modified_by`(`modified_by` ASC) USING BTREE,
  CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `faq_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of faq
-- ----------------------------
INSERT INTO `faq` VALUES (1, 'Test', 'Oke2', 1, '2022-01-11 14:23:40', 1, '2022-01-11 14:23:47');
INSERT INTO `faq` VALUES (2, 'Test Delete', 'Del', 1, '2022-01-11 14:23:58', 1, '2022-01-11 14:23:58');
INSERT INTO `faq` VALUES (4, 'Test3', 'ABCD', 1, '2022-01-14 15:22:26', 1, '2022-01-14 15:22:34');
INSERT INTO `faq` VALUES (5, 'Test', '123', 1, '2022-01-29 02:11:42', 1, '2022-01-29 02:11:42');

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
INSERT INTO `pelanggan` VALUES (1, 'Dimas', 'dimas@gmail.com', '$2y$05$2OqNoyAKrMWsc8KTJiBTEesCWs1UXM/3SM3n4YJ.lIsr3zvZ4BsYK', '2022-01-11 03:34:13', '1642418900-gunhoo.jpeg', 1);

-- ----------------------------
-- Table structure for pemilik
-- ----------------------------
DROP TABLE IF EXISTS `pemilik`;
CREATE TABLE `pemilik`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `ktp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL,
  `nama_usaha` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat_usaha` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pemilik
-- ----------------------------
INSERT INTO `pemilik` VALUES (5, 'Test', 'pemilik@pemilik.com', '$2y$05$3UK0wSKm0AhSuB1H1usnHejoSvTI6cana0oETZ43fmf2sLohn1hFi', '2022-01-17 12:59:30', '1642420770-1.jpg', 1, 'Test Usaha', 'Bandung', '08123123123', 'avatar.jpg');
INSERT INTO `pemilik` VALUES (6, 'Sujono', 'sujono@gmail.com', '$2y$05$2OqNoyAKrMWsc8KTJiBTEesCWs1UXM/3SM3n4YJ.lIsr3zvZ4BsYK', '2022-01-23 06:53:13', '1642917193-6.jpeg', 1, 'Sujono Motowash', 'Cikoneng', '08812312938', 'avatar.jpg');
INSERT INTO `pemilik` VALUES (7, 'Sukirman', 'sukirman@gmail.com', '$2y$05$.iB4rD9gnS5ixUe0LKZ86OEW2j03LMJf7ZUFt7KY/88z3q99T3WFS', '2022-01-23 06:55:59', '1642917359-4.jpg', 0, 'Sukirman Wash', 'Bojongsoang', '088123431312', 'avatar.jpg');

-- ----------------------------
-- Table structure for rating
-- ----------------------------
DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating`  (
  `id_rating` int NOT NULL AUTO_INCREMENT,
  `rating` int NOT NULL,
  `feedback` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `order_id` char(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_rating`) USING BTREE,
  INDEX `order_id`(`order_id` ASC) USING BTREE,
  CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `transaksi` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rating
-- ----------------------------
INSERT INTO `rating` VALUES (2, 3, 'Test23', '1527540574');

-- ----------------------------
-- Table structure for tempat_cuci
-- ----------------------------
DROP TABLE IF EXISTS `tempat_cuci`;
CREATE TABLE `tempat_cuci`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pemilik` int NOT NULL,
  `nama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `maps` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kategori` int NOT NULL,
  `harga_mobil` int NOT NULL,
  `harga_motor` int NOT NULL,
  `foto1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `foto2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `foto3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_pemilik`(`id_pemilik` ASC) USING BTREE,
  CONSTRAINT `tempat_cuci_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tempat_cuci
-- ----------------------------
INSERT INTO `tempat_cuci` VALUES (3, 5, 'Test Usaha', 'Bandung', '08123123123', 'pemilik@pemilik.com', 'https://maps.google.com/maps?q=Kaina%20Carwash&t=&z=13&ie=UTF8&iwloc=&output=embed', '<p>Merupakan tempat cuci yang menyediakan berbagai fasilitas seperti</p>', 3, 10000, 5000, '1642518223-motowash1.jpeg', '1642518406-motowash2.jpeg', '1642518422-motowash3.jpeg', 1, '2022-01-17 12:59:30');
INSERT INTO `tempat_cuci` VALUES (4, 6, 'Sujono Motowash', 'Cikoneng', '08812312938', 'sujono@gmail.com', '', '', 1, 1000, 0, 'avatar.jpg', 'avatar.jpg', 'avatar.jpg', 1, '2022-01-23 06:53:13');
INSERT INTO `tempat_cuci` VALUES (5, 7, 'Sukirman Wash', 'Bojongsoang', '088123431312', 'sukirman@gmail.com', '', '', 0, 0, 0, 'avatar.jpg', 'avatar.jpg', 'avatar.jpg', 0, '2022-01-23 06:55:59');

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi`  (
  `order_id` char(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gross_amount` int NOT NULL,
  `payment_type` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `transaction_time` datetime NOT NULL,
  `bank` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `va_number` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pdf_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status_code` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL DEFAULT 1,
  `kendaraan` int NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `id_pelanggan` int NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `no_hp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_tempat_cuci` int NOT NULL,
  PRIMARY KEY (`order_id`) USING BTREE,
  INDEX `id_pelanggan`(`id_pelanggan` ASC) USING BTREE,
  INDEX `id_tempat_cuci`(`id_tempat_cuci` ASC) USING BTREE,
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_tempat_cuci`) REFERENCES `tempat_cuci` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES ('1003578589', 5000, 'bank_transfer', '2022-04-02 18:27:36', 'bca', '46386906755', 'https://app.sandbox.midtrans.com/snap/v1/transactions/3d542c9a-ae71-4bc4-b89a-de723f55fa4f/pdf', '201', 1, 2, '2022-04-03', 1, 'Dimas', 'Bandung', 'dimas@gmail.com', '081232424', 3);
INSERT INTO `transaksi` VALUES ('1527540574', 10000, 'bank_transfer', '2022-03-31 19:42:57', 'bca', '46386841810', 'https://app.sandbox.midtrans.com/snap/v1/transactions/bb44199e-44c9-4211-8c83-25bf36ddf1fa/pdf', '200', 3, 1, '2022-04-03', 1, 'Dimas', 'Solo', 'syahrizalhanif@gmail.com', '123', 3);
INSERT INTO `transaksi` VALUES ('1678891511', 1000, 'bank_transfer', '2022-03-27 13:18:40', 'bca', '46386055197', 'https://app.sandbox.midtrans.com/snap/v1/transactions/73d416f6-bce4-4b7d-8e5e-843501830def/pdf', '201', 1, 1, '2022-03-27', 1, 'Dimas', 'A', 'syahrizalhanif@gmail.com', '123', 4);
INSERT INTO `transaksi` VALUES ('21712645', 5000, 'bank_transfer', '2022-04-05 08:44:17', 'bca', '46386417716', 'https://app.sandbox.midtrans.com/snap/v1/transactions/a63942f1-29ac-45ed-adda-97a4a8b955fc/pdf', '201', 1, 2, '2022-04-05', 1, 'Dimas', '', 'dimas@gmail.com', '', 3);
INSERT INTO `transaksi` VALUES ('527486180', 5000, 'bank_transfer', '2022-04-02 18:38:39', 'bca', '46386947312', 'https://app.sandbox.midtrans.com/snap/v1/transactions/ca22fd9e-ca46-4830-813b-2d533e3bee6d/pdf', '200', 3, 2, '2022-04-04', 1, 'Dimas', 'ABC', 'dimas@gmail.com', '0812321', 3);
INSERT INTO `transaksi` VALUES ('580172897', 1000, 'bank_transfer', '2022-03-27 10:59:52', 'bca', '46386779488', 'https://app.sandbox.midtrans.com/snap/v1/transactions/ba994814-a403-44cf-9427-185266844d65/pdf', '200', 3, 1, '2022-03-28', 1, 'Dimas', 'Test', 'syahrizalhanif@gmail.com', '08817819040', 4);

-- ----------------------------
-- Triggers structure for table pemilik
-- ----------------------------
DROP TRIGGER IF EXISTS `delete_tempat_cuci`;
delimiter ;;
CREATE TRIGGER `delete_tempat_cuci` AFTER DELETE ON `pemilik` FOR EACH ROW BEGIN
DELETE FROM tempat_cuci
    WHERE id_pemilik = old.id;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table pemilik
-- ----------------------------
DROP TRIGGER IF EXISTS `update_tempat_cuci`;
delimiter ;;
CREATE TRIGGER `update_tempat_cuci` AFTER UPDATE ON `pemilik` FOR EACH ROW BEGIN
IF NEW.status <> OLD.status THEN
	UPDATE tempat_cuci
    SET status = NEW.status
    WHERE id_pemilik = old.id;
    END IF;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table pemilik
-- ----------------------------
DROP TRIGGER IF EXISTS `insert_tempat_cuci`;
delimiter ;;
CREATE TRIGGER `insert_tempat_cuci` AFTER INSERT ON `pemilik` FOR EACH ROW BEGIN
        INSERT INTO tempat_cuci
        set id_pemilik = NEW.id,
        nama = NEW.nama_usaha,
        alamat = NEW.alamat_usaha,
        hp = NEW.hp,
        email = NEW.email,
        status = NEW.status,
        foto1 = 'avatar.jpg',
        foto2 = 'avatar.jpg',
        foto3 = 'avatar.jpg',
        date_created = NEW.date_created;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
