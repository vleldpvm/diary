/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.24-MariaDB : Database - diary
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`diary` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `diary`;

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `email` varchar(20) NOT NULL,
  `iname` varchar(20) NOT NULL,
  `qty` int(3) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`email`,`iname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `cart` */

/*Table structure for table `diary` */

DROP TABLE IF EXISTS `diary`;

CREATE TABLE `diary` (
  `dno` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(20) NOT NULL,
  `wdate` date NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `tag` varchar(20) DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL,
  `scope` varchar(10) NOT NULL,
  PRIMARY KEY (`dno`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `diary` */

insert  into `diary`(`dno`,`email`,`wdate`,`title`,`content`,`tag`,`image`,`scope`) values 
(13,'abc@gmail.com','2022-06-15','가을 아침','이른 아침 작은 새들 노랫소리 들려오면\r\n언제나 그랬듯 아쉽게 잠을 깬다\r\n창문 하나 햇살 가득 눈부시게 비쳐오고\r\n서늘한 냉기에 재채기할까 말까\r\n눈 비비며 빼꼼히 창밖을 내다보니\r\n삼삼오오 아이들은 재잘대며 학교 가고\r\n산책 갔다 오시는 아버지의 양손에는\r\n효과를 알 수 없는 약수가 하나 가득\r\n딸각딸각 아침 짓는 어머니의 분주함과\r\n엉금엉금 냉수 찾는 그 아들의 게으름이\r\n상큼하고 깨끗한 아침의 향기와\r\n구수하게 밥 뜸드는 냄새가 어우러진\r\n가을 아침 내겐 정말 커다란 기쁨이야\r\n가을 아침 내겐 정말 커다란 행복이야\r\n응석만 부렸던 내겐\r\n파란 하늘 바라보며 커다란 숨을 쉬니\r\n드높은 하늘처럼 내 마음 편해지네\r\n텅 빈 하늘 언제 왔나 고추잠자리 하나가\r\n잠 덜 깬 듯 엉성히 돌기만 비잉비잉\r\n토닥토닥 빨래하는 어머니의 분주함과\r\n동기동기 기타 치는 그 아들의 한가함이\r\n심심하면 쳐대는 괘종시계 종소리와\r\n시끄러운 조카들의 울음소리 어우러진\r\n가을 아침 내겐 정말 커다란 기쁨이야\r\n가을 아침 내겐 정말 커다란 행복이야\r\n응석만 부렸던 내겐\r\n가을 아침 내겐 정말 커다란 기쁨이야\r\n가을 아침 내겐 정말 커다란 행복이야\r\n뜬구름 쫓았던 내겐\r\n이른 아침 작은 새들 노랫소리 들려오면\r\n언제나 그랬듯 아쉽게 잠을 깬다\r\n창문 하나 햇살 가득 눈부시게 비쳐오고\r\n서늘한 냉기에 재채기할까 말까 ',NULL,'','전체'),
(14,'abc@gmail.com','2022-06-15','너','아득히 떨어진 곳에서\r\n아무 관계없는 것들을 보며\r\n조금 쓸쓸한 기분으로\r\n나는 너를 보고픈 너를 떠올린다\r\n아 애달프다 일부러 그러나\r\n넌 어떨까 오늘도 어여쁜가 너 너\r\n어딘가 너 있는 곳에도\r\n여기와 똑같은 하늘이 드나\r\n문득 걸음이 멈춰지면\r\n그러면 너도 잠시 나를 떠올려 주라\r\n다 너 같다 이리도 많을까\r\n뜨고 흐르고 설키고 떨어진다 너 너\r\n아득히 떨어진 곳에서\r\n끝없이 흐노는 누구를 알까\r\n별 하나 없는 새카만 밤\r\n나는 너를 유일한 너를 떠올린다',NULL,'','나만보기'),
(15,'abc@gmail.com','2022-06-15','싫은날','키 큰 전봇대 조명 아래\r\n나 혼자 집에 돌아가는 길\r\n가기 싫다 쓸쓸한 대사 한 마디\r\n점점 느려지는 발걸음\r\n동네 몇 바퀴를 빙빙 돌다 결국\r\n도착한 대문 앞에 서서 열쇠를 만지작 만지작\r\n아무 소리도 없는 방 그 안에 난 외톨이\r\n어딘가 불안해 TV 소리를 키워봐도\r\n저 사람들은 왜 웃고 있는 거야\r\n아주 깜깜한 비나 내렸음 좋겠네\r\n텅 빈 놀이터 벤치에 누군가 다녀간 온기\r\n왜 따뜻함이 날 더 춥게 만드는 거야\r\n웅크린 어깨에 얼굴을 묻다가\r\n주머니 속에 감춘 두 손이 시리네\r\n어제보다 찬 바람이 불어 이불을 끌어당겨도\r\n더 파고든 바람이 구석구석 춥게 만들어\r\n전원이 꺼진 것 같은 기척도 없는 창 밖을\r\n바라보며 의미 없는 숨을 쉬고\r\n한 겨울보다 차가운 내 방 손 끝까지 시린 공기\r\n봄이 오지 않으면 그게 차라리 나을까\r\n내 방 고드름도 녹을까 햇볕 드는 좋은 날 오면은 ',NULL,'','전체'),
(16,'def@gmail.com','2022-06-15','화','차디찬 한겨울이 덮친 듯\r\n시간은 다 얼어버리고\r\n\r\n잔인한 그 바람이 남긴 듯한\r\n어둠은 더 깊어 버리고\r\n벗어나리오\r\n\r\n끝없이 펼쳐진 기약 없는 계절을\r\n지워내리오\r\n뜨겁지 못한 날들에 홀로 데인 흉터를\r\n\r\n큰불을 내리오\r\n이 내 안에 눈물이 더는 못 살게\r\n난 화를 내리오 더 화를 내리오\r\n잃었던 봄을 되찾게\r\n\r\n차갑게 부는 바람이 눈이 하얗게 덮인 마음이\r\n아침이 오면 부디 모두 녹을 수 있게\r\n불을 지펴라\r\n\r\n화 火\r\n타올라 타올라\r\n화 火\r\n꽃피우리라\r\n\r\n화 火\r\n타올라 타올라\r\n화 火\r\n꽃피우리라\r\n\r\n내 너의 흔적 남지 않게 하리\r\n못다 한 원망도 훨훨 타리\r\n쓸쓸한 추위를 거둬 가길\r\n남겨진 시들은 꽃길을 즈려 밟지\r\n\r\n한을 풀리라 다시금 봄을 누리라\r\n추억은 모조리 불이 나 거름이 돼\r\n찬란한 꽃을 피우리라\r\n\r\n난 화를 내리오 더 화를 내리오\r\n잃었던 봄을 되찾게\r\n\r\n차갑게 부는 바람이 눈이 하얗게 덮인 마음이\r\n아침이 오면 부디 모두 녹을 수 있게\r\n불을 지펴라\r\n\r\n화 火\r\n타올라 타올라\r\n화 火\r\n꽃피우리라\r\n\r\n화 火\r\n타올라 타올라\r\n화 火\r\n꽃피우리라\r\n\r\n끊어진 인연의 미련을 품에 안고\r\n시렸던 시간을 나를 태워간다 화\r\n\r\n화 花\r\n화 花\r\n불을 지펴라\r\n\r\n꽃피우리라',NULL,'','나만보기');

/*Table structure for table `dorder` */

DROP TABLE IF EXISTS `dorder`;

CREATE TABLE `dorder` (
  `ordno` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `odate` date NOT NULL,
  `postcode` int(5) NOT NULL,
  `address` varchar(30) NOT NULL,
  `detailAddress` varchar(10) NOT NULL,
  `extraAddress` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `delamt` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`ordno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dorder` */

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `no` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `tag` varchar(10) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `item` */

insert  into `item`(`no`,`name`,`price`,`tag`) values 
(1,'빈티지 감성 다꾸 레터링 블랙&화이트',2450,'스티커'),
(2,'빈티지 불에 그을린 배경지',2400,'스티커'),
(3,'아메리칸 레트로 흑백 매거진 페이퍼',2000,'배경지&떡메모지'),
(4,'빈티지 패션위크 스티커 시리즈',2000,'배경지&떡메모지'),
(5,'빈티지 스트랩 다이어리',50000,'다이어리'),
(6,'빈티지 감성 다꾸 라벨 시리즈',1500,'스티커'),
(7,'레이스 종이 빈티지 다꾸',3400,'스티커');

/*Table structure for table `orditem` */

DROP TABLE IF EXISTS `orditem`;

CREATE TABLE `orditem` (
  `ordno` varchar(20) NOT NULL,
  `seq` int(2) NOT NULL,
  `iname` varchar(20) NOT NULL,
  `qty` int(3) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`ordno`,`seq`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `orditem` */

/*Table structure for table `phrase` */

DROP TABLE IF EXISTS `phrase`;

CREATE TABLE `phrase` (
  `content` varchar(100) NOT NULL,
  `person` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`content`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `phrase` */

insert  into `phrase`(`content`,`person`) values 
('기록은 항상 기억을 이깁니다.',''),
('나는 내 일기 없이는 여행을 한 적이 없다.','오스카 와일드'),
('미래에 사로잡혀있으면 현재를 있는 그대로 볼 수 없을 뿐 아니라 과거까지 재구성하려 들게 된다.',''),
('시간은 인간이 쓸 수 있는 가장 값진 것이다.',''),
('일기는 사람의 훌륭한 인생 자습서다.','');

/*Table structure for table `picture` */

DROP TABLE IF EXISTS `picture`;

CREATE TABLE `picture` (
  `name` varchar(10) NOT NULL,
  `udate` date NOT NULL,
  `tag` varbinary(20) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `picture` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `email` varchar(20) NOT NULL,
  `pw` varchar(10) NOT NULL,
  `uname` varchar(10) NOT NULL,
  `birth` date NOT NULL,
  `telno` int(10) NOT NULL,
  `postcode` int(5) NOT NULL,
  `address` varchar(30) NOT NULL,
  `detailAddress` varchar(10) NOT NULL,
  `extraAddress` varchar(10) NOT NULL,
  `pwq` varchar(30) NOT NULL,
  `pwa` varchar(10) NOT NULL,
  `rdate` date NOT NULL,
  `point` int(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`email`,`pw`,`uname`,`birth`,`telno`,`postcode`,`address`,`detailAddress`,`extraAddress`,`pwq`,`pwa`,`rdate`,`point`,`role`) values 
('abc@gmail.com','qwer1234','아이유','2000-01-02',1012341234,11159,'경기 포천시 호국로 1007','이공계 다동',' (선단동)','내가 좋아하는 연예인은?','아이유','2022-06-15',1000,'member'),
('def@gmail.com','asdfqwer','여자아이들','1999-10-06',1045678910,11159,'경기 포천시 호국로 1007','학생회관',' (선단동)','내가 좋아하는 연예인은?','여자아이들','2022-06-15',1000,'member');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
