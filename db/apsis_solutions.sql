/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : apsis_solutions

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2014-07-18 10:51:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `apsis_admin`
-- ----------------------------
DROP TABLE IF EXISTS `apsis_admin`;
CREATE TABLE `apsis_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL COMMENT 'hello',
  `email` varchar(45) CHARACTER SET latin1 NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 NOT NULL,
  `type` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `menu_ids` varchar(120) DEFAULT NULL,
  `status` set('active','inactive','deleted') CHARACTER SET latin1 NOT NULL,
  `recDate` datetime NOT NULL,
  `recBy` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of apsis_admin
-- ----------------------------
INSERT INTO `apsis_admin` VALUES ('1', 'Admin', 'info@admin.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '1,2,3,4,5,6', 'active', '2012-07-23 13:39:52', '0');
INSERT INTO `apsis_admin` VALUES ('24', 'কারিগরি শিক্ষা ব্যবস্থা ২০১৩', 'ataulkarim83@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', null, 'deleted', '0000-00-00 00:00:00', '0');
INSERT INTO `apsis_admin` VALUES ('23', 'আলাউদ্দিন', 'admin@riverofhoney.co.uk', 'e10adc3949ba59abbe56e057f20f883e', 'user', '1,2,3,4,5,6,7,9,11,8,10', 'active', '0000-00-00 00:00:00', '0');
INSERT INTO `apsis_admin` VALUES ('25', 'বাংলাদেশী প্রাচীন  ঐতিহ্য', 'info@psmcsl.com', '96e79218965eb72c92a549dd5a330112', 'user', null, 'active', '0000-00-00 00:00:00', '0');
INSERT INTO `apsis_admin` VALUES ('26', 'আকাশ ১০০', '1@b.com', '1f32aa4c9a1d2ea010adcf2348166a04', 'user', null, 'deleted', '0000-00-00 00:00:00', '0');

-- ----------------------------
-- Table structure for `apsis_article`
-- ----------------------------
DROP TABLE IF EXISTS `apsis_article`;
CREATE TABLE `apsis_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `publish_date` date DEFAULT NULL,
  `name` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `title` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `sub_title` varchar(150) DEFAULT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `photo` varchar(37) CHARACTER SET latin1 NOT NULL,
  `status` set('active','inactive','deleted') CHARACTER SET latin1 NOT NULL,
  `recTime` datetime NOT NULL,
  `recBy` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=ucs2;

-- ----------------------------
-- Records of apsis_article
-- ----------------------------
INSERT INTO `apsis_article` VALUES ('61', '21', '2012-03-01', 'Mr Tareq Hasan', 'Title goes here', 'Various versions have evolved over the years', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'e0f7889d6063d15097434d796e22b677.jpg', 'active', '2013-07-08 07:20:22', '0');
INSERT INTO `apsis_article` VALUES ('66', '24', '2014-07-07', 'Outsourcing', 'Pricing & Outsourcing', 'Pricing & Outsourcing of Apsis Solutions', 'For ready software pricing, APSIS follows its standard set price. For \r\nany customized project APSIS goes for detail business analysis &amp; \r\nsends an initial SRS report. After getting confirmation from client, \r\nAPSIS goes for costing based on total man-hour needed for the whole \r\nproject. However, any customer can also hire a team of programmers as \r\ntheir requirement from our pool of resources.', '8aee61448c98d4b7b94c726f0a4ebff3.jpg', 'active', '2014-07-07 06:12:36', '0');
INSERT INTO `apsis_article` VALUES ('62', '14', '2013-03-12', 'Abdur Rahman', 'IT Future in Bangladdesh', 'IT Future in Bangladdesh at 2015', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'fddf537c79e5837604c7519a3adce91e.jpg', 'active', '2013-07-15 07:22:26', '0');
INSERT INTO `apsis_article` VALUES ('63', '22', '2013-06-14', 'Innovaton On IT', 'WHO WE ARE', 'There something behind success', '<p>Apsis Solutions provides one stop automated solution for your trade \r\nand industry. Depending on the size and field of your organization, we \r\nhave different products and services to meet your requirements. We \r\nprovide the optimum and customized solutions made for your organization.</p>\r\n\r\n<p>Since its inception in 2006, it has proved its excellence by \r\nproviding solutions of superior quality to large and small enterprises, \r\nFinancial Institutions (both Banking and Non-Banking) and Telecom \r\nOperators.</p>\r\n\r\nWe are now operating with offices in Singapore, Kuala Lumpur and \r\nDhaka. Our aim is to provide our clients with quality, robust and \r\nuser-friendly software solutions that delivers long-term business value', '', 'active', '2013-07-24 11:15:05', '0');
INSERT INTO `apsis_article` VALUES ('64', '13', '2011-01-01', 'Where can I Get some?', 'Resource for IT', 'Resource for IT', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '', 'deleted', '2013-07-24 11:15:52', '0');
INSERT INTO `apsis_article` VALUES ('65', '23', '1970-01-01', 'Telecommunication', 'Scope of Telecommunication', 'Scope of Telecommunication in Bangladesh', 'Scope of Telecommunication in BangladeshScope of Telecommunication in BangladeshScope of Telecommunication in BangladeshScope of Telecommunication in BangladeshScope of Telecommunication in BangladeshScope of Telecommunication in BangladeshScope of Telecommunication in BangladeshScope of Telecommunication in BangladeshScope of Telecommunication in BangladeshScope of Telecommunication in BangladeshScope of Telecommunication in BangladeshScope of Telecommunication in Bangladesh', '1e0f7a652d2466fc6bbe2a2877c2da14.jpg', 'active', '2014-07-07 05:46:21', '0');

-- ----------------------------
-- Table structure for `apsis_article_category`
-- ----------------------------
DROP TABLE IF EXISTS `apsis_article_category`;
CREATE TABLE `apsis_article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `rank` varchar(2) CHARACTER SET ucs2 DEFAULT NULL,
  `photo` varchar(37) CHARACTER SET latin1 NOT NULL,
  `status` set('active','inactive','deleted') CHARACTER SET latin1 NOT NULL,
  `position` varchar(20) DEFAULT NULL,
  `recTime` datetime NOT NULL,
  `recBy` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of apsis_article_category
-- ----------------------------
INSERT INTO `apsis_article_category` VALUES ('14', 'INANCIAL SOLUTION', '3', '', 'active', 'middle', '2013-06-18 07:11:33', '1');
INSERT INTO `apsis_article_category` VALUES ('21', 'CONSUMER SOLUTION', '3', '', 'active', 'middle', '2013-07-08 07:05:23', '0');
INSERT INTO `apsis_article_category` VALUES ('22', 'OUR IDENTTY', '2', '', 'active', 'right', '2013-07-24 11:14:37', '0');
INSERT INTO `apsis_article_category` VALUES ('23', 'TELECOM SOLUTION', '3', '', 'active', 'middle', '2014-07-07 05:40:29', '0');
INSERT INTO `apsis_article_category` VALUES ('24', 'OUTSOURCEING', '4', '', 'active', 'middle', '2014-07-07 05:41:18', '0');

-- ----------------------------
-- Table structure for `apsis_banner`
-- ----------------------------
DROP TABLE IF EXISTS `apsis_banner`;
CREATE TABLE `apsis_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `rank` int(3) NOT NULL,
  `photo` varchar(37) CHARACTER SET latin1 NOT NULL,
  `status` set('active','inactive','deleted') CHARACTER SET latin1 NOT NULL,
  `rectime` datetime NOT NULL,
  `recBy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of apsis_banner
-- ----------------------------
INSERT INTO `apsis_banner` VALUES ('4', 'It Does More. It Costs Less. It’s that Simple.For the innovaton of New era', 'Apsis Solutions Ltd.', '1', '70b4263ebb1771faa117fd490c597f72.jpg', 'active', '2012-10-22 09:29:37', '2');
INSERT INTO `apsis_banner` VALUES ('15', 'In Touch with Tomorrow.', '', '3', '49f5b2a44056a10a3ab09411f3c3793e.jpg', 'active', '2014-06-21 10:22:15', '0');
INSERT INTO `apsis_banner` VALUES ('5', 'Committed to People, Committed to the Future.', 'Apsis Solutions Ltd. is<br /><br />\r\n a leading Sofware company of Bangladesh', '2', '7bfc17c14a06e2a38ca091129bf8c336.jpg', 'active', '2012-10-22 09:33:13', '2');

-- ----------------------------
-- Table structure for `apsis_category`
-- ----------------------------
DROP TABLE IF EXISTS `apsis_category`;
CREATE TABLE `apsis_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `rank` int(2) NOT NULL,
  `photo` varchar(37) CHARACTER SET latin1 NOT NULL,
  `status` set('active','inactive','deleted') CHARACTER SET latin1 NOT NULL,
  `recTime` datetime NOT NULL,
  `recBy` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of apsis_category
-- ----------------------------
INSERT INTO `apsis_category` VALUES ('1', 'BEAUTY OF BD', '1', '9c45bc684cb4d0f6be994899b338792f.jpg', 'active', '2012-08-30 20:21:23', '2');
INSERT INTO `apsis_category` VALUES ('2', 'ACHIEVEMENT ON IT', '2', '370eace17aee08b4ce1f6392d99fe97e.jpg', 'active', '2012-08-30 21:10:06', '2');
INSERT INTO `apsis_category` VALUES ('3', 'APSIS SOLUTIONS LTD.', '3', '3fcc1ed1f8fab0aa48aeb70937e87a27.jpg', 'active', '2012-08-30 21:11:05', '2');
INSERT INTO `apsis_category` VALUES ('4', 'OUR ACHIEVEMENT', '4', '3b44ef413669af3962600b4edbe92df9.jpg', 'active', '2012-08-31 06:40:54', '2');

-- ----------------------------
-- Table structure for `apsis_contact_info`
-- ----------------------------
DROP TABLE IF EXISTS `apsis_contact_info`;
CREATE TABLE `apsis_contact_info` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of apsis_contact_info
-- ----------------------------
INSERT INTO `apsis_contact_info` VALUES ('1', 'APSIS SOLUTIONS LIMITED,<br />\r\n14-KAMAL ATATURK AVENUE<br />\r\nBULU OCEAN TOWER, BANANI.\r\nDHAKA-BANGLADESH');

-- ----------------------------
-- Table structure for `apsis_content`
-- ----------------------------
DROP TABLE IF EXISTS `apsis_content`;
CREATE TABLE `apsis_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `title` varchar(100) CHARACTER SET ucs2 NOT NULL,
  `photo` varchar(37) CHARACTER SET latin1 NOT NULL,
  `rank` int(2) NOT NULL,
  `description` text CHARACTER SET ucs2 NOT NULL,
  `section` varchar(25) CHARACTER SET latin1 NOT NULL,
  `status` set('active','inactive','deleted') CHARACTER SET latin1 NOT NULL,
  `rectime` datetime NOT NULL,
  `recBy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of apsis_content
-- ----------------------------
INSERT INTO `apsis_content` VALUES ('1', 'HOME', 'Welcome to the Official Website of Apsisi Solutions Ltd.', '', '0', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'active', '0000-00-00 00:00:00', '0');
INSERT INTO `apsis_content` VALUES ('4', 'COPY RIGHTS', 'COPY RIGHTS OF APSIS SOLUTIONS LTD.', '0495586ba2ccca4026c4df3a7a61d0a5.jpg', '0', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'active', '0000-00-00 00:00:00', '0');
INSERT INTO `apsis_content` VALUES ('5', 'TERMS & POLICY', 'TERMS & POLICY', '6dd0d38e4b11d61a24a3f00c11ea8b4a.jpg', '0', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'active', '0000-00-00 00:00:00', '0');
INSERT INTO `apsis_content` VALUES ('6', 'DISCLAIMER', 'DISCLAIMER DETAILS', 'c29693124a933a074228ea45c9b33107.jpg', '0', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'active', '0000-00-00 00:00:00', '0');
INSERT INTO `apsis_content` VALUES ('7', 'PRVACY', 'PRIVACY POLICY', '', '0', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'active', '0000-00-00 00:00:00', '0');

-- ----------------------------
-- Table structure for `apsis_feedback`
-- ----------------------------
DROP TABLE IF EXISTS `apsis_feedback`;
CREATE TABLE `apsis_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text,
  `status` varchar(30) DEFAULT NULL,
  `recTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of apsis_feedback
-- ----------------------------
INSERT INTO `apsis_feedback` VALUES ('5', 'Md Tareq', 'admin@madrasahedu.org', 'xdfgdfgdgdg', 'active', '2012-10-25 08:01:47');
INSERT INTO `apsis_feedback` VALUES ('6', 'Md Zakir Hossain', 'md@zz.com', 'rlfgdkgndf dighf gtio thtghfghfghg', 'active', '2012-11-26 06:39:29');
INSERT INTO `apsis_feedback` VALUES ('7', 'Hello', 'v@jhvbjh.com', 'rfgdfgdfg', 'deleted', '2012-11-26 06:45:08');
INSERT INTO `apsis_feedback` VALUES ('8', 'hello Saturday', 'sdfsdf@dfgsdg.ghjghj', 'dfghfghfgh', 'active', '2012-12-05 06:28:35');
INSERT INTO `apsis_feedback` VALUES ('9', 'sdfsdf', 'sdfsdf@drgdfg.fgh', 'fghfgh', 'active', '2012-12-27 05:07:06');
INSERT INTO `apsis_feedback` VALUES ('10', 'sdasf', 'admin@zamzamit.com', 'sdfsdf', 'active', '2013-01-22 10:20:40');

-- ----------------------------
-- Table structure for `apsis_module_info`
-- ----------------------------
DROP TABLE IF EXISTS `apsis_module_info`;
CREATE TABLE `apsis_module_info` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `proxy_url` varchar(100) DEFAULT NULL,
  `photo` varchar(37) CHARACTER SET latin1 NOT NULL,
  `description` text NOT NULL,
  `main_catid` int(11) NOT NULL,
  `sort_level` int(11) NOT NULL,
  `position` set('right','bottom','top','left') DEFAULT NULL,
  `status` set('active','inactive','deleted') CHARACTER SET latin1 NOT NULL,
  `rectime` datetime NOT NULL,
  `recBy` int(11) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of apsis_module_info
-- ----------------------------
INSERT INTO `apsis_module_info` VALUES ('1', 'ABOUT US', 'about', '2ecf1c353b0e36796261870cbe95ca6b.jpg', 'APSIS began its business operations as outsourcing solutions providing <br />\r\ncompany in 2006. Our success and drive in the IT sector led us to soon <br />\r\nestablish a concern Apsis Communications Pte. Ltd., registered in <br />\r\nSingapore. In addition to being the holding company, Apsis Solutions <br />\r\nSdn. Bhd. in Malaysia and APSIS’s off shore development facilities in <br />\r\nBangladesh incorporated as Apsis Solutions Ltd. With the involvement of <br />\r\nskilled and experienced people working in the organization, the <br />\r\ncompanies jointly are involved in product marketing, delivery, <br />\r\nimplementation and post live support platform, various systems and <br />\r\nsolutions to different economic sectors.', '0', '1', 'top', 'active', '2013-06-03 07:09:02', '0');
INSERT INTO `apsis_module_info` VALUES ('41', 'LOAN PROCESSING SYSTEM', 'loan_process', '', '<div class=\"content clearfix\">\r\n    <div class=\"field field-name-body field-type-text-with-summary field-label-hidden\"><div class=\"field-items\"><div class=\"field-item even\"><h2>LAPS: INTRODUCTION</h2>\r\n<p>Todays Financial Institutions face competitive challenges that were \r\nunheard of a few short years ago. Loan departments are often working \r\nmanually or with a systems which are slow, inefficient, or both. APSIS \r\nis aware that successful competitors need top quality tools, and we have\r\n responded by developing LAPS which is our Loan Application Processing \r\nSystem. Our technical analysts spent time carefully observing and \r\ndocumenting the loan-processing workflow. Based on input from functional\r\n experts in the banking industry we have incorporated many new and \r\ninnovative features into this exceptional loan-processing product. The \r\nsystem is based on a number of basic criteria from technological, \r\nfunctional, statutory and legal perspective.</p>\r\n<p>&nbsp;</p>\r\n<h2>LAPS: BENEFITS</h2>\r\n<p><strong>Reduced Risk:</strong><br>\r\nLAPS provides a comprehensive depth analysis and recommendation for the \r\ndecision maker. This eliminates human error and reduces the risk of \r\nproviding loans which can later turn out to be Bad debts. Personal Risk \r\nManagement facility evaluates applicants for Liquidity, Collateral and \r\nCredit History. Commercial Risk Assessment assists users in analyzing \r\nfinancial data, financial ratios and comparing them with industry \r\nstandards, lender standards and loan product standards. </p>\r\n<p>&nbsp;</p>\r\n<p><strong>Optimized Processing Time: </strong><br><br>\r\nLAPS enables the flow of loan applications through various stages \r\nseamlessly within time frames provided for each flow point. This \r\nworkflow integrated with Standardized and up-to-date application forms, \r\nsmart links to policies and procedures, management control tools, \r\nDocument Scanning, risk analysis and recommendation reports enable at \r\nleast 70% reduction in processing time.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Mobility of Users: </strong><br>\r\nUsers can interact with the system even staying outside the office through getting task alert, SMS, Email in handheld.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Reduced Lending Cost: : </strong><br>\r\nThe decrease in processing time and making it a paperless solution \r\nreduces labor cost, paper and printing cost, telephone cost etc. </p>\r\n<p>&nbsp;</p>\r\n<p><strong>Management Control: : </strong><br>\r\nLAPS assists the management team to monitor and control Loan Service \r\nOperations, Customer Performance, Business Quality (branch performance, \r\nstaff performance, loan product and Renewal Management). LAPS provides \r\noutstanding reporting capabilities which facilitate performance review \r\nof loans &amp; personnel across various levels &amp; structures of the \r\norganization. </p>\r\n<p>&nbsp;</p>\r\n<p><strong>Customer Satisfaction: : </strong><br>\r\nCustomers dealing with lending institutions using LAPS are guaranteed \r\nquick quotes, faster processing time, better customer service, easier to\r\n apply as a repeat customer and can be guaranteed of better one to one \r\nexperience. </p>\r\n<p>&nbsp;</p>\r\n<h2>LAPS: MODULES IN BRIEF</h2>\r\n<p><strong>Agreement Management</strong><br>\r\nProduct life cycle starts with an agreement registration. LAPS supports \r\ndifferent financial products like Leasing, Term Finance, Hire Purchase, \r\nSale &amp; Lease Back etc. Various products with structured payment \r\nschedule, multiple IDCP rate, delinquent charging and Grace Period \r\noptions are available. Agreement Documentation checking, security \r\nchecking for receipt of PDC, Sanction Amount and etc are included as \r\nwell.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Application Form For Loans </strong><br>\r\nThe application form captures all the details typically collected \r\nregarding the loan product, interest rate, amount requested and other \r\nitems such as the duration of the loan, principal loan amount, and the \r\nfinancial standards against which the borrowers standing will be \r\ncompared. </p>\r\n<p>&nbsp;</p>\r\n<p><strong>Risk Assessment</strong><br>\r\nThis module is designed to capture the required financial data in detail\r\n of current assets, fixed assets, current liabilities and long-term \r\nliabilities to enable the system to perform a thorough risk analysis of \r\nthe borrower against preset ratios and deliver to the reviewer a \r\ncomprehensive picture, which leads to a well-informed decision. </p>\r\n<p>&nbsp;</p>\r\n<p><strong>Loan Pricing</strong><br>\r\nThe loan pricing module provides a comprehensive and detailed analysis \r\nof each loan. LAPS will recommend pricing based on the lenders \r\nmanagement policies for each loan type or classification. The system \r\npresents a comprehensive analysis of cost and revenue components, such \r\nas: Minimum Return, Cost of Borrowing, Borrower Risk Rating, Lending \r\nPersonnel Cost, Overhead Cost, Debt Recovery Losses and Cost of Unused \r\nFunds. All these components are used to make a timely and informed \r\ndecision for pricing Commercial Loans. Interest rates can be determined \r\neither manually or with the pricing module. </p>\r\n<p>&nbsp;</p>\r\n<p><strong>Work Flow  </strong><br>\r\nThe most critical feature of LAPS is its Workflow management tool, which\r\n allows an application to be initiated, routed to the appropriate staff \r\nin a pre-defined sequence, processed, tracked, and eventually completed \r\nand filed. This module facilitates electronic processing of the loan \r\napplication between several \"work flow points\" which can be set up to \r\nmeet the unique needs of every organization depending on their size, \r\nstructure and review/approval methodology. The system assures that there\r\n are no delays in the processing of the loan. Efficiency reports can be \r\ngenerated to reveal any recurring delays at specific \"flow points\" so \r\nthat corrective action can be taken. </p>\r\n<p>&nbsp;</p>\r\n<p><strong>Document Archiving/Management</strong><br>\r\nThis module gives lending institutions the ability to digitally capture \r\nand store various documents that may be required as part of the loan \r\npackage. It becomes easier to transfer the loan package to the next \r\npoint in the process without the need for stacks of paper work to \r\naccompany the application. </p>\r\n<p>&nbsp;</p>\r\n<p><strong>Loan Committee</strong><br>\r\nThe Loan Committee Module can efficiently control information flow to \r\ndecision makers for loan approvals. Loan Committee members can be in \r\ndifferent locations, but still be able to view all or any part of the \r\ncomplete loan documentation. This module will allow the lender to assign\r\n multiple committees based on loan amount or loan classification.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Monitoring</strong><br>\r\nThis module uses the amortization schedule of the loan and compares it \r\nto actual remittances. It is also designed to generate alerts in the \r\nevent a payment is not made on time or for the appropriate amount. </p>\r\n<p>&nbsp;</p>\r\n<p><strong>Reports  </strong><br>\r\nOne very valuable feature of LAPS is the number and variety of data and \r\nreports that can be generated for review and analysis. From product \r\npopularity and processing efficiency, to application status, there are \r\nlarge numbers of reports available for each level of the organization. \r\nThese reports enable different types of analysis for strategic \r\nmanagement and presentation of data for review by senior management.</p>\r\n</div></div></div>  </div>', '39', '3', 'top', 'active', '2014-07-07 09:03:19', '0');
INSERT INTO `apsis_module_info` VALUES ('38', 'DATA CAPTURE & VERIFICATION', 'capture_verification', '', 'APSIS offers robust and powerful system so that data can be captured \r\nfrom any input format – be it hand prints, machine prints, check marks, \r\nbar codes or OMR forms by using OCR Optical Character Recognition), IMR \r\n(Intelligent Mark Recognition) or ICR (Intelligent Character \r\nRecognition). Information is processed and verified with speed and \r\naccuracy, and the final output is delivered to your database after \r\nvalidation &amp; quality checks. We use latest Technology to process \r\nmachine readable forms and documents. Be it invoices, sales, or purchase\r\n orders; market surveys, tax statements, or credit card applications; \r\nmedical/insurance claims or benefit enrollment – we can provide solution\r\n to process all kinds of forms to meet your project requirements. Some \r\nTypical examples are: Applications, Market Research, Surveys &amp; \r\nResearch data forms, Questionnaires, Order Forms and Employee Evaluation\r\n etc. Processed data can be delivered using secure FTP, e-mail, CD, DVD,\r\n VPN, tape etc. Data can be delivered in various formats such as Excel, \r\nAccess, Word, PDF, CSV, XML, any database format, online entry etc.', '35', '3', 'top', 'active', '2014-07-07 08:50:29', '0');
INSERT INTO `apsis_module_info` VALUES ('39', 'FINANCIAL SOLUTION', 'fsolutions', '', 'Success of tomorrows finance business will not only depend on the \r\npractical use of information technology in offering efficient client \r\nservices but also the ability to introduce new products and services in \r\nthe most creative manner. Keeping all these in mind APSIS has developed \r\nits prime product BANKULATOR and various OSS.', '4', '2', 'top', 'active', '2014-07-07 08:54:01', '0');
INSERT INTO `apsis_module_info` VALUES ('40', 'BANKULATOR®', 'bankulator', 'bd6df27f4c74e6f567909c0885020eb1.jpg', '<p>Success of tomorrows finance business will not only depend on the \r\npractical use of information technology in offering efficient client \r\nservices but also the ability to introduce new products and services in \r\nthe most creative manner. A financial organization needs software, which\r\n will integrate activities of Operation Department, Collection \r\nDepartment, Treasury, Deposit, Marketing, Central Accounts and other \r\ndepartments.</p>\r\n<p>&nbsp;</p>\r\n<p>Keeping these in mind APSIS has developed a comprehensive loan, \r\nlease, hire purchase, deposit and account management system named: \r\nBankulator. This is a product for efficient administration of the \r\nfunding and finance portfolios in financial institutions. The system is \r\nbased on a number of basic criteria from technological, functional, \r\nstatutory and legal perspective. Respective guidelines by Central Bank \r\nhave been followed for setting up the parameter-controlled product \r\nimproviser and product management modules.</p>', '39', '3', 'top', 'active', '2014-07-07 08:58:03', '0');
INSERT INTO `apsis_module_info` VALUES ('26', 'COMPANY OVERVIEW ', 'company', '8a987b2ae640c05dc4b53dbf6139a1fd.jpg', '<p>APSIS began its business operations as outsourcing solutions <br />\r\nproviding company in 2006. Our success and drive in the IT sector led us<br />\r\n to soon establish a concern Apsis Communications Pte. Ltd., registered <br />\r\nin Singapore. In addition to being the holding company, Apsis Solutions <br />\r\nSdn. Bhd. in Malaysia and APSIS’s off shore development facilities in <br />\r\nBangladesh incorporated as Apsis Solutions Ltd. With the involvement of <br />\r\nskilled and experienced people working in the organization, the <br />\r\ncompanies jointly are involved in product marketing, delivery, <br />\r\nimplementation and post live support platform, various systems and <br />\r\nsolutions to different economic sectors. APSIS is considered as one of <br />\r\nthe fastest growing and leading solution provider in wireless electronic<br />\r\n data collaboration, order management, different mobility solution for <br />\r\ntelecom operators and various CRM and operational back bone software for<br />\r\n Financial Institutions.</p><br />\r\n<br />\r\n<p>The company has been formed by a group of professionals having vivid <br />\r\nexperience and wide exposure in Information Technology. People involved <br />\r\nhere are young qualified business graduates and qualified engineers from<br />\r\n the renowned universities across the globe. The resource personnel <br />\r\nworking in the company have been consistently providing reliable support<br />\r\n services and consultancy to a wide variety of corporate houses either <br />\r\nin the capacity of executive or as business partner or consultant. </p><br />\r\n<br />\r\n<p>It is a company where professionals from both technical and <br />\r\nfunctional field group together with an objective of providing <br />\r\nappropriate business solutions. It realizes the importance of functional<br />\r\n knowledge and its impact in developing business solutions. We <br />\r\nconstantly strive to be a leading technology firm with profound business<br />\r\n and functional knowledge.  </p>', '1', '2', 'top', 'active', '2013-07-24 12:42:41', '0');
INSERT INTO `apsis_module_info` VALUES ('4', 'PRODUCT', 'product', '', 'Every business has a defined business process and its unique set of <br />\r\nneeds. We understand this fact &amp; offer an array of solutions <br />\r\ncatering to the specific needs of the customers. We are considered as <br />\r\none of the fastest growing, leading solution provider in CRM, Wireless <br />\r\nElectronic Data Collaboration, Order Management, different Mobility <br />\r\nSolution &amp; Operational Backbone software ...', '0', '1', 'top', 'active', '2013-06-06 09:47:56', '0');
INSERT INTO `apsis_module_info` VALUES ('8', 'ACHIEVEMENT', 'achievement', '', 'dddd', '0', '1', 'top', 'deleted', '2013-06-09 06:08:06', '0');
INSERT INTO `apsis_module_info` VALUES ('36', 'ELECTRIC DATA COLLABORATION', 'wireless_data', '', '<p>With the recent proliferation of connectivity for small mobile \r\ncomputing devices, using cellular links, wireless LAN, Bluetooth and \r\nother radio-based technologies, the door has been opened for development\r\n of systems for ubiquitous collaboration with wide range of \r\napplications, such as mobile commerce, in-time training and maintenance,\r\n law enforcement, medical emergency and disaster relief services. Today,\r\n Android™, Apple® iPhone, Apple iPad, RIM® BlackBerry®, Microsoft \r\nWindows® Mobile and Nokia Symbian-based device owners get mobile \r\ncollaboration support from APSIS. APSIS offers robust and powerful \r\ncollaboration system where data can be captured from any input format. \r\nInformation is processed and verified with speed and accuracy, and the \r\nfinal output is delivered to your database after validation &amp; \r\nquality checks. The major challenge with wireless connections is that \r\nthey are, by nature, very dynamic, with the available bandwidth and the \r\nlatency changing rapidly over time. Another issue is that users need to \r\nseamlessly move between different computing devices and use the ones \r\nthat best suit their current needs, all during an ongoing collaborative \r\nsession.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>The benefits of our solution are:</strong></p>\r\n<p>&nbsp;</p>\r\n<ul><li>Simplified and streamlined order management OR data collection for the field persons with minimum overhead time.</li><li>Offline, Online and roll-out powerful, true e-Forms in the field to \r\ngrab data, sign documents and close the gap between the field &amp; back\r\n office.</li><li>Sales order OR collected data is registered in the central database in seconds</li><li>No possibility of data loss due to non recognition of hand written character.</li><li>A scalable solution that is able to manage many different types of forms in the future.</li><li>Real time statistics &amp; reports allows managers to provide back resources and support where and when needed.</li><li>Cost effective solution</li></ul>', '35', '3', 'top', 'active', '2014-07-07 08:44:14', '0');
INSERT INTO `apsis_module_info` VALUES ('37', 'ORDER MANAGEMENT', 'oms', '', '<div class=\"content clearfix\">\r\n    <div class=\"field field-name-body field-type-text-with-summary field-label-hidden\"><div class=\"field-items\"><div class=\"field-item even\"><h2>Order Management System</h2>\r\n<p>It is a Web-based solution intended to manage interaction between \r\nCustomer and Producer/Supplier with the facility of tracking all kinds \r\nof operational flow and efficient MIS generation.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Customer Information Management</strong></p>\r\n<p>&nbsp;</p>\r\n<ul><li>Comprehensive Customer Information Portal</li><li>Customer Profile Management for Controlling features in Customer Portal</li><li>Easy Accessible and Intuitive user interface regardless of source of content</li><li>Personalization/Customization of Interfaces for different customers using skins, logo etc</li><li>Individual Customer can manage their profile</li><li>The Customer Information provides all necessary fields for tracking a\r\n customer. However, customer wise customized fields can be defined</li></ul><p>&nbsp;</p>\r\n<p><strong>User Account Management</strong></p>\r\n<p>&nbsp;</p>\r\n<ul><li>Ability to Create, Edit or delete users in user friendly and easy manner</li><li>Role wise accesses for users to the system options and Menus as well as Workflows</li><li>Every user Login and activities in the system is logged. This can be traced through capturing Audit Trail.</li></ul><p>&nbsp;</p>\r\n<p><strong>Order &amp; Workflow Management</strong></p>\r\n<p>&nbsp;</p>\r\n<ul><li>Customers and Suppliers can place, view, edit orders, delivery schedules etc</li><li>Parameter Driven Order Creation facility (e.g. shipping mode, unit, etc.)</li><li>Orders are handled through a very strong work flow module which is customizable as per operating policy</li><li>User Admin function to control the functionality of the work flow module</li></ul><p>&nbsp;</p>\r\n<p><strong>Customer Feedback</strong></p>\r\n<p>&nbsp;</p>\r\n<ul><li>Customer feedback and issue tracking</li><li>Escalation of issues</li><li>Customer Surveys</li><li>Analysis and Reporting based on customer activity</li></ul><p>&nbsp;</p>\r\n<p><strong>Reporting Suits</strong></p>\r\n<p>&nbsp;</p>\r\n<ul><li>The system is bundled with a number of predefined static reports</li><li>Further customized reports can be developed based on user requirements</li><li>Dynamic Query Engine is available for custom data mining</li><li>Graphs &amp; Analysis reports are available</li></ul></div></div></div>  </div>', '35', '3', 'top', 'active', '2014-07-07 08:47:07', '0');
INSERT INTO `apsis_module_info` VALUES ('15', 'OUR VISSION', 'mission_vission', '', 'aaa', '0', '1', 'top', 'deleted', '2013-06-18 06:00:25', '0');
INSERT INTO `apsis_module_info` VALUES ('35', 'CUSTOMER SOLUTIONS', 'solutons', '', '<p>Every business has a defined business process and its unique set of \r\nneeds. We understand this fact &amp; offer an array of solutions \r\ncatering to the specific needs of the customers. We are considered as \r\none of the fastest growing, leading solution provider in CRM, Wireless \r\nElectronic Data Collaboration, Order Management, different Mobility \r\nSolution &amp; Operational Backbone software.</p>\r\n<p>&nbsp;</p>\r\n<div class=\"product_sub_link\">\r\n<ul><li><a href=\"http://www.apsissolutions.com/em-erp.html\">Enterprise Resource Planning</a></li><li><a href=\"http://www.apsissolutions.com/em-crm.html\">Customer Relationship Management</a></li><li><a href=\"http://www.apsissolutions.com/em-efm.html\">Enterprise Feedback Management</a></li><li><a href=\"http://www.apsissolutions.com/em-adcv.html\">Automatic Data Capture &amp; Verification</a></li><li><a href=\"http://www.apsissolutions.com/em-wedc.html\">Wireless Electronic Data Collaboration</a></li><li><a href=\"http://www.apsissolutions.com/em-oms.html\">Order Management System</a></li></ul></div>', '4', '2', 'top', 'active', '2014-07-07 08:36:53', '0');
INSERT INTO `apsis_module_info` VALUES ('32', 'MISSION & VISION', 'mission_vission', '8744727cd81e5a6cf36e7d5420e704de.jpg', '<p style=\"text-align:justify;\"><strong>In Celestial Mechanics, an Apsis, plural asides is the point of greatest\r\n or least distance of the elliptical orbit of an object from its centre \r\nof attraction, which is generally the centre of mass of the system. The \r\npoint of farthest excursion is called the Apoapsis or Apocentre and the \r\npoint of closest approach is called Periapsis or Pericentre.</strong></p><p style=\"text-align:justify;\"><strong>As an ellipse (like a circle) has\r\n no beginning and no end, we support the project from conceptualizing \r\nstage to implementing stage, thus, enabling us to provide you an \r\nend-to-end solution.</strong></p>\r\n<p>&nbsp;<b>Our Mission\r\n</b></p><p style=\"text-align:justify;\">Our Mission is to be the quality, high standard, reliable solution &amp; service Provider company in the ICT industry.</p>\r\n<p></p><h4>Our Vision</h4>\r\n<p style=\"text-align:justify;\">Our Vision is to achieve 100% customer \r\nsatisfaction by delivering quality products and services at an \r\naffordable cost. Our forward vision is to strive to become an entity in \r\ntechnology based corporate solutions, capable of demanding unconditional\r\n response from the targeted niche.</p>', '1', '2', 'top', 'active', '2014-07-07 07:56:30', '0');
INSERT INTO `apsis_module_info` VALUES ('33', 'OVERSEAS OPERATION', 'overseas', '0711d8fc539b95530d76c8efa33c2a38.jpg', 'APSIS is a software development company registered in Singapore as Apsis Communications Pte. Ltd. In addition to being the holding company, Apsis Solutions Sdn. Bhd. in Malaysia and APSISs off shore development facilities in Bangladesh incorporated as Apsis Solutions Ltd. With the involvement of skilled and experienced people working in the organization, the companies jointly are involved in product marketing, delivery, implementation and post live support platform, various systems and solutions to different economic sectors. APSIS is considered as one of the fastest growing and leading solution provider in wireless electronic data collaboration, order management, different mobility solution for telecom operators and various CRM and operational back bone software.', '1', '2', 'top', 'active', '2014-07-07 08:05:39', '0');
INSERT INTO `apsis_module_info` VALUES ('34', 'OUR INVOLVEMENT', 'involvement', '', '<h2>ICT Consultancy</h2>\r\n<p style=\"text-align:justify;\">We do consult for the high-end technology\r\n implementing at clients site or implementation of new technology \r\naccording to the clients requirement or upgrading, enhancement the \r\nexisting facilities in the clients end with the new technology \r\nintegrating with the existing one. APSIS offers a full range of \r\nconsulting services to help analyze your business requirements for \r\neffective implementation of solutions. Our consulting services cover :</p>\r\n<p>&nbsp;</p>\r\n<ul style=\"padding-left:25px;\"><li>Strategy planning</li><li>Assessment</li><li>Procurement</li><li>Re-engineering solutions</li><li>Planning, audits, best practices etc.</li></ul><p>&nbsp;</p>\r\n<h2>Software Development</h2>\r\n<p style=\"text-align:justify;\">Beside the hardware and network solution;\r\n with design and development expertise in diverse platforms, \r\nbest-of-breed tools and techniques, combined with industry best \r\npractices, APSIS offers scalable end-to-end application development and \r\nmanagement solutions from requirement analysis to deployment and \r\nrollout. We are developing software, related to financial institutions, \r\nmobility solutions, garments- production management, commercial jobs, \r\nbuying, accounting software for trading, manufacturing house and group \r\nof companies. APSISs services span the following application lifecycle \r\nstages :</p>\r\n<p>&nbsp;</p>\r\n<ul style=\"padding-left:25px; text-align:justify;\"><li style=\"list-style-type:circle;\"><strong>Application Development</strong>\r\n - Providing end-to-end development from requirement analysis to \r\ndeployment and rollout. The application may be bespoke or a COTS based \r\nproduct.</li><p>\r\n</p><li style=\"list-style-type:circle;\"><strong>Application Maintenance</strong> - Changing or enhancing software to meet changing or increasing business demands in the post-rollout phase of an application.</li><p>\r\n</p><li style=\"list-style-type:circle;\"><strong>Application Support</strong>\r\n - Providing first, second, third line support and on-call support. \r\nOn-call support further includes Gold (24x7), Silver and Bronze support.</li><p>\r\n</p><li style=\"list-style-type:circle;\"><strong>Application Integration/Migration/Transformation</strong> - Replacing, migrating and integrating legacy or bespoke systems with COTS products.</li><p>\r\n</p><li style=\"list-style-type:circle;\"><strong>Application Management</strong>\r\n - The application management layer cuts across all software engineering\r\n activities listed above. APSIS takes complete ownership of the \r\noutsourced suite of applications as per the agreed scope and manages the\r\n support. This typically involves transition management, project \r\nmanagement, proactive risk and scope change management, quality \r\nmanagement, SLA management etc.</li></ul><p>\r\n</p><p>&nbsp;</p>\r\n<h2>Software Integration</h2>\r\n<p style=\"text-align:justify;\">Growth in the Solution Integration (SI) \r\nservices market is fueled by the need for seamless business processes \r\nacross an organizations complete value chain of customers, partners, \r\nsuppliers, and employees. APSISs SI services enable clients to \r\nidentify, develop, and implement the best-fit solutions which are \r\nequipped to meet their changing business requirements. APSIS provides \r\ntotal project management, right from architecture design, integration, \r\nsystem and interface development to migration backed by world-class \r\nmethodologies, well-defined solution frameworks and extensive \r\nintegration experience with tier-1 service providers.</p>\r\n<p>&nbsp;</p>\r\n<h2>Hardware Sales &amp; Support Servoces</h2>\r\n<p style=\"text-align:justify;\">We have already started to sale \r\ncomputers, computer accessories and services. Our team of experts is \r\nready to serve you when you are worried due to lack of confidence in \r\n\"commitment of service\". You are hereby requested to call us for any \r\nkind of requirement of computers, computer parts and services whatever \r\nyou need.</p>\r\n<p>\r\n</p>\r\n<h2>Managed Services</h2>\r\n<p style=\"text-align:justify;\">APSIS has the expertise and experience to\r\n manage an enabling infrastructureand applications and run outsourced \r\noperations for large telecom operators smoothly. APSISs Managed \r\nServices offerings cover the entire array of IT outsourcing services \r\nincluding networks, IT infrastructure, applications and business \r\nprocesses.</p>\r\n<p>\r\n</p>\r\n<h2>Unified Communication</h2>\r\n<p style=\"text-align:justify;\">With the Microsoft Office Communication \r\n(OCS) 2007 is to build all your communication need including instant \r\nmessaging and e-mail services.</p>', '1', '2', 'top', 'active', '2014-07-07 08:10:55', '0');
INSERT INTO `apsis_module_info` VALUES ('42', 'TELECOM SOLUTIONS', 'telecom', '', 'APSIS is a premier solution provider in the Telecom solutions arena. \r\nAPSIS has a wide range of value added services and product offerings for\r\n the telecom operators. APSIS is also one of the carriers of \r\ninternational voice traffic. Our services include VoIP Carrier Service, \r\nVOIP wholesale, Related Software Development etc.', '4', '2', 'top', 'active', '2014-07-07 10:12:31', '0');
INSERT INTO `apsis_module_info` VALUES ('43', 'POST PAID CONVERGENT BILLING', 'convergent_billing', '', '<p style=\"text-align:justify\">Telco Operators know that billing is where\r\n the rubber meets the road. Service turn-up and delivery mean nothing if\r\n customer payment cannot take place. Billing sounds so simple: send an \r\ninvoice, collect payment. In reality, considerable network \r\ninfrastructure and systems integration is required to deploy an \r\neffective billing operations support system.</p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align:justify\">Apsis Convergent Customer Care &amp; \r\nBilling Solution is an integrated Customer Care and Billing solution \r\nthat supports billing for multiple services necessary in todays \r\nconvergent telecommunications, IP voice telephony and Internet service \r\nprovider environments. The products powerful rating and billing \r\nfunctionality, coupled with a range of modules that address the areas of\r\n Customer Care, Accounting, Agent/Distributor Management, Reporting and \r\nWeb interface for access over the Internet, makes it a complete \r\nback-office system for a service provider.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">Apsis Convergent Customer Care &amp; Billing Solution consists of the following modules:</p>\r\n<p>&nbsp;</p>\r\n<ul style=\"padding-left:25px;\"><li style=\"list-style-type:circle;\">Convergent Customer Care &amp; Billing</li>\r\n<li style=\"list-style-type:circle;\">Customer Management</li>\r\n<li style=\"list-style-type:circle;\">Product Management</li>\r\n<li style=\"list-style-type:circle;\">Rating</li>\r\n<li style=\"list-style-type:circle;\">Billing &amp; Invoicing</li>\r\n<li style=\"list-style-type:circle;\">Bill Presentment</li>\r\n<li style=\"list-style-type:circle;\">Reseller Management</li>\r\n<li style=\"list-style-type:circle;\">Accounting</li>\r\n<li style=\"list-style-type:circle;\">Service Provisioning</li>\r\n<li style=\"list-style-type:circle;\">Data Collection</li>\r\n<li style=\"list-style-type:circle;\">Trouble Tickets</li></ul>', '42', '3', 'top', 'active', '2014-07-07 10:18:27', '0');
INSERT INTO `apsis_module_info` VALUES ('44', 'MOBILE COMMERCE', 'mobile_commerce', '', '<p style=\"text-align:justify;\">Apsis Mobile Commerce Platform enables a \r\nwide range of innovative mobile financial services including direct \r\ntop-up, agent top-up, bill payment, person-to-person payments, mobile \r\nbanking, cross border VAS and both national and international \r\nremittances.</p>\r\n<p>&nbsp;</p>\r\n<ul style=\"padding-left:25px; text-align:justify;\"><li style=\"list-style-type:circle;\">Mobile\r\n Wallet: Apsis Mobile Wallet application enables organizations to launch\r\n banking services to un-banked communities typically excluded from \r\ntraditional banking facilities. These services allow un-banked customers\r\n perform banking transactions over their mobile phone.</li>\r\n<li style=\"list-style-type:circle;\">Mobile Agent Top-up: Apsis Agent \r\nTop-Up allows airtime distributors to sell prepaid top-ups through a \r\nmuch wider base of agents than is currently possible using vouchers or \r\nscratch cards. This electronic recharge method links directly with the \r\noperators prepaid billing system, bypassing vouchers, and enables \r\nagents to securely recharge subscribers credit with a wide range of \r\ndevices including using the agents mobile phone as a POS device.</li>\r\n<li style=\"list-style-type:circle;\">Bill Payment: Apsis Bill Payment \r\nservices allow bill payment intermediaries to offer bill payment \r\nservices to utilities and other organizations (e.g. to pay a post paid \r\nbill with ones mobile operator, pay school fees, professional body \r\nannual fees).</li>\r\n<li style=\"list-style-type:circle;\">Mobile Banking: Apsis Mobile Banking\r\n application enables subscribers to access their bank account and carry \r\nout banking transactions using their mobile phone, including balance \r\nenquiries, mini-statements, inter account transfers, third party \r\ntransfers, utility bill payments, transaction statements.</li>\r\n<li style=\"list-style-type:circle;\">International Remittance: Mobile \r\nsubscribers in donor countries can transfer cash directly from their \r\nmobile phone to mobile wallet of their family and friends in the \r\nrecipient country. This can be done either by directly debiting mobile \r\nphone account or by debiting a previously registered credit or debit \r\ncard. It is a secure, fast, convenient and cheaper way of remitting cash\r\n than using traditional means.</li>\r\n</ul><p>&nbsp;</p>\r\n<p style=\"text-align:justify;\">The benefits of the system are as follows :</p>\r\n<p>&nbsp;</p>\r\n<ul style=\"padding-left:25px; text-align:justify;\"><li style=\"list-style-type:circle;\">Mobile\r\n Operators: Reduce costs - expensive traditional POS devices and fixed \r\nline infrastructure are not required, Expand distribution network, Add \r\nrevenue generating solutions, Increase customer satisfaction.</li>\r\n<li style=\"list-style-type:circle;\">Agents and Distributors: Increase \r\nrevenue - provide additional chargeable services, Quickly expand \r\ndistribution network, Grow customer base, Increase customer satisfaction</li>\r\n<li style=\"list-style-type:circle;\">Banks: Reduce costs - quicker and \r\ncheaper to rollout than ATMs or new branches, Create new revenue \r\nsources, Grow customer base, Increase customer loyalty, Develop new low \r\ncost channel with minimal investment, Reduce queues in bank and at ATM, \r\nInform customers through account and bank notifications, Place the \r\nbanks brand on its customers primary communications devices</li></ul>', '42', '3', 'top', 'active', '2014-07-07 10:21:02', '0');
INSERT INTO `apsis_module_info` VALUES ('45', 'VOICE SERVICE DELIVERY', 'voice', '', '<p style=\"text-align:justify;\">VSDP is a general Voice Service Delivery \r\nPlatform which can provide multiple services (e.g. Voice Messaging, \r\nMusic Messaging, Voice Chat &amp; Other Infotainment) using the same \r\nhardware platform with capability of handling multiple services over \r\ndifferent access codes.<br>&nbsp;</p>\r\n<p>Apsis VSDP consists of the following features :</p>\r\n<p>&nbsp;</p>\r\n<ul style=\"padding-left:25px;\"><li style=\"list-style-type:circle;\">Air-time Charging is the default. But content charging can be done if proper Charging Interface is available.</li>\r\n<li style=\"list-style-type:circle;\">Generates CDR in flat file and stores them in Database as well.</li>\r\n<li style=\"list-style-type:circle;\">Statistics are available.</li>\r\n<li style=\"list-style-type:circle;\">Web Based Customer Care Interface is available.</li>\r\n<li style=\"list-style-type:circle;\">Sharing of Hardware Resources ensures proper utilization and provides option for accommodation of service wise super peaks.</li>\r\n<li style=\"list-style-type:circle;\">Regular Heartbeat interface for remote monitoring of service.</li>\r\n<li style=\"list-style-type:circle;\">Channel Status Monitor - for status monitor of Channels.</li>\r\n<li style=\"list-style-type:circle;\">SS7 / ISDN Signaling Interface.</li>\r\n<li style=\"list-style-type:circle;\">Various services can be deployed instantly e.g. Voice SMS, Music Messaging, Anonymous Voice Chat, Voice Portal etc.</li></ul>', '42', '3', 'top', 'active', '2014-07-07 10:22:48', '0');

-- ----------------------------
-- Table structure for `apsis_news`
-- ----------------------------
DROP TABLE IF EXISTS `apsis_news`;
CREATE TABLE `apsis_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `news_date` date DEFAULT NULL,
  `title` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `rank` int(3) NOT NULL,
  `photo` varchar(37) CHARACTER SET latin1 NOT NULL,
  `status` set('active','inactive','deleted') CHARACTER SET latin1 NOT NULL,
  `recTime` datetime NOT NULL,
  `recBy` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=ucs2;

-- ----------------------------
-- Records of apsis_news
-- ----------------------------
INSERT INTO `apsis_news` VALUES ('32', '2', '2013-03-12', 'Hackers declare -nuclear leak- on Israeli Twitter account', '<span id=\"articleText\"><span class=\"focusParagraph\"><p>Hackers posted a \r\nbogus announcement of a rocket strike against Israels Dimona reactor \r\nand a possible nuclear leak on a Twitter account used by the Israeli \r\nmilitary, which said on Friday it was combating such cyber attacks.</p>\r\n</span><span id=\"midArticle_0\"></span><p>The English-language account, \r\n@IDFSpokesperson, has 252,000 followers and usually scrolls out rapid \r\nupdates on Israels various fighting fronts. It was inactive on Friday, \r\nhowever, as a military spokeswoman said \"several incorrect tweets\" were \r\nbeing investigated by Israeli authorities. </p><span id=\"midArticle_1\"></span><p>She\r\n did not elaborate, but the Walla news site published a snapshot of a \r\ntweet that had appeared on the account on Thursday night before being \r\nremoved. It read: \"#WARNING: Possible nuclear leak in the region after 2\r\n rockets hit Dimona nuclear facility.\"</p><span id=\"midArticle_2\"></span><p>That referred to a reactor in Israels southern desert, where it is widely believed to have developed nuclear weapons.</p><span id=\"midArticle_3\"></span><p>Israeli\r\n websites are frequently the target of pro-Palestinian and Syrian \r\nhackers and Prime Minister Benjamin Netanyahu has encouraged investment \r\nin national cybersecurity.</p><span id=\"midArticle_4\"></span><p>The most\r\n recent authorised tweet on @IDFSpokesman promised the military would \r\n\"combat terror on all fronts including the cyber dimension\".    </p><span id=\"midArticle_5\"></span><span id=\"midArticle_6\"></span><p> (Writing by Dan Williams; Editing by Jeffrey Heller)</p><span id=\"midArticle_7\"></span></span>', '1', 'a4f918961600855420fa8bff3cd65a4d.jpg', 'active', '2013-06-19 07:23:35', '1');
INSERT INTO `apsis_news` VALUES ('33', '2', '2013-07-12', 'Samsung Electronics faces falling profits as succession looms', '<span id=\"articleText\"><span class=\"focusParagraph\"><p>(Reuters) - \r\nSmartphone leader Samsung Electronics Co Ltd faces a third straight \r\nquarter of profit decline that could become a fourth as cheaper models \r\ngrab a bigger share of a slowing market and Apple Inc readies the launch\r\n of its iPhone 6. </p>\r\n</span><span id=\"midArticle_1\"></span><p>Samsung Electronics woes, \r\nexacerbated by a won that has risen to a six-year high against the \r\ndollar, come at an awkward time for the flagship of South Koreas \r\nlargest conglomerate. The maker of the Galaxy smartphone is expected to \r\nsay on Tuesday that earnings likely fell 12.6 percent for the quarter \r\nended June, according to a Thomson Reuters I/B/E/S poll. </p><span id=\"midArticle_2\"></span><p>The\r\n groups patriarch Lee Kun-hee has been hospitalised since May following\r\n a heart attack, and the succession map for his three children - \r\nincluding heir-apparent Jay Y. Lee - remains unclear.</p><span id=\"midArticle_3\"></span><p>\"Samsungs\r\n heyday has gone. Its profit growth was abnormally high for the past \r\nthree to four years, and now that is normalising,\" said Chang Sea-Jin, a\r\n business professor at&nbsp;Korea Advanced Institute of Science and \r\nTechnology and author of the book \"Sony vs Samsung\".</p><span id=\"midArticle_4\"></span><p>Analysts\r\n say Samsungs top-end Galaxy S5 handset, released in late March, is \r\nselling well but not well enough to offset weaker shipments for low- and\r\n mid-tier devices. Its next big product launch, the Galaxy Note 4, is \r\nexpected later this year but is not forecast by analysts to be a \r\ngame-changer. </p><span id=\"midArticle_5\"></span><p>Its foray into \r\nwearable devices like the Gear smartwatch, meanwhile, remains at an \r\nearly stage and faces tough competition from Apple and others. That \r\nleaves Samsung Electronics under margin pressure and without a clear new\r\n growth driver for the immediate future.</p></span>', '2', 'f02d7865d6c7d5e579e573f72fd921e0.jpg', 'active', '2013-06-19 07:24:04', '1');
INSERT INTO `apsis_news` VALUES ('37', '2', '2013-03-11', 'Ordinary people outnumber targeted foreigners in NSA data - Wash. Post', '<span id=\"articleText\"><span class=\"focusParagraph\"><p>(Reuters) - The \r\nWashington Post said on Saturday a study of a large collection of \r\ncommunications intercepted by the U.S. National Security Agency showed \r\nthat ordinary Internet users, including Americans, far outnumbered \r\nlegally targeted foreigners caught in the surveillance.</p>\r\n</span><span id=\"midArticle_0\"></span><p>\"Nine of 10 account holders \r\nfound in a large cache of intercepted conversations, which former NSA \r\ncontractor Edward Snowden provided in full to The Post, were not the \r\nintended surveillance targets but were caught in a net the agency had \r\ncast for somebody else,\" the Post said.</p><span id=\"midArticle_1\"></span><p>Nearly\r\n half of the files \"contained names, email addresses or other details \r\nthat the NSA marked as belonging to U.S. citizens or residents,\" it \r\nsaid.</p><span id=\"midArticle_2\"></span><p>The paper said the files also\r\n contained discoveries of considerable intelligence value, including \r\n\"fresh revelations about a secret overseas nuclear project, \r\ndouble-dealing by an ostensible ally, a military calamity that befell an\r\n unfriendly power, and the identities of aggressive intruders into U.S. \r\ncomputer networks.\"</p><span id=\"midArticle_3\"></span><p>Tracking the \r\ncommunications led to the capture of some terrorism suspects, including \r\nUmar Patek, a suspect in a 2002  bombing on the Indonesian island of \r\nBali, it said.</p><span id=\"midArticle_4\"></span><p>Many other files \r\nwere retained although, described as useless by analysts, they were \r\nabout intimate issues such as love, illicit sexual relations, political \r\nand religious conversions and financial anxieties, the Post said.</p><span id=\"midArticle_5\"></span><p>The\r\n paper said it reviewed about 160,000 emails and instant-message \r\nconversations and 7,900 documents taken from more than 11,000 online \r\naccounts, collected between 2009 and 2012.</p><span id=\"midArticle_6\"></span><p>U.S.\r\n intelligence officials declined to confirm or deny in general terms the\r\n authenticity of the intercepted content provided by Snowden to the \r\nPost.</p><span id=\"midArticle_7\"></span><span id=\"midArticle_8\"></span><span id=\"midArticle_9\"></span><p> (Reporting by Mohammad Zargham; Editing by Lisa Shumaker)</p></span>', '1', '9efddfad22547ea12e3799e77dc13fde.jpg', 'active', '2013-07-25 06:23:56', '0');
INSERT INTO `apsis_news` VALUES ('38', '2', '2013-05-25', 'IBM signs up to help fight Chinas war on smog', '<span id=\"articleText\"><span class=\"focusParagraph\"><p>IBM \r\nCorp has signed an agreement with the city of Beijing to use advanced \r\nweather forecasting and cloud computing technologies to help tackle the \r\nChinese capitals persistent smog.</p>\r\n</span><span id=\"midArticle_1\"></span><p>After a series of pollution \r\nscares and scandals, Chinas central government has promised to reverse \r\nsome of the damage done to the nations sky, rivers and soil by more \r\nthan three decades of growth. But China has first had to improve data \r\ncollection, monitoring and forecasting capabilities before it can work \r\non cutting smog and pollution.</p><span id=\"midArticle_2\"></span><p>Beijing\r\n city already uses an alerting system based on data from 35 monitoring \r\nstations, allowing it to shut schools and factories and cut traffic \r\nthree days in advance, but residents still complain that not enough is \r\nbeing done.</p></span>', '3', 'e93f02d9a54862611de80fc2a558f17f.jpg', 'active', '2013-07-25 06:24:20', '0');

-- ----------------------------
-- Table structure for `apsis_news_category`
-- ----------------------------
DROP TABLE IF EXISTS `apsis_news_category`;
CREATE TABLE `apsis_news_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `proxy_url` varchar(100) DEFAULT NULL,
  `rank` int(2) NOT NULL,
  `photo` varchar(37) CHARACTER SET latin1 NOT NULL,
  `status` set('active','inactive','deleted') CHARACTER SET latin1 NOT NULL,
  `recTime` datetime NOT NULL,
  `recBy` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of apsis_news_category
-- ----------------------------
INSERT INTO `apsis_news_category` VALUES ('1', 'Education News test', 'campus', '10', '325f98ea8c3d70655049c4f45a8985d8.jpg', 'active', '2012-08-30 20:21:23', '2');
INSERT INTO `apsis_news_category` VALUES ('2', 'IT Related News', 'edu', '2', '2805fd290e770513d95447a5680f5133.jpg', 'active', '2012-08-30 21:10:06', '2');
INSERT INTO `apsis_news_category` VALUES ('3', 'Global News', 'global', '3', 'aad0460983f71161c3588a9bc660694a.jpg', 'active', '2012-08-30 21:11:05', '2');

-- ----------------------------
-- Table structure for `apsis_photo`
-- ----------------------------
DROP TABLE IF EXISTS `apsis_photo`;
CREATE TABLE `apsis_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `rank` int(3) NOT NULL,
  `photo_thumb` varchar(37) CHARACTER SET latin1 NOT NULL,
  `photo_large` varchar(37) CHARACTER SET latin1 NOT NULL,
  `status` set('active','inactive','deleted') CHARACTER SET latin1 NOT NULL,
  `recTime` datetime NOT NULL,
  `recBy` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of apsis_photo
-- ----------------------------
INSERT INTO `apsis_photo` VALUES ('43', '17', 'বাংলাদেশ মাদ্রাসা ছাত্রকল্যাণ পরিষদ- এর ওয়েভ সাইটে আপনাকে স্বাগতম', 'াপইাইা', '1', '', '', 'active', '2013-06-27 08:06:40', '0');
INSERT INTO `apsis_photo` VALUES ('44', '17', '৬৫৬৫৪', '৬৪৫৬৫৪', '2', '', '', 'active', '2013-06-27 08:10:05', '0');
INSERT INTO `apsis_photo` VALUES ('45', '17', '৬৫৬৫৪', '৬৪৫৬৫৪', '2', '', '', 'active', '2013-06-27 08:11:33', '0');
INSERT INTO `apsis_photo` VALUES ('48', '17', 'িাুিা', 'িুাুিা', '1', '', '', 'active', '2013-06-27 08:25:24', '0');
INSERT INTO `apsis_photo` VALUES ('49', '17', '৩২৪২৩৪', '২৩৪২৩৪', '3', 'd3683f43de4ae16382c01314a80e3cfc.jpg', 'bc97d5d97d686d75851bce9b64b849ba.jpg', 'active', '2013-06-27 08:25:59', '0');
INSERT INTO `apsis_photo` VALUES ('50', '1', 'Beauty of Bangladesh', 'Photo on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of Bangladesh', '1', '95060dfbfd57d04aae6c9eb2230fec7c.jpg', '7ad8a49695a70f40c5860e4dd780d9c3.jpg', 'active', '2013-07-03 11:17:18', '0');
INSERT INTO `apsis_photo` VALUES ('51', '1', 'Beauty of BD-2', 'Photo on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of Bangladesh', '2', '612353917668da27f9f4afe7deccd480.jpg', 'dd755c28bdb5632ed049f4d8ef474ad2.jpg', 'active', '2013-07-03 11:17:53', '0');
INSERT INTO `apsis_photo` VALUES ('52', '1', 'Beauty of BD-3', 'Photo on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of Bangladesh', '3', 'a0cd87a163524ff9924ab1163ecba7a9.jpg', '8c1758652e028ce33ff8e7b66791c443.jpg', 'active', '2013-07-03 11:19:43', '0');
INSERT INTO `apsis_photo` VALUES ('53', '1', 'Beauty of BD-4', 'Photo on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of Bangladesh', '4', '6259e44925c69a3d37245915903a1fca.jpg', '91f39832b44cca07c741528055d5d6d9.jpg', 'active', '2013-07-03 11:20:29', '0');
INSERT INTO `apsis_photo` VALUES ('54', '1', 'Beauty of BD-5', 'Photo on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of Bangladesh', '5', '79004523df197d60ed12180d48171923.jpg', 'f4f694101ded203f4a48c544120b3ecf.jpg', 'active', '2013-07-03 11:21:57', '0');
INSERT INTO `apsis_photo` VALUES ('55', '1', 'Beauty of BD-6', 'Photo on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of Bangladesh', '6', '9a91a40ac863a8ee2cb2c8fc72b48487.jpg', 'cbaf8b0a7d5640e2fe928dd0a66f4c7f.jpg', 'active', '2013-07-03 11:22:47', '0');
INSERT INTO `apsis_photo` VALUES ('56', '1', 'Beauty of BD-7', 'Photo on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of Bangladesh', '7', '2600b57afa0b72c45dc851db31ad424c.jpg', '55492902bbf9250b75dc7ae2a7f3ebc4.jpg', 'active', '2013-07-03 11:23:53', '0');
INSERT INTO `apsis_photo` VALUES ('57', '1', 'Beauty of BD-8', 'Photo on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of Bangladesh', '8', '63d66c8a819049a98a070223bb1de8bb.jpg', '4b13b356db8dbad948026773926e2a4c.jpg', 'active', '2013-07-03 11:25:16', '0');
INSERT INTO `apsis_photo` VALUES ('58', '1', 'Beauty of BD-9', 'Photo on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of Bangladesh', '9', '67576a581abee74100d8753005012e66.jpg', '41db1ee4854c91097f7adf516c6e230d.jpg', 'active', '2013-07-03 11:25:50', '0');
INSERT INTO `apsis_photo` VALUES ('59', '1', 'Beauty of BD-10', 'Photo on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of BangladeshPhoto on beauty of Bangladesh', '10', '930b4bf4efa550d29de70072f70b7821.jpg', '406ea08e65bcbe0bc35e597407c855f1.jpg', 'active', '2013-07-03 11:26:56', '0');

-- ----------------------------
-- Table structure for `apsis_sys_menu`
-- ----------------------------
DROP TABLE IF EXISTS `apsis_sys_menu`;
CREATE TABLE `apsis_sys_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) DEFAULT NULL,
  `menu_target` varchar(255) DEFAULT NULL,
  `menu_parent_id` int(11) DEFAULT NULL,
  `menu_sort` int(11) DEFAULT NULL,
  `menu_view` set('no','yes') DEFAULT NULL,
  `status` set('deleted','inactive','active') DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of apsis_sys_menu
-- ----------------------------
INSERT INTO `apsis_sys_menu` VALUES ('1', 'User Management', '#', null, '1', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('2', 'User List', 'userView.php', '1', '1', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('3', 'User Add', 'userADD.php', '1', '2', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('4', 'Edit', 'userEdit.php', '1', '3', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('5', 'Delete', 'userDelete.php', '1', '4', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('6', 'Menu Access', 'saveAccess.php', '1', '5', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('7', 'Page Management', '#', null, '2', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('8', 'Page List', 'moduleView.php', '7', '1', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('9', 'Page List Edit', 'moduleEdit.php', '7', '0', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('10', 'Page Add', 'moduleAdd.php', '7', '2', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('11', 'Page List Delete', 'moduleDelete.php', '7', '0', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('13', 'Copy Right', 'contentControl.php?content_id=4', '7', '4', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('12', 'Main Page', 'contentControl.php?content_id=1', '7', '3', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('14', 'Use Police', 'contentControl.php?content_id=5', '7', '5', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('15', 'Terms & Condition', 'contentControl.php?content_id=6', '7', '6', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('16', 'Privacy Policy', 'contentControl.php?content_id=7', '7', '7', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('17', 'Contact Us', 'contactView.php', '7', '8', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('18', 'Article Management', '#', null, '5', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('19', 'Category List', 'articlecategoryView.php', '18', '1', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('20', 'Category Add', 'articlecategoryAdd.php', '18', '2', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('21', 'Category List Edit', 'articlecategoryEdit.php', '18', '0', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('22', 'Category List Delete', 'articlecategoryDelete.php', '18', '0', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('23', 'Article List', 'articleView.php', '18', '3', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('24', 'Article Add', 'articleAdd.php', '18', '4', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('25', 'Article Edit', 'articleEdit.php', '18', '0', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('26', 'Article Delete', 'articleDelete.php', '18', '0', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('27', 'Photo Gallery', '#', null, '3', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('28', 'Gallery List', 'categoryView.php', '27', '1', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('29', 'Gallery Add', 'categoryAdd.php', '27', '2', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('30', 'Gallery Edit', 'categoryEdit.php', '27', '0', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('31', 'Category List Delete', 'categoryDelete.php', '27', '0', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('32', 'Photo List', 'photoView.php', '27', '3', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('33', 'Photo Add', 'photoAdd.php', '27', '4', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('34', 'Photo List Edit', 'photoEdit.php', '27', '0', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('35', 'Photo List Delete', 'photoDelete.php', '27', '0', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('41', 'News Management', '#', null, '5', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('37', 'Banner List', 'bannerView.php', '27', '5', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('38', 'Banner Add', 'bannerAdd.php', '27', '6', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('39', 'Banner List Edit', 'bannerEdit.php', '27', '0', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('40', 'Banner List Delete', 'bannerDelete.php', '27', '0', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('42', 'Category List', 'newscategoryView.php', '41', '1', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('43', 'Category Add', 'newscategoryAdd.php', '41', '2', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('44', 'Category List Edit', 'newscategoryEdit.php', '41', '0', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('45', 'Category List Delete', 'newscategoryDelete.php', '41', '0', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('46', 'News List', 'newsView.php', '41', '3', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('47', 'News Add', 'newsAdd.php', '41', '4', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('48', 'News List Edit', 'newsEdit.php', '41', '0', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('49', 'News List Delete', 'newsDelete.php', '41', '0', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('50', 'Directory', '#', null, '6', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('51', 'Feed back', 'feedbackView.php', '7', '10', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('52', 'List Delete', 'feedbackDelete.php', '7', '0', 'no', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('53', 'Police Add', 'directoryAdd.php', '50', '1', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('54', 'Personal Info Add', '#', '50', '3', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('55', 'Institue Info Add', '#', '50', '2', 'yes', 'active');
INSERT INTO `apsis_sys_menu` VALUES ('56', 'Police List', '#', '50', '4', 'yes', 'active');

-- ----------------------------
-- Table structure for `poll_apsis_ad`
-- ----------------------------
DROP TABLE IF EXISTS `poll_apsis_ad`;
CREATE TABLE `poll_apsis_ad` (
  `op` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` varchar(30) NOT NULL,
  `admin_pass` varchar(35) NOT NULL,
  PRIMARY KEY (`op`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of poll_apsis_ad
-- ----------------------------
INSERT INTO `poll_apsis_ad` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- ----------------------------
-- Table structure for `poll_apsis_answer`
-- ----------------------------
DROP TABLE IF EXISTS `poll_apsis_answer`;
CREATE TABLE `poll_apsis_answer` (
  `op` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(250) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `tm` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`op`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=ucs2;

-- ----------------------------
-- Records of poll_apsis_answer
-- ----------------------------
INSERT INTO `poll_apsis_answer` VALUES ('16', 'Sakib Al Hasan', null, '1', '1371618338');
INSERT INTO `poll_apsis_answer` VALUES ('17', 'Tamim Iqbal', null, '2', '1371618338');
INSERT INTO `poll_apsis_answer` VALUES ('18', 'Musfiqur Rahim', null, null, null);
INSERT INTO `poll_apsis_answer` VALUES ('19', 'Good', null, '1', '1404730899');
INSERT INTO `poll_apsis_answer` VALUES ('20', 'Below Average', null, '2', '1404730899');
INSERT INTO `poll_apsis_answer` VALUES ('21', 'Above Average', null, '3', '1404730899');
INSERT INTO `poll_apsis_answer` VALUES ('22', 'Excellent', null, '4', '1404730899');
INSERT INTO `poll_apsis_answer` VALUES ('23', 'None', null, '5', '1404730899');

-- ----------------------------
-- Table structure for `poll_apsis_cust`
-- ----------------------------
DROP TABLE IF EXISTS `poll_apsis_cust`;
CREATE TABLE `poll_apsis_cust` (
  `op` int(11) NOT NULL AUTO_INCREMENT,
  `pw` varchar(10) DEFAULT NULL,
  `boc` varchar(10) DEFAULT NULL,
  `bbc` varchar(10) DEFAULT NULL,
  `hlc` varchar(10) DEFAULT NULL,
  `hls` varchar(10) DEFAULT NULL,
  `ttc` varchar(10) DEFAULT NULL,
  `bts` varchar(10) DEFAULT NULL,
  `btc` varchar(10) DEFAULT NULL,
  `buc` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`op`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of poll_apsis_cust
-- ----------------------------
INSERT INTO `poll_apsis_cust` VALUES ('1', '290', '#FFFFF', '#FFF', '#FFF', '14', '#000066', '11', '#000000', '#000000');

-- ----------------------------
-- Table structure for `poll_apsis_quiz`
-- ----------------------------
DROP TABLE IF EXISTS `poll_apsis_quiz`;
CREATE TABLE `poll_apsis_quiz` (
  `op` int(11) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8,
  `tm` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`op`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=ucs2;

-- ----------------------------
-- Records of poll_apsis_quiz
-- ----------------------------
INSERT INTO `poll_apsis_quiz` VALUES ('7', 'Best Player of Bangladesh ?', '1371618338');
INSERT INTO `poll_apsis_quiz` VALUES ('8', 'What is your Satisfactory level about our service ?', '1404730899');

-- ----------------------------
-- Table structure for `poll_apsis_result`
-- ----------------------------
DROP TABLE IF EXISTS `poll_apsis_result`;
CREATE TABLE `poll_apsis_result` (
  `op` int(11) NOT NULL AUTO_INCREMENT,
  `point` int(11) DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `tm` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`op`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of poll_apsis_result
-- ----------------------------
INSERT INTO `poll_apsis_result` VALUES ('19', '1', '713', '1371618338');
INSERT INTO `poll_apsis_result` VALUES ('16', '1', '169', '1371618338');
INSERT INTO `poll_apsis_result` VALUES ('17', '2', '616', '1371618338');
INSERT INTO `poll_apsis_result` VALUES ('18', '1', '883', '1371618338');
INSERT INTO `poll_apsis_result` VALUES ('20', '1', '554', '1404730899');
