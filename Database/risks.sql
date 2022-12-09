-- Database: `bmi`
-- --------------------------------------------------------
-- Table structure for table `risks`

DROP TABLE IF EXISTS `risks`;
CREATE TABLE IF NOT EXISTS `risks` (
  `min` float NOT NULL,
  `max` float NOT NULL,
  `risk` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `risks`
--

INSERT INTO `risks` (`min`, `max`, `risk`) VALUES
(0, 18.5, 'Vitamin deficiencies'),
(0, 18.5, 'Malnutrition'),
(0, 18.5, 'Anemia (lowered ability to carry blood vessels)'),
(0, 18.5, 'Osteoporosis (a disease that causes bone weakness, increasing the risk of breaking a bone)'),
(0, 18.5, 'A decrease in immune function'),
(0, 18.5, 'Growth and development issues, particularly in children and teenagers'),
(0, 18.5, 'Possible reproductive issues for women due to hormonal imbalances that can disrupt the menstrual cycle'),
(0, 18.5, 'Women also have a higher chance of miscarriage in the first trimester'),
(0, 18.5, 'Potential complications as a result of surgery'),
(25, 100, 'High blood pressure'),
(25, 100, 'Higher levels of LDL cholesterol, which is widely considered as \"bad cholesterol,\" lower levels of HDL cholesterol, considered to be good cholesterol in moderation, and high levels of triglycerides'),
(25, 100, 'Type II diabetes'),
(25, 100, 'Coronary heart disease'),
(25, 100, 'Stroke'),
(25, 100, 'Gallbladder disease'),
(25, 100, 'Osteoarthritis (a type of joint disease caused by breakdown of joint cartilage)'),
(25, 100, 'Sleep apnea'),
(25, 100, 'Breathing problems'),
(25, 100, 'Certain cancers (endometrial, breast, colon, kidney, gallbladder, liver)'),
(25, 100, 'Mental illnesses such as clinical depression, anxiety, and others'),
(25, 100, 'Body pains and difficulty with certain physical functions');
COMMIT;
