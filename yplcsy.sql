/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : yplcsy

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2018-11-05 13:31:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
INSERT INTO `admin_menu` VALUES ('1', '0', '1', '首页', 'fa-bar-chart', '/', null, null, '2018-11-02 05:58:11');
INSERT INTO `admin_menu` VALUES ('2', '0', '2', '用户管理', 'fa-tasks', null, null, null, '2018-11-02 05:51:55');
INSERT INTO `admin_menu` VALUES ('3', '2', '3', '用户列表', 'fa-users', 'auth/users', null, null, '2018-11-02 05:52:33');
INSERT INTO `admin_menu` VALUES ('4', '2', '4', '角色列表', 'fa-user', 'auth/roles', null, null, '2018-11-02 05:53:35');
INSERT INTO `admin_menu` VALUES ('5', '2', '5', '权限列表', 'fa-ban', 'auth/permissions', null, null, '2018-11-02 05:56:23');
INSERT INTO `admin_menu` VALUES ('6', '2', '6', '菜单列表', 'fa-bars', 'auth/menu', null, null, '2018-11-02 05:54:16');
INSERT INTO `admin_menu` VALUES ('7', '2', '7', '操作日志', 'fa-history', 'auth/logs', null, null, '2018-11-02 05:57:45');
INSERT INTO `admin_menu` VALUES ('8', '0', '0', '机构信息', 'fa-institution', null, null, '2018-11-02 06:05:18', '2018-11-02 06:05:18');
INSERT INTO `admin_menu` VALUES ('9', '0', '0', '人员管理', 'fa-child', null, null, '2018-11-02 06:07:23', '2018-11-02 06:07:23');
INSERT INTO `admin_menu` VALUES ('10', '0', '0', '项目管理', 'fa-bars', null, null, '2018-11-02 06:07:41', '2018-11-02 06:07:41');
INSERT INTO `admin_menu` VALUES ('11', '0', '0', '试验配置', 'fa-bars', null, null, '2018-11-02 06:07:54', '2018-11-02 06:07:54');
INSERT INTO `admin_menu` VALUES ('12', '0', '0', '受试者管理', 'fa-bars', null, null, '2018-11-02 06:08:30', '2018-11-02 06:08:30');
INSERT INTO `admin_menu` VALUES ('13', '0', '0', '样品管理', 'fa-bars', null, null, '2018-11-02 06:08:56', '2018-11-02 06:08:56');
INSERT INTO `admin_menu` VALUES ('14', '0', '0', 'I期药房管理', 'fa-bars', null, null, '2018-11-02 06:10:36', '2018-11-02 06:10:36');
INSERT INTO `admin_menu` VALUES ('15', '0', '0', '设备管理', 'fa-bars', null, null, '2018-11-02 06:10:52', '2018-11-02 06:10:52');
INSERT INTO `admin_menu` VALUES ('16', '0', '0', '痕迹管理', 'fa-bars', null, null, '2018-11-02 06:11:02', '2018-11-02 06:11:02');
INSERT INTO `admin_menu` VALUES ('17', '0', '0', '系统管理', 'fa-bars', null, null, '2018-11-02 06:11:14', '2018-11-02 06:11:14');
INSERT INTO `admin_menu` VALUES ('18', '0', '7', 'Helpers', 'fa-gears', '', null, '2018-11-02 06:23:50', '2018-11-02 06:23:50');
INSERT INTO `admin_menu` VALUES ('19', '18', '8', 'Scaffold', 'fa-keyboard-o', 'helpers/scaffold', null, '2018-11-02 06:23:50', '2018-11-02 06:23:50');
INSERT INTO `admin_menu` VALUES ('20', '18', '9', 'Database terminal', 'fa-database', 'helpers/terminal/database', null, '2018-11-02 06:23:50', '2018-11-02 06:23:50');
INSERT INTO `admin_menu` VALUES ('21', '18', '10', 'Laravel artisan', 'fa-terminal', 'helpers/terminal/artisan', null, '2018-11-02 06:23:50', '2018-11-02 06:23:50');
INSERT INTO `admin_menu` VALUES ('22', '18', '11', 'Routes', 'fa-list-alt', 'helpers/routes', null, '2018-11-02 06:23:50', '2018-11-02 06:23:50');
INSERT INTO `admin_menu` VALUES ('23', '8', '0', '基本情况', 'fa-bars', 'admin/fundamental', null, '2018-11-05 03:39:44', '2018-11-05 03:39:44');

-- ----------------------------
-- Table structure for admin_operation_log
-- ----------------------------
DROP TABLE IF EXISTS `admin_operation_log`;
CREATE TABLE `admin_operation_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_operation_log_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_operation_log
-- ----------------------------
INSERT INTO `admin_operation_log` VALUES ('1', '1', 'admin', 'GET', '192.168.1.120', '[]', '2018-11-02 05:39:44', '2018-11-02 05:39:44');
INSERT INTO `admin_operation_log` VALUES ('2', '1', 'admin', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:40:19', '2018-11-02 05:40:19');
INSERT INTO `admin_operation_log` VALUES ('3', '1', 'admin', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:40:21', '2018-11-02 05:40:21');
INSERT INTO `admin_operation_log` VALUES ('4', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:40:35', '2018-11-02 05:40:35');
INSERT INTO `admin_operation_log` VALUES ('5', '1', 'admin/auth/menu/2/edit', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:40:47', '2018-11-02 05:40:47');
INSERT INTO `admin_operation_log` VALUES ('6', '1', 'admin', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:48:25', '2018-11-02 05:48:25');
INSERT INTO `admin_operation_log` VALUES ('7', '1', 'admin/auth/permissions', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:48:38', '2018-11-02 05:48:38');
INSERT INTO `admin_operation_log` VALUES ('8', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:48:40', '2018-11-02 05:48:40');
INSERT INTO `admin_operation_log` VALUES ('9', '1', 'admin/auth/users', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:48:42', '2018-11-02 05:48:42');
INSERT INTO `admin_operation_log` VALUES ('10', '1', 'admin/auth/roles', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:48:43', '2018-11-02 05:48:43');
INSERT INTO `admin_operation_log` VALUES ('11', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:48:50', '2018-11-02 05:48:50');
INSERT INTO `admin_operation_log` VALUES ('12', '1', 'admin', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:48:56', '2018-11-02 05:48:56');
INSERT INTO `admin_operation_log` VALUES ('13', '1', 'admin/auth/users', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:49:01', '2018-11-02 05:49:01');
INSERT INTO `admin_operation_log` VALUES ('14', '1', 'admin/auth/users', 'GET', '192.168.1.120', '[]', '2018-11-02 05:50:48', '2018-11-02 05:50:48');
INSERT INTO `admin_operation_log` VALUES ('15', '1', 'admin/auth/users', 'GET', '192.168.1.120', '[]', '2018-11-02 05:50:57', '2018-11-02 05:50:57');
INSERT INTO `admin_operation_log` VALUES ('16', '1', 'admin/auth/users', 'GET', '192.168.1.120', '[]', '2018-11-02 05:50:58', '2018-11-02 05:50:58');
INSERT INTO `admin_operation_log` VALUES ('17', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:51:10', '2018-11-02 05:51:10');
INSERT INTO `admin_operation_log` VALUES ('18', '1', 'admin/auth/menu/2/edit', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:51:18', '2018-11-02 05:51:18');
INSERT INTO `admin_operation_log` VALUES ('19', '1', 'admin/auth/menu/2', 'PUT', '192.168.1.120', '{\"parent_id\":\"0\",\"title\":\"\\u7528\\u6237\\u7ba1\\u7406\",\"icon\":\"fa-tasks\",\"uri\":null,\"roles\":[\"1\",null],\"permission\":null,\"_token\":\"9MhqcrfGjasA43qh7HnWn7HS8exGyHMCBb2u5py4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/192.168.1.120:8888\\/admin\\/auth\\/menu\"}', '2018-11-02 05:51:55', '2018-11-02 05:51:55');
INSERT INTO `admin_operation_log` VALUES ('20', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 05:51:55', '2018-11-02 05:51:55');
INSERT INTO `admin_operation_log` VALUES ('21', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 05:51:58', '2018-11-02 05:51:58');
INSERT INTO `admin_operation_log` VALUES ('22', '1', 'admin/auth/users', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:52:03', '2018-11-02 05:52:03');
INSERT INTO `admin_operation_log` VALUES ('23', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:52:08', '2018-11-02 05:52:08');
INSERT INTO `admin_operation_log` VALUES ('24', '1', 'admin/auth/menu/3/edit', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:52:15', '2018-11-02 05:52:15');
INSERT INTO `admin_operation_log` VALUES ('25', '1', 'admin/auth/menu/3', 'PUT', '192.168.1.120', '{\"parent_id\":\"2\",\"title\":\"\\u7528\\u6237\\u5217\\u8868\",\"icon\":\"fa-users\",\"uri\":\"auth\\/users\",\"roles\":[null],\"permission\":null,\"_token\":\"9MhqcrfGjasA43qh7HnWn7HS8exGyHMCBb2u5py4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/192.168.1.120:8888\\/admin\\/auth\\/menu\"}', '2018-11-02 05:52:33', '2018-11-02 05:52:33');
INSERT INTO `admin_operation_log` VALUES ('26', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 05:52:34', '2018-11-02 05:52:34');
INSERT INTO `admin_operation_log` VALUES ('27', '1', 'admin/auth/roles', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:52:42', '2018-11-02 05:52:42');
INSERT INTO `admin_operation_log` VALUES ('28', '1', 'admin/auth/permissions', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:52:55', '2018-11-02 05:52:55');
INSERT INTO `admin_operation_log` VALUES ('29', '1', 'admin/auth/roles', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:52:58', '2018-11-02 05:52:58');
INSERT INTO `admin_operation_log` VALUES ('30', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:53:01', '2018-11-02 05:53:01');
INSERT INTO `admin_operation_log` VALUES ('31', '1', 'admin/auth/permissions', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:53:02', '2018-11-02 05:53:02');
INSERT INTO `admin_operation_log` VALUES ('32', '1', 'admin/auth/permissions', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:53:05', '2018-11-02 05:53:05');
INSERT INTO `admin_operation_log` VALUES ('33', '1', 'admin/auth/roles', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:53:12', '2018-11-02 05:53:12');
INSERT INTO `admin_operation_log` VALUES ('34', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:53:16', '2018-11-02 05:53:16');
INSERT INTO `admin_operation_log` VALUES ('35', '1', 'admin/auth/menu/4/edit', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:53:19', '2018-11-02 05:53:19');
INSERT INTO `admin_operation_log` VALUES ('36', '1', 'admin/auth/menu/4', 'PUT', '192.168.1.120', '{\"parent_id\":\"2\",\"title\":\"\\u89d2\\u8272\\u5217\\u8868\",\"icon\":\"fa-user\",\"uri\":\"auth\\/roles\",\"roles\":[null],\"permission\":null,\"_token\":\"9MhqcrfGjasA43qh7HnWn7HS8exGyHMCBb2u5py4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/192.168.1.120:8888\\/admin\\/auth\\/menu\"}', '2018-11-02 05:53:34', '2018-11-02 05:53:34');
INSERT INTO `admin_operation_log` VALUES ('37', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 05:53:35', '2018-11-02 05:53:35');
INSERT INTO `admin_operation_log` VALUES ('38', '1', 'admin/auth/menu/6/edit', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:53:56', '2018-11-02 05:53:56');
INSERT INTO `admin_operation_log` VALUES ('39', '1', 'admin/auth/menu/6', 'PUT', '192.168.1.120', '{\"parent_id\":\"2\",\"title\":\"\\u83dc\\u5355\\u5217\\u8868\",\"icon\":\"fa-bars\",\"uri\":\"auth\\/menu\",\"roles\":[null],\"permission\":null,\"_token\":\"9MhqcrfGjasA43qh7HnWn7HS8exGyHMCBb2u5py4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/192.168.1.120:8888\\/admin\\/auth\\/menu\"}', '2018-11-02 05:54:16', '2018-11-02 05:54:16');
INSERT INTO `admin_operation_log` VALUES ('40', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 05:54:16', '2018-11-02 05:54:16');
INSERT INTO `admin_operation_log` VALUES ('41', '1', 'admin/auth/permissions', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:54:34', '2018-11-02 05:54:34');
INSERT INTO `admin_operation_log` VALUES ('42', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:56:07', '2018-11-02 05:56:07');
INSERT INTO `admin_operation_log` VALUES ('43', '1', 'admin/auth/menu/5/edit', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:56:09', '2018-11-02 05:56:09');
INSERT INTO `admin_operation_log` VALUES ('44', '1', 'admin/auth/menu/5', 'PUT', '192.168.1.120', '{\"parent_id\":\"2\",\"title\":\"\\u6743\\u9650\\u5217\\u8868\",\"icon\":\"fa-ban\",\"uri\":\"auth\\/permissions\",\"roles\":[null],\"permission\":null,\"_token\":\"9MhqcrfGjasA43qh7HnWn7HS8exGyHMCBb2u5py4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/192.168.1.120:8888\\/admin\\/auth\\/menu\"}', '2018-11-02 05:56:23', '2018-11-02 05:56:23');
INSERT INTO `admin_operation_log` VALUES ('45', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 05:56:23', '2018-11-02 05:56:23');
INSERT INTO `admin_operation_log` VALUES ('46', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:56:53', '2018-11-02 05:56:53');
INSERT INTO `admin_operation_log` VALUES ('47', '1', 'admin/auth/menu/7/edit', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:57:01', '2018-11-02 05:57:01');
INSERT INTO `admin_operation_log` VALUES ('48', '1', 'admin/auth/menu/7', 'PUT', '192.168.1.120', '{\"parent_id\":\"2\",\"title\":\"\\u64cd\\u4f5c\\u65e5\\u5fd7\",\"icon\":\"fa-history\",\"uri\":\"auth\\/logs\",\"roles\":[null],\"permission\":null,\"_token\":\"9MhqcrfGjasA43qh7HnWn7HS8exGyHMCBb2u5py4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/192.168.1.120:8888\\/admin\\/auth\\/menu\"}', '2018-11-02 05:57:45', '2018-11-02 05:57:45');
INSERT INTO `admin_operation_log` VALUES ('49', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 05:57:45', '2018-11-02 05:57:45');
INSERT INTO `admin_operation_log` VALUES ('50', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 05:57:48', '2018-11-02 05:57:48');
INSERT INTO `admin_operation_log` VALUES ('51', '1', 'admin', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:57:51', '2018-11-02 05:57:51');
INSERT INTO `admin_operation_log` VALUES ('52', '1', 'admin', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:57:52', '2018-11-02 05:57:52');
INSERT INTO `admin_operation_log` VALUES ('53', '1', 'admin', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:57:53', '2018-11-02 05:57:53');
INSERT INTO `admin_operation_log` VALUES ('54', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:57:57', '2018-11-02 05:57:57');
INSERT INTO `admin_operation_log` VALUES ('55', '1', 'admin/auth/menu/1/edit', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:57:59', '2018-11-02 05:57:59');
INSERT INTO `admin_operation_log` VALUES ('56', '1', 'admin/auth/menu/1', 'PUT', '192.168.1.120', '{\"parent_id\":\"0\",\"title\":\"\\u9996\\u9875\",\"icon\":\"fa-bar-chart\",\"uri\":\"\\/\",\"roles\":[null],\"permission\":null,\"_token\":\"9MhqcrfGjasA43qh7HnWn7HS8exGyHMCBb2u5py4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/192.168.1.120:8888\\/admin\\/auth\\/menu\"}', '2018-11-02 05:58:10', '2018-11-02 05:58:10');
INSERT INTO `admin_operation_log` VALUES ('57', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 05:58:11', '2018-11-02 05:58:11');
INSERT INTO `admin_operation_log` VALUES ('58', '1', 'admin', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:58:16', '2018-11-02 05:58:16');
INSERT INTO `admin_operation_log` VALUES ('59', '1', 'admin', 'GET', '192.168.1.120', '[]', '2018-11-02 05:58:17', '2018-11-02 05:58:17');
INSERT INTO `admin_operation_log` VALUES ('60', '1', 'admin', 'GET', '192.168.1.120', '[]', '2018-11-02 05:58:18', '2018-11-02 05:58:18');
INSERT INTO `admin_operation_log` VALUES ('61', '1', 'admin', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:58:19', '2018-11-02 05:58:19');
INSERT INTO `admin_operation_log` VALUES ('62', '1', 'admin/auth/users', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:58:24', '2018-11-02 05:58:24');
INSERT INTO `admin_operation_log` VALUES ('63', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 05:58:31', '2018-11-02 05:58:31');
INSERT INTO `admin_operation_log` VALUES ('64', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 06:03:09', '2018-11-02 06:03:09');
INSERT INTO `admin_operation_log` VALUES ('65', '1', 'admin/auth/menu', 'POST', '192.168.1.120', '{\"parent_id\":\"0\",\"title\":\"\\u673a\\u6784\\u4fe1\\u606f\",\"icon\":\"fa-institution\",\"uri\":null,\"roles\":[null],\"permission\":null,\"_token\":\"9MhqcrfGjasA43qh7HnWn7HS8exGyHMCBb2u5py4\"}', '2018-11-02 06:05:18', '2018-11-02 06:05:18');
INSERT INTO `admin_operation_log` VALUES ('66', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 06:05:18', '2018-11-02 06:05:18');
INSERT INTO `admin_operation_log` VALUES ('67', '1', 'admin/auth/menu', 'POST', '192.168.1.120', '{\"parent_id\":\"0\",\"title\":\"\\u4eba\\u5458\\u7ba1\\u7406\",\"icon\":\"fa-child\",\"uri\":null,\"roles\":[null],\"permission\":null,\"_token\":\"9MhqcrfGjasA43qh7HnWn7HS8exGyHMCBb2u5py4\"}', '2018-11-02 06:07:23', '2018-11-02 06:07:23');
INSERT INTO `admin_operation_log` VALUES ('68', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 06:07:23', '2018-11-02 06:07:23');
INSERT INTO `admin_operation_log` VALUES ('69', '1', 'admin/auth/menu', 'POST', '192.168.1.120', '{\"parent_id\":\"0\",\"title\":\"\\u9879\\u76ee\\u7ba1\\u7406\",\"icon\":\"fa-bars\",\"uri\":null,\"roles\":[null],\"permission\":null,\"_token\":\"9MhqcrfGjasA43qh7HnWn7HS8exGyHMCBb2u5py4\"}', '2018-11-02 06:07:41', '2018-11-02 06:07:41');
INSERT INTO `admin_operation_log` VALUES ('70', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 06:07:41', '2018-11-02 06:07:41');
INSERT INTO `admin_operation_log` VALUES ('71', '1', 'admin/auth/menu', 'POST', '192.168.1.120', '{\"parent_id\":\"0\",\"title\":\"\\u8bd5\\u9a8c\\u914d\\u7f6e\",\"icon\":\"fa-bars\",\"uri\":null,\"roles\":[null],\"permission\":null,\"_token\":\"9MhqcrfGjasA43qh7HnWn7HS8exGyHMCBb2u5py4\"}', '2018-11-02 06:07:54', '2018-11-02 06:07:54');
INSERT INTO `admin_operation_log` VALUES ('72', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 06:07:55', '2018-11-02 06:07:55');
INSERT INTO `admin_operation_log` VALUES ('73', '1', 'admin/auth/menu', 'POST', '192.168.1.120', '{\"parent_id\":\"0\",\"title\":\"\\u53d7\\u8bd5\\u8005\\u7ba1\\u7406\",\"icon\":\"fa-bars\",\"uri\":null,\"roles\":[null],\"permission\":null,\"_token\":\"9MhqcrfGjasA43qh7HnWn7HS8exGyHMCBb2u5py4\"}', '2018-11-02 06:08:30', '2018-11-02 06:08:30');
INSERT INTO `admin_operation_log` VALUES ('74', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 06:08:30', '2018-11-02 06:08:30');
INSERT INTO `admin_operation_log` VALUES ('75', '1', 'admin/auth/menu', 'POST', '192.168.1.120', '{\"parent_id\":\"0\",\"title\":\"\\u6837\\u54c1\\u7ba1\\u7406\",\"icon\":\"fa-bars\",\"uri\":null,\"roles\":[null],\"permission\":null,\"_token\":\"9MhqcrfGjasA43qh7HnWn7HS8exGyHMCBb2u5py4\"}', '2018-11-02 06:08:56', '2018-11-02 06:08:56');
INSERT INTO `admin_operation_log` VALUES ('76', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 06:08:57', '2018-11-02 06:08:57');
INSERT INTO `admin_operation_log` VALUES ('77', '1', 'admin/auth/menu', 'POST', '192.168.1.120', '{\"parent_id\":\"0\",\"title\":\"I\\u671f\\u836f\\u623f\\u7ba1\\u7406\",\"icon\":\"fa-bars\",\"uri\":null,\"roles\":[null],\"permission\":null,\"_token\":\"9MhqcrfGjasA43qh7HnWn7HS8exGyHMCBb2u5py4\"}', '2018-11-02 06:10:36', '2018-11-02 06:10:36');
INSERT INTO `admin_operation_log` VALUES ('78', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 06:10:37', '2018-11-02 06:10:37');
INSERT INTO `admin_operation_log` VALUES ('79', '1', 'admin/auth/menu', 'POST', '192.168.1.120', '{\"parent_id\":\"0\",\"title\":\"\\u8bbe\\u5907\\u7ba1\\u7406\",\"icon\":\"fa-bars\",\"uri\":null,\"roles\":[null],\"permission\":null,\"_token\":\"9MhqcrfGjasA43qh7HnWn7HS8exGyHMCBb2u5py4\"}', '2018-11-02 06:10:52', '2018-11-02 06:10:52');
INSERT INTO `admin_operation_log` VALUES ('80', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 06:10:52', '2018-11-02 06:10:52');
INSERT INTO `admin_operation_log` VALUES ('81', '1', 'admin/auth/menu', 'POST', '192.168.1.120', '{\"parent_id\":\"0\",\"title\":\"\\u75d5\\u8ff9\\u7ba1\\u7406\",\"icon\":\"fa-bars\",\"uri\":null,\"roles\":[null],\"permission\":null,\"_token\":\"9MhqcrfGjasA43qh7HnWn7HS8exGyHMCBb2u5py4\"}', '2018-11-02 06:11:02', '2018-11-02 06:11:02');
INSERT INTO `admin_operation_log` VALUES ('82', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 06:11:02', '2018-11-02 06:11:02');
INSERT INTO `admin_operation_log` VALUES ('83', '1', 'admin/auth/menu', 'POST', '192.168.1.120', '{\"parent_id\":\"0\",\"title\":\"\\u7cfb\\u7edf\\u7ba1\\u7406\",\"icon\":\"fa-bars\",\"uri\":null,\"roles\":[null],\"permission\":null,\"_token\":\"9MhqcrfGjasA43qh7HnWn7HS8exGyHMCBb2u5py4\"}', '2018-11-02 06:11:14', '2018-11-02 06:11:14');
INSERT INTO `admin_operation_log` VALUES ('84', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-02 06:11:14', '2018-11-02 06:11:14');
INSERT INTO `admin_operation_log` VALUES ('85', '1', 'admin', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 06:14:35', '2018-11-02 06:14:35');
INSERT INTO `admin_operation_log` VALUES ('86', '1', 'admin', 'GET', '192.168.1.120', '[]', '2018-11-02 06:25:55', '2018-11-02 06:25:55');
INSERT INTO `admin_operation_log` VALUES ('87', '1', 'admin/helpers/routes', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 06:26:09', '2018-11-02 06:26:09');
INSERT INTO `admin_operation_log` VALUES ('88', '1', 'admin/helpers/terminal/artisan', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 06:26:19', '2018-11-02 06:26:19');
INSERT INTO `admin_operation_log` VALUES ('89', '1', 'admin/helpers/terminal/database', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 06:26:24', '2018-11-02 06:26:24');
INSERT INTO `admin_operation_log` VALUES ('90', '1', 'admin/helpers/terminal/database', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 06:26:28', '2018-11-02 06:26:28');
INSERT INTO `admin_operation_log` VALUES ('91', '1', 'admin/helpers/scaffold', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 06:26:30', '2018-11-02 06:26:30');
INSERT INTO `admin_operation_log` VALUES ('92', '1', 'admin/helpers/scaffold', 'GET', '192.168.1.120', '[]', '2018-11-02 06:26:42', '2018-11-02 06:26:42');
INSERT INTO `admin_operation_log` VALUES ('93', '1', 'admin/helpers/scaffold', 'GET', '192.168.1.120', '[]', '2018-11-02 06:26:43', '2018-11-02 06:26:43');
INSERT INTO `admin_operation_log` VALUES ('94', '1', 'admin/helpers/scaffold', 'GET', '192.168.1.120', '[]', '2018-11-02 06:29:45', '2018-11-02 06:29:45');
INSERT INTO `admin_operation_log` VALUES ('95', '1', 'admin/auth/users', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 06:29:58', '2018-11-02 06:29:58');
INSERT INTO `admin_operation_log` VALUES ('96', '1', 'admin/auth/users', 'GET', '192.168.1.120', '[]', '2018-11-02 06:30:01', '2018-11-02 06:30:01');
INSERT INTO `admin_operation_log` VALUES ('97', '1', 'admin/auth/users', 'GET', '192.168.1.120', '[]', '2018-11-02 06:30:03', '2018-11-02 06:30:03');
INSERT INTO `admin_operation_log` VALUES ('98', '1', 'admin', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 06:30:06', '2018-11-02 06:30:06');
INSERT INTO `admin_operation_log` VALUES ('99', '1', 'admin', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 06:30:10', '2018-11-02 06:30:10');
INSERT INTO `admin_operation_log` VALUES ('100', '1', 'admin', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 06:30:11', '2018-11-02 06:30:11');
INSERT INTO `admin_operation_log` VALUES ('101', '1', 'admin/helpers/scaffold', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 06:30:13', '2018-11-02 06:30:13');
INSERT INTO `admin_operation_log` VALUES ('102', '1', 'admin/helpers/terminal/database', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 06:30:15', '2018-11-02 06:30:15');
INSERT INTO `admin_operation_log` VALUES ('103', '1', 'admin/helpers/terminal/artisan', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 06:30:25', '2018-11-02 06:30:25');
INSERT INTO `admin_operation_log` VALUES ('104', '1', 'admin/helpers/routes', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 06:30:26', '2018-11-02 06:30:26');
INSERT INTO `admin_operation_log` VALUES ('105', '1', 'admin/helpers/scaffold', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 06:30:32', '2018-11-02 06:30:32');
INSERT INTO `admin_operation_log` VALUES ('106', '1', 'admin/helpers/terminal/database', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 06:30:41', '2018-11-02 06:30:41');
INSERT INTO `admin_operation_log` VALUES ('107', '1', 'admin/helpers/terminal/database', 'GET', '192.168.1.120', '[]', '2018-11-02 07:01:51', '2018-11-02 07:01:51');
INSERT INTO `admin_operation_log` VALUES ('108', '1', 'admin', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 07:02:03', '2018-11-02 07:02:03');
INSERT INTO `admin_operation_log` VALUES ('109', '1', 'admin/helpers/scaffold', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 07:02:06', '2018-11-02 07:02:06');
INSERT INTO `admin_operation_log` VALUES ('110', '1', 'admin/helpers/scaffold', 'GET', '192.168.1.120', '[]', '2018-11-02 07:19:29', '2018-11-02 07:19:29');
INSERT INTO `admin_operation_log` VALUES ('111', '1', 'admin/helpers/scaffold', 'GET', '192.168.1.120', '[]', '2018-11-02 07:40:18', '2018-11-02 07:40:18');
INSERT INTO `admin_operation_log` VALUES ('112', '1', 'admin/helpers/scaffold', 'GET', '192.168.1.120', '[]', '2018-11-02 07:40:20', '2018-11-02 07:40:20');
INSERT INTO `admin_operation_log` VALUES ('113', '1', 'admin/helpers/scaffold', 'GET', '192.168.1.120', '[]', '2018-11-02 07:40:22', '2018-11-02 07:40:22');
INSERT INTO `admin_operation_log` VALUES ('114', '1', 'admin/helpers/scaffold', 'GET', '192.168.1.120', '[]', '2018-11-02 07:41:31', '2018-11-02 07:41:31');
INSERT INTO `admin_operation_log` VALUES ('115', '1', 'admin/helpers/terminal/database', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 07:52:18', '2018-11-02 07:52:18');
INSERT INTO `admin_operation_log` VALUES ('116', '1', 'admin/helpers/scaffold', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-02 07:52:22', '2018-11-02 07:52:22');
INSERT INTO `admin_operation_log` VALUES ('117', '1', 'admin/helpers/scaffold', 'GET', '192.168.1.120', '[]', '2018-11-02 08:02:34', '2018-11-02 08:02:34');
INSERT INTO `admin_operation_log` VALUES ('118', '1', 'admin/helpers/scaffold', 'GET', '192.168.1.120', '[]', '2018-11-02 08:03:17', '2018-11-02 08:03:17');
INSERT INTO `admin_operation_log` VALUES ('119', '1', 'admin', 'GET', '192.168.1.120', '[]', '2018-11-05 01:03:24', '2018-11-05 01:03:24');
INSERT INTO `admin_operation_log` VALUES ('120', '1', 'admin/helpers/scaffold', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-05 01:09:18', '2018-11-05 01:09:18');
INSERT INTO `admin_operation_log` VALUES ('121', '1', 'admin/helpers/scaffold', 'GET', '192.168.1.120', '[]', '2018-11-05 03:31:11', '2018-11-05 03:31:11');
INSERT INTO `admin_operation_log` VALUES ('122', '1', 'admin', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-05 03:31:16', '2018-11-05 03:31:16');
INSERT INTO `admin_operation_log` VALUES ('123', '1', 'admin', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-05 03:31:19', '2018-11-05 03:31:19');
INSERT INTO `admin_operation_log` VALUES ('124', '1', 'admin', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-05 03:31:20', '2018-11-05 03:31:20');
INSERT INTO `admin_operation_log` VALUES ('125', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-05 03:31:24', '2018-11-05 03:31:24');
INSERT INTO `admin_operation_log` VALUES ('126', '1', 'admin/auth/menu', 'POST', '192.168.1.120', '{\"parent_id\":\"8\",\"title\":\"\\u57fa\\u672c\\u60c5\\u51b5\",\"icon\":\"fa-bars\",\"uri\":\"admin\\/fundamental\",\"roles\":[\"1\",null],\"permission\":null,\"_token\":\"ccOg6ZtOZ12OKtW7d22wH3jFZLehyozCIFzX8W2q\"}', '2018-11-05 03:39:44', '2018-11-05 03:39:44');
INSERT INTO `admin_operation_log` VALUES ('127', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-05 03:39:44', '2018-11-05 03:39:44');
INSERT INTO `admin_operation_log` VALUES ('128', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-05 03:39:51', '2018-11-05 03:39:51');
INSERT INTO `admin_operation_log` VALUES ('129', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-05 03:42:40', '2018-11-05 03:42:40');
INSERT INTO `admin_operation_log` VALUES ('130', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-05 03:42:42', '2018-11-05 03:42:42');
INSERT INTO `admin_operation_log` VALUES ('131', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-05 03:42:42', '2018-11-05 03:42:42');
INSERT INTO `admin_operation_log` VALUES ('132', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-05 03:42:43', '2018-11-05 03:42:43');
INSERT INTO `admin_operation_log` VALUES ('133', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-05 03:46:18', '2018-11-05 03:46:18');
INSERT INTO `admin_operation_log` VALUES ('134', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-05 03:46:18', '2018-11-05 03:46:18');
INSERT INTO `admin_operation_log` VALUES ('135', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-05 03:46:19', '2018-11-05 03:46:19');
INSERT INTO `admin_operation_log` VALUES ('136', '1', 'admin/auth/menu', 'GET', '192.168.1.120', '[]', '2018-11-05 03:46:44', '2018-11-05 03:46:44');
INSERT INTO `admin_operation_log` VALUES ('137', '1', 'admin/admin/fundamental', 'GET', '192.168.1.120', '[]', '2018-11-05 03:52:51', '2018-11-05 03:52:51');
INSERT INTO `admin_operation_log` VALUES ('138', '1', 'admin/admin/fundamental/create', 'GET', '192.168.1.120', '{\"_pjax\":\"#pjax-container\"}', '2018-11-05 03:52:54', '2018-11-05 03:52:54');

-- ----------------------------
-- Table structure for admin_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE `admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_permissions
-- ----------------------------
INSERT INTO `admin_permissions` VALUES ('1', 'All permission', '*', '', '*', null, null);
INSERT INTO `admin_permissions` VALUES ('2', 'Dashboard', 'dashboard', 'GET', '/', null, null);
INSERT INTO `admin_permissions` VALUES ('3', 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', null, null);
INSERT INTO `admin_permissions` VALUES ('4', 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', null, null);
INSERT INTO `admin_permissions` VALUES ('5', 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', null, null);
INSERT INTO `admin_permissions` VALUES ('6', 'Admin helpers', 'ext.helpers', null, '/helpers/*', '2018-11-02 06:23:50', '2018-11-02 06:23:50');

-- ----------------------------
-- Table structure for admin_roles
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_roles
-- ----------------------------
INSERT INTO `admin_roles` VALUES ('1', 'Administrator', 'administrator', '2018-11-02 05:39:20', '2018-11-02 05:39:20');

-- ----------------------------
-- Table structure for admin_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_menu`;
CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_menu
-- ----------------------------
INSERT INTO `admin_role_menu` VALUES ('1', '2', null, null);
INSERT INTO `admin_role_menu` VALUES ('1', '23', null, null);

-- ----------------------------
-- Table structure for admin_role_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_permissions`;
CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_permissions
-- ----------------------------
INSERT INTO `admin_role_permissions` VALUES ('1', '1', null, null);

-- ----------------------------
-- Table structure for admin_role_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_users
-- ----------------------------
INSERT INTO `admin_role_users` VALUES ('1', '1', null, null);

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES ('1', 'admin', '$2y$10$U9wy6s4vNfkkHyj2Kl2sZOwuqgftC9kCQGA65Y2xuIVT3DO569UUC', 'Administrator', null, null, '2018-11-02 05:39:19', '2018-11-02 05:39:19');

-- ----------------------------
-- Table structure for admin_user_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_user_permissions`;
CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_user_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for database_table
-- ----------------------------
DROP TABLE IF EXISTS `database_table`;
CREATE TABLE `database_table` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) NOT NULL,
  `table_category` varchar(255) DEFAULT NULL,
  `table_model` varchar(255) DEFAULT NULL,
  `table_migrations` varchar(255) DEFAULT NULL,
  `table_controller` varchar(255) DEFAULT NULL,
  `table_route` varchar(255) DEFAULT NULL,
  `field_type` text,
  `field_name` text,
  `table_note` text,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of database_table
-- ----------------------------

-- ----------------------------
-- Table structure for fundamental
-- ----------------------------
DROP TABLE IF EXISTS `fundamental`;
CREATE TABLE `fundamental` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Zname` varchar(255) DEFAULT NULL COMMENT '中文名',
  `Ename` varchar(255) DEFAULT NULL,
  `Bname` varchar(255) DEFAULT NULL,
  `shortName` varchar(255) DEFAULT NULL,
  `organization_code` varchar(255) DEFAULT NULL,
  `Affiliated_institutions` varchar(255) DEFAULT NULL,
  `Institution_address_Z` varchar(255) DEFAULT NULL COMMENT '机构地址中文',
  `Institution_address_E` varchar(255) DEFAULT NULL COMMENT '机构地址英文',
  `province` varchar(255) DEFAULT NULL COMMENT '省份',
  `postcode` varchar(255) DEFAULT NULL,
  `hospital_level` varchar(255) DEFAULT NULL COMMENT '医院等级',
  `ownership` varchar(255) DEFAULT NULL COMMENT '所有制',
  `orgniztion_type` varchar(255) DEFAULT NULL COMMENT '医疗机构类型',
  `compiled_beds` int(11) DEFAULT NULL COMMENT '编制床位数',
  `business_nature` varchar(255) DEFAULT NULL COMMENT '经营性质',
  `statutory_representative` varchar(255) DEFAULT NULL COMMENT '法定代表',
  `Institutional_director` varchar(255) DEFAULT NULL COMMENT '机构负责人',
  `Job_title` varchar(255) DEFAULT NULL COMMENT '职务职称',
  `specialty` varchar(255) DEFAULT NULL COMMENT '专业',
  `office_director_name` varchar(255) DEFAULT NULL COMMENT '办公室主任姓名',
  `office_director_position` varchar(255) DEFAULT NULL COMMENT '办公室主任职务',
  `office_director_specialty` varchar(255) DEFAULT NULL COMMENT '办公室主任专业',
  `office_director_phone` varchar(255) DEFAULT NULL COMMENT '办公室主任电话',
  `office_director_fax` varchar(255) DEFAULT NULL COMMENT '办公室主任传真',
  `office_director_email` varchar(255) DEFAULT NULL COMMENT '办公室主任邮箱',
  `office_secretary_name` varchar(255) DEFAULT NULL COMMENT '办公室秘书姓名',
  `office_secretary_position` varchar(255) DEFAULT NULL COMMENT '办公室秘书职务',
  `office_secretary_specialty` varchar(255) DEFAULT NULL COMMENT '办公室秘书专业',
  `office_secretary_phone` varchar(255) DEFAULT NULL COMMENT '办公室秘书电话号',
  `office_secretary_fax` varchar(255) DEFAULT NULL COMMENT '办公室秘书传真',
  `office_secretary_email` varchar(255) DEFAULT NULL COMMENT '办公室秘书邮箱',
  `Contact` varchar(255) DEFAULT NULL COMMENT '联系人',
  `department` varchar(255) DEFAULT NULL COMMENT '工作部门',
  `contact_position` varchar(255) DEFAULT NULL COMMENT '联系人职务',
  `contact_phone` varchar(255) DEFAULT NULL COMMENT '联系人电话',
  `contact_fax` varchar(255) DEFAULT NULL COMMENT '联系人传真',
  `contact_email` varchar(255) DEFAULT NULL COMMENT '联系人邮箱',
  `workforce` int(11) DEFAULT NULL COMMENT '职工总数',
  `high_title` int(11) DEFAULT NULL COMMENT '高级职称',
  `middle_title` int(11) DEFAULT NULL COMMENT '中级职称',
  `primary_title` int(11) DEFAULT NULL COMMENT '初级职称',
  `affirm_major_name` varchar(255) DEFAULT NULL COMMENT '已认定药物临床试验专业名称',
  `Clinical_trial_laboratory` varchar(255) DEFAULT NULL COMMENT '临床试验研究室',
  `in_patient_number` text COMMENT '住院人数(人次/年)',
  `outpatient_number` text COMMENT '门诊量',
  `emergency_number` text COMMENT '急诊量(人次/年)',
  `nation_cultivate_number` int(11) DEFAULT NULL COMMENT '接受国家局组织的GCP培训人数',
  `provincial_cultivate_number` int(11) DEFAULT NULL COMMENT '省级GCP培训人数',
  `hospital_cultivate_number` int(11) DEFAULT NULL COMMENT '院内GCP培训人数',
  `foreign_cultivate_number` int(11) DEFAULT NULL COMMENT '国外的GCP培训人数',
  `re_check_position` varchar(255) DEFAULT NULL COMMENT '申请复核药物临床试验专业',
  `CFDA_ratify` varchar(255) DEFAULT NULL COMMENT 'CFDA批准',
  `hospital_web` varchar(255) DEFAULT NULL COMMENT '医院网址',
  `descr` text COMMENT '备注说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of fundamental
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2016_01_04_173148_create_admin_tables', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
